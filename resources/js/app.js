import moment from 'moment';
import './bootstrap';

console.log("start app");



Echo.channel('module-status')
    .listen('ModuleStatusUpdated', (e) => {
        // console.log('Module status updated:', e.module, 'Status:', e.status);
        displayNotification(e.module, e.status);
        updateModuleStatus(e.module, e.status);
        refreshTable(e.module);
    });


    function displayNotification(module, status) {
        const notificationList = document.getElementById('notification-list');
        const notificationIcon = document.getElementById('notification-icon');
        notificationIcon.classList.remove('d-none')

        const notification = `<li class="d-flex jcsb" id="module-notification-${module.id}">
            <a class="dropdown-item" href="#">
            ${module.name} (${moment(module.created_at).fromNow() })
            </a>
            <span class="status ${status ? 'status-success' : 'status-danger' }"></span>
        </li>`

        const notificationItem = document.getElementById("module-notification-"+module.id)
        if(notificationItem){
            notificationItem.innerHTML =  `<a class="dropdown-item" href="#">
            ${module.name} (${moment(module.created_at).fromNow() })
            </a>
            <span class="status ${status ? 'status-success' : 'status-danger' }"></span>
        `
        }else{
            notificationList.innerHTML = notification + notificationList.innerHTML
        }


        const badge = document.querySelector('#notification-icon .badge')

        badge.innerText = notificationList.children.length;
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
                // console.log({result});
                // Mettre à jour le tableau avec les nouvelles données
                const tableBody = document.querySelector('table tbody');
                tableBody.innerHTML = ''; // Clear the table

                data.forEach((row, index) => {
                    const tr = document.createElement('tr');

                    tr.innerHTML = `
                        <th scope="row">${row.id}</th>
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
