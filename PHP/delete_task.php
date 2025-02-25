<?php
$db = new SQLite3('data/database.sqlite');

if (isset($_POST['id'])) {
    $stmt = $db->prepare("DELETE FROM tasks WHERE id = :id");
    $stmt->bindValue(':id', $_POST['id'], SQLITE3_INTEGER);
    $stmt->execute();
}

header('Content-Type: application/json');
echo json_encode(["message" => "Tâche supprimée"]);
?>
