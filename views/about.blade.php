@extends('layout')
@section('content')

    <!-- Section Hero About -->
    <section class="about-hero">
        <div class="container">
            <h2>À propos de MonSite</h2>
            <p>Découvrez notre histoire et notre mission</p>
        </div>
    </section>

    <!-- Section Notre Histoire -->
    <section class="about-content">
        <div class="container">
            <div class="about-section">
                <h2>Notre Histoire</h2>
                <p>
                    Fondé en 2024, MonSite est né d'une vision simple : créer une plateforme
                    innovante qui répond aux besoins des utilisateurs modernes. Notre équipe
                    passionnée travaille chaque jour pour améliorer votre expérience et vous
                    offrir les meilleurs services possibles.
                </p>
                <p>
                    Depuis notre lancement, nous avons accompagné des milliers d'utilisateurs
                    dans leur parcours numérique, en mettant toujours l'accent sur la qualité,
                    la sécurité et l'innovation.
                </p>
            </div>

            <div class="about-section">
                <h2>Notre Mission</h2>
                <p>
                    Notre mission est de fournir une plateforme accessible, intuitive et
                    puissante qui permet à chacun de réaliser ses objectifs. Nous croyons
                    en l'importance de l'innovation technologique au service de l'humain.
                </p>
            </div>

            <!-- Valeurs -->
            <div class="values-section">
                <h2>Nos Valeurs</h2>
                <div class="values-grid">
                    <div class="value-card">
                        <div class="value-icon">🎯</div>
                        <h3>Excellence</h3>
                        <p>Nous visons l'excellence dans tout ce que nous faisons,
                            de la conception à l'expérience utilisateur.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">🔒</div>
                        <h3>Sécurité</h3>
                        <p>La protection de vos données est notre priorité absolue.
                            Nous utilisons les dernières technologies de sécurité.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">💡</div>
                        <h3>Innovation</h3>
                        <p>Nous innovons constamment pour vous offrir les meilleures
                            fonctionnalités et rester à la pointe de la technologie.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">🤝</div>
                        <h3>Communauté</h3>
                        <p>Nous valorisons notre communauté d'utilisateurs et écoutons
                            leurs retours pour améliorer nos services.</p>
                    </div>
                </div>
            </div>

            <!-- Notre Équipe -->
            <div class="team-section">
                <h2>Notre Équipe</h2>
                <div class="team-grid">
                    <div class="team-member">
                        <div class="member-photo">👤</div>
                        <h3>Jean Dupont</h3>
                        <p class="member-role">Directeur Général</p>
                        <p>Passionné par l'innovation technologique depuis 15 ans.</p>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">👤</div>
                        <h3>Marie Martin</h3>
                        <p class="member-role">Directrice Technique</p>
                        <p>Experte en développement web et architecture logicielle.</p>
                    </div>
                    <div class="team-member">
                        <div class="member-photo">👤</div>
                        <h3>Pierre Bernard</h3>
                        <p class="member-role">Chef de Produit</p>
                        <p>Spécialiste en expérience utilisateur et design thinking.</p>
                    </div>
                </div>
            </div>

            <!-- Statistiques -->
            <div class="stats-section">
                <h2>Quelques Chiffres</h2>
                <div class="stats-grid">
                    <div class="stat-box">
                        <p class="stat-number">10,000+</p>
                        <p class="stat-label">Utilisateurs actifs</p>
                    </div>
                    <div class="stat-box">
                        <p class="stat-number">50+</p>
                        <p class="stat-label">Pays représentés</p>
                    </div>
                    <div class="stat-box">
                        <p class="stat-number">99.9%</p>
                        <p class="stat-label">Disponibilité</p>
                    </div>
                    <div class="stat-box">
                        <p class="stat-number">24/7</p>
                        <p class="stat-label">Support client</p>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="about-cta">
                <h2>Rejoignez-nous dès aujourd'hui</h2>
                <p>Faites partie de notre communauté grandissante</p>
                <a href="register.html" class="btn-primary">Créer un compte</a>
            </div>
        </div>
    </section>

@endsection