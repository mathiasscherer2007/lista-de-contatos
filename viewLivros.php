<?php
session_start();
require_once __DIR__."/vendor/autoload.php";
include_once __DIR__."/src/mysql.php";
if(!isset($_SESSION['idUsuario'])){
    header("location:index.php");
}


$conexao = new MySQL();
$sql = "SELECT * FROM livros";
$livros = $conexao->consulta($sql);

$sql = "SELECT nome FROM usuarios WHERE idUsuario = ".$_SESSION['idUsuario'];
$nome = $conexao->consulta($sql)[0][0];

$sql = "SELECT * FROM favoritos WHERE favoritos.idUser = {$_SESSION['idUsuario']}";
$livros_favoritos = $conexao->consulta($sql);

$livros_favoritos_lista = [];
foreach($livros_favoritos as $livro_favorito){
    foreach($livros as $livro){
        if($livro_favorito[2] == $livro[0]){
            $livros_favoritos_lista[] = $livro[0];
        }
    }
}
if(isset($_POST['botao'])){
    if(in_array($_POST['botao'] , $livros_favoritos_lista)){
        $sql = "DELETE FROM favoritos WHERE favoritos.idUser = {$_SESSION['idUsuario']} AND favoritos.idLivro = {$_POST['botao']}";
        $conexao->executa($sql);
    }else{
        $sql = "INSERT INTO favoritos (idUser, idLivro) VALUES ({$_SESSION['idUsuario']}, {$_POST['botao']})";
        $conexao->executa($sql);
    }

    header("location: viewLivros.php");
    exit;
}
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
                if(!in_array($livro[0] , $livros_favoritos_lista)){
                    echo "<form action='viewLivros.php' method='post'>";
                    echo "<tr>";
                    echo "<td>$livro[1]</td>";
                    echo "<td class='alinha-esquerda'><button class='outline' name='botao' value='{$livro[0]}'>⭐</button></td>";
                    echo "</tr>";
                    echo "</form>";
                }
            }
            ?>
</body>
</html>
