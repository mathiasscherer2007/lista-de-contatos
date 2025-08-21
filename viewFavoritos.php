<?php
session_start();
if(!isset($_SESSION['idUsuario'])){
    header("location:index.php");
}
require_once __DIR__."/vendor/autoload.php";

$conexao = new MySQL();
$sql = "SELECT * FROM favoritos WHERE idUser = {$_SESSION['idUsuario']}";
$livros_favoritos = $conexao->consulta($sql);
$sql = "SELECT * FROM livros";
$livros = $conexao->consulta($sql);
$sql = "SELECT * FROM usuario";
$usuarios = $conexao->consulta($sql);
$livros_favoritos_lista = [];
$x = 0;
foreach($livros_favoritos as $livro_favorito){

    if($livro_favorito[2] == $livros[$x][0]){
        $livros_favoritos_lista[] = $livros[$x][1];
    }
    $x++;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Livros Favoritos</title>
</head>
<body>

<table>
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
</body>
</html>
