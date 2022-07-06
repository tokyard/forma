<?php  
require_once("class/autoload.php"); 
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";

$processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $idtriangulo = isset($_GET['idtriangulo']) ? $_GET['idtriangulo'] : 0;
        $tri = new Triangulo($idtriangulo, $_POST['base'],  $_POST['lado1'], $_POST['lado2'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);     
        $tri->excluir();
        header("location:tri.php");
    }

$processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $idtriangulo = isset($_POST['idtriangulo']) ? $_POST['idtriangulo'] : "";

        if ($idtriangulo == 0){
            $tri = new Triangulo("", $_POST['base'], $_POST['lado1'], $_POST['lado2'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
            $tri->inserir();
            header("location:tri.php");
        }else {
            $tri = new Triangulo($_POST['idtriangulo'], $_POST['base'], $_POST['lado1'], $_POST['lado2'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
            $tri->editar();
        }    
        header("location:tri.php");    
   
}

function buscarDados($idtriangulo){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM triangulo WHERE idtriangulo = $idtriangulo");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['idtriangulo'] = $linha['idtriangulo'];
        $dados['base'] = $linha['base'];
        $dados['lado1'] = $linha['lado1'];
        $dados['lado2'] = $linha['lado2'];
        $dados['cor'] = $linha['cor'];
        $dados['tabuleiro_idtabuleiro'] = $linha['tabuleiro_idtabuleiro'];
    }
    return $dados;
}
?>