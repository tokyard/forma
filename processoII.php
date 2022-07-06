<?php 
require_once("class/autoload.php"); 
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";

$processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $idtabuleiro = isset($_GET['idtabuleiro']) ? $_GET['idtabuleiro'] : 0;
        $tabuleiro = new Tabuleiro($idtabuleiro, $_POST['lado']);     
        $tabuleiro->excluir();
        header("location:tab.php");
    }

$processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $idtabuleiro = isset($_POST['idtabuleiro']) ? $_POST['idtabuleiro'] : "";

    
        if ($idtabuleiro == 0){
            $tabuleiro = new Tabuleiro("", $_POST['lado']);     
            $tabuleiro->inserir();
            header("location:tab.php");
        }else {
            $tabuleiro = new Tabuleiro($_POST['idtabuleiro'], $_POST['lado']);
            $tabuleiro->editar();
        }    
        header("location:tab.php");    
    }     

?>