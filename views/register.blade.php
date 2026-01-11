@extends('layout')
@section('content')
    <section class="auth-section py-8 md:py-16 px-0 min-h-[70vh] flex items-center">
        <div class="container">
            <div class="auth-box bg-pj-white max-w-lg my-0 mx-auto p-8 md:p-12 rounded-lg shadow-md">
                <h2 class="text-center text-pj-blue mb-4 md:mb-8 font-grotesk font-bold text-base md:text-xl">Créer un compte</h2>

                @if(isset($error))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ $error }}
                    </div>
                @endif

                <form action="{{ $baseUrl }}/register" method="POST" id="registerForm" class="auth-form flex flex-col gap-4 md:gap-6">
                    <div class="form-group flex flex-col">
                        <label for="nom" class="mb-2 font-semibold text-pj-greyblue text-sm md:text-base">Nom</label>
                        <input type="text" id="nom" name="nom" required class="p-1.5 md:p-3 border border-solid border-black/15 text-base rounded-md focus:outline-none focus:border-pj-blue">
                        <span class="error-message text-pj-red text-sm mt-1 hidden" id="nomError"></span>
                    </div>

                    <div class="form-group flex flex-col">
                        <label for="prenom" class="mb-2 font-semibold text-pj-greyblue text-sm md:text-base">Prénom</label>
                        <input type="text" id="prenom" name="prenom" required class="p-1.5 md:p-3 border border-solid border-black/15 text-base rounded-md focus:outline-none focus:border-pj-blue">
                        <span class="error-message text-pj-red text-sm mt-1 hidden" id="prenomError"></span>
                    </div>

                    <div class="form-group flex flex-col">
                        <label for="login" class="mb-2 font-semibold text-pj-greyblue text-sm md:text-base">Nom d'utilisateur</label>
                        <input type="text" id="login" name="login" required class="p-1.5 md:p-3 border border-solid border-black/15 text-base rounded-md focus:outline-none focus:border-pj-blue">
                        <span class="error-message text-pj-red text-sm mt-1 hidden" id="loginError"></span>
                    </div>

                    <div class="form-group flex flex-col">
                        <label for="email" class="mb-2 font-semibold text-pj-greyblue text-sm md:text-base">Email</label>
                        <input type="email" id="email" name="email" required class="p-1.5 md:p-3 border border-solid border-black/15 text-base rounded-md focus:outline-none focus:border-pj-blue">
                        <span class="error-message text-pj-red text-xs mt-1 hidden" id="emailError"></span>
                    </div>

                    <div class="form-group flex flex-col">
                        <label for="password" class="mb-2 font-semibold text-pj-greyblue text-sm md:text-base">Mot de passe</label>
                        <input type="password" id="password" name="password" required class="p-1.5 md:p-3 border border-solid border-black/15 text-base rounded-md focus:outline-none focus:border-pj-blue">
                        <span class="error-message text-pj-red text-sm mt-1 hidden" id="passwordError"></span>
                    </div>

                    <div class="form-group flex flex-col">
                        <label for="confirmPassword" class="mb-2 font-semibold text-pj-greyblue text-sm md:text-base">Confirmer le mot de passe</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" required class="p-1.5 md:p-3 border border-solid border-black/15 text-base rounded-md focus:outline-none focus:border-pj-blue">
                        <span class="error-message text-pj-red text-sm mt-1 hidden" id="confirmPasswordError"></span>
                    </div>

                    <div class="form-options flex justify-between items-center">
                        <label class="checkbox-label flex flex-row items-center gap-2 cursor-pointer text-sm md:text-base">
                            <input type="checkbox" id="terms" name="terms" required>
                            <p>J'accepte les <a href="#">conditions d'utilisation</a></p>
                        </label>
                    </div>

                    <input type="hidden" name="register" value="1">
                    <button type="submit" class="btn-primary">S'inscrire</button>
                </form>

                <p class="auth-switch text-center mt-3 md:mt-6 text-pj-grey text-sm md:text-base">
                    Déjà un compte ? <a href="{{ $baseUrl }}/login" class="text-pj-blue no-underline font-semibold transition-all duration-300 ease-in-out hover:underline">Se connecter</a>
                </p>
            </div>
        </div>
    </section>
@endsection