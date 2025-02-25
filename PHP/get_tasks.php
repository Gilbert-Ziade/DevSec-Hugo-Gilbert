<?php
$db = new SQLite3('data/database.sqlite');

$result = $db->query("SELECT * FROM tasks");
$tasks = [];

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $tasks[] = $row;
}

header('Content-Type: application/json');

// not secured

// Un attaquant peut ajouter 
// <script>alert('Hacked!')</script>
// comme tâche et exécuter du JavaScript chez tous les utilisateurs.
echo json_encode($tasks); // Pas de htmlspecialchars(), donc vulnérabilité XSS

// Secured Version
// echo json_encode(array_map('htmlspecialchars', $tasks));


?>
