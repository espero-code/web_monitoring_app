@extends('admin')

@section('content')
<div >
    <h3>Create Measured Types</h3>
    <a href="{{ route('admin.measured_types.index') }}" class="btn btn-success my-1">
            Home
    </a>
    @include('measured_types/measured_typeForm')
        </div>
@endsection
