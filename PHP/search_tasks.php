<?php
$db = new SQLite3(__DIR__ . '/data/database.sqlite');

$searchTerm = isset($_GET['query']) ? $_GET['query'] : '';

$stmt = $db->prepare("SELECT * FROM tasks WHERE task LIKE :query");
$stmt->bindValue(':query', '%' . $searchTerm . '%', SQLITE3_TEXT);
$result = $stmt->execute();

$tasks = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $tasks[] = $row;
}

header('Content-Type: application/json');
echo json_encode($tasks);
?>
