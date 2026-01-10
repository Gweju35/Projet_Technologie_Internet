@extends('layout')
@section('content')
    <section class="about-hero bg-gradient-to-br from-pj-blue-2 to-pj-purple text-pj-white py-8 md:py-16 px-0 text-center">
        <div class="container">
            <h2 class="text-3xl md:text-5xl mb-4 font-grotesk font-bold">A propos de MonSite</h2>
            <p class="text-base md:text-xl font-fira font-medium">Découvrez notre histoire et notre mission</p>
        </div>
    </section>

    <!-- Section Notre Histoire -->
    <section class="about-content py-8 md:py-16 px-0">
        <div class="container">
            <div class="about-section bg-pj-white p-6 md:p-10 mb-8 md:mb-12 rounded-lg shadow-md">
                <h2 class="text-pj-blue mb-4 md:mb-6 text-xl md:text-3xl font-grotesk font-bold">Notre Histoire</h2>
                <div class="flex flex-col gap-2 md:gap-4">
                    <p class="leading-7 text-pj-greyblue text-sm md:text-base">
                        Fondé en 2024, MonSite est né d'une vision simple : créer une plateforme
                        innovante qui répond aux besoins des utilisateurs modernes. Notre équipe
                        passionnée travaille chaque jour pour améliorer votre expérience et vous
                        offrir les meilleurs services possibles.
                    </p>
                    <p class="leading-7 text-pj-greyblue text-sm md:text-base">
                        Depuis notre lancement, nous avons accompagné des milliers d'utilisateurs
                        dans leur parcours numérique, en mettant toujours l'accent sur la qualité,
                        la sécurité et l'innovation.
                    </p>
                </div>
            </div>

            <div class="about-section bg-pj-white p-6 md:p-10 mb-8 md:mb-12 rounded-lg shadow-md">
                <h2 class="text-pj-blue mb-4 md:mb-6 text-xl md:text-3xl font-grotesk font-bold">Notre Mission</h2>
                <div class="flex flex-col gap-2 md:gap-4">
                    <p class="leading-7 text-pj-greyblue text-sm md:text-base">
                        Notre mission est de fournir une plateforme accessible, intuitive et
                        puissante qui permet à chacun de réaliser ses objectifs. Nous croyons
                        en l'importance de l'innovation technologique au service de l'humain.
                    </p>
                </div>
            </div>

            <!-- Valeurs -->
            <div class="values-section mb-8 md:mb-12">
                <h2 class="text-center text-2xl md:text-4xl mb-8 md:mb-12 text-pj-greyblue font-grotesk font-semibold">Nos Valeurs</h2>
                <div class="values-grid grid [grid-template-columns:repeat(auto-fit,minmax(250px,1fr))] gap-4 md:gap-8">
                    <div class="value-card bg-pj-white p-4 md:p-8 rounded-lg shadow-md text-center transition-all duration-300 ease-in-out hover:translate-y-[-5px]">
                        <div class="value-icon text-2xl md:text-4xl mb-4">🎯</div>
                        <h3 class="text-pj-blue mb-4 font-semibold">Excellence</h3>
                        <p class="text-pj-greyblue leading-6 text-sm md:text-base">Nous visons l'excellence dans tout ce que nous faisons,
                            de la conception à l'expérience utilisateur.</p>
                    </div>
                    <div class="value-card bg-pj-white p-8 rounded-lg shadow-md text-center transition-all duration-300 ease-in-out hover:translate-y-[-5px]">
                        <div class="value-icon text-2xl md:text-4xl mb-4">🔒</div>
                        <h3 class="text-pj-blue mb-4 font-semibold">Sécurité</h3>
                        <p class="text-pj-greyblue leading-6 text-sm md:text-base">La protection de vos données est notre priorité absolue.
                            Nous utilisons les dernières technologies de sécurité.</p>
                    </div>
                    <div class="value-card bg-pj-white p-8 rounded-lg shadow-md text-center transition-all duration-300 ease-in-out hover:translate-y-[-5px]">
                        <div class="value-icon text-2xl md:text-4xl mb-4">💡</div>
                        <h3 class="text-pj-blue mb-4 font-semibold">Innovation</h3>
                        <p class="text-pj-greyblue leading-6 text-sm md:text-base">Nous innovons constamment pour vous offrir les meilleures
                            fonctionnalités et rester à la pointe de la technologie.</p>
                    </div>
                    <div class="value-card bg-pj-white p-8 rounded-lg shadow-md text-center transition-all duration-300 ease-in-out hover:translate-y-[-5px]">
                        <div class="value-icon text-2xl md:text-4xl mb-4">🤝</div>
                        <h3 class="text-pj-blue mb-4 font-semibold">Communauté</h3>
                        <p class="text-pj-greyblue leading-6 text-sm md:text-base">Nous valorisons notre communauté d'utilisateurs et écoutons
                            leurs retours pour améliorer nos services.</p>
                    </div>
                </div>
            </div>

            <!-- Notre Équipe -->
            <div class="team-section mb-8 md:mb-12">
                <h2 class="text-center text-2xl md:text-4xl mb-8 md:mb-12 text-pj-greyblue font-grotesk font-semibold">Notre Equipe</h2>
                <div class="team-grid grid [grid-template-columns:repeat(auto-fit,minmax(280px,1fr))] gap-4 md:gap-8">
                    <div class="team-member bg-pj-white p-4 md:p-8 rounded-b-lg shadow-md text-center">
                        <div class="member-photo text-5xl md:text-7xl mb-4">👤</div>
                        <h3 class="text-pj-greyblue mb-2 text-sm md:text-base">Jean Dupont</h3>
                        <p class="member-role text-pj-blue font-semibold mb-4 text-sm md:text-base">Directeur Général</p>
                        <p class="text-pj-grey leading-6 text-sm md:text-base">Passionné par l'innovation technologique depuis 15 ans.</p>
                    </div>
                    <div class="team-member bg-pj-white p-4 md:p-8 rounded-b-lg shadow-md text-center">
                        <div class="member-photo text-5xl md:text-7xl mb-4">👤</div>
                        <h3 class="text-pj-greyblue mb-2 text-sm md:text-base">Marie Martin</h3>
                        <p class="member-role text-pj-blue font-semibold mb-4 text-sm md:text-base">Directrice Technique</p>
                        <p class="text-pj-grey leading-6 text-sm md:text-base">Experte en développement web et architecture logicielle.</p>
                    </div>
                    <div class="team-member bg-pj-white p-4 md:p-8 rounded-b-lg shadow-md text-center">
                        <div class="member-photo text-5xl md:text-7xl mb-4">👤</div>
                        <h3 class="text-pj-greyblue mb-2 text-sm md:text-base">Pierre Bernard</h3>
                        <p class="member-role text-pj-blue font-semibold mb-4 text-sm md:text-base">Chef de Produit</p>
                        <p class="text-pj-grey leading-6 text-sm md:text-base">Spécialiste en expérience utilisateur et design thinking.</p>
                    </div>
                </div>
            </div>

            <!-- Statistiques -->
            <div class="stats-section mb-8 md:mb-12">
                <h2 class="text-center text-2xl md:text-4xl mb-8 md:mb-12 text-pj-greyblue font-grotesk font-semibold">Quelques Chiffres</h2>
                <div class="stats-grid grid [grid-template-columns:repeat(auto-fit,minmax(200px,1fr))] gap-4 md:gap-8">
                    <div class="stat-box bg-pj-white p-4 md:p-8 rounded-lg shadow-md text-center">
                        <p class="stat-number text-3xl md:text-5xl text-pj-blue font-bold mb-2">10,000+</p>
                        <p class="stat-label text-pj-grey text-base md:text-xl">Utilisateurs actifs</p>
                    </div>
                    <div class="stat-box bg-pj-white p-4 md:p-8 rounded-lg shadow-md text-center">
                        <p class="stat-number text-3xl md:text-5xl text-pj-blue font-bold mb-2">50+</p>
                        <p class="stat-label text-pj-grey text-base md:text-xl">Pays représentés</p>
                    </div>
                    <div class="stat-box bg-pj-white p-4 md:p-8 rounded-lg shadow-md text-center">
                        <p class="stat-number text-3xl md:text-5xl text-pj-blue font-bold mb-2">99.9%</p>
                        <p class="stat-label text-pj-grey text-base md:text-xl">Disponibilité</p>
                    </div>
                    <div class="stat-box bg-pj-white p-4 md:p-8 rounded-lg shadow-md text-center">
                        <p class="stat-number text-3xl md:text-5xl text-pj-blue font-bold mb-2">24/7</p>
                        <p class="stat-label text-pj-grey text-base md:text-xl">Support client</p>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="about-cta bg-gradient-to-br from-pj-blue-2 to-pj-purple text-pj-white p-8 md:p-12 rounded-lg text-center">
                <h2 class="text-2xl md:text-4xl mb-4 font-grotesk font-bold">Rejoignez-nous dès aujourd'hui</h2>
                <p class="text-base md:text-lg mb-4 md:mb-8">Faites partie de notre communauté grandissante</p>
                <a href="/register" class="btn-primary">Créer un compte</a>
            </div>
        </div>
    </section>

@endsection