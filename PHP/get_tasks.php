<?php
$db = new SQLite3('data/database.sqlite');

$result = $db->query("SELECT * FROM tasks");
$tasks = [];

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $tasks[] = $row;
}

header('Content-Type: application/json');
echo json_encode($tasks);
?>
