@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div>
        <h3>Show Module</h3>

        <a href="{{ route('admin.modules.index') }}" class="btn btn-success my-1">
            Home
        </a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $module->name }}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $module->slug }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $module->description }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <a href="#" data-bs-toggle="tooltip"
                            data-bs-title="{{ $module->status == 1 ? 'En cours' : 'Arrêté' }}">

                            <span class="status {{ $module->status == 1  ? 'status-success' : 'status-danger' }}">

                            </span>
                        </a>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div>
                <a href="{{ route('admin.modules.edit', ['id' => $module->id]) }}" class="btn btn-primary my-1">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </a>
            </div>
        </div>
    @endsection
