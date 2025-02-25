<?php
$db = new SQLite3(__DIR__ . '/data/database.sqlite');

$username = 'admin';
$password = 'password123'; // Change le mot de passe
$hashed_password = password_hash($password, PASSWORD_BCRYPT); // Hachage sécurisé

$stmt = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
$stmt->bindValue(':username', $username, SQLITE3_TEXT);
$stmt->bindValue(':password', $password, SQLITE3_TEXT);
$stmt->execute();

echo "Utilisateur ajouté avec succès.";
?>
