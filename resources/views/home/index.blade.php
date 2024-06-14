@extends('base')

@section('title', 'TrackApp')

@section('content')
<div class="home-banner  gradient navbar-light text-light shadow-lg d-flex align-items-center">
    <div class="container text-center">
        <div class="jumbotron py-5">
            <h1 class="display-4">Suivi de performances en temps réel</h1>
            <hr class="my-4">
            <p class="lead">
                Découvrez les performances, le fonctionnement et la disponibilité de vos différents appareils connectés.
            </p>
            <p class="lead">
                Analysez les données pour mieux optimiser leur utilisation.
            </p>
            <a class="btn btn-success btn-lg" href="#features" role="button">
                En savoir plus <i class="fas fa-arrow-down ml-2"></i>
            </a>
            <a class="btn btn-outline-light btn-lg ml-3" href="{{ route('module.all') }}" role="button">
                Consulter les appareils <i class="fas fa-eye ml-2"></i>
            </a>
        </div>
        </div>
    </div>
</div>



<div class="container mt-5" id="features">
    <div class="row text-center py-5">
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <i class="fas fa-chart-line fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Suivi en Temps Réel</h5>
                    <p class="card-text">Recevez des données actualisées en temps réel pour une analyse précise et instantanée.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <i class="fas fa-cogs fa-3x mb-3 text-success"></i>
                    <h5 class="card-title">Fonctionnement Optimal</h5>
                    <p class="card-text">Assurez-vous que vos appareils fonctionnent de manière optimale grâce à nos outils d'analyse avancés.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <i class="fas fa-shield-alt fa-3x mb-3 text-danger"></i>
                    <h5 class="card-title">Sécurité et Disponibilité</h5>
                    <p class="card-text">Surveillez la sécurité et la disponibilité de vos appareils pour éviter toute interruption de service.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials/divider')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mb-4">
           <img class="img-fluid" src="{{ asset('assets/images/track_app_image_1.png') }}" alt="">
        </div>
        <div class="col-md-6 mb-4">
            <h3>Pourquoi Choisir TrackApp?</h3>
            <p>
                TrackApp offre une solution complète pour la gestion et le suivi de vos appareils connectés. Nos outils
                permettent une surveillance continue, une analyse approfondie des performances, et une optimisation de
                l'utilisation pour maximiser votre efficacité opérationnelle.
            </p>
            <a class="btn btn-outline-primary" href="{{ route('module.all')}}" role="button">
                Découvrir <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>


<div class="gradient text-center">
    <div class="container py-3 text-light">
        <h3 class="">Fonctionnalités Avancées</h3>
        <p class="">Découvrez les fonctionnalités avancées de TrackApp qui vous aident à analyser les performances en temps réel de manière efficace et sécurisée.</p>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="feature-item">
                    <i class="fas fa-bolt text-warning me-2"></i>
                    <span>Analyses Rapides et Efficaces</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-item">
                    <i class="fas fa-sync-alt text-info me-2"></i>
                    <span>Mises à Jour Automatiques</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-item">
                    <i class="fas fa-user-shield text-primary me-2"></i>
                    <span>Protection des Données</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-item">
                    <i class="fas fa-mobile-alt text-success me-2"></i>
                    <span>Accessibilité Mobile</span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container my-5" id="faq">
    <h3 class="text-center mb-4">FAQ</h3>
    <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Comment TrackApp fonctionne-t-il?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    TrackApp utilise des technologies de pointe pour surveiller et analyser les performances de vos appareils connectés en temps réel.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Est-ce que mes données sont sécurisées?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Oui, TrackApp utilise des protocoles de sécurité avancés pour garantir la protection de vos données.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Puis-je accéder à TrackApp depuis un appareil mobile?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Oui, TrackApp est entièrement accessible depuis des appareils mobiles, vous permettant de surveiller vos performances où que vous soyez.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
