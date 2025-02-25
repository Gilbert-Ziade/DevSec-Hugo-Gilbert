

<?php
//version securiser:
/*
session_start([
    'cookie_lifetime' => 0, // Session expire à la fermeture du navigateur
    'cookie_httponly' => true, // Protège contre le vol de session via JavaScript (XSS)
    'cookie_secure' => isset($_SERVER['HTTPS']), // Active Secure si HTTPS est utilisé
    'cookie_samesite' => 'Strict' // Protège contre les attaques CSRF
]);

// Régénérer l'ID de session après connexion
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id(true);
    $_SESSION['initiated'] = true;
}

// Déconnexion après 15 minutes d'inactivité
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
$_SESSION['LAST_ACTIVITY'] = time(); // Mettre à jour l'heure de dernière activité
*/

// Un attaquant peut voler un cookie de session et l'utiliser pour se connecter comme un autre utilisateur.

session_start(); // Aucune régénération de session, pas de sécurisation des cookies

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 'guest'; // Aucune authentification sécurisée
}

echo "Session active pour : " . htmlspecialchars($_SESSION['user'], ENT_QUOTES, 'UTF-8');
?>
