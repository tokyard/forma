<!DOCTYPE html>
<?php
    //inclusão de arquivos
    include_once ("../classes/autoload.php");
    include_once "../control/acao.php";
    require_once "../../conf/Conexao.php";
    
    //variaveis
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $buscar = isset($_POST["buscar"]) ? $_POST["buscar"] : 1; 
    $table = "esfera";
    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Esfera</title>
</head>

<body>
    <content>
    <?php 
        include_once "menu.php";
        echo "<br>";
    ?>
        <div class="container-fluid">
        <h3>Consulta de esfera</h3>
        <table class="table table-hover">
                <tr><td><b>ID</b></td>
                    <td><b>Cor</b></td>
                    <td><b>Circulo</b></td>
                    <td><b>Tabuleiro</b></td>
                    <td><b>Raio</b></td>
                    <td><b>Editar</b></td>
                    <td><b>Deletar</b></td>
                    <td><b>Listar</b></td>
                </tr> 

                <form method="post">
                    <div class="form-group col-lg-3">
                        <h3>Procurar</h3>
                        <input type="text" name="procurar" id="procurar" size="50" class="form-control" placeholder="Insira o que deseja consultar" value="<?php echo $procurar;?>"> <br>
                        <button name="acao" id="acao" type="submit"  class="btn btn-outline-info">Procurar</button>
                        <br><br>

                        <p> Ordernar e pesquisar por:</p><br>
                        <form method="post" action="">
                        <input type="radio" name="buscar" value="1" class="form-check-input" <?php if ($buscar == "1") echo "checked" ?>> Id<br>
                        <input type="radio" name="buscar" value="2" class="form-check-input" <?php if ($buscar == "2") echo "checked" ?>> Cor<br>
                        <input type="radio" name="buscar" value="3" class="form-check-input" <?php if ($buscar == "3") echo "checked" ?>> Circulo<br>
                    </div>
                    <br><br>
                </form>

            <?php
                //listagem com filtro de select
                $lista = Esfera::listar($buscar, $procurar); 
                foreach ($lista as $linha) {
                    //select para saber o lado do id do quadrado
                    $color = $linha['cor'];

            ?>
                <tr><td><?php echo $linha['idesfera'];?></td>
                    <td <?php echo "style='color: $color'"?>><?php echo $linha['cor'];?></td>
                    <td><?php echo $linha['circulo_idcirculo'];?></td>
                    <td><?php echo $linha['tabuleiro_idtabuleiro'];?></td>
                    <td><?php echo $linha['raio'];?></td>
                
                    <td><a href='../cadastros/cadEsf.php?idesfera=<?php echo $linha['idesfera'];?>&action=editar'><img src="../../img/edit.svg" style="width: 1.8vw;"></a></td>
                    <td><a onclick="return confirm('Deseja mesmo excluir?')" href="../control/acao.php?idesfera=<?php echo $linha['idesfera'];?>&table=esfera&action=excluir"><img src="../../img/delete.svg" style="width: 1.8vw;"></a></td>
                    <td><a href="mostrarEsfera.php?idesfera=<?php echo $linha['idesfera']; ?>&cor=<?php echo str_replace('#', '%23', $linha['cor']);?>&circulo_idcirculo=<?php echo $linha['circulo_idcirculo']?>&tabuleiro_idtabuleiro=<?php echo $linha['tabuleiro_idtabuleiro']?>&raio=<?php echo $linha['raio']?>"><img src='../../img/list.svg' style="width: 1.8vw;"></a></td>

                </tr>
            <?php 
                }
            ?> 
        </table>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </content>
</body>
</html>
