<!DOCTYPE html>
<?php
    include_once ("classes/autoload.php");
    require_once "conf/Conexao.php";
    include_once "processoII.php";
    
    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    $id = isset($_POST['idtabuleiro']) ? $_POST['idtabuleiro'] : "";
    $lado = isset($_POST['lado']) ? $_POST['lado'] : 0;
    if ($processo == 'editar'){
        $id = isset($_GET['idtabuleiro']) ? $_GET['idtabuleiro'] : "";
        if ($id > 0){
            $tab = new Tabuleiro("","");
            $dados = $tab->listar(1, $id);
        }
    }
    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cadastro de Tabuleiro</title>
</head>

<body>
    <?php 
        include_once "menu.php";
        echo "<br>";
    ?>

    <div class="container-fluid">
        <form method="post" action="processoII.php">
            <center>
            
            ID:  <input readonly class="form-control"  style="max-width:20%" type="text" name="idtabuleiro" id="idtabuleiro" value="<?php if($processo == "editar"){echo $dados[0]['idtabuleiro'];}?>">
        <br>
        <br>
            Lado: <input class="form-control"  style="max-width:20%" name="lado" id="lado" type="text" required="true" placeholder="Insira o Lado" value="<?php if ($processo == "editar"){echo $dados[0]['lado'];}?>"><br>         
            <br>

            <button class="btn btn-dark" name="processo" value="salvar" id="processo" type="submit">Salvar</button>     
           </form>  
        <hr>
</center>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
