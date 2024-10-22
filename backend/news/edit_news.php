<?php
include dirname(__FILE__).'/../../backend/db/connection.php';

// Verifica se o ID foi enviado via GET para carregar os dados da notícia
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Consulta para buscar os dados da notícia a ser editada
        $query = "SELECT * FROM news WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $news = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se a notícia foi encontrada
        if (!$news) {
            echo "Notícia não encontrada.";
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro ao buscar notícia: " . $e->getMessage();
        exit();
    }
} else {
    echo "ID da notícia não informado.";
    exit();
}

// Verifica se os dados foram enviados via POST para atualizar a notícia
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];

    try {
        // Prepara a query de atualização
        $query = "UPDATE news SET title = :title, author = :author, content = :content, updated_at = NOW() WHERE id = :id";
        $stmt = $pdo->prepare($query);

        // Vincula os valores
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $id);

        // Executa a query
        if ($stmt->execute()) {
            // Redireciona para o blog após a edição
            header("Location: \clinicmais\pages\blog\blog.php?edit_success=1");
            exit();
        } else {
            echo "Erro ao atualizar notícia.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<?php 
include dirname(__FILE__) . '/../../pages/includes/header.php'; 
?>
<!-- Formulário de edição da notícia -->
<form action="/clinicmais/backend/news/edit_news.php?id=<?php echo $news['id']; ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $news['id']; ?>">
    <label for="title">Título:</label>
    <input type="text" id="title" name="title" value="<?php echo $news['title']; ?>" required><br><br>

    <label for="author">Autor:</label>
    <input type="text" id="author" name="author" value="<?php echo $news['author']; ?>" required><br><br>

    <label for="content">Conteúdo:</label><br>
    <textarea id="content" name="content" rows="10" cols="50" required><?php echo $news['content']; ?></textarea><br><br>

    <button type="submit">Salvar Alterações</button>
</form>
<?php 
include dirname(__FILE__) . '/../../pages/includes/footer.php';
?>
