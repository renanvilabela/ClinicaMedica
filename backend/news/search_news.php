<?php
include '../db/connection.php';  // Inclui a conexão ao banco

include dirname(__FILE__) . '/../../pages/includes/header.php'; 


// Verifica se o termo de busca foi enviado via GET
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $termo_de_busca = '%' . $_GET['search'] . '%';  // Sanitiza o termo de busca
} else {
    echo "Nenhum termo de busca foi fornecido.";
    exit;
}

try {
    // Prepara a query SQL de busca (SELECT) com o critério de busca no título ou conteúdo
    $sql = "SELECT * FROM news WHERE title LIKE :termo OR content LIKE :termo OR author LIKE :termo";
    $stmt = $pdo->prepare($sql);

    // Vincula o parâmetro da query com o valor de busca
    $stmt->bindParam(':termo', $termo_de_busca);

    // Executa a query
    $stmt->execute();

    // Busca todas as notícias que correspondem ao critério
    $noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($noticias) > 0) {
        foreach ($noticias as $noticia) {
            echo "<h2>" . $noticia['title'] . "</h2>";
            echo "<p>" . $noticia['content'] . "</p>";
            echo "<small>Publicado por: " . $noticia['author'] . " em " . $noticia['created_at'] . "</small><hr>";
        }
    } else {
        echo "Nenhuma notícia encontrada.";
    }
} catch (PDOException $e) {
    echo "Erro ao buscar notícia: " . $e->getMessage();
}
include dirname(__FILE__) . '/../../pages/includes/footer.php';
?>
