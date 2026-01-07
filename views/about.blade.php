@extends('layout')
@section('content')
    <section class="about-hero bg-gradient-to-br from-pj-blue-2 to-pj-purple text-pj-white py-16 px-0 text-center">
        <div class="container">
            <h2 class="text-4xl mb-4">À propos de MonSite</h2>
            <p>Découvrez notre histoire et notre mission</p>
        </div>
    </section>

    <!-- Section Notre Histoire -->
    <section class="about-content py-16 px-0">
        <div class="container">
            <div class="about-section bg-pj-white p-12 mb-12 rounded-lg shadow-md">
                <h2 class="text-pj-greyblue mb-6 text-3xl">Notre Histoire</h2>
                <p class="leading-7 mb-4 text-pj-grey">
                    Fondé en 2024, MonSite est né d'une vision simple : créer une plateforme
                    innovante qui répond aux besoins des utilisateurs modernes. Notre équipe
                    passionnée travaille chaque jour pour améliorer votre expérience et vous
                    offrir les meilleurs services possibles.
                </p>
                <p class="leading-7 mb-4 text-pj-grey">
                    Depuis notre lancement, nous avons accompagné des milliers d'utilisateurs
                    dans leur parcours numérique, en mettant toujours l'accent sur la qualité,
                    la sécurité et l'innovation.
                </p>
            </div>

            <div class="about-section bg-pj-white p-12 mb-12 rounded-lg shadow-md">
                <h2 class="text-pj-greyblue mb-6 text-3xl">Notre Mission</h2>
                <p class="leading-7 mb-4 text-pj-grey">
                    Notre mission est de fournir une plateforme accessible, intuitive et
                    puissante qui permet à chacun de réaliser ses objectifs. Nous croyons
                    en l'importance de l'innovation technologique au service de l'humain.
                </p>
            </div>

            <!-- Valeurs -->
            <div class="values-section mb-12">
                <h2 class="text-center text-4xl mb-12 text-pj-greyblue">Nos Valeurs</h2>
                <div class="values-grid grid [grid-template-columns:repeat(auto-fit,minmax(250px,1fr))] gap-8">
                    <div class="value-card bg-pj-white p-8 rounded-lg shadow-md text-center transition-all duration-300 ease-in-out hover:translate-y-[-5px]">
                        <div class="value-icon text-4xl mb-4">🎯</div>
                        <h3 class="text-pj-blue mb-4">Excellence</h3>
                        <p class="text-pj-grey leading-6">Nous visons l'excellence dans tout ce que nous faisons,
                            de la conception à l'expérience utilisateur.</p>
                    </div>
                    <div class="value-card bg-pj-white p-8 rounded-lg shadow-md text-center transition-all duration-300 ease-in-out hover:translate-y-[-5px]">
                        <div class="value-icon text-4xl mb-4">🔒</div>
                        <h3 class="text-pj-blue mb-4">Sécurité</h3>
                        <p class="text-pj-grey leading-6">La protection de vos données est notre priorité absolue.
                            Nous utilisons les dernières technologies de sécurité.</p>
                    </div>
                    <div class="value-card bg-pj-white p-8 rounded-lg shadow-md text-center transition-all duration-300 ease-in-out hover:translate-y-[-5px]">
                        <div class="value-icon text-4xl mb-4">💡</div>
                        <h3 class="text-pj-blue mb-4">Innovation</h3>
                        <p class="text-pj-grey leading-6">Nous innovons constamment pour vous offrir les meilleures
                            fonctionnalités et rester à la pointe de la technologie.</p>
                    </div>
                    <div class="value-card bg-pj-white p-8 rounded-lg shadow-md text-center transition-all duration-300 ease-in-out hover:translate-y-[-5px]">
                        <div class="value-icon text-4xl mb-4">🤝</div>
                        <h3 class="text-pj-blue mb-4">Communauté</h3>
                        <p class="text-pj-grey leading-6">Nous valorisons notre communauté d'utilisateurs et écoutons
                            leurs retours pour améliorer nos services.</p>
                    </div>
                </div>
            </div>

            <!-- Notre Équipe -->
            <div class="team-section mb-12">
                <h2 class="text-center text-4xl mb-12 text-pj-greyblue">Notre Équipe</h2>
                <div class="team-grid grid [grid-template-columns:repeat(auto-fit,minmax(280px,1fr))] gap-8">
                    <div class="team-member bg-pj-white p-8 rounded-b-lg shadow-md text-center">
                        <div class="member-photo text-7xl mb-4">👤</div>
                        <h3 class="text-pj-greyblue mb-2">Jean Dupont</h3>
                        <p class="member-role text-pj-blue font-semibold mb-4">Directeur Général</p>
                        <p class="text-pj-grey leading-6">Passionné par l'innovation technologique depuis 15 ans.</p>
                    </div>
                    <div class="team-member bg-pj-white p-8 rounded-b-lg shadow-md text-center">
                        <div class="member-photo text-7xl mb-4">👤</div>
                        <h3 class="text-pj-greyblue mb-2">Marie Martin</h3>
                        <p class="member-role text-pj-blue font-semibold mb-4">Directrice Technique</p>
                        <p class="text-pj-grey leading-6">Experte en développement web et architecture logicielle.</p>
                    </div>
                    <div class="team-member bg-pj-white p-8 rounded-b-lg shadow-md text-center">
                        <div class="member-photo text-7xl mb-4">👤</div>
                        <h3 class="text-pj-greyblue mb-2">Pierre Bernard</h3>
                        <p class="member-role text-pj-blue font-semibold mb-4">Chef de Produit</p>
                        <p class="text-pj-grey leading-6">Spécialiste en expérience utilisateur et design thinking.</p>
                    </div>
                </div>
            </div>

            <!-- Statistiques -->
            <div class="stats-section mb-12">
                <h2 class="text-center text-4xl mb-12 text-pj-greyblue">Quelques Chiffres</h2>
                <div class="stats-grid grid [grid-template-columns:repeat(auto-fit,minmax(200px,1fr))] gap-8">
                    <div class="stat-box bg-pj-white p-8 rounded-lg shadow-md text-center">
                        <p class="stat-number text-5xl text-pj-blue font-bold mb-2">10,000+</p>
                        <p class="stat-label text-pj-grey text-xl">Utilisateurs actifs</p>
                    </div>
                    <div class="stat-box bg-pj-white p-8 rounded-lg shadow-md text-center">
                        <p class="stat-number text-5xl text-pj-blue font-bold mb-2">50+</p>
                        <p class="stat-label text-pj-grey text-xl">Pays représentés</p>
                    </div>
                    <div class="stat-box bg-pj-white p-8 rounded-lg shadow-md text-center">
                        <p class="stat-number text-5xl text-pj-blue font-bold mb-2">99.9%</p>
                        <p class="stat-label text-pj-grey text-xl">Disponibilité</p>
                    </div>
                    <div class="stat-box bg-pj-white p-8 rounded-lg shadow-md text-center">
                        <p class="stat-number text-5xl text-pj-blue font-bold mb-2">24/7</p>
                        <p class="stat-label text-pj-grey text-xl">Support client</p>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="about-cta bg-gradient-to-br from-pj-blue-2 to-pj-purple text-pj-white p-12 rounded-lg text-center">
                <h2 class="text-4xl mb-4">Rejoignez-nous dès aujourd'hui</h2>
                <p class="text-xl mb-8">Faites partie de notre communauté grandissante</p>
                <a href="register.html" class="btn-primary">Créer un compte</a>
            </div>
        </div>
    </section>

@endsection