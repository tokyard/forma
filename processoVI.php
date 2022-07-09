<?php 
require_once("classes/autoload.php"); 
include_once "conf/Conexao.php";
require_once "conf/conf.inc.php";

    // controle retângulo    //

$processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $idretangulo = isset($_GET['idretangulo']) ? $_GET['idretangulo'] : 0;
        $vet = Retangulo::Listar($tipo = 0, $procurar = $idretangulo);
        $ret = new Retangulo($idretangulo, $vet[0]['base'], $vet[0]['altura'], $vet[0]['cor'],$vet[0]['tabuleiro_idtabuleiro']);     
        $ret->excluir();
        header("location:ret.php");
    }

$processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $idretangulo = isset($_POST['idretangulo']) ? $_POST['idretangulo'] : "";
        
        $base= isset($_POST['base']) ? $_POST['base'] : 0;  
        $altura= isset($_POST['altura']) ? $_POST['altura'] : 0;  
        $cor=isset($_POST['cor']) ? $_POST['cor'] : "";
        $tabuleiro_idtabuleiro= isset($_POST['tabuleiro_idtabuleiro']) ? $_POST['tabuleiro_idtabuleiro'] : 0;

        try{

        if ($idretangulo > 0 ){
            
            $ret = new Retangulo($idretangulo, $_POST['base'], $_POST['altura'], $_POST['cor'],$_POST['tabuleiro_idtabuleiro']);   
            $ret->editar();
            
        }else {
            
            $ret = new Retangulo("", $base, $altura, $cor, $tabuleiro_idtabuleiro);     
            $ret->inserir();
        }    
         header("location:ret.php");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar o Retângulo.<h1>
        <br> Erro: <br>".$e->getMessage();
    }
}   
