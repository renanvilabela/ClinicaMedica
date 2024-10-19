<?php
include '../db/connection.php';  // Inclui a conexão ao banco

// Dados novos para a notícia que será editada
$id = 1;  // ID da notícia que deseja editar
$novo_titulo = 'Notícia Editada';
$novo_conteudo = 'Este é o novo conteúdo da notícia editada.';
$novo_autor = 'Autor Editado';

try {
    // Prepara a query SQL de atualização (UPDATE)
    $sql = "UPDATE news SET title = :title, content = :content, author = :author WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // Vincula os parâmetros da query com os valores
    $stmt->bindParam(':title', $novo_titulo);
    $stmt->bindParam(':content', $novo_conteudo);
    $stmt->bindParam(':author', $novo_autor);
    $stmt->bindParam(':id', $id);

    // Executa a query
    $stmt->execute();

    echo "Notícia atualizada com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao atualizar notícia: " . $e->getMessage();
}
?>