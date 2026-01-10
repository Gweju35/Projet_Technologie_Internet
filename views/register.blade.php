@extends('layout')
@section('content')
    <section class="auth-section py-16 px-0 min-h-[70vh] flex items-center">
    <div class="container">
        <div class="auth-box bg-pj-white max-w-lg my-0 mx-auto p-12 rounded-lg shadow-md">
            <h2 class="text-center text-pj-blue mb-8 font-grotesk font-bold text-xl">Créer un compte</h2>
            <form id="registerForm" class="auth-form flex flex-col gap-6">
                <div class="form-group flex flex-col">
                    <label for="username" class="mb-2 font-semibold text-pj-greyblue">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" required class="p-3 border border-solid border-black/15 text-base rounded-md focus:outline-none focus:border-pj-blue">
                    <span class="error-message text-pj-red text-sm mt-1 hidden" id="usernameError"></span>
                </div>

                <div class="form-group flex flex-col">
                    <label for="email" class="mb-2 font-semibold text-pj-greyblue">Email</label>
                    <input type="email" id="email" name="email" required class="p-3 border border-solid border-black/15 text-base rounded-md focus:outline-none focus:border-pj-blue">
                    <span class="error-message text-pj-red text-xs mt-1 hidden" id="emailError"></span>
                </div>

                <div class="form-group flex flex-col">
                    <label for="password" class="mb-2 font-semibold text-pj-greyblue">Mot de passe</label>
                    <input type="password" id="password" name="password" required class="p-3 border border-solid border-black/15 text-base rounded-md focus:outline-none focus:border-pj-blue">
                    <span class="error-message text-pj-red text-sm mt-1 hidden" id="passwordError"></span>
                    <small class="text-pj-grey text-xs mt-1">Minimum 8 caractères, incluant lettres et chiffres</small>
                </div>

                <div class="form-group flex flex-col">
                    <label for="confirmPassword" class="mb-2 font-semibold text-pj-greyblue">Confirmer le mot de passe</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required class="p-3 border border-solid border-black/15 text-base rounded-md focus:outline-none focus:border-pj-blue">
                    <span class="error-message text-pj-red text-sm mt-1 hidden" id="confirmPasswordError"></span>
                </div>

                <div class="form-options flex justify-between items-center">
                    <label class="checkbox-label flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="terms" name="terms" required>
                        J'accepte les <a href="#">conditions d'utilisation</a>
                    </label>
                </div>

                <button type="submit" class="btn-primary">S'inscrire</button>
            </form>

            <p class="auth-switch text-center mt-6 text-pj-grey">
                Déjà un compte ? <a href="/login" class="text-pj-blue no-underline font-semibold transition-all duration-300 ease-in-out hover:underline">Se connecter</a>
            </p>
        </div>
    </div>
</section>
@endsection