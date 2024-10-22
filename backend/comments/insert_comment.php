<?php
include '../db/connection.php'; // Conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se todos os campos foram preenchidos
    if (isset($_POST['news_id'], $_POST['author'], $_POST['content']) && !empty($_POST['news_id']) && !empty($_POST['author']) && !empty($_POST['content'])) {
        $news_id = $_POST['news_id'];
        $author = $_POST['author'];
        $content = $_POST['content'];

        try {
            // Insere o comentário na tabela
            $sql = "INSERT INTO comments (news_id, author, content, created_at) VALUES (:news_id, :author, :content, NOW())";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':news_id', $news_id, PDO::PARAM_INT);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':content', $content);
            $stmt->execute();

            // Redireciona de volta para a página da notícia com os comentários
            header("Location: /clinicmais/pages/blog/detalhe.php?id=$news_id");
            exit;
        } catch (PDOException $e) {
            echo "Erro ao inserir comentário: " . $e->getMessage();
        }
    } else {
        echo "Todos os campos são obrigatórios.";
    }
} else {
    echo "Método inválido.";
}
?>
