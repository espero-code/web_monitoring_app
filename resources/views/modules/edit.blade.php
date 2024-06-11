@extends('admin')

@section('content')
    <div >
        <h3>Edit Module</h3>
        <a href="{{ route('admin.modules.index') }}" class="btn btn-success my-1">
                Home
        </a>
        @include('modules/moduleForm', ['module' => $module])
    </div>
@endsection
