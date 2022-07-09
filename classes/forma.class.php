<?php
// classe pai-forma //
include_once ("classes/autoload.php"); 

    abstract class Forma extends Database{
        private $id;
        private $cor;
        private $tabuleiro_idtabuleiro;


        public function __construct($id, $cor, $tabuleiro_idtabuleiro) {
            $this->setId($id);
            $this->setCor($cor);
            $this->setIdTab($tabuleiro_idtabuleiro);
        }
        
    
        public function getId() {
            return $this->id;
        }
        public function getCor() {
            return $this->cor;
        }
        public function getIdTab() {
            return $this->tabuleiro_idtabuleiro;
        }

        public function setId($id) {
                $this->id = $id;
        }

        public function setCor($cor) {
                $this->cor = $cor;
        }
        public function setIdTab($tabuleiro_idtabuleiro) {
                $this->tabuleiro_idtabuleiro = $tabuleiro_idtabuleiro;
        }

    
        public function __toString() {
            return  "ID: ".$this->getId()."<br>".
                    "Cor: ".$this->getCor()."<br>".
                    "ID do Tabuleiro: ".$this->getIdTab()."";
        }

        //demais métodos abstract
        public abstract function desenha();
        public abstract function area();
        public abstract function inserir();
        public abstract function editar();
        public abstract function excluir();
        public abstract static function listar($tipo = 0, $procurar = "");

    }
?>