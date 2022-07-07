<?php 
require_once("classes/autoload.php"); 
include_once "conf/Conexao.php";
require_once "conf/conf.inc.php";

$processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $idquadrado = isset($_GET['idquadrado']) ? $_GET['idquadrado'] : 0;
        $vet = Quadrado::Listar($tipo = 0, $procurar = $idquadrado);
        $quad = new Quadrado($idquadrado, $vet[0]['lado'], $vet[0]['cor'], $vet[0]['tabuleiro_idtabuleiro']);     
        $quad->excluir();
        header("location:quad.php");
    }

$processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $idquadrado = isset($_POST['idquadrado']) ? $_POST['idquadrado'] : "";
        
        $lado= isset($_POST['lado']) ? $_POST['lado'] : 0;
        $cor=isset($_POST['cor']) ? $_POST['cor'] : 0;
        $idtab= isset($_POST['tabuleiro_idtabuleiro']) ? $_POST['tabuleiro_idtabuleiro'] : 0;

        try{

        if ($idquadrado > 0 ){
            
            $quad = new Quadrado($_POST['idquadrado'], $_POST['lado'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
            $quad->editar();
            
        }else {
            
            $quad = new Quadrado("", $lado, $cor, $idtab);     
            
            echo $lado, $cor, $idtab;

            $quad->inserir();
        }    
         header("location:quad.php");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar o Quadrado.<h1>
        <br> Erro: <br>".$e->getMessage();
    }
}   
