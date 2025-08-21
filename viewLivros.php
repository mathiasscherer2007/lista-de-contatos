<?php
session_start();
if(!isset($_SESSION['idUsuario'])){
    header("location:index.php");
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
        <head>
            <?php
            echo "<h2>Seja bem vindo, ".$nome."!</h2>";
            ?>
            <a href='viewLivros.php'>Livros</a>
            <a href='viewFavoritos.php'>Favoritos</a>
        </head>
        <table>
            <tr>
                <td><strong>Título</strong></td>
                <td></td>
            </tr>
            <?php
            foreach($livros as $livro){
                echo "<tr class='livro-lista'>";
                echo "<td>{$livro[1]}</td>";
                echo "<td><button class='outline'>⭐</button></td>";
                echo "</tr>";
            }
            ?>
</body>
</html>
