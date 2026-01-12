<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\View\FileViewFinder;
use Illuminate\View\Factory;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Compilers\BladeCompiler;

session_start();

// URL de base pour les redirections
$baseUrl = '/ENSIM/Project';

// Connexion à la Base de Données
$host = '127.0.0.1'; // adresse du serveur MySQL (localhost)
$db   = 'projet_ensim'; // nom de la base
$user = 'root'; // identifiant de connexion
$pass = '';
$charset = 'utf8mb4'; // encodage des caractères

// Pour PDO
// DSN = Data Source Name → description de la connexion
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    // Création de l'objet PDO (connexion réelle à la BDD)
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Les erreurs SQL déclenchent des exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Les résultats seront retournés sous forme de tableaux associatifs
    ]);
} catch (\PDOException $e) {
    // En cas d'échec de connexion, on arrête tout et on affiche l'erreur
    die("Erreur BDD : " . $e->getMessage());
}

// Traitement de le déconnexion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'logout') {
    session_unset();
    session_destroy();

    // Supprimer les cookies
    setcookie('user_prenom', '', time() - 3600, '/');
    setcookie('user_email', '', time() - 3600, '/');
    setcookie('last_login', '', time() - 3600, '/');

    header("Location: {$baseUrl}/");
    exit;
}

// Traitement de l'inscription
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validation basique
    if (empty($nom) || empty($prenom) || empty($email) || empty($login) || empty($password)) {
        $_SESSION['error'] = "Tous les champs sont obligatoires";
        header("Location: {$baseUrl}/register");
        exit;
    }

    // Vérifier si l'email existe déjà
    $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE mail = :mail");
    $stmt->execute(['mail' => $email]);
    if ($stmt->fetch()) {
        $_SESSION['error'] = "Cet email est déjà utilisé";
        header("Location: {$baseUrl}/register");
        exit;
    }

    // hashage du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insertion
    try {
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, mail, login, password) VALUES (:nom, :prenom, :mail, :login, :password)");
        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'mail' => $email,
            'login' => $login,
            'password' => $hashedPassword
        ]);

        $_SESSION['success'] = "Inscription réussie ! Vous pouvez vous connecter.";
        header("Location: {$baseUrl}/login");
        exit;

    } catch (PDOException $e) {
        $_SESSION['error'] = "Une erreur est survenue lors de l'inscription";
        header("Location: {$baseUrl}/register");
        exit;
    }
}

// Traitement de la connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login']) && isset($_POST['password']) && !isset($_POST['register'])) {
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE mail = :mail");
    $stmt->execute(['mail' => $_POST['login']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['nom'] = $user['nom'];

        $rememberMe = isset($_POST['remember']);
        $cookieDuration = $rememberMe ? (86400 * 30) : 3600;

        // Cookies
        setcookie('user_prenom', $user['prenom'], [
            'expires' => time() + $cookieDuration,      // expire dans 1 heure
            'path' => '/',                    // disponible sur tout le site
            'secure' => false,                // true si HTTPS (false en local)
            'httponly' => true,               // Pas accessible via JS
            'samesite' => 'Lax'               // Protection
        ]);

        setcookie('user_email', $user['mail'], [
            'expires' => time() + $cookieDuration,
            'path' => '/',
            'httponly' => true,
            'samesite' => 'Lax'
        ]);

        // Cookies supplémentaires pour la dernière connexion
        setcookie('last_login', date('d/m/Y H:i:s'), [
            'expires' => time() + (86400 * 30), // 30 jours
            'path' => '/',
            'httponly' => true,
            'samesite' => 'Lax'
        ]);

        header("Location: {$baseUrl}/dashboard");
        exit;
    } else {
        $_SESSION['error'] = "Identifiants incorrects";
        header("Location: {$baseUrl}/login");
        exit;
    }
}

// Traitement de la modification du profil
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_SESSION['user_id'])) {

    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $telephone = trim(isset($_POST['telephone']) ? $_POST['telephone'] : '');
    $date_naissance = isset($_POST['date_naissance']) ? $_POST['date_naissance'] : null;
    $ville = trim(isset($_POST['ville']) ? $_POST['ville'] : '');
    $pays = trim(isset($_POST['pays']) ? $_POST['pays'] : 'France');
    $bio = trim(isset($_POST['bio']) ? $_POST['bio'] : '');
    $langue = isset($_POST['langue_preference']) ? $_POST['langue_preference'] : 'fr';

    // Validation
    if (empty($prenom) || empty($nom) || empty($email)) {
        $_SESSION['error'] = "Le prénom, nom et email sont obligatoires";
        header("Location: {$baseUrl}/profile/edit");
        exit;
    }

    // Vérifier si l'email est déjà utilisé par un autre utilisateur
    $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE mail = :mail AND id != :id");
    $stmt->execute(['mail' => $email, 'id' => $_SESSION['user_id']]);
    if ($stmt->fetch()) {
        $_SESSION['error'] = "Cet email est déjà utilisé par un autre compte";
        header("Location: {$baseUrl}/profile/edit");
        exit;
    }

    // Mise à jour de la table
    try {
        $stmt = $pdo->prepare("UPDATE utilisateurs SET 
            prenom = :prenom, 
            nom = :nom, 
            mail = :email, 
            telephone = :telephone, 
            date_naissance = :date_naissance, 
            ville = :ville, 
            pays = :pays, 
            bio = :bio,
            langue_preference = :langue
            WHERE id = :id");

        $stmt->execute([
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'telephone' => $telephone ?: null,
            'date_naissance' => $date_naissance ?: null,
            'ville' => $ville ?: null,
            'pays' => $pays,
            'bio' => $bio ?: null,
            'langue' => $langue,
            'id' => $_SESSION['user_id']
        ]);

        // Mettre à jour la session
        $_SESSION['prenom'] = $prenom;
        $_SESSION['nom'] = $nom;

        $_SESSION['success'] = "Profil modifié avec succès !";
        header("Location: {$baseUrl}/profile/edit");
        exit;

    } catch (PDOException $e) {
        $_SESSION['error'] = "Une erreur est survenue lors de la modification";
        header("Location: {$baseUrl}/profile/edit");
        exit;
    }
}



// Setup de Blade
$viewsPath = __DIR__ . '/views';
$cachePath = __DIR__ . '/cache';

$container = new Container;
$events = new Dispatcher($container);

$bladeCompiler = new BladeCompiler(new Illuminate\Filesystem\Filesystem, $cachePath);

$resolver = new EngineResolver;
$resolver->register('blade', function () use ($bladeCompiler) {
    return new CompilerEngine($bladeCompiler);
});

$factory = new Factory(
    $resolver,
    new FileViewFinder(new Illuminate\Filesystem\Filesystem, [$viewsPath]),
    $events
);
$factory->share('baseUrl', $baseUrl);



// Mise en place des routes dans le site
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = str_replace($baseUrl, '', $uri);
if ($uri === '') {
    $uri = '/';
}

switch ($uri) {
    case '/':
    case '/home':
        echo $factory->make('home')->render();
        break;

    case '/login':
        echo $factory->make('login', [
            'error' => $_SESSION['error'] ?? null,
            'success' => $_SESSION['success'] ?? null
        ])->render();
        unset($_SESSION['error'], $_SESSION['success']);
        break;

    case '/register':
        echo $factory->make('register', [
            'error' => $_SESSION['error'] ?? null
        ])->render();
        unset($_SESSION['error']);
        break;

    case '/logout':
        header("Location: {$baseUrl}/");
        exit;
        break;

    case '/dashboard':
        if (!isset($_SESSION['user_id'])) {
            header("Location: {$baseUrl}/login");
            exit;
        }

        // Récupérer toutes les infos de l'utilisateur
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = :id");
        $stmt->execute(['id' => $_SESSION['user_id']]);
        $userData = $stmt->fetch();

        echo $factory->make('dashboard', [
            'user' => $userData
        ])->render();
        break;

    case '/profile/edit':
        if (!isset($_SESSION['user_id'])) {
            header("Location: {$baseUrl}/login");
            exit;
        }

        // Récupérer les données de l'utilisateur
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = :id");
        $stmt->execute(['id' => $_SESSION['user_id']]);
        $userData = $stmt->fetch();

        echo $factory->make('profile-edit', [
            'user' => $userData,
            'success' => $_SESSION['success'] ?? null,
            'error' => $_SESSION['error'] ?? null
        ])->render();
        unset($_SESSION['success'], $_SESSION['error']);
        break;

    case '/about':
        echo $factory->make('about')->render();
        break;

    default:
        http_response_code(404);
        echo $factory->make('404')->render();
        break;
}