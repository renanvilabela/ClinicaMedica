Gerenciamento de Notícias - ClinicMais
Este é um sistema de gerenciamento de notícias para o site da ClinicMais, que permite a inserção, edição, exclusão e pesquisa de notícias. O sistema foi desenvolvido em PHP com MySQL para o armazenamento dos dados e utiliza HTML e CSS para o front-end.

Funcionalidades
Inserção de notícias: Adicione novas notícias com título, conteúdo e autor.
Edição de notícias: Edite as notícias existentes diretamente no sistema.
Exclusão de notícias: Remova notícias indesejadas do banco de dados.
Pesquisa de notícias: Pesquise por notícias com base no título, conteúdo ou autor.
Comentários: Permita que usuários adicionem comentários às notícias, exibidos diretamente na página da notícia.

Tecnologias Utilizadas
PHP 8.1.25: Linguagem de programação principal para o desenvolvimento do back-end.
MySQL: Sistema de banco de dados utilizado para armazenar as notícias e comentários.
HTML/CSS: Utilizado para estrutura e design das páginas.
PDO (PHP Data Objects): Para a conexão segura com o banco de dados e execução de queries.
Apache: Servidor web utilizado para hospedar o projeto.

Configuração do banco de dados:

Crie um banco de dados MySQL.
Importe o seguinte script SQL para criar as tabelas de notícias e comentários:
create database clinica_news;
use clinica_news;

CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,          -- Título da notícia
    content TEXT NOT NULL,                -- Conteúdo da notícia
    author VARCHAR(100) NOT NULL,         -- Autor da notícia
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data de criação
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Data de atualização
);

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    news_id INT,                           -- Relaciona com a notícia
    author VARCHAR(100) NOT NULL,          -- Nome de quem comentou
    content TEXT NOT NULL,                 -- Texto do comentário
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data do comentário
    FOREIGN KEY (news_id) REFERENCES news(id) ON DELETE CASCADE -- Chave estrangeira com a tabela de notícias
);

Configuração do ambiente local:

Certifique-se de que o XAMPP ou WAMP esteja instalado e ativo.
Coloque o projeto na pasta htdocs (ou diretório equivalente).
Configure as credenciais de banco de dados no arquivo backend/db/connection.php:
<?php
$host = 'localhost';
$db   = 'clinicmais';  // Nome do banco de dados
$user = 'root';        // Usuário do MySQL
$pass = '';            // Senha do MySQL (deixe vazio se não houver senha)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>
Acesse o projeto:

Acesse o projeto no navegador através da URL: http://localhost/clinicmais/pages/blog/blog.php

Funcionalidades Futuras
Autenticação: Implementar autenticação de usuário para proteger as funcionalidades de edição e exclusão de notícias.
Categorias de Notícias: Adicionar suporte a categorias para melhor organização das notícias.
Paginação: Melhorar a navegação, implementando a paginação de notícias na página inicial.
Estilização: melhora do design das notícias