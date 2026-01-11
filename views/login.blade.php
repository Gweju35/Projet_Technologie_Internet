@extends('layout')
@section('content')

<section class="auth-section py-8 md:py-16 px-0 min-h-[70vh] flex items-center">
    <div class="container">
        <div class="auth-box bg-pj-white max-w-lg my-0 mx-auto p-8 md:p-12 rounded-lg shadow-md">
            <h2 class="text-center text-pj-blue mb-6 md:mb-8 font-grotesk font-bold text-base md:text-xl">Connexion</h2>
            @if(isset($error))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ $error }}
                </div>
            @endif

            @if(isset($success))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ $success }}
                </div>
            @endif
            <form action="{{ $baseUrl }}/login" method="POST" id="loginForm" class="auth-form flex flex-col gap-4 md:gap-6">
                <div class="form-group flex flex-col">
                    <label for="email" class="mb-2 font-semibold text-pj-greyblue">Email</label>
                    <input type="email" id="email" name="login" required class="p-1.5 md:p-3 border border-solid border-black/15 text-sm md:text-base rounded-md focus:outline-none focus:border-pj-blue">
                    <span class="error-message text-pj-red text-sm mt-1 hidden" id="emailError"></span>
                </div>

                <div class="form-group flex flex-col">
                    <label for="password" class="mb-2 font-semibold text-pj-greyblue">Mot de passe</label>
                    <input type="password" id="password" name="password" required class="p-3 border border-solid border-black/15 text-sm md:text-base rounded-md focus:outline-none focus:border-pj-blue">
                    <span class="error-message text-pj-red text-sm mt-1 hidden" id="passwordError"></span>
                </div>

                <button type="submit" class="btn-primary">Se connecter</button>
            </form>

            <p class="auth-switch text-center mt-3 md:mt-6 text-pj-grey text-sm md:text-base">
                Pas encore de compte ? <a href="{{ $baseUrl }}/register" class="text-sm md:text-base text-pj-blue no-underline font-semibold transition-all duration-300 ease-in-out hover:underline">S'inscrire</a>
            </p>
        </div>
    </div>
</section>

@endsection