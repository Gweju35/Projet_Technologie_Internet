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

// ========================================
// 1. SESSION
// ========================================
session_start();


// ========================================
// BASE URL pour les assets
// ========================================
$baseUrl = '/ENSIM/Project';

// ========================================
// SERVEUR ENSIM - À UTILISER PLUS TARD
// ========================================
//$baseUrl = '/~ton_login/Project';

// ========================================
// 2. CONNEXION BDD
// ========================================
$host = '127.0.0.1';
$db   = 'projet_ensim';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';


//// ========================================
//// SERVEUR ENSIM - À UTILISER PLUS TARD
//// ========================================
//$host = 'ensim-lamp.univ-lemans.fr';  // ou l'IP/host fourni
//$db   = 'nom_de_ta_base';              // nom de la BDD
//$user = 'ton_identifiant';             // login ENSIM
//$pass = 'ton_mot_de_passe';            // mot de passe

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (\PDOException $e) {
    die("Erreur BDD : " . $e->getMessage());
}

// ========================================
// 3. TRAITEMENT DÉCONNEXION
// ========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'logout') {
    session_unset();
    session_destroy();
    header("Location: {$baseUrl}/");
    exit;
}

// ========================================
// 4. TRAITEMENT LOGIN
// ========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login']) && isset($_POST['password']) && !isset($_POST['action'])) {

    echo "DEBUG: Entrée dans le traitement login<br>";

    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE mail = :mail");
    $stmt->execute(['mail' => $_POST['login']]);
    $user = $stmt->fetch();

    if ($user && $user['password'] === $_POST['password']) {
        echo "DEBUG: Connexion réussie, redirection...<br>";

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['nom'] = $user['nom'];

        setcookie('prenom', $user['prenom'], time() + 3600, "/");

        header("Location: {$baseUrl}/dashboard");
        exit;
    } else {
        echo "DEBUG: Échec de connexion<br>";

        $_SESSION['error'] = "Identifiants incorrects";
        header("Location: {$baseUrl}/login");
        exit;
    }
}

// ========================================
// 5. TRAITEMENT INSCRIPTION
// ========================================
// ========================================
// 5. TRAITEMENT INSCRIPTION
// ========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    echo "DEBUG: Début traitement inscription<br>";

    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    echo "Nom: $nom<br>";
    echo "Prénom: $prenom<br>";
    echo "Email: $email<br>";
    echo "Login: $login<br>";
    echo "Password: $password<br>";

    // Validation basique
    if (empty($nom) || empty($prenom) || empty($email) || empty($login) || empty($password)) {
        echo "❌ Validation échouée - champ(s) vide(s)<br>";
        $_SESSION['error'] = "Tous les champs sont obligatoires";
        die("STOP - Champs vides");
    }

    echo "✅ Validation OK<br>";

    // Vérifier si l'email existe déjà
    $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE mail = :mail");
    $stmt->execute(['mail' => $email]);
    if ($stmt->fetch()) {
        echo "❌ Email déjà utilisé<br>";
        $_SESSION['error'] = "Cet email est déjà utilisé";
        die("STOP - Email existe");
    }

    echo "✅ Email disponible<br>";

    // Insertion
    try {
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, mail, login, password) VALUES (:nom, :prenom, :mail, :login, :password)");
        $result = $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'mail' => $email,
            'login' => $login,
            'password' => $password
        ]);

        echo "✅ Insertion réussie ! ID: " . $pdo->lastInsertId() . "<br>";

    } catch (PDOException $e) {
        echo "❌ ERREUR SQL: " . $e->getMessage() . "<br>";
        die("STOP - Erreur SQL");
    }

    die("STOP DEBUG - Avant redirection");

    $_SESSION['success'] = "Inscription réussie ! Vous pouvez vous connecter.";
    header("Location: {$baseUrl}/login");
    exit;
}

// ========================================
// 5. BLADE SETUP
// ========================================
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
$factory->share('baseUrl', $baseUrl); // Partager la variable baseUrl avec toutes les vues

// ========================================
// 6. ROUTING
// ========================================
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Enlever le préfixe du projet
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
            'error' => isset($_SESSION['error']) ? $_SESSION['error'] : null
        ])->render();
        unset($_SESSION['error']);
        break;

    case '/register':
        echo $factory->make('register', [
            'error' => isset($_SESSION['error']) ? $_SESSION['error'] : null
        ])->render();
        unset($_SESSION['error']);
        break;

    case '/dashboard':
        if (!isset($_SESSION['user_id'])) {
            header("Location: {$baseUrl}/login");
            exit;
        }

        echo $factory->make('dashboard', [
            'user' => [
                'prenom' => $_SESSION['prenom'],
                'nom' => $_SESSION['nom']
            ]
        ])->render();
        break;

    case '/about':
        echo $factory->make('about')->render();
        break;

    default:
        http_response_code(404);
        echo $factory->make('404')->render();
        break;
}