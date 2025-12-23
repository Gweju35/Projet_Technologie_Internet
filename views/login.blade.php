@extends('layout')
@section('content')

<section class="auth-section">
    <div class="container">
        <div class="auth-box">
            <h2>Connexion</h2>
            <form id="loginForm" class="auth-form">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                    <span class="error-message" id="emailError"></span>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                    <span class="error-message" id="passwordError"></span>
                </div>

                <div class="form-options">
                    <label class="checkbox-label">
                        <input type="checkbox" id="remember" name="remember">
                        Se souvenir de moi
                    </label>
{{--                    <a href="#" class="forgot-password">Mot de passe oublié ?</a>--}}
                </div>

                <button type="submit" class="btn-primary">Se connecter</button>
            </form>

            <p class="auth-switch">
                Pas encore de compte ? <a href="register.html">S'inscrire</a>
            </p>
        </div>
    </div>
</section>

@endsection