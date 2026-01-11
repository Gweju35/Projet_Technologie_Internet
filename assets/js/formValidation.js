export default function formValidation() {

    // Fonction pour afficher un message d'erreur
    function showError(input, message) {
        const formGroup = input.closest('.form-group');
        const errorElement = formGroup?.querySelector('.error-message');

        input.classList.add('border-red-500');
        input.classList.remove('border-gray-300');

        if (errorElement) {
            errorElement.textContent = message;
            errorElement.classList.remove('hidden');
        }
    }

    // Fonction pour effacer le message d'erreur
    function clearError(input) {
        const formGroup = input.closest('.form-group');
        const errorElement = formGroup?.querySelector('.error-message');

        input.classList.remove('border-red-500');
        input.classList.add('border-gray-300');

        if (errorElement) {
            errorElement.textContent = '';
            errorElement.classList.add('hidden');
        }
    }

    // Regex pour valider l'email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Formulaire d'inscription
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {

        const nom = document.getElementById('nom');
        const prenom = document.getElementById('prenom');
        const login = document.getElementById('login');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');

        if (nom) {
            nom.addEventListener('input', () => {
                if (nom.value.trim().length < 2) {
                    showError(nom, 'Le nom doit contenir au moins 2 caractères');
                } else if (!/^[a-zA-ZÀ-ÿ\s-]+$/.test(nom.value)) {
                    showError(nom, 'Le nom ne peut contenir que des lettres');
                } else {
                    clearError(nom);
                }
            });
        }

        if (prenom) {
            prenom.addEventListener('input', () => {
                if (prenom.value.trim().length < 2) {
                    showError(prenom, 'Le prénom doit contenir au moins 2 caractères');
                } else if (!/^[a-zA-ZÀ-ÿ\s-]+$/.test(prenom.value)) {
                    showError(prenom, 'Le prénom ne peut contenir que des lettres');
                } else {
                    clearError(prenom);
                }
            });
        }

        if (login) {
            login.addEventListener('input', () => {
                if (login.value.trim().length < 3) {
                    showError(login, 'Le nom d\'utilisateur doit contenir au moins 3 caractères');
                } else if (!/^[a-zA-Z0-9_-]+$/.test(login.value)) {
                    showError(login, 'Seulement lettres, chiffres, tirets et underscores');
                } else {
                    clearError(login);
                }
            });
        }

        if (email) {
            email.addEventListener('input', () => {
                if (!emailRegex.test(email.value)) {
                    showError(email, 'Veuillez entrer un email valide');
                } else {
                    clearError(email);
                }
            });
        }

        if (password) {
            password.addEventListener('input', () => {
                const pwd = password.value;
                const errors = [];

                if (pwd.length < 8) errors.push('au moins 8 caractères');
                if (!/[A-Z]/.test(pwd)) errors.push('une majuscule');
                if (!/[a-z]/.test(pwd)) errors.push('une minuscule');
                if (!/[0-9]/.test(pwd)) errors.push('un chiffre');

                if (errors.length) {
                    showError(password, 'Le mot de passe doit contenir : ' + errors.join(', '));
                } else {
                    clearError(password);
                }

                if (confirmPassword && confirmPassword.value) {
                    password.value !== confirmPassword.value
                        ? showError(confirmPassword, 'Les mots de passe ne correspondent pas')
                        : clearError(confirmPassword);
                }
            });
        }

        if (confirmPassword) {
            confirmPassword.addEventListener('input', () => {
                password.value !== confirmPassword.value
                    ? showError(confirmPassword, 'Les mots de passe ne correspondent pas')
                    : clearError(confirmPassword);
            });
        }

        registerForm.addEventListener('submit', (e) => {
            let isValid = true;

            if (nom && nom.value.trim().length < 2) { showError(nom, 'Le nom doit contenir au moins 2 caractères'); isValid = false; }
            if (prenom && prenom.value.trim().length < 2) { showError(prenom, 'Le prénom doit contenir au moins 2 caractères'); isValid = false; }
            if (login && login.value.trim().length < 3) { showError(login, 'Le nom d\'utilisateur doit contenir au moins 3 caractères'); isValid = false; }
            if (email && !emailRegex.test(email.value)) { showError(email, 'Veuillez entrer un email valide'); isValid = false; }

            if (password) {
                const pwd = password.value;
                if (pwd.length < 8 || !/[A-Z]/.test(pwd) || !/[a-z]/.test(pwd) || !/[0-9]/.test(pwd)) {
                    showError(password, 'Le mot de passe ne respecte pas les critères requis');
                    isValid = false;
                }
            }

            if (confirmPassword && password.value !== confirmPassword.value) {
                showError(confirmPassword, 'Les mots de passe ne correspondent pas');
                isValid = false;
            }

            if (!isValid) e.preventDefault();
        });
    }


    // Formulaire de connexion
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {

        const email = document.getElementById('email');
        const password = document.getElementById('password');

        if (email) {
            email.addEventListener('input', () => {
                !emailRegex.test(email.value)
                    ? showError(email, 'Veuillez entrer un email valide')
                    : clearError(email);
            });
        }

        if (password) {
            password.addEventListener('input', () => {
                password.value.length < 1
                    ? showError(password, 'Le mot de passe est requis')
                    : clearError(password);
            });
        }

        loginForm.addEventListener('submit', (e) => {
            let isValid = true;

            if (email && !emailRegex.test(email.value)) { showError(email, 'Veuillez entrer un email valide'); isValid = false; }
            if (password && password.value.length < 1) { showError(password, 'Le mot de passe est requis'); isValid = false; }

            if (!isValid) e.preventDefault();
        });
    }
}
