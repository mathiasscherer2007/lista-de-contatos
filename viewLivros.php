<?php
session_start();
include_once __DIR__."/src/mysql.php";
if(!isset($_SESSION['idUsuario'])){
    header("location:index.php");
}
if(isset($_POST['botao'])){
    $conexao = new MySQL();
    $sql = "INSERT INTO favoritos (idUser, idLivro) VALUES ({$_SESSION['idUsuario']}, {$_POST['botao']})";
    $conexao->executa($sql);
}
require_once __DIR__."/vendor/autoload.php";

$conexao = new MySQL();
$sql = "SELECT * FROM livros";
$livros = $conexao->consulta($sql);

$sql = "SELECT nome FROM usuarios WHERE idUsuario = ".$_SESSION['idUsuario'];
$nome = $conexao->consulta($sql)[0][0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Books on the Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="faviicon.png">
</head>
<body>
    <div class='container'>
        <header>
            <?php
            echo "<h2 class='titulo-pagina'>Seja bem vindo, ".$nome."!</h2>";
            ?>
            <a class='link-disabled' href='viewLivros.php'>Livros</a>
            <a href='viewFavoritos.php'>Favoritos</a>
        </header>
        <table>
            <tr>
                <td><strong>Título</strong></td>
                <td></td>
            </tr>
            <?php
            foreach($livros as $livro){
                echo "<form action='viewLivros.php' method='post'>";
                echo "<tr class='livro-lista'>";
                echo "<td>{$livro[1]}</td>";
                echo "<td><button class='outline' name='botao' value='{$livro[0]}'>⭐</button></td>";
                echo "</tr>";
                echo "</form>";
            }
            ?>
</body>
</html>
