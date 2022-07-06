<?php  
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";
require_once("class/autoload.php");

$processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $idcirculo = isset($_GET['idcirculo']) ? $_GET['idcirculo'] : 0;
        $quad = new Circulo($idcirculo, $_POST['raio'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);     
        $quad->excluir();
        header("location:circ.php");
    }

$processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $idcirculo = isset($_POST['idcirculo']) ? $_POST['idcirculo'] : "";
        
        if ($idcirculo == 0){
            $quad = new Circulo("", $_POST['raio'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);     
            $quad->inserir();
            header("location:circ.php");
        }else {
            $quad = new Circulo($_POST['idcirculo'], $_POST['raio'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
            $quad->editar();
        }    
        header("location:circ.php");      
}
?>