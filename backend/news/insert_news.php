<?php
include '../db/connection.php';  // Inclui a conexão ao banco

// Exemplo de dados da notícia
$titulo = 'Notícia Teste';
$conteudo = 'Este é o conteúdo da notícia de teste inserida via PHP.';
$autor = 'Autor de Teste';

try {
    // Prepara a query SQL para inserir os dados
    $sql = "INSERT INTO news (title, content, author) VALUES (:title, :content, :author)";
    $stmt = $pdo->prepare($sql);

    // Vincula os parâmetros da query com os valores
    $stmt->bindParam(':title', $titulo);
    $stmt->bindParam(':content', $conteudo);
    $stmt->bindParam(':author', $autor);

    // Executa a query
    $stmt->execute();

    echo "Notícia inserida com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao inserir notícia: " . $e->getMessage();
}
?>