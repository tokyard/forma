<?php 
require_once("classes/autoload.php"); 
include_once "conf/Conexao.php";
require_once "conf/conf.inc.php";

$processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $idcubo = isset($_GET['idcubo']) ? $_GET['idcubo'] : 0;
        $vet = Cubo::Listar($tipo = 0, $procurar = $idcubo);
        $cubo = new Cubo($idcubo, $vet[0]['lado'], $vet[0]['cor'],  $vet[0]['quadrado_idquadrado'], $vet[0]['tabuleiro_idtabuleiro']);     
        $cubo->excluir();
        header("location:cubo.php");
    }

$processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $idcubo = isset($_POST['idcubo']) ? $_POST['idcubo'] : "";
        
        $lado= isset($_POST['lado']) ? $_POST['lado'] : 0;  
        $cor=isset($_POST['cor']) ? $_POST['cor'] : "";
        $quadrado_idquadrado= isset($_POST['quadrado_idquadrado']) ? $_POST['quadrado_idquadrado'] : 0;  
        $tabuleiro_idtabuleiro= isset($_POST['tabuleiro_idtabuleiro']) ? $_POST['tabuleiro_idtabuleiro'] : 0;

        try{

        if ($idcubo > 0 ){
            
            $cubo = new Cubo($idcubo, $_POST['lado'], $_POST['cor'], $_POST['quadrado_idquadrado'], $_POST['tabuleiro_idtabuleiro']);   
            $cubo->editar();
            
        }else {
            
            $cubo = new Cubo("", $lado, $cor, $quadrado_idquadrado, $tabuleiro_idtabuleiro);     
            $cubo->inserir();
        }    
         header("location:cubo.php");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar o cuboângulo.<h1>
        <br> Erro: <br>".$e->getMessage();
    }
}   
