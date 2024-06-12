@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div>
        <h3>Show Data_collected</h3>

        <a href="{{ route('admin.dataCollected.index') }}" class="btn btn-success my-1">
            Home
        </a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Measured_value</th>
                        <td>{{ $dataCollected->measured_value }}</td>
                    </tr>
                    <tr>
                        <th>Running_time</th>
                        <td>{{ $dataCollected->running_time }}</td>
                    </tr>
                    <tr>
                        <th>Running_status</th>
                        <td>
                            <a href="#" data-bs-toggle="tooltip"  data-bs-title="{{ $dataCollected->running_status == 1 ? 'En cours' : 'Arrêté' }}">

                                <span class="status {{ $dataCollected->running_status == 1 ? 'status-success' : 'status-danger' }}">

                                </span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>Data_count</th>
                        <td>{{ $dataCollected->data_count }}</td>
                    </tr>

                </tbody>
            </table>

            <div>
                <a href="{{ route('admin.dataCollected.edit', ['id' => $dataCollected->id]) }}"
                    class="btn btn-primary my-1">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </a>
            </div>
        </div>
    @endsection
