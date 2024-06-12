@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div>
        <h3>Show Measured_type</h3>

        <a href="{{ route('admin.measured_types.index') }}" class="btn btn-success my-1">
            Home
        </a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $measured_type->name }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $measured_type->description }}</td>
                    </tr>
                    <tr>
                        <th>Min Value</th>
                        <td>{{ $measured_type->min_value }}</td>
                    </tr>
                    <tr>
                        <th>Max Value</th>
                        <td>{{ $measured_type->max_value }}</td>
                    </tr>

                </tbody>
            </table>

            <div>
                <a href="{{ route('admin.measured_types.edit', ['id' => $measured_type->id]) }}"
                    class="btn btn-primary my-1">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </a>
            </div>
        </div>
    @endsection
