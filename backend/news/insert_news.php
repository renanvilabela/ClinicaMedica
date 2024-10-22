<?php
include dirname(__FILE__).'/../../backend/db/connection.php';
die("noticia enviada");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];

    try {
        // Inserindo os dados no banco
        $query = "INSERT INTO news (title, author, content, created_at) VALUES (:title, :author, :content, NOW())";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':content', $content);
        $stmt->execute();

        if ($stmt->execute()) {
            // Mensagem de sucesso
            echo "Notícia inserida com sucesso!";
        } else {
            // Mensagem de erro
            echo "Falha ao inserir a notícia.";
        }

        // Redireciona o usuário de volta para o blog.php (ou para onde você quiser)
        header('Location: /clinicmais/blog');
        exit;


    } catch (PDOException $e) {
        echo "Erro ao inserir notícia: " . $e->getMessage();
    }
}
?>
