<?php 
    session_start();

    include_once ("classes/autoload.php");
    require_once "conf/Conexao.php";

    $login = isset($_POST["login"]) ? $_POST["login"] : "";     
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : ""; 
    $processo = isset($_GET["processo"]) ? $_GET["processo"] : ""; 
    $mensagem = "";
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="body">
        <main class="container">
            <h2>Login</h2>
            <form processo="index.php?processo=login" method="post">
                <div class="input-field">
                    <input type="text" name="login" id="login" required="true" placeholder="Insira o user">
                    <div class="underline"></div>
                </div>
                <div class="input-field">
                    <input type="password" name="senha" id="senha" maxlength="8" required="true" placeholder="Insira a senha">
                    <div class="underline"></div>
                </div>
                <input type="submit" value="Entrar">
            </form>
            <?php
                if($processo == 'login'){
                    $user = new Usuario("","","","");
                    if ($user->efetuarLogin($login, $senha) == true){
                        $mensagem = "O Login foi efetuado com sucesso!";
                        echo $mensagem;
                        header("location:usuario.php");
                    } else {
                        $mensagem = "Erro no login, confira os dados";
                        echo $mensagem;
                    }
                } 
            ?>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>