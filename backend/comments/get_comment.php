<?php
include '../db/connection.php';

if (isset($_GET['news_id'])) {
    $noticia_id = $_GET['news_id'];
    
    $sql = "SELECT * FROM comments WHERE news_id = :news_id ORDER BY created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':news_id', $noticia_id);
    $stmt->execute();
    $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($comentarios as $comentario) {
        echo "<div class='comentario'>";
        echo "<h4>" . htmlspecialchars($comentario['nome']) . "</h4>";
        echo "<p>" . htmlspecialchars($comentario['texto']) . "</p>";
        echo "<span>" . htmlspecialchars($comentario['created_at']) . "</span>";
        echo "</div>";
    }
}
?>
