@extends('layout')
@section('content')
    <section class="dashboard-section py-8 md:py-16 px-0 min-h-[70vh]">
        <div class="container">
            <div class="welcome-message bg-gradient-to-br from-pj-blue-2 to-pj-purple text-pj-white p-4 md:p-8 rounded-lg mb-4 md:mb-8">
                <h2 class="text-2xl md:text-4xl">Bienvenue, <span id="userName">Utilisateur</span>!</h2>
                <p>Dernière connexion: <span id="lastLogin">--</span></p>
            </div>

            <div class="dashboard-grid grid [grid-template-columns:repeat(auto-fit,minmax(300px,1fr))] gap-4 md:gap-8">
                <div class="dashboard-card bg-pj-white p-8 rounded-lg shadow-md">
                    <h3 class="text-pj-grey mb-4 md:mb-6 pb-2 border-b border-b-pj-blue text-sm md:text-base">Mon Profil</h3>
                    <div class="profile-info mb-4 md:mb-6">
                        <p class="mb-2 md:mb-3.5 text-sm md:text-base"><strong>Nom:</strong> <span id="profileName">--</span></p>
                        <p class="mb-2 md:mb-3.5 text-sm md:text-base"><strong>Email:</strong> <span id="profileEmail">--</span></p>
                        <p class="mb-2 md:mb-3.5 text-sm md:text-base"><strong>Membre depuis:</strong> <span id="memberSince">--</span></p>
                    </div>
                    <button class="btn-secondary">Modifier le profil</button>
                </div>

                <!-- Carte Statistiques -->
                <div class="dashboard-card bg-pj-white p-4 md:p-8 rounded-lg shadow-md">
                    <h3 class="text-pj-grey mb-4 md:mb-6 pb-2 border-b border-b-pj-blue text-sm md:text-base">Statistiques</h3>
                    <div class="stats flex justify-around text-center">
                        <div class="stat-item p-4">
                            <p class="stat-number text-2xl md:text-4xl text-pj-blue font-bold">0</p>
                            <p class="stat-label text-pj-grey text-sm md:text-base">Projets</p>
                        </div>
                        <div class="stat-item p-4">
                            <p class="stat-number text-2xl md:text-4xl text-pj-blue font-bold">0</p>
                            <p class="stat-label text-pj-grey text-sm md:text-base">Messages</p>
                        </div>
                    </div>
                </div>

                <!-- Carte Activités récentes -->
                <div class="dashboard-card bg-pj-white p-4 md:p-8 rounded-lg shadow-md col-span-full">
                    <h3 class="text-pj-grey mb-4 md:mb-6 pb-2 border-b border-b-pj-blue text-sm md:text-base">Activités récentes</h3>
                    <ul class="list-none" id="activityList">
                        <li class="p-2 md:p-3.5 bg-pj-white-2 mb-2 rounded-md text-sm md:text-base">Aucune activité récente</li>
                    </ul>
                </div>

                <!-- Carte Préférences -->
                <div class="dashboard-card bg-pj-white p-4 md:p-8 rounded-lg shadow-md">
                    <h3 class="text-pj-grey mb-4 md:mb-6 pb-2 border-b border-b-pj-blue text-sm md:text-base">Préférences</h3>
                    <div class="preferences flex flex-col gap-2 md:gap-4">
                        <label class="checkbox-label flex items-center gap-2 cursor-pointer text-sm md:text-base">
                            <input type="checkbox" id="emailNotif" checked>
                            Notifications par email
                        </label>
                        <label class="checkbox-label flex items-center gap-2 cursor-pointer text-sm md:text-base">
                            <input type="checkbox" id="newsletter">
                            Newsletter hebdomadaire
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection