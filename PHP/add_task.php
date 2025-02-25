<?php
$db = new SQLite3('data/database.sqlite');

if (isset($_POST['task'])) {
    // Secured Version
    /*$task = $_POST['task'];
    $stmt = $db->prepare("INSERT INTO tasks (task) VALUES (:task)");
    $stmt->bindValue(':task', $task, SQLITE3_TEXT);
    $stmt->execute();*/
    
    // Unsecured Version
    $task = $_POST['task'];
    $query = "INSERT INTO tasks (task) VALUES ('$task')"; // Pas de requête préparée = vulnérabilité SQL
    // Un attaquant peut envoyer 
    // '); DROP TABLE tasks; --
    // et supprimer toutes les tâches.
    $db->exec($query);
}

header('Content-Type: application/json');
echo json_encode(["message" => "Tâche ajoutée"]);
?>
