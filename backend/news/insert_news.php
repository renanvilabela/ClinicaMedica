<?php 
require_once '../db/connection.php';

$searcgTerm = $_GET['search'] ?? '';
$stmt = $spdo->prepare("SELECT * FROM news where tittle LIKE ? OR content LIKE ? LIMIT 6");
$stmt->execute(["%searchTerm%", "%searchTerm%"]);

$newsList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>