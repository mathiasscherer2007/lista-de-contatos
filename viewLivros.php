<?php
session_start();
if(!isset($_SESSION['idUsuario'])){
    header("location:index.php");
}
require_once __DIR__."/vendor/autoload.php";

$livros;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Livros</title>
</head>
<body>

<table>
    <tr>
        <td>Título</td>
    </tr>
    <tr>
    <?php
    foreach($livros as $livro){
        echo "<td>{$livro->getNome()}</td>";
    }
    ?>
    </tr>
</table>
<a href='sair.php'>Sair</a>
</body>
</html>
