@extends('layout')
@section('content')

<section class="auth-section py-8 md:py-16 px-0 min-h-[70vh] flex items-center">
    <div class="container">
        <div class="auth-box bg-pj-white max-w-lg my-0 mx-auto p-8 md:p-12 rounded-lg shadow-md">
            <h2 class="text-center text-pj-blue mb-6 md:mb-8 font-grotesk font-bold text-base md:text-xl">Connexion</h2>
            <form id="loginForm" class="auth-form flex flex-col gap-4 md:gap-6">
                <div class="form-group flex flex-col">
                    <label for="email" class="mb-2 font-semibold text-pj-greyblue">Email</label>
                    <input type="email" id="email" name="email" required class="p-1.5 md:p-3 border border-solid border-black/15 text-sm md:text-base rounded-md focus:outline-none focus:border-pj-blue">
                    <span class="error-message text-pj-red text-sm mt-1 hidden" id="emailError"></span>
                </div>

                <div class="form-group flex flex-col">
                    <label for="password" class="mb-2 font-semibold text-pj-greyblue">Mot de passe</label>
                    <input type="password" id="password" name="password" required class="p-3 border border-solid border-black/15 text-sm md:text-base rounded-md focus:outline-none focus:border-pj-blue">
                    <span class="error-message text-pj-red text-sm mt-1 hidden" id="passwordError"></span>
                </div>

                <div class="form-options flex justify-between items-center">
                    <label class="checkbox-label flex items-center gap-2 cursor-pointer text-sm md:text-base">
                        <input type="checkbox" id="remember" name="remember">
                        Se souvenir de moi
                    </label>
                </div>

                <button type="submit" class="btn-primary">Se connecter</button>
            </form>

            <p class="auth-switch text-center mt-3 md:mt-6 text-pj-grey text-sm md:text-base">
                Pas encore de compte ? <a href="/register" class="text-sm md:text-base text-pj-blue no-underline font-semibold transition-all duration-300 ease-in-out hover:underline">S'inscrire</a>
            </p>
        </div>
    </div>
</section>

@endsection