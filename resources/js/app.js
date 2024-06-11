import moment from 'moment';
import './bootstrap';

console.log("start app");



Echo.channel('module-status')
    .listen('ModuleStatusUpdated', (e) => {
        console.log('Module status updated:', e.module, 'Status:', e.status);
        displayNotification(e.module, e.status);
        updateModuleStatus(e.module, e.status);
        refreshTable();
    });


    function displayNotification(module, status) {
        const notificationContainer = document.getElementById('notification-container');
        const notification = document.createElement('div');
        notification.className = status ? 'alert alert-info' : 'alert alert-danger';

        notification.innerHTML = `Module ${module.name} (${status ? 'running' : 'stoped'}) | ${moment(new Date(module.created_at)).fromNow()}`;

        notificationContainer.appendChild(notification);
    }

    function updateModuleStatus(module, status) {
        const moduleElement = document.getElementById(`module-${module.id}`);
        if (moduleElement) {
            moduleElement.querySelector('.status').innerText = status;
        }
    }

    function refreshTable() {
        // Envoyer une requête AJAX pour récupérer les données mises à jour
        fetch('/api/module')
            .then(response => response.json())
            .then(result => {
                const data = result.datas.data
                console.log({data});
                // Mettre à jour le tableau avec les nouvelles données
                const tableBody = document.querySelector('table tbody');
                tableBody.innerHTML = ''; // Clear the table

                data.forEach((row, index) => {
                    const tr = document.createElement('tr');

                    tr.innerHTML = `
                        <th scope="row">${row.index}</th>
                        <td>${row.measured_value}</td>
                        <td>${row.running_time}</td>
                        <td>
                            <a href="#" data-bs-toggle="tooltip" data-bs-title="${row.running_status ? 'En cours' : 'Arrêté'}">
                                <span class="status ${row.running_status ? 'status-success' : 'status-danger'}"></span>
                            </a>
                        </td>
                        <td>${row.data_count}</td>
                        <td>${moment(row.created_at).fromNow()}</td>
                    `;

                    tableBody.appendChild(tr);
                });
            })
            .catch(error => console.error('Error:', error));
    }
