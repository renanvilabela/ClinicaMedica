<?php
include '../db/connection.php';  // Inclui a conexão ao banco

// Critério de busca
$termo_de_busca = '%exemplo%';  // Este valor pode ser dinâmico (por exemplo, vindo de um formulário de pesquisa)

try {
    // Prepara a query SQL de busca (SELECT) com um critério de busca no título
    $sql = "SELECT * FROM news WHERE title LIKE :termo OR content LIKE :termo";
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
?>