
<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $u = new Usuario($_POST['email'],$_POST['senha'], $_POST['nome']);
    $u->save();
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiciona Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="faviicon.png">
</head>
<body>
    <div class='container-form'>
        <form class='form-centrado' action='formCadUsuario.php' method='post'>
            <h1 class='titulo-form'><i>The Books on the Table</i></h1>
            <p class='titulo-form'>Criação de Conta</p>
            <label>Nome:
                <input type='text' name='nome' id='nome' required>
            </label>
            <label>E-mail:
                <input type='email' name='email' id='email' required>
            </label>
            <label>Senha:
                <input type='password' name='senha' id=senha' required>
            </label>
            <input type='submit' name='botao' value='Cadastrar'>
            <a href='index.php'>Já tenho uma conta</a>
        </form>
    </div>
</body>
</html>
