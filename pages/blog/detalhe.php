<?php
include dirname(__FILE__).'/../../backend/db/connection.php'; 
include dirname(__FILE__). '/../includes/header.php'; 

// Obtendo o ID da notícia da URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $news_id = $_GET['id'];

    // Buscar os detalhes da notícia
    $sql = "SELECT * FROM news WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $news_id, PDO::PARAM_INT);
    $stmt->execute();
    $news = $stmt->fetch(PDO::FETCH_ASSOC);

    // Exibir os detalhes da notícia
    if ($news) {
        echo "<h1>" . $news['title'] . "</h1>";
        echo "<p>" . $news['content'] . "</p>";
        echo "<small>Publicado por: " . $news['author'] . " em " . $news['created_at'] . "</small><hr>";
    } else {
        echo "Notícia não encontrada.";
    }

    // Exibir os comentários da notícia
    echo "<h2>Comentários</h2>";
    $sql_comments = "SELECT * FROM comments WHERE news_id = :news_id ORDER BY created_at DESC";
    $stmt_comments = $pdo->prepare($sql_comments);
    $stmt_comments->bindParam(':news_id', $news_id, PDO::PARAM_INT);
    $stmt_comments->execute();
    $comments = $stmt_comments->fetchAll(PDO::FETCH_ASSOC);

    if ($comments) {
        foreach ($comments as $comment) {
            echo "<div>";
            echo "<p><strong>" . $comment['author'] . ":</strong> " . $comment['content'] . "</p>";
            echo "<small>Comentado em: " . $comment['created_at'] . "</small><hr>";
            echo "</div>";
        }
    } else {
        echo "<p>Sem comentários ainda.</p>";
    }

    // Formulário para adicionar novo comentário
    ?>
    <h2>Deixe seu comentário</h2>
    <form action="/clinicmais/backend/comments/insert_comment.php" method="POST">
        <input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
        <label for="author">Seu Nome:</label>
        <input type="text" id="author" name="author" required><br><br>

        <label for="content">Comentário:</label><br>
        <textarea id="content" name="content" rows="5" cols="50" required></textarea><br><br>

        <button type="submit">Enviar Comentário</button>
    </form>
    <?php
} else {
    echo "ID da notícia não fornecido.";
}
?>

<?php 
include dirname(__FILE__). '/../includes/footer.php'; 
?>