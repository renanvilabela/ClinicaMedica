<?php 
include dirname(__FILE__). '/../includes/header.php'; 
include dirname(__FILE__).'/../../backend/db/connection.php';

$search_results = [];
$search_term = '';

// Exibição das postagens do blog
try {
    // Consulta ao banco de dados para buscar as postagens
    $query = "SELECT id, title, content, author FROM news LIMIT 6"; 
    $stmt = $pdo->query($query);

    // Obtendo os resultados da consulta
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Verifica se há resultados
    if (count($results) > 0) {
        foreach ($results as $row) {
            ?>
            <div class="col-lg-4 mb-5">
                <div class="blog_content box-shadow mb-3">
                    <!-- Link para a página de detalhes da postagem -->
                    <a href="blog/detalhe.php?id=<?php echo $row['id']; ?>" class="zoom_image mb-3">
                    </a>

                    <div class="chamada_blog">
                        <!-- Exibindo o título da postagem -->
                        <h3 class="">
                            <?php echo $row['title']; ?>
                        </h3>

                        <!-- Exibindo um resumo do conteúdo -->
                        <p>
                            <?php echo substr($row['content'], 0, 100) . '...'; // Exibe os primeiros 100 caracteres do conteúdo ?>
                        </p>

                        <!-- Exibindo o autor da postagem -->
                        <p>
                            <strong>Autor:</strong> <?php echo $row['author']; ?>
                        </p>
                    </div>
                </div>
                <!-- Link para ler mais -->
                <a href="pages\blog\detalhe.php?id=<?php echo $row['id']; ?>" class="leia">Saiba mais</a>
                <a href="/clinicmais/backend/news/edit_news.php?id=<?php echo $row['id']; ?>" class="editar">Editar</a>
                <a href="/clinicmais/backend/news/delete_news.php?id=<?php echo $row['id']; ?>" class="excluir" onclick="return confirm('Tem certeza que deseja excluir esta notícia?');">Excluir</a>
            </div>
            <?php
        }
    } else {
        echo "<p>Nenhuma postagem encontrada.</p>";
    }

} catch (PDOException $e) {
    echo "<p>Erro ao buscar postagens: " . $e->getMessage() . "</p>";
}

// Seção para adicionar nova notícia
?>

<form action="/clinicmais/backend/news/insert_news.php" method="POST">
    <label for="title">Título:</label>
    <input type="text" id="title" name="title" required><br><br>
    
    <label for="author">Autor:</label>
    <input type="text" id="author" name="author" required><br><br>
    
    <label for="content">Conteúdo:</label><br>
    <textarea id="content" name="content" rows="10" cols="50" required></textarea><br><br>

    <button type="submit">Adicionar Notícia</button>
</form>

<!-- Formulário de Busca -->
<form action="/clinicmais/backend/news/search_news.php" method="GET" style="margin-bottom: 20px;">
    <input type="text" name="search" placeholder="Buscar notícias..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" required>
    <button type="submit">Buscar</button>
</form>

<!-- Exibição dos resultados da busca ou das notícias padrão -->
<?php
if (count($search_results) > 0) {
    foreach ($search_results as $row) {
        ?>
        <div class="col-lg-4 mb-5">
            <div class="blog_content box-shadow mb-3">
                <a href="blog/detalhe.php?id=<?php echo $row['id']; ?>" class="zoom_image mb-3"></a>
                <div class="chamada_blog">
                    <h3><?php echo $row['title']; ?></h3>
                    <p><?php echo substr($row['content'], 0, 100) . '...'; ?></p>
                    <p><strong>Autor:</strong> <?php echo $row['author']; ?></p>
                </div>
            </div>
            <a href="pages/blog/detalhe.php?id=<?php echo $row['id']; ?>" class="leia">Saiba mais</a>
            <a href="/clinicmais/backend/news/edit_news.php?id=<?php echo $row['id']; ?>" class="editar">Editar</a>
            <a href="/clinicmais/backend/news/delete_news.php?id=<?php echo $row['id']; ?>" class="excluir" onclick="return confirm('Tem certeza que deseja excluir esta notícia?');">Excluir</a>
        </div>
        <?php
    }
} else {
    if (isset($_GET['search'])) {
        echo "<p>Nenhum resultado encontrado para: " . htmlspecialchars($_GET['search']) . "</p>";
    } else {
        echo "<p>Nenhuma postagem encontrada.</p>";
    }
}
?>

<?php 
include dirname(__FILE__). '/../includes/footer.php'; 
?>
