<?php 
require_once("classes/autoload.php"); 
include_once "conf/Conexao.php";
require_once "conf/conf.inc.php";

$processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $idtriangulo = isset($_GET['idtriangulo']) ? $_GET['idtriangulo'] : 0;
        $vet = Triangulo::Listar($tipo = 0, $procurar = $idtriangulo);
        $tri = new Triangulo($idtriangulo, $vet[0]['lado1'], $vet[0]['lado2'], $vet[0]['base'], $vet[0]['cor'], $vet[0]['tabuleiro_idtabuleiro']);     
        $tri->excluir();
        header("location:tri.php");
    }

$processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $idtriangulo = isset($_POST['idtriangulo']) ? $_POST['idtriangulo'] : "";
        
        $lado1= isset($_POST['lado1']) ? $_POST['lado1'] : 0;  
        $lado2= isset($_POST['lado2']) ? $_POST['lado2'] : 0;
        $base= isset($_POST['base']) ? $_POST['base'] : 0;
        $cor=isset($_POST['cor']) ? $_POST['cor'] : 0;
        $tabuleiro_idtabuleiro= isset($_POST['tabuleiro_idtabuleiro']) ? $_POST['tabuleiro_idtabuleiro'] : 0;

        try{

        if ($idtriangulo > 0 ){
            
            $tri = new Triangulo($idtriangulo, $_POST['lado1'], $_POST['lado2'], $_POST['base'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);              
            $tri->editar();
            
        }else {
            
            $tri = new Triangulo("", $base, $lado1, $lado2, $cor, $tabuleiro_idtabuleiro);     
        
            $tri->inserir();
        }    
         header("location:tri.php");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar o trirado.<h1>
        <br> Erro: <br>".$e->getMessage();
    }
}   
