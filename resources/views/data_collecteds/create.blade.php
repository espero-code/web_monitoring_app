@extends('admin')

@section('content')
<div >
    <h3>Create Data_collected</h3>
    <a href="{{ route('admin.dataCollected.index') }}" class="btn btn-success my-1">
            Home
    </a>
    @include('data_collecteds/dataCollectedForm')
        </div>
@endsection
