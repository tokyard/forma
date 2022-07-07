<!DOCTYPE html>
<?php
    
    include_once ("classes/autoload.php");
    include_once "processoIV.php";
    require_once "conf/Conexao.php";
    

    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : 0; 
    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Triângulo</title>
</head>

<body>
    <content>
    <?php 
        include_once "menu.php";
        echo "<br>";
    ?>
        <div class="container-fluid">
        <table class="table table-striped">
                <tr><td><b>ID</b></td>
                    <td><b>Base</b></td>
                    <td><b>Lado 1</b></td>
                    <td><b>Lado 2</b></td>
                    <td><b>Cor</b></td>
                    <td><b>Tabuleiro</b></td>
                    <td><b>Editar</b></td>
                    <td><b>Deletar</b></td>
                    <td><b>Mostrar</b></td>
                </tr> 

                <form method="post">
                    <div class="form-group col-lg-3">
                        <h3>Procurar o Triângulo</h3>
                        <br>
                        <input type="text" name="procurar" id="procurar" size="50" class="form-control" placeholder="Insira a consulta" value="<?php echo $procurar;?>"> <br>
                        <button name="processo" id="processo" type="submit"  class="btn btn-dark">Procurar</button>
                        <br><br>
                        <form method="post" action="">
                        <input type="radio" name="tipo" value="1" class="form-check-input" <?php if ($tipo == "1") echo "checked" ?>> ID<br>
                        <input type="radio" name="tipo" value="2" class="form-check-input" <?php if ($tipo == "2") echo "checked" ?>> Base<br>
                        <input type="radio" name="tipo" value="3" class="form-check-input" <?php if ($tipo == "3") echo "checked" ?>> Cor<br>
                    </div>
                    <br><br>
                </form>

            <?php
                $lista = Triangulo::listar($tipo, $procurar); 
                foreach ($lista as $linha) { 
                    $color = $linha['cor'];
            ?>
                <tr><td><?php echo $linha['idtriangulo'];?></td>
                    <td><?php echo $linha['base'];?></td>
                    <td><?php echo $linha['lado1'];?></td>
                    <td><?php echo $linha['lado2'];?></td>
                    <td <?php echo "style='color: $color'"?>><?php echo $linha['cor'];?></td>
                    <td><?php echo $linha['tabuleiro_idtabuleiro'];?></td>
                
                    <td><a href='cadtri.php?idtriangulo=<?php echo $linha['idtriangulo'];?>&processo=editar'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wrench" viewBox="0 0 16 16">
<path d="M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364L.102 2.223zm13.37 9.019.528.026.287.445.445.287.026.529L15 13l-.242.471-.026.529-.445.287-.287.445-.529.026L13 15l-.471-.242-.529-.026-.287-.445-.445-.287-.026-.529L11 13l.242-.471.026-.529.445-.287.287-.445.529-.026L13 11l.471.242z"/>
</svg></a></td>
                    <td><a onclick="return confirm('Deseja excluir?')" href="processoIV.php?idtriangulo=<?php echo $linha['idtriangulo'];?>&processo=excluir"><svg xmlns="http://www.w3.org/2000/svg" widht="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
<path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
</svg></a></td>
                    <td><a href="mostrarIV.php?idtriangulo=<?php echo $linha['idtriangulo'];?>&base=<?php echo $linha['base'];?>&lado1=<?php echo $linha['lado1'];?>&lado2=<?php echo $linha['lado2'];?>&cor=<?php echo str_replace('#', '%23', $linha['cor']);?>&tabuleiro_idtabuleiro=<?php echo $linha['tabuleiro_idtabuleiro']?>">
                  
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg>  
                </a></td>
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
