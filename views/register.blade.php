@extends('layout')
@section('content')
    <section class="auth-section">
    <div class="container">
        <div class="auth-box">
            <h2>Créer un compte</h2>
            <form id="registerForm" class="auth-form">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" required>
                    <span class="error-message" id="usernameError"></span>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                    <span class="error-message" id="emailError"></span>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                    <span class="error-message" id="passwordError"></span>
                    <small>Minimum 8 caractères, incluant lettres et chiffres</small>
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Confirmer le mot de passe</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                    <span class="error-message" id="confirmPasswordError"></span>
                </div>

                <div class="form-options">
                    <label class="checkbox-label">
                        <input type="checkbox" id="terms" name="terms" required>
                        J'accepte les <a href="#">conditions d'utilisation</a>
                    </label>
                </div>

                <button type="submit" class="btn-primary">S'inscrire</button>
            </form>

            <p class="auth-switch">
                Déjà un compte ? <a href="login.html">Se connecter</a>
            </p>
        </div>
    </div>
</section>
@endsection