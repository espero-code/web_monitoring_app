import moment from 'moment'; // Importing moment.js for date handling
import './bootstrap'; // Importing bootstrap dependencies

console.log("start app"); // Log a message to the console when the app starts
const data_collecteds = [];

// Subscribe to the 'module-status' channel to listen for the 'ModuleStatusUpdated' event
Echo.channel('module-status')
    .listen('ModuleStatusUpdated', (e) => {
        const { module, status, data_collected } = e;

        data_collected.module = module;
        data_collecteds.unshift(data_collected);

        displayNotification(); // Display a notification
        updateModuleStatus(module, status); // Update the module status in the interface
        if (module.slug == localStorage.currentModuleSlug) {
            console.log({ data_collected });
            refreshTable(module); // Refresh the modules table
        }
    });

/**
 * Displays notifications for collected data.
 */
function displayNotification() {
    const notificationList = document.getElementById('notification-list'); // Get the notification list element
    const notificationIcon = document.getElementById('notification-icon'); // Get the notification icon element
    notificationIcon.classList.remove('d-none'); // Show the notification icon
    const badge = document.querySelector('#notification-icon .badge');
    notificationList.innerHTML = ""; // Clear the notification list

    data_collecteds.forEach((data_collected) => {
        const { module } = data_collected;
        const notification = `
            <li class="d-flex jcsb" id="notification-item-${module.id}">
                <a class="dropdown-item" href="/module/${module.slug}">
                    ${module.name} (${displayElapsedTime(data_collected.created_at)})
                </a>
                <span class="status ${data_collected.running_status ? 'status-success' : 'status-danger'}"></span>
            </li>
        `;
        notificationList.innerHTML += notification;
        badge.innerText = notificationList.children.length;
    });
}

/**
 * Updates the display of a module's status in the interface.
 * @param {Object} module - The module object containing module information.
 * @param {boolean} status - The status of the module.
 */
function updateModuleStatus(module, status) {
    const moduleElement = document.getElementById(`module-${module.id}`);
    if (moduleElement) {
        moduleElement.querySelector('.status').innerText = status ? 'Running' : 'Stopped';
    }
}

/**
 * Refreshes the module table by sending an AJAX request to get updated data.
 * @param {Object} module - The module object containing module information.
 */
function refreshTable(module) {
    // Send an AJAX request to retrieve updated data
    fetch(`/api/module/${module.slug}`)
        .then(response => response.json())
        .then(result => {
            const data = result.datas.data;
            // Update the table with the new data
            const tableBody = document.querySelector('table tbody');
            tableBody.innerHTML = ''; // Clear the table

            data.forEach((row) => {
                const tr = document.createElement('tr');

                tr.innerHTML = `
                    <th scope="row">${row.id}</th>
                    <td>${module.name}</td>
                    <td>${row.measured_value}</td>
                    <td>${row.running_time}</td>
                    <td>
                        <a href="#" data-bs-toggle="tooltip" data-bs-title="${row.running_status ? 'Running' : 'Stopped'}">
                            <span class="status ${row.running_status ? 'status-success' : 'status-danger'}"></span>
                        </a>
                    </td>
                    <td>${row.data_count}</td>
                    <td>${moment(row.created_at).fromNow()}</td>
                `;

                tableBody.appendChild(tr);
            });

            updateChart(result);
        })
        .catch(error => console.error('Error:', error));
}

/**
 * Updates the chart with new data.
 * @param {Object} param0 - Object containing labels and values for the chart.
 */
function updateChart({ labels, values }) {
    const myChart = window.myChart;

    // Update the chart data
    myChart.data.labels = labels;
    myChart.data.datasets[0].data = values;
    // Re-render the chart
    myChart.update();
}

/**
 * Formats and returns the elapsed time from a given start date to now.
 * @param {string} startDate - The start date in a format recognized by moment.js.
 * @returns {string} The formatted elapsed time.
 */
function displayElapsedTime(startDate) {
    // Parse the start date using moment.js
    const startMoment = moment(startDate);
    const now = moment();
    const duration = moment.duration(now.diff(startMoment));

    let elapsedTime;
    if (duration.asHours() >= 1) {
        const hours = Math.floor(duration.asHours());
        elapsedTime = hours === 1 ? 'il y a 1 heure' : `il y a ${hours} heures`;
    } else if (duration.asMinutes() >= 1) {
        const minutes = Math.floor(duration.asMinutes());
        elapsedTime = minutes === 1 ? 'il y a 1 minute' : `${minutes} minutes ago`;
    } else {
        const seconds = Math.floor(duration.asSeconds());
        elapsedTime = seconds === 1 ? 'il y a 1 seconde' : `il y a ${seconds} secondes`;
    }

    return elapsedTime;
}
