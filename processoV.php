<?php 
require_once("classes/autoload.php"); 
include_once "conf/Conexao.php";
require_once "conf/conf.inc.php";

    // controle círculo   //


$processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $idcirculo = isset($_GET['idcirculo']) ? $_GET['idcirculo'] : 0;
        $vet = Circulo::Listar($tipo = 0, $procurar = $idcirculo);
        $circ = new Circulo($idcirculo, $vet[0]['raio'], $vet[0]['cor'],$vet[0]['tabuleiro_idtabuleiro']);     
        $circ->excluir();
        header("location:circ.php");
    }

$processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $idcirculo = isset($_POST['idcirculo']) ? $_POST['idcirculo'] : "";
        
        $raio= isset($_POST['raio']) ? $_POST['raio'] : 0;  
        $cor=isset($_POST['cor']) ? $_POST['cor'] : "";
        $tabuleiro_idtabuleiro= isset($_POST['tabuleiro_idtabuleiro']) ? $_POST['tabuleiro_idtabuleiro'] : 0;

        try{

        if ($idcirculo > 0 ){
            
            $circ = new Circulo($idcirculo, $_POST['raio'], $_POST['cor'],$_POST['tabuleiro_idtabuleiro']);   
            $circ->editar();
            
        }else {
            
            $circ = new Circulo("", $raio, $cor, $tabuleiro_idtabuleiro);     
            $circ->inserir();
        }    
         header("location:circ.php");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar o Círculo.<h1>
        <br> Erro: <br>".$e->getMessage();
    }
}   
