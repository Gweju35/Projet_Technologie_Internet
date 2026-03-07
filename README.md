# 🌐 Projet Site Web - ENSIM

## 📋 Description du projet

Ce projet est un site web complet et responsive développé dans le cadre d'un projet académique à l'ENSIM. Il s'agit d'une application web moderne permettant aux utilisateurs de s'inscrire, se connecter et gérer leur profil personnel via un tableau de bord dynamique.

Le site intègre des fonctionnalités d'authentification sécurisée, de gestion de sessions et cookies, ainsi qu'une interface utilisateur soignée et responsive.

---

## ✨ Fonctionnalités

### 🔐 Authentification
- **Inscription** : Création de compte avec validation des champs (nom, prénom, email, login, mot de passe)
- **Connexion** : Authentification sécurisée avec email et mot de passe hashé
- **Déconnexion** : Destruction de session et redirection
- **Sécurité** : Mots de passe hashés avec `password_hash()` et `password_verify()`

### 👤 Gestion de profil
- **Dashboard utilisateur** : Affichage des informations personnelles
- **Modification de profil** : Édition des données (nom, prénom, email, téléphone, date de naissance, ville, pays, bio)
- **Préférences utilisateur** :
    - Langue préférée (Français, English, Español, Deutsch)

### 🎨 Interface utilisateur
- **Design responsive** : Adaptation automatique aux différents formats d'écran (desktop, tablette, mobile)
- **Framework CSS** : Utilisation de Tailwind CSS pour un design moderne
- **Navigation intuitive** : Menu de navigation avec en-tête et pied de page
- **Messages flash** : Affichage des erreurs et succès (connexion, inscription, modifications)

### 🔄 Sessions et Cookies
- **Gestion de sessions** : Mémorisation de l'utilisateur connecté
- **Cookies** : Stockage du prénom de l'utilisateur (expiration 1 heure)
- **Protection des routes** : Redirection automatique si non connecté

### 🎯 Pages dynamiques
- **Dashboard dynamique** : Données utilisateur extraites de la base de données
- **Affichage conditionnel** : Menu adapté selon l'état de connexion

### ✅ Validation des formulaires
- **Validation côté client** (JavaScript) :
    - Format email valide
    - Mot de passe complexe (8 caractères min, majuscule, minuscule, chiffre)
    - Correspondance des mots de passe
    - Validation en temps réel pendant la frappe
- **Validation côté serveur** (PHP) :
    - Vérification de l'unicité de l'email
    - Validation des données avant insertion en BDD

---

## 🚀 Instructions pour exécuter le site en local

### Prérequis
- **WAMP** (Windows) / **XAMPP** (Windows/Mac/Linux) / **MAMP** (Mac)
- **Composer** (gestionnaire de dépendances PHP)
- **Node.js et npm** (pour Tailwind CSS)
- Navigateur web moderne

### Installation

1. **Cloner le projet**
   ```bash
   git clone https://github.com/Gweju35/Plateforme_web
   cd Project
   ```

2. **Placer le projet dans le dossier WAMP**
   ```
   Déplacer le dossier vers : C:\wamp64\www\ENSIM\Project\
   *NB : dossier ENSIM à créer au préalable, ou alos modifier la variable $baseUrl dans index.php
   ```

3. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

4. **Installer les dépendances Node.js** (pour Tailwind)
   ```bash
   cd assets
   npm install
   ```

5. **Compiler le CSS Tailwind**
   ```bash 
   cd assets
   npm run dev
   # Ou pour la production :
   npm run build
   ```

6. **Créer la base de données**
    - Ouvrir phpMyAdmin : `http://localhost/phpmyadmin`
    - Créer une base de données nommée `projet_ensim`
    - Exécuter le script SQL suivant :

   ```sql
   CREATE TABLE utilisateurs (
       id INT AUTO_INCREMENT PRIMARY KEY,
       login VARCHAR(50) UNIQUE NOT NULL,
       password VARCHAR(255) NOT NULL,
       mail VARCHAR(100) UNIQUE NOT NULL,
       nom VARCHAR(50),
       prenom VARCHAR(50),
       telephone VARCHAR(20) DEFAULT NULL,
       date_naissance DATE DEFAULT NULL,
       ville VARCHAR(100) DEFAULT NULL,
       pays VARCHAR(100) DEFAULT 'France',
       bio TEXT DEFAULT NULL,
       avatar VARCHAR(255) DEFAULT NULL,
       langue_preference VARCHAR(10) DEFAULT 'fr',
       notifications_email BOOLEAN DEFAULT TRUE,
       newsletter BOOLEAN DEFAULT FALSE,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

7. **Configurer la connexion à la base de données**

   Dans `index.php`, vérifier les paramètres de connexion :
   ```php
   $host = '127.0.0.1';
   $db   = 'projet_ensim';
   $user = 'root';
   $pass = '';
   ```

8. **Lancer WAMP**
    - Démarrer WAMP (l'icône doit être verte 🟢)
    - Vérifier qu'Apache et MySQL sont démarrés

9. **Accéder au site**
   ```
   http://localhost/ENSIM/Project/
   ```

---

## 🌳 Arborescence du projet

```
Project/
│
├── assets/                          # Ressources frontend (Tailwind, JavaScript)
│   ├── css/
│   │   ├── buttons.css             # Styles des boutons
│   │   └── input.css               # Styles généraux (les classes Tailwind viennent s'écrire grâce à ce fichier)
│   ├── js/
│   │   ├── formValidation.js       # Validation JavaScript des formulaires
│   │   ├── header.js               # Scripts du header (menu mobile)
│   │   └── main.js                 
│   ├── node_modules/               # Dépendances npm (Tailwind, GSAP)
│   ├── package.json                # Configuration npm
│   ├── package-lock.json           
│   └── tailwind.config.js          # Configuration Tailwind CSS
│
├── cache/                           # Cache des vues Blade compilées
│
├── public/                          # Fichiers accessibles publiquement
│   ├── audios/
│   │   └── temoignage.mp3          # Fichier audio
│   ├── css/
│   │   └── style.css               # CSS compilé (output Tailwind)
│   ├── images/                     
│   └── videos/
│       └── website_video.mp4       # Fichier vidéo
│
├── vendor/                          # Dépendances PHP (Composer)
│
├── views/                           # Vues Blade
│   ├── sections/                   # Découpage en sections réutilisables
│   │   ├── header/
│   │   │   ├── desktop-navigation.blade.php
│   │   │   └── mobile-navigation.blade.php
│   │   ├── home/                   # Sections de la page d'accueil
│   │   │   ├── hero-header.blade.php
│   │   │   ├── pourquoi-nous.blade.php
│   │   │   ├── services.blade.php
│   │   │   └── temoignages.blade.php
│   │   ├── footer.blade.php        # Pied de page
│   │   └── header.blade.php        # En-tête
│   │
│   ├── 404.blade.php                # Page erreur 404
│   ├── about.blade.php              # Page "À propos"
│   ├── dashboard.blade.php          # Dashboard utilisateur
│   ├── home.blade.php               # Page d'accueil
│   ├── layout.blade.php             # Layout principal (template de base)
│   ├── login.blade.php              # Page de connexion
│   ├── profile-edit.blade.php       # Page de modification du profil
│   └── register.blade.php           # Page d'inscription
│
├── .gitignore                       # Fichiers à ignorer par Git
├── .htaccess                        # Configuration Apache (URL rewriting)
├── composer.json                    # Configuration Composer
├── composer.lock                    # Verrouillage des versions Composer
├── index.php                        # Point d'entrée principal (routing, logique)
├── Project.pdf                      # Cahier des charges du projet
└── README.md                        # Documentation du projet
```


---

## 🛠️ Outils et technologies utilisés

### Backend
- **PHP 8.x** : Langage serveur principal
- **PDO (PHP Data Objects)** : Connexion sécurisée à la base de données
- **Composer** : Gestionnaire de dépendances PHP
- **Illuminate/View (Blade)** : Moteur de templates pour les vues

### Frontend
- **HTML5** : Structure sémantique
- **CSS3** : Stylisation personnalisée
- **Tailwind CSS** : Framework CSS utility-first
- **JavaScript (Vanilla)** : Validation des formulaires et interactions

### Base de données
- **MySQL** : Système de gestion de base de données relationnelle
- **phpMyAdmin** : Interface de gestion de la base de données

### Environnement de développement
- **WAMP** : Stack de développement local (Windows, Apache, MySQL, PHP)
- **Git** : Gestionnaire de versions
- **GitHub** : Hébergement du dépôt de code

### Design et polices
- **Google Fonts** : Fira Code & Space Grotesk
- **Responsive Design** : Media queries et grilles flexibles

---

## 💡 Défis rencontrés et solutions

### 1. **Gestion du routing sans framework**
**Défi** : Créer un système de routing propre sans utiliser Laravel ou Symfony.

**Solution** : Implémentation d'un switch/case basé sur l'URI avec nettoyage du préfixe de base URL. Utilisation de `.htaccess` pour rediriger toutes les requêtes vers `index.php`.

### 2. **Intégration de Blade sans Laravel**
**Défi** : Utiliser le moteur de templates Blade en dehors de Laravel.

**Solution** : Installation du package `illuminate/view` via Composer et configuration manuelle du container, dispatcher, et compiler Blade.

### 3. **Hachage des mots de passe existants**
**Défi** : Migrer les mots de passe en clair vers des mots de passe hashés sans casser les comptes existants.

**Solution** : Création d'un script de migration ponctuel (`hash_passwords.php`) pour convertir tous les mots de passe, puis modification du code d'inscription/connexion pour utiliser `password_hash()` et `password_verify()`.

### 4. **Validation des formulaires en temps réel**
**Défi** : Offrir une expérience utilisateur fluide avec des retours immédiats sur les erreurs de saisie.

**Solution** : Implémentation d'écouteurs d'événements JavaScript (`input`, `submit`) avec validation regex et affichage dynamique des messages d'erreur.

### 5. **Gestion des chemins relatifs avec sous-dossier**
**Défi** : Le site est dans `/ENSIM/Project/`, ce qui complique les chemins CSS/JS et les routes.

**Solution** : Création d'une variable `$baseUrl` partagée avec toutes les vues Blade via `$factory->share()`, permettant des liens dynamiques adaptés à l'environnement.

---

## 🎯 Fonctionnalités supplémentaires

### ✅ Implémentées
- **Changement de langue préférée** : Stockage en BDD pour future internationalisation
- **Page de modification de profil** : Édition complète des informations utilisateur
- **Validation JavaScript avancée** : Feedback en temps réel avec critères de complexité du mot de passe
- **Messages flash** : Système de notifications succès/erreur après chaque action

### 🔮 Améliorations futures possibles
- Changement de mot de passe depuis le dashboard
- Upload d'avatar utilisateur
- Système de récupération de mot de passe par email
- Mode sombre/clair basé sur les préférences utilisateur
- Système de rôles (utilisateur/admin)