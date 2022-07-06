<?php 
require_once("class/autoload.php"); 
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";

$processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $idcubo = isset($_GET['idcubo']) ? $_GET['idcubo'] : 0;
        $cubo = new Cubo($idcubo, $_POST['lado'], $_POST['cor'],  $_POST['quadrado_idquadrado'], $_POST['tabuleiro_idtabuleiro']);     
        $cubo->excluir();
        header("location:cubo.php");
    }

$processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $idcubo = isset($_POST['idcubo']) ? $_POST['idcubo'] : "";

    
        if ($idcubo == 0){
            $cubo = new Cubo($idcubo, $_POST['lado'], $_POST['cor'],  $_POST['quadrado_idquadrado'], $_POST['tabuleiro_idtabuleiro']);          
            $cubo->inserir();
            header("location:cubo.php");
        }else {
            $cubo = new Cubo($idcubo, $_POST['lado'], $_POST['cor'],  $_POST['quadrado_idquadrado'], $_POST['tabuleiro_idtabuleiro']);     
            $cubo->editar();
        }    
        header("location:cubo.php");    
    }     

?>