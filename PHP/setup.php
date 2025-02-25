<?php
// Vérifie si le dossier 'data' existe, sinon le créer
if (!file_exists('data')) {
    mkdir('data', 0777, true);
}

// Ouvre la base de données SQLite
$db = new SQLite3(__DIR__ . '/data/database.sqlite');

// Crée la table des tâches si elle n'existe pas
$query = "CREATE TABLE IF NOT EXISTS tasks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    task TEXT NOT NULL
)";
$db->exec($query);

echo "Base de données et table créées avec succès.";
?>
