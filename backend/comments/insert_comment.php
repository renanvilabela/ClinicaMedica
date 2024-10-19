<?php
include '../db/connection.php';  // Inclui a conexão com o banco

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texto = $_POST['texto'];
    $noticia_id = $_POST['news_id'];

    // Se o nome for opcional, preenche com 'Anônimo' se estiver vazio
    $nome = 'Anônimo'; 

    if (!empty($texto) && !empty($noticia_id)) {
        $sql = "INSERT INTO comments (nome, texto, news_id) VALUES (:nome, :texto, :noticia_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':texto', $texto);
        $stmt->bindParam(':noticia_id', $noticia_id);

        if ($stmt->execute()) {
            header("Location: ../pages/detalhe.php?id=$noticia_id");
            exit;
        } else {
            echo "Erro ao inserir o comentário.";
        }
    }
}

?>