<?php  
require_once("class/autoload.php"); 
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";

$processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $idretangulo = isset($_GET['idretangulo']) ? $_GET['idretangulo'] : 0;
        $ret = new Retangulo($idretangulo, $_POST['altura'], $_POST['base'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);     
        $ret->excluir();
        header("location:ret.php");
    }

$processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $idretangulo = isset($_POST['idretangulo']) ? $_POST['idretangulo'] : "";

    
        if ($idretangulo == 0){
            $ret = new Retangulo("", $_POST['altura'], $_POST['base'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
            $ret->insere();
            header("location:ret.php");
        }else {
            $ret = new Retangulo($_POST['idretangulo'], $_POST['altura'], $_POST['base'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
            $ret->editar();
        }    
     
}


function buscarDados($idretangulo){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM retangulo WHERE idretangulo = $idretangulo");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['idretangulo'] = $linha['idretangulo'];
        $dados['altura'] = $linha['altura'];
        $dados['base'] = $linha['base'];
        $dados['cor'] = $linha['cor'];
        $dados['tabuleiro_idtabuleiro'] = $linha['tabuleiro_idtabuleiro'];
    }
    return $dados;
}
?>