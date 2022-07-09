<?php

// utils com as funções de selecionar tabuleiro e quadrado
// enquanto chave estrangeira
    require_once "conf/Conexao.php";
    $processo = "";
    if(isset($_POST['processo'])){$processo = $_POST['processo'];}else if(isset($_GET['processo'])){$processo = $_GET['processo'];}

    include_once('classes/autoload.php');
    include_once('classes/autoload.php');
    function select($id, $idselect){
        $tab = new Tabuleiro("","");
        $lista = $tab->buscarTab($id);
        return option(array('idtabuleiro', 'idtabuleiro'), $lista, $idselect);
    }
    
    function selectQuad($id, $idselect){
        $quad = new Quadrado("","","","");
        $lista = $quad->buscarQuad($id);
        return option(array('idquadrado', 'idquadrado'), $lista, $idselect);
    }

    function option($chave, $dados, $id = 0){
        $str = "<option value='0'>Selecione</option>";
        $tab = new Tabuleiro("","");

        foreach($dados as $linha){
            $selected = "";
            if($id == $linha[$chave[0]]){
                $selected = "selected";
            }
            $str .= "<option ".$selected." value='".$linha[$chave[0]]."'>".$linha[$chave[1]]."</option>";
        }
        return $str;

    }

?>