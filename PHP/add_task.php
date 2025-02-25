<?php
$db = new SQLite3('data/database.sqlite');

if (isset($_POST['task'])) {
    $task = $_POST['task'];
    $stmt = $db->prepare("INSERT INTO tasks (task) VALUES (:task)");
    $stmt->bindValue(':task', $task, SQLITE3_TEXT);
    $stmt->execute();
}

header('Content-Type: application/json');
echo json_encode(["message" => "Tâche ajoutée"]);
?>
