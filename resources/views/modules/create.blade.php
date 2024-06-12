@extends('admin')

@section('content')
<div >
    <h3>Ajouter un Module</h3>
    <a href="{{ route('admin.modules.index') }}" class="btn btn-success my-1">
            Revenir à la liste
    </a>
    @include('modules/moduleForm')
        </div>
@endsection
