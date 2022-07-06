<?php
    require_once "Forma.class.php";
    class Retangulo extends Forma{
        private $altura;
        private $base;

        //Criação do construct
        public function __construct($id,$base, $altura, $cor, $tabuleiro_idtabuleiro){
            parent::__construct($id, $cor, $tabuleiro_idtabuleiro);
            $this->setAltura($altura);
            $this->setBase($base);
        }

        //Metodos get e set
        public function getAltura() {
            return $this->altura;
        }
        public function getBase() {
            return $this->base;
        }

        public function setAltura($altura) {
            $this->altura = $altura;
        }
        public function setBase($base) {
                $this->base = $base;
        }

        //método toString
        public function __toString() {
            $str = parent::__toString();
            $str .="<br> Atura: ".$this->getAltura()."<br>".
                    "Base: " .$this->getBase()."<br>".
                    "Área: " .$this->area();
            return $str;
        }
        
        //métodos diversos
        public function desenha(){
            $style = ".retangulo {
                height: ".$this->getAltura()."px;
                width: ".$this->getBase()."px;
                background-color: ".$this->getCor().";}";
                return $style;
        }
        
        public function area(){
            return $this->getBase() * $this->getAltura();
        }
        
        public function inserir(){
            $sql = "INSERT INTO retangulo (base, altura, cor, tabuleiro_idtabuleiro) VALUES(:base, :altura, :cor, :tabuleiro_idtabuleiro)";
            $parametros = array(":base"=> $this->getBase(),
                                ":altura"=> $this->getAltura(),
                                ":cor"=> $this->getCor(),
                                ":tabuleiro_idtabuleiro"=> $this->getIdTab());

            return parent::executaComando($sql, $parametros);
        }
    
        public function excluir(){
            $sql = "DELETE FROM retangulo WHERE idretangulo = :idretangulo";
            $parametros = array(":idretangulo" => $this->getId());
    
            return parent::executaComando($sql, $parametros);
        }
    
        public function editar(){
            $sql = "UPDATE retangulo SET base = :base, altura = :altura, cor = :cor, tabuleiro_idtabuleiro = :tabuleiro_idtabuleiro WHERE (idretangulo = :idretangulo)";
            $parametros = array(":base"=> $this->getBase(),
                                ":altura"=> $this->getAltura(),
                                ":cor"=> $this->getCor(),
                                ":tabuleiro_idtabuleiro"=> $this->getIdTab(),
                                "idretangulo"=> $this->getId());
                                                
            return parent::executaComando($sql, $parametros);
        }
    
    
        public static function listar($buscar = 0, $procurar = ""){
            $sql = "SELECT * FROM retangulo";
            if ($buscar > 0)
            switch($buscar){
                case(1): $sql .= " WHERE idretangulo LIKE :procurar ORDER BY idretangulo"; $procurar = $procurar."%";  break;
                case(2): $sql .= " WHERE retangulo.base LIKE :procurar ORDER BY base"; $procurar = $procurar."%"; break;
                case(3): $sql .= " WHERE cor LIKE :procurar ORDER BY cor"; $procurar = "%".$procurar."%";  break;
            }
            if ($buscar > 0)
                $par = array(':procurar' => $procurar);
            else
                $par = array();
            return parent::buscar($sql, $par);
        }
        
    }
    
    ?>