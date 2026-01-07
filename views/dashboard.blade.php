@extends('layout')
@section('content')
    <section class="dashboard-section py-16 px-0 min-h-[70vh]">
        <div class="container">
            <div class="welcome-message bg-gradient-to-br from-pj-blue-2 to-pj-purple text-pj-white p-8 rounded-lg mb-8">
                <h2 class="text-4xl">Bienvenue, <span id="userName">Utilisateur</span>!</h2>
                <p>Dernière connexion: <span id="lastLogin">--</span></p>
            </div>

            <div class="dashboard-grid grid [grid-template-columns:repeat(auto-fit,minmax(300px,1fr))] gap-8">
                <div class="dashboard-card bg-pj-white p-8 rounded-lg shadow-md">
                    <h3 class="text-pj-grey mb-6 pb-2 border-b border-b-pj-blue">Mon Profil</h3>
                    <div class="profile-info mb-6">
                        <p class="mb-3.5"><strong>Nom:</strong> <span id="profileName">--</span></p>
                        <p class="mb-3.5"><strong>Email:</strong> <span id="profileEmail">--</span></p>
                        <p class="mb-3.5"><strong>Membre depuis:</strong> <span id="memberSince">--</span></p>
                    </div>
                    <button class="btn-secondary">Modifier le profil</button>
                </div>

                <!-- Carte Statistiques -->
                <div class="dashboard-card bg-pj-white p-8 rounded-lg shadow-md">
                    <h3 class="text-pj-grey mb-6 pb-2 border-b border-b-pj-blue">Statistiques</h3>
                    <div class="stats flex justify-around text-center">
                        <div class="stat-item p-4">
                            <p class="stat-number text-4xl text-pj-blue font-bold">0</p>
                            <p class="stat-label text-pj-grey">Projets</p>
                        </div>
                        <div class="stat-item p-4">
                            <p class="stat-number text-4xl text-pj-blue font-bold">0</p>
                            <p class="stat-label text-pj-grey">Messages</p>
                        </div>
                    </div>
                </div>

                <!-- Carte Activités récentes -->
                <div class="dashboard-card bg-pj-white p-8 rounded-lg shadow-md col-span-full">
                    <h3 class="text-pj-grey mb-6 pb-2 border-b border-b-pj-blue">Activités récentes</h3>
                    <ul class="list-none" id="activityList">
                        <li class="p-3.5 bg-pj-white-2 mb-2 rounded-md">Aucune activité récente</li>
                    </ul>
                </div>

                <!-- Carte Préférences -->
                <div class="dashboard-card bg-pj-white p-8 rounded-lg shadow-md">
                    <h3 class="text-pj-grey mb-6 pb-2 border-b border-b-pj-blue">Préférences</h3>
                    <div class="preferences flex flex-col gap-4">
                        <label class="checkbox-label flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="emailNotif" checked>
                            Notifications par email
                        </label>
                        <label class="checkbox-label flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="newsletter">
                            Newsletter hebdomadaire
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection