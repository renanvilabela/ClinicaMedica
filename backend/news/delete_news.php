<?php
include '../db/connection.php'; 

if (isset($_GET['id'])) {
    $news_id = $_GET['id'];

    try {
        // Consulta para deletar a notícia
        $query = "DELETE FROM news WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $news_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // Redireciona de volta ao blog após a exclusão com uma mensagem de sucesso
            header("Location: /clinicmais/blog");
            exit();
        } else {
            echo "Erro ao excluir a notícia.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "ID inválido.";
}
?>
