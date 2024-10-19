<?php
include '../db/connection.php';  // Inclui a conexão ao banco

// ID da notícia que será excluída
$id = 1;  // Substitua pelo ID da notícia que deseja excluir

try {
    // Prepara a query SQL de exclusão (DELETE)
    $sql = "DELETE FROM news WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // Vincula o parâmetro da query com o valor do ID
    $stmt->bindParam(':id', $id);

    // Executa a query
    $stmt->execute();

    // Verifica se a notícia foi excluída
    if ($stmt->rowCount() > 0) {
        echo "Notícia excluída com sucesso!";
    } else {
        echo "Nenhuma notícia encontrada com esse ID.";
    }
} catch (PDOException $e) {
    echo "Erro ao excluir notícia: " . $e->getMessage();
}
?>