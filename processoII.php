<?php  
require_once("class/autoload.php"); 
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";

$processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $idtabuleiro = isset($_GET['idtabuleiro']) ? $_GET['idtabuleiro'] : 0;
        
        $tab = Tabuleiro::excluir($idtabuleiro);
        header("location:tab.php");
    }

$processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $idtabuleiro = isset($_POST['idtabuleiro']) ? $_POST['idtabuleiro'] : "";

        if ($idtabuleiro == 0){
            $tab = Tabuleiro::inserir($_POST['lado']);  
            header("location:tab.php");
        }else {
            $tab = Tabuleiro::editar($_POST['idtabuleiro'], $_POST['lado']);
        }    
        header("location:tab.php");       
}

?>