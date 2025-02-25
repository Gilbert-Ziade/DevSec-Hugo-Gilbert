<?php

//version securiser
/*
// Vérifier si la requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Requête sécurisée avec une requête préparée
    $stmt = $db->prepare("SELECT id, password FROM users WHERE username = :username");
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $result = $stmt->execute();
    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Sécurisation de la session
        session_regenerate_id(true);
        $_SESSION['user'] = $username;

        echo "Connexion réussie";
    } else {
        echo "Échec de connexion";
    }
}*/


// version non securiser

// Un attaquant peut entrer 
// ' OR '1'='1 
// dans les champs et se connecter sans mot de passe.

$db = new SQLite3(__DIR__ . '/data/database.sqlite');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'"; // Injection SQL possible
    $result = $db->query($query);

    if ($result->fetchArray()) {
        session_start();
        $_SESSION['user'] = $username;
        echo "Connexion success";
    } else {
        echo "connexion failed";
    }
}
?>
