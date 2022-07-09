<!DOCTYPE html>
<?php
// cadastro triângulo  //

    require_once "conf/Conexao.php";
    include_once "processoIV.php";

    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    $idtriangulo = isset($_POST['idtriangulo']) ? $_POST['idtriangulo'] : "";
    $base = isset($_POST['base']) ? $_POST['base'] : 0;
    $lado1 = isset($_POST['lado1']) ? $_POST['lado1'] : 0;
    $lado2 = isset($_POST['lado2']) ? $_POST['lado2'] : 0;
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_POST['tabuleiro_idtabuleiro']) ? $_POST['tabuleiro_idtabuleiro'] : "";
    if ($processo == 'editar'){
       $idtriangulo = isset($_GET['idtriangulo']) ? $_GET['idtriangulo'] : "";
        if ($idtriangulo > 0){
            $tri = new Triangulo("","", "", "","","");
            $dados = $tri->listar(1,$idtriangulo);
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
    <title>Cadastro de Triângulo</title>
</head>

<body>
    <?php 
        include_once "menu.php";
        echo "<br>";
    ?>
    <div class="container-fluid">
        <form method="post" action="processoIV.php">
            <center>
            ID:  <input readonly  class="form-control"  style="max-width:20%" type="text" name="idtriangulo" id="idtriangulo" value="<?php if($processo == "editar"){echo $dados[0]['idtriangulo'];}?>">
            <br>
            Base: <input name="base"  class="form-control"  style="max-width:20%" id="base" type="text" required="true" placeholder="Insira a Base" value="<?php if ($processo == "editar"){echo $dados[0]['base'];}?>"><br>         
            <br>
            Lado 2: <input name="lado1"  class="form-control"  style="max-width:20%" id="lado1" type="text" required="true" placeholder="Insira o Lado 1" value="<?php if ($processo == "editar"){echo $dados[0]['lado1'];}?>"><br>         
            <br>
            Lado 3: <input name="lado2"  class="form-control"  style="max-width:20%"    id="lado2" type="text" required="true" placeholder="Insira o Lado 2" value="<?php if ($processo == "editar"){echo $dados[0]['lado2'];}?>"><br>         
            <br>
            Cor: <input  class="form-control"  style="max-width:20%" name="cor" id="cor" type="color" required="true" value="<?php if ($processo == "editar"){echo $dados[0]['cor'];}?>"><br>
            <br>
            Tabuleiro:
                <select  class="form-control"  style="max-width:20%" name="tabuleiro_idtabuleiro"  id="tabuleiro_idtabuleiro" class="form-select">
                    <?php
                        require_once ("utils.php");
                        echo select(0, $dados[0]['tabuleiro_idtabuleiro']);
                    ?>
                </select>
                <br>
                <button class="btn btn-dark" name="processo" value="salvar" id="processo" type="submit">Salvar</button>  
        </form>  
</center>
        <hr>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
