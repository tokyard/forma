<?php 
require_once("classes/autoload.php"); 
include_once "conf/Conexao.php";
require_once "conf/conf.inc.php";

$processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $idtabuleiro = isset($_GET['idtabuleiro']) ? $_GET['idtabuleiro'] : 0;
        $vet = Tabuleiro::listar($tipo = 0, $procurar = $idtabuleiro);
        $tab = new Tabuleiro($idtabuleiro,$vet[0]['lado']);     
        $tab->excluir();
        header("location:tab.php");
    }

$processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $idtabuleiro = isset($_POST['idtabuleiro']) ? $_POST['idtabuleiro'] : "";
        $lado = isset($_POST['lado']) ? $_POST['lado'] : 0;

        try{

        if ($idtabuleiro > 0 ){
            
            $tab = new Tabuleiro($_POST['idtabuleiro'], $_POST['lado']);
            $tab->editar();
            
        }else{
            
            $tab = new Tabuleiro("", $lado, $cor, $idtab);     
            $tab->inserir();
        }    
         header("location:tab.php");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar o Tabuleiro.<h1>
        <br> Erro: <br>".$e->getMessage();
    }
}   
