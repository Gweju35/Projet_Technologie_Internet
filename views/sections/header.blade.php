<header class="bg-pj-greyblue text-white py-4 shadow-md sticky top-0 z-50">
    <div class="container flex items-center justify-between">
        <div class="logo w-fit">
            <h1 class="text-3xl text-pj-blue font-grotesk font-bold">MonSite</h1>
        </div>
        <nav class="w-fit">
            <ul class="nav-menu flex items-center list-none gap-8">
                <li><a href="{{ $baseUrl }}/home" class="text-white no-underline transition-all duration-300 ease-in-out font-semibold hover:text-pj-blue">Accueil</a></li>
                <li><a href="{{ $baseUrl }}/about" class="text-white no-underline transition-all duration-300 ease-in-out font-semibold hover:text-pj-blue">À propos</a></li>

                @if(isset($_SESSION['user_id']))
                    <!-- Utilisateur connecté -->
                    <li><a href="{{ $baseUrl }}/dashboard" class="text-white no-underline transition-all duration-300 ease-in-out font-semibold hover:text-pj-blue">Dashboard</a></li>
                    <li>
                        <form action="{{ $baseUrl }}/logout" method="POST" class="inline">
                            <input type="hidden" name="action" value="logout">
                            <button type="submit" class="bg-red-500 text-white py-2 px-6 rounded-md hover:bg-red-600 transition-all duration-300 ease-in-out cursor-pointer">
                                Déconnexion
                            </button>
                        </form>
                    </li>
                @else
                    <!-- Utilisateur non connecté -->
                    <li><a href="{{ $baseUrl }}/login" class="bg-pj-blue !text-white py-2 px-6 rounded-md hover:bg-[#2980b9] transition-all duration-300 ease-in-out font-semibold">Connexion</a></li>
                    <li><a href="{{ $baseUrl }}/register" class="bg-green-500 !text-white py-2 px-6 rounded-md hover:bg-green-600 transition-all duration-300 ease-in-out font-semibold">Inscription</a></li>
                @endif
            </ul>
        </nav>
    </div>
</header>