{{-- Menu mobile --}}
<div class="header__inner--mobile relative block lg:hidden bg-pj-greyblue transition-all duration-300 ease-in-out">
    <div class="container relative flex w-full items-center justify-between py-3 sm:py-4">

        {{-- Logo --}}
        <div class="relative">
            <h1 class="text-3xl text-pj-blue font-grotesk font-bold">MonSite</h1>
        </div>

        {{-- Bouton Menu mobile --}}
        <div class="flex items-center gap-x-6">

            {{-- Bouton Ouverture/Fermeture du menu mobile --}}
            <div class="h-8 overflow-hidden">
                <div class="js-button-slider flex flex-col">
                    <button class="js-open-menu inline-flex w-fit items-center gap-x-3 py-2">
                        <svg class="fill-white transition-colors duration-300 ease-in-out" width="27" height="18" viewBox="0 0 27 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="27" height="2"/>
                            <rect y="8" width="27" height="2"/>
                            <rect y="16" width="21" height="2"/>
                        </svg>
                    </button>
                    <button class="js-close-menu inline-flex w-fit items-center gap-x-3 py-2">
                        <svg class="size-5 fill-white" viewBox="150 150 800 800" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M810.65984 170.65984q18.3296 0 30.49472 12.16512t12.16512 30.49472q0 18.00192-12.32896 30.33088l-268.67712 268.32896 268.67712 268.32896q12.32896 12.32896 12.32896 30.33088 0 18.3296-12.16512 30.49472t-30.49472 12.16512q-18.00192 0-30.33088-12.32896l-268.32896-268.67712-268.32896 268.67712q-12.32896 12.32896-30.33088 12.32896-18.3296 0-30.49472-12.16512t-12.16512-30.49472q0-18.00192 12.32896-30.33088l268.67712-268.32896-268.67712-268.32896q-12.32896-12.32896-12.32896-30.33088 0-18.3296 12.16512-30.49472t30.49472-12.16512q18.00192 0 30.33088 12.32896l268.32896 268.67712 268.32896-268.67712q12.32896-12.32896 30.33088-12.32896z"/>
                        </svg>
                    </button>
                </div>
            </div>

        </div>

    </div>

    <div class="header__navigation bg-pj-white absolute left-0 hidden h-[100dvh] w-full -translate-x-full overflow-scroll pb-4 transition-colors duration-100 ease-in-out z-40">
        <div class="sliding-wrapper relative h-full">
            <nav class="container py-9 h-full flex flex-col justify-between">

                {{-- Menu de navigation --}}
                <ul class="js-navigation--mobile flex w-full flex-col gap-y-6">
                    <li class="js-navigation__item"><a href="{{ $baseUrl }}/home" class="text-pj-blue no-underline transition-all duration-300 ease-in-out font-semibold hover:text-pj-blue">Accueil</a></li>
                    <li class="js-navigation__item"><a href="{{ $baseUrl }}/about" class="text-pj-blue no-underline transition-all duration-300 ease-in-out font-semibold hover:text-pj-blue">À propos</a></li>

                    @if(isset($_SESSION['user_id']))
                        <!-- Utilisateur connecté -->
                        <li class="js-navigation__item"><a href="{{ $baseUrl }}/dashboard" class="text-pj-blue no-underline transition-all duration-300 ease-in-out font-semibold hover:text-pj-blue">Dashboard</a></li>
                        <li class="js-navigation__item">
                            <form action="{{ $baseUrl }}/logout" method="POST" class="inline">
                                <input type="hidden" name="action" value="logout">
                                <button type="submit" class="menu-btn bg-red-500 hover:bg-red-600">
                                    Déconnexion
                                </button>
                            </form>
                        </li>
                    @else
                        <!-- Utilisateur non connecté -->
                        <li class="js-navigation__item"><a href="{{ $baseUrl }}/login" class="menu-btn bg-pj-blue hover:bg-[#2980b9]">Connexion</a></li>
                        <li class="js-navigation__item"><a href="{{ $baseUrl }}/register" class="menu-btn bg-green-500 hover:bg-green-600">Inscription</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
