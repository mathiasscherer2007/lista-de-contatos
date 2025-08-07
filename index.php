<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $u = new Usuario($_POST['email'],$_POST['senha'], $_POST['nome']);
    if($u->authenticate()){
        header("location: viewLivros.php");
    }else{
        header("location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="bloco">
            <form action='index.php' method='post'>
                <section>
                    <label for='nome'>Nome:</label>
                    <input type='text' name='nome' id='nome' required>
                </section>
                <section>
                    <label for='email'>E-mail:</label>
                    <input type='email' name='email' id='email' required>
                </section>
                <section>
                    <label for='senha'>Senha:</label>
                    <input type='password' name='senha' id='senha' required>
                </section>
                <section>
                    <input type='submit' name='botao' value='Acessar'>
                </section>
            </form>
            <a href='formCadUsuario.php'>Cadastrar usuario</a>
        </div>
    </div>
</body>
</html>