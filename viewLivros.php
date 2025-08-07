<?php
session_start();
if(!isset($_SESSION['idUsuario'])){
    header("location:index.php");
}
require_once __DIR__."/vendor/autoload.php";

$conexao = new MySQL();
$sql = "SELECT * FROM livros";
$livros = $conexao->consulta($sql);
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
        <td><strong>Título</strong></td>
    </tr>
    <?php
    foreach($livros as $livro){
        echo "<tr>";
        echo "<td>{$livro[1]}</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
