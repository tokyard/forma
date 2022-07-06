<!DOCTYPE html>
<?php
    $raio = isset($_POST['raio']) ? $_POST['raio'] : 0;
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_POST['tabuleiro_idtabuleiro']) ? $_POST['tabuleiro_idtabuleiro'] : 0;

    include_once "processoV.php";
    $processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    $dados;
    if ($processo == 'editar'){
        $idcirculo = isset($_GET['idcirculo']) ? $_GET['idcirculo'] : "";
    if ($idcirculo > 0)
        $dados = buscarDados($idcirculo);
}
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Círculo</title>
</head>

<body>
    <br>
    <center>
        <h3>Insira o Círculo</h3><hr>
            <form method="post" action="processoV.php">

            <input readonly type="text" name="idcirculo" id="idcirculo" value="<?php if ($processo == "editar") echo $dados['idcirculo']; 
            else echo 0; ?>">
                
            <p>Raio:</p>
                <input require="true" type="text" name="raio" id="raio" placeholder="Insira o Raio" 
                value="<?php if ($processo == "editar") echo $dados['raio'];?>"><br>

            <p>Cor:</p>
                <input required="true" name="cor" id="cor" type="color" required="true"
                value="<?php if ($processo == "editar") echo $dados['cor'];?>" ><br>    
            
            <p>Tabuleiro: </p>
            <select name="tabuleiro_idtabuleiro"  id="tabuleiro_idtabuleiro">
                <?php
                require_once "utils.php";
                echo lista_tabuleiro(0, $dados['tabuleiro_idtabuleiro']);
                ?>
            </select>
            <br>
            <hr>
            <br>
                <button name="processo" value="salvar" id="processo" type="submit">Salvar</button>
            </form>
            <br> 
    </center>
</body>
</html>