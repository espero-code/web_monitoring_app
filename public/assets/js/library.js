/**
 * Formats and returns the elapsed time from a given start date to now.
 * @param {string} startDate - The start date in a format recognized by Date.parse().
 * @returns {string} The formatted elapsed time.
 */
function displayElapsedTime(startDate) {
    const start = new Date(startDate);
    const now = new Date();

    // Calculate the difference in milliseconds
    const duration = now - start;

    // Calculate hours, minutes, and seconds
    const hours = Math.floor(duration / (1000 * 60 * 60));
    const minutes = Math.floor((duration % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((duration % (1000 * 60)) / 1000);

    // Format elapsed time
    if (hours >= 1) {
        return hours === 1 ? "il y a 1 heure" : `il y a ${hours} heures`;
    } else if (minutes >= 1) {
        return minutes === 1 ? "il y a 1 minute" : `il y a ${minutes} minutes`;
    } else {
        return seconds === 1 ? "il y a 1 seconde" : `il y a ${seconds} secondes`;
    }
}

/**
 * Displays notifications for collected data.
 */
function displayNotification() {
    const notificationList = document.getElementById("notification-list");
    const notificationIcon = document.getElementById("notification-icon");
    notificationIcon.classList.remove("d-none"); // Show the notification icon
    const badge = document.querySelector("#notification-icon .badge");
    notificationList.innerHTML = ""; // Clear the notification list

    data_collecteds.forEach((data_collected) => {
        const { module } = data_collected;
        const notification = `
            <li class="d-flex jcsb" id="notification-item-${module.id}">
                <a class="dropdown-item" href="/module/${module.slug}">
                    ${module.name} (${displayElapsedTime(data_collected.created_at)})
                </a>
                <span class="status ${data_collected.running_status ? "status-success" : "status-danger"}"></span>
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
        moduleElement.querySelector(".status").innerText = status ? "Running" : "Stopped";
    }
}

/**
 * Updates the chart with new data.
 * @param {Object} param0 - Object containing labels and values for the chart.
 */
function updateChart({ labels, values }) {
    const myChart = window.myChart;

    // Update the chart data
    myChart.data.labels = labels.map((item) => displayElapsedTime(item));
    myChart.data.datasets[0].data = values;

    // Re-render the chart
    myChart.update({
        duration: 5000,
        easing: "linear",
    });
}

/**
 * Refreshes the module table by sending an AJAX request to get updated data.
 * @param {Object} module - The module object containing module information.
 * @param {Object} data_collected - The data object containing collected data information.
 */
function refreshTable(module, data_collected) {
    if (window.currentData) {
        currentData.data.unshift(data_collected);
        const newLabel = data_collected.created_at;
        const newValue = data_collected.measured_value;
        let chartData = window.chartData;

        if (chartData) {
            chartData.labels.push(newLabel);
            chartData.values.push(newValue);

            if (chartData.labels.length > 20) {
                chartData.labels.shift();
                chartData.values.shift();
            }

            window.chartData = chartData;
        }

        updateChart(chartData);

        const tableBody = document.querySelector("table tbody");
        tableBody.innerHTML = ""; // Clear the table

        window.currentData.data.forEach((row, index) => {
            const tr = document.createElement("tr");
            if (index === 0) {
                tr.classList.add("current");
            }

            tr.innerHTML = `
                <th scope="row">${row.id}</th>
                <td>${module.name}</td>
                <td>${row.measured_value}</td>
                <td>${row.running_time}</td>
                <td>
                    <a href="#" data-bs-toggle="tooltip" title="${row.running_status ? "Running" : "Stopped"}">
                        <span class="status ${row.running_status ? "status-success" : "status-danger"}"></span>
                    </a>
                </td>
                <td>${row.data_count}</td>
                <td>${displayElapsedTime(row.created_at)}</td>
            `;

            tableBody.appendChild(tr);
        });
    }
}

// Expose functions to the global scope
window.displayElapsedTime = displayElapsedTime;
window.updateModuleStatus = updateModuleStatus;
window.displayNotification = displayNotification;
window.updateChart = updateChart;
window.refreshTable = refreshTable;
