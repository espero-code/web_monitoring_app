@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div>
        <h3>Liste des modules</h3>

        <div class="d-flex justify-content-end">
            <div class="dropdown m-1">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Colonnes
                </button>
                <div id="columnSelector" class="dropdown-menu"> </div>
            </div>
            <a href="{{ route('admin.modules.create') }}" class="btn btn-success m-1">

                Ajouter un module

            </a>
        </div>
        <div class="">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="Module" class="table">
                        <thead>
                            <tr>
                                <th scope="col">N#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Valeur Mesurée</th>

                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modules as $module)
                                <tr>
                                    <td>{{ $module->id }}</td>
                                    <td>{{ $module->name }}</td>
                                    <td>{{ $module->slug }}</td>
                                    <td>{{ $module->description }}</td>

                                    <td>


                                        <a href="#" data-bs-toggle="tooltip"
                                            data-bs-title="{{ $module->status == 1 ? 'En cours' : 'Arrêté' }}">

                                            <span class="status {{ $module->status == 1  ? 'status-success' : 'status-danger' }}">

                                            </span>
                                        </a>

                                    </td>
                                    <td>{{ $module->measuredType->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.modules.show', ['id' => $module->id]) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.modules.edit', ['id' => $module->id]) }}"
                                            class="btn btn-success btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="#" data-id="{{ $module->id }}" data-name="{{ $module->name }}"
                                            class="btn btn-danger btn-sm deleteBtn">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $modules->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="confirmModalLabel">Confirmation de suppression</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary confirmDeleteAction">Oui, supprimer</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        const checkboxs = document.querySelectorAll('input[type="checkbox"]')

        checkboxs.forEach((checkbox) => {

            checkbox.onchange = async (event) => {
                const {
                    checked,
                    name,
                    dataset
                } = event.target;
                const {
                    id
                } = dataset;
                console.log({
                    checked,
                    name,
                    id
                });
                const data = {
                    [name]: checked.toString()
                };
                const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                const response = await fetch('/admin/modules/speed/' + id, {
                    method: 'PUT',
                    body: JSON.stringify(
                    data), // Utilisation de JSON.stringify au lieu de JSON.stringfy
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
            };
        })

        const deleteButtons = document.querySelectorAll('.deleteBtn')
        deleteButtons.forEach(deleteButton => {
            deleteButton.addEventListener('click', (event) => {
                event.preventDefault();
                const {
                    id,
                    name
                } = deleteButton.dataset
                const modalBody = document.querySelector('.modal-body')
                modalBody.innerHTML = `Êtes-vous sûr de vouloir supprimer le module : <strong>${name}</strong>  ? Cette action est iréversible.</strong> `

                const modal = new bootstrap.Modal(document.querySelector('#confirmModal'))
                modal.show()
                const confirmDeleteBtn = document.querySelector('.confirmDeleteAction')

                confirmDeleteBtn.addEventListener('click', async () => {
                    const csrfToken = document.head.querySelector('meta[name="csrf-token"]')
                        .content;
                    const response = await fetch('/admin/modules/delete/' + id, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })

                    const result = await response.json()

                    if (result && result.isSuccess) {
                        window.location.href = window.location.href;
                    }


                    modal.hide()
                })
            })

        });
        document.addEventListener('DOMContentLoaded', function() {
            const tableHeaders = document.querySelectorAll('#Module th');
            const columnSelector = document.getElementById('columnSelector');

            tableHeaders.forEach(function(header, index) {
                const li = document.createElement('li');
                const a = document.createElement('a');
                const div = document.createElement('div');
                a.className = 'dropdown-item';
                div.className = 'form-check form-switch';
                const label = document.createElement('label');
                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.role = "switch"
                checkbox.className = 'columnSelector form-check-input';
                checkbox.dataset.column = index;
                const savedSelection = localStorage.getItem('selectedColumns#Module');
                checkbox.checked = !!!savedSelection; // Sélectionner par défaut
                checkbox.addEventListener('change', function() {
                    const columnIndex = parseInt(checkbox.dataset.column);
                    toggleColumn(columnIndex, checkbox.checked);
                    saveSelection();
                });

                label.appendChild(document.createTextNode(header.textContent));
                div.appendChild(label)
                div.appendChild(checkbox)
                a.appendChild(div);
                li.appendChild(a);
                columnSelector.appendChild(li);

                header.addEventListener('click', function() {
                    sortTable(index);
                });

                if (savedSelection) {
                    const selectedColumns = JSON.parse(savedSelection);
                    toggleColumn(parseInt(index), selectedColumns.includes(index));
                }
            });


            const checkboxes = document.querySelectorAll('.columnSelector');

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    const columnIndex = parseInt(checkbox.dataset.column);
                    toggleColumn(columnIndex, checkbox.checked);

                    // Sauvegarde la sélection dans le localStorage
                    saveSelection();
                });
            });

            // Chargement des valeurs sauvegardées dans le localStorage
            loadSavedSelection();
        });

        function toggleColumn(columnIndex, show) {
            const dataTable = document.getElementById('Module');
            const cells = dataTable.querySelectorAll(
                `tr td:nth-child(${columnIndex + 1}), th:nth-child(${columnIndex + 1})`);

            cells.forEach(function(cell) {
                if (show) {
                    cell.style.display = ''; // Affiche la colonne
                } else {
                    cell.style.display = 'none'; // Masque la colonne
                }
            });
        }

        function saveSelection() {
            const selectedColumns = Array.from(document.querySelectorAll('.columnSelector'))
                .filter(c => c.checked)
                .map(c => c.dataset.column);
            localStorage.setItem('selectedColumns#Module', JSON.stringify(selectedColumns));
        }

        function loadSavedSelection() {
            const savedSelection = localStorage.getItem('selectedColumns#Module');
            if (savedSelection) {
                const selectedColumns = JSON.parse(savedSelection);
                selectedColumns.forEach(function(columnIndex) {
                    const checkbox = document.querySelector(`.columnSelector[data-column="${columnIndex}"]`);
                    if (checkbox) {
                        checkbox.checked = true;
                        toggleColumn(parseInt(columnIndex), true);
                    }
                });
            }
        }

        function sortTable(columnIndex) {
            const table = document.getElementById('Module');
            const rows = Array.from(table.querySelectorAll('tbody tr'));

            console.log({
                rows
            });

            rows.sort((a, b) => {
                const cellA = a.querySelectorAll('td')[columnIndex].textContent;
                const cellB = b.querySelectorAll('td')[columnIndex].textContent;

                return cellA.localeCompare(cellB, undefined, {
                    numeric: true,
                    sensitivity: 'base'
                });
            });

            table.querySelector('tbody').innerHTML = '';
            rows.forEach(row => table.querySelector('tbody').appendChild(row));
        }
    </script>
@endsection
