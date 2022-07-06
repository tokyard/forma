<?php  
require_once("class/autoload.php"); 
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";

$processo = isset($_GET['processo']) ? $_GET['processo'] : "";
    if ($processo == "excluir"){
        $idusuario = isset($_GET['idusuario']) ? $_GET['idusuario'] : 0;
        
        $user = Usuario::excluir($idusuario);
        header("location:user.php");
    }

$processo = isset($_POST['processo']) ? $_POST['processo'] : "";
    if ($processo == "salvar"){
        $idusuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : "";

        if ($idusuario == 0){
            $user = Usuario::inserir($_POST['nome'], $_POST['login'], $_POST['senha']);      
            header("location:user.php");
        }else {
            $user = Usuario::editar($_POST['idusuario'], $_POST['nome'], $_POST['login'], $_POST['senha']);
        }    
        header("location:user.php");    
 
}


?>