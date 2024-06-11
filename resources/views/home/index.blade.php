@extends('base')

@section('title', 'Accueil')

@section('content')
    <div class="row">
        <div class="col-md-2 shadow-lg">
            <div class="p-3">
                <h2>Modules</h2>
                <ul class="modules list-group">
                    @foreach ($modules as $module)
                        <li class="module-item list-group-item border-0 {{ $module->slug == $slug ? 'active' : '' }}"
                            title="{{ $module->description }}">
                            <a href="{{ route('module_by_slug', ['slug' => $module->slug]) }}" data-bs-toggle="tooltip"
                                data-bs-title="{{ $module->description }}">{{ $module->name }}</a>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
        <div class="col-md-10">
            <div class="p-3 shadow-lg">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Historique (données collectées)</h2>
                        <div class="mb-3">
                            <strong>Type de mesure : {{ $measuredType->name }} </strong>
                        </div>

                        @include('partials/pagination')
                        <div class="table-zone my-3">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"> <a href="#" data-bs-toggle="tooltip"
                                                data-bs-title="Valeur calculée : ( {{ $measuredType->name }} )">Valeur </a>
                                        </th>
                                        <th scope="col"> <a href="#" data-bs-toggle="tooltip"
                                                data-bs-title="Temps de fonctionnement">Temps </a> </th>
                                        <th scope="col"> <a href="#" data-bs-toggle="tooltip"
                                                data-bs-title="Statut de fonctionnement">Status </a> </th>
                                        <th scope="col"> <a href="#" data-bs-toggle="tooltip"
                                                data-bs-title="Nombre de données">Quantité </a> </th>
                                        <th scope="col"> <a href="#" data-bs-toggle="tooltip"
                                                data-bs-title="Collectée le">Depuis </a> </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalCount = $datas->total();
                                    @endphp

                                    @foreach ($datas as $data)
                                        <tr>
                                            <th scope="row">
                                                {{ $totalCount - $datas->perPage() * ($datas->currentPage() - 1) - $loop->index }}
                                            </th>
                                            <td>{{ $data->measured_value }}</td>
                                            <td>{{ $data->running_time }}</td>
                                            <td>
                                                <a href="#" data-bs-toggle="tooltip"
                                                    data-bs-title="{{ $data->running_status ? 'En cours' : 'Arrêté' }}">

                                                    <span
                                                        class="status {{ $data->running_status ? 'status-success' : 'status-danger' }}">

                                                    </span>
                                                </a>
                                            </td>
                                            <td>{{ $data->data_count }}</td>
                                            <td>{{ $data->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                        <!-- Afficher les liens de pagination si nécessaire -->
                        @include('partials/pagination')
                    </div>
                    <div class="col-md-6">
                        <h2>Graphique</h2>
                        <canvas id="myChart" width="400px" height="400px"></canvas>
                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Récupérer les données nécessaires pour le graphique depuis le serveur
        const labels = {!! json_encode($labels) !!};
        const values = {!! json_encode($values) !!};
        const label = {!! json_encode($measuredType->name) !!};

        // Initialiser le graphique
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: label,
                    data: values,
                    fill: true,
                    borderColor: 'rgb(13, 110, 253)',
                    backgroundColor: 'rgba(13, 110, 253)',
                    tension: 0.6
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Temps'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Valeur calculée'
                        }
                    }
                }
            }
        });
    </script>

@endsection
