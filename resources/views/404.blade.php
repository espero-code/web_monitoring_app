@extends('base')

@section('title', 'TrackApp | Error 404')

@section('content')
<div class="container text-center">
    <h1 class="display-1 p-5">404</h1>
    <p class="lead p-5">Désolé, la page que vous recherchez n'existe pas sur nos serveur.</p>
    <a href="{{ url('/') }}" class="btn btn-success rounded-0">Retour à l'accueil</a>
</div>
@endsection
