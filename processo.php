<?php 
require_once("class/autoload.php"); 
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";

$processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $idquadrado = isset($_GET['idquadrado']) ? $_GET['idquadrado'] : 0;
        $quad = new Quadrado($idquadrado, $_POST['lado'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);     
        $quad->excluir();
        header("location:quad.php");
    }

$processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $idquadrado = isset($_POST['idquadrado']) ? $_POST['idquadrado'] : "";

    
        if ($idquadrado == 0){
            $quad = new Quadrado("", $_POST['lado'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);     
            $quad->inserir();
            header("location:quad.php");
        }else {
            $quad = new Quadrado($_POST['idquadrado'], $_POST['lado'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
            $quad->editar();
        }    
        header("location:quad.php");    
    }     

?>