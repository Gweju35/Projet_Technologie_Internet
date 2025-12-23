@extends('layout')
@section('content')
    <!-- Section Dashboard -->
    <section class="dashboard-section">
        <div class="container">
            <div class="welcome-message">
                <h2>Bienvenue, <span id="userName">Utilisateur</span>!</h2>
                <p>Dernière connexion: <span id="lastLogin">--</span></p>
            </div>

            <div class="dashboard-grid">
                <!-- Carte Profil -->
                <div class="dashboard-card">
                    <h3>Mon Profil</h3>
                    <div class="profile-info">
                        <p><strong>Nom:</strong> <span id="profileName">--</span></p>
                        <p><strong>Email:</strong> <span id="profileEmail">--</span></p>
                        <p><strong>Membre depuis:</strong> <span id="memberSince">--</span></p>
                    </div>
                    <button class="btn-secondary">Modifier le profil</button>
                </div>

                <!-- Carte Statistiques -->
                <div class="dashboard-card">
                    <h3>Statistiques</h3>
                    <div class="stats">
                        <div class="stat-item">
                            <p class="stat-number">0</p>
                            <p class="stat-label">Projets</p>
                        </div>
                        <div class="stat-item">
                            <p class="stat-number">0</p>
                            <p class="stat-label">Messages</p>
                        </div>
                    </div>
                </div>

                <!-- Carte Activités récentes -->
                <div class="dashboard-card full-width">
                    <h3>Activités récentes</h3>
                    <ul class="activity-list" id="activityList">
                        <li>Aucune activité récente</li>
                    </ul>
                </div>

                <!-- Carte Préférences -->
                <div class="dashboard-card">
                    <h3>Préférences</h3>
                    <div class="preferences">
                        <label class="checkbox-label">
                            <input type="checkbox" id="emailNotif" checked>
                            Notifications par email
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" id="newsletter">
                            Newsletter hebdomadaire
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection