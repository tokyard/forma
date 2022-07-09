<!DOCTYPE html>
<?php
    include_once ("classes/autoload.php");
    require_once "conf/Conexao.php";
    include_once "processoVII.php";
    include_once "utils.php";
   
    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    $idcubo = isset($_POST['idcubo']) ? $_POST['idcubo'] : 0;
    $lado = isset($_POST['lado']) ? $_POST['lado'] : 0;   
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";   
    $quadrado_idquadrado = isset($_POST['quadrado_idquadrado']) ? $_POST['quadrado_idquadrado'] : 0;
    if ($processo == 'editar'){
        $idcubo = isset($_GET['idcubo']) ? $_GET['idcubo'] : "";
        if ($idcubo > 0){
            $cubo = new Cubo("","","","");
            $dados = $cubo->listar(0, $idcubo);
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
    <title>Cadastro de Cubo</title>
</head>

<body>
    <?php 
        include_once "menu.php";
        echo "<br>";
    ?>
    <div class="container-fluid">
        <center>
        <form method="post" processo="processoVII.php">

            ID:   <input class="form-control" readonly  style="max-width:20%"  type="text" name="idcubo" id="idcubo" value="<?php if($processo == "editar"){echo $dados[0]['idcubo'];}?>">
            <br>
            Cor: <input class="form-control" style="max-width:20%"  name="cor" id="cor" type="color" required="true" placeholder="Digite a Cor" value="<?php if ($processo == "editar"){echo $dados[0]['cor'];}?>"><br>
            <br>
            Quadrado:
                <select class="form-control" style="max-width:20%" name="quadrado_idquadrado"  id="quadrado_idquadrado" class="form-select">
                    <?php
                        require_once ("utils.php");
                        echo selectQuad(0, $dados[0]['quadrado_idquadrado']);
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
