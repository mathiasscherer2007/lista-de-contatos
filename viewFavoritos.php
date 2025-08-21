<?php
session_start();
if(!isset($_SESSION['idUsuario'])){
    header("location:index.php");
}
require_once __DIR__."/vendor/autoload.php";

$conexao = new MySQL();
$sql = "SELECT * FROM favoritos WHERE favoritos.idUser = {$_SESSION['idUsuario']}";
$livros_favoritos = $conexao->consulta($sql);
$sql = "SELECT * FROM livros";
$livros = $conexao->consulta($sql);
$livros_favoritos_lista = [];
foreach($livros_favoritos as $livro_favorito){
    foreach($livros as $livro){
        if($livro_favorito[2] == $livro[0]){
            $livros_favoritos_lista[] = $livro[1];
        }
    }
}
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
        <table>
            <header>
                <?php
                echo "<h2 class='titulo-pagina'>Favoritos de ".$nome."</h2>";
                ?>
                <a href='viewLivros.php'>Livros</a>
                <a class='link-disabled' href='viewFavoritos.php'>Favoritos</a>
            </header>
        <tr>
            <td><strong>Título</strong></td>
        </tr>
        <?php
            foreach($livros_favoritos_lista as $livro_favorito){
                echo "<tr>";
                echo "<td>$livro_favorito</td>";
                echo "</tr>";
            }
        ?>
        </table>
    </div>
</body>
</html>
