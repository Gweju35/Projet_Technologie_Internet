@extends('layout')
@section('content')
    <section class="dashboard-section py-8 md:py-16 px-0 min-h-[70vh]">
        <div class="container">
            <!-- Message de bienvenue -->
            <div class="welcome-message bg-gradient-to-br from-pj-blue-2 to-pj-purple text-pj-white p-4 md:p-8 rounded-lg mb-4 md:mb-8">
                <h2 class="text-2xl md:text-4xl">Bienvenue, {{ $user['prenom'] }} {{ $user['nom'] }} !</h2>
                <p class="mt-2">Membre depuis le : {{ date('d/m/Y', strtotime($user['created_at'])) }}</p>
            </div>

            <div class="dashboard-grid grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">

                <!-- Carte Mon Profil -->
                <div class="dashboard-card bg-pj-white p-8 rounded-lg shadow-md">
                    <h3 class="text-pj-grey mb-4 md:mb-6 pb-2 border-b border-b-pj-blue text-sm md:text-base">Mon
                        Profil</h3>
                    <div class="profile-info mb-4 md:mb-6">
                        <p class="mb-2 md:mb-3.5 text-sm md:text-base">
                            <strong>Nom complet:</strong> {{ $user['prenom'] }} {{ $user['nom'] }}
                        </p>
                        <p class="mb-2 md:mb-3.5 text-sm md:text-base">
                            <strong>Email:</strong> {{ $user['mail'] }}
                        </p>
                        @if($user['date_naissance'])
                            <p class="mb-2 md:mb-3.5 text-sm md:text-base">
                                <strong>Date de
                                    naissance:</strong> {{ date('d/m/Y', strtotime($user['date_naissance'])) }}
                            </p>
                        @endif
                        @if($user['telephone'])
                            <p class="mb-2 md:mb-3.5 text-sm md:text-base">
                                <strong>Téléphone:</strong> {{ rtrim(chunk_split($user['telephone'], 2, '.'), '.') }}
                            </p>
                        @endif
                        @if($user['ville'])
                            <p class="mb-2 md:mb-3.5 text-sm md:text-base">
                                <strong>Localisation:</strong> {{ $user['ville'] }}, {{ $user['pays'] }}
                            </p>
                        @endif
                    </div>
                    <a href="{{ $baseUrl }}/profile/edit" class="btn-secondary inline-block">Modifier le profil</a>
                </div>

                <!-- Carte Préférences -->
                @if($user['bio'])
                    <div class="dashboard-card bg-pj-white p-4 md:p-8 rounded-lg shadow-md">
                        <h3 class="text-pj-grey mb-4 md:mb-6 pb-2 border-b border-b-pj-blue text-sm md:text-base">
                            Biographie</h3>
                        <p class="mb-2 md:mb-3.5 text-sm md:text-base">
                            {{ $user['bio'] }}
                        </p>
                    </div>
                @endif

                <!-- Carte Informations du compte -->
                <div class="dashboard-card bg-pj-white p-4 md:p-8 rounded-lg shadow-md col-span-full">
                    <h3 class="text-pj-grey mb-4 md:mb-6 pb-2 border-b border-b-pj-blue text-sm md:text-base">
                        Informations du compte</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="stat-card p-4 bg-blue-50 rounded-lg">
                            <p class="text-sm text-gray-600">Compte créé</p>
                            <p class="text-xl font-bold text-pj-blue">{{ date('d/m/Y', strtotime($user['created_at'])) }}</p>
                        </div>
                        <div class="stat-card p-4 bg-green-50 rounded-lg">
                            <p class="text-sm text-gray-600">Statut</p>
                            <p class="text-xl font-bold text-green-600">Actif</p>
                        </div>
                        <div class="stat-card p-4 bg-purple-50 rounded-lg">
                            <p class="text-sm text-gray-600">Langue</p>
                            <p class="text-xl font-bold text-purple-600">
                                @if($user['langue_preference'] === 'fr')
                                    Français
                                @elseif($user['langue_preference'] === 'en')
                                    English
                                @elseif($user['langue_preference'] === 'es')
                                    Español
                                @else
                                    Deutsch
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection