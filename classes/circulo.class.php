<?php
    include_once ("classes/autoload.php");
    class Circulo extends Forma{
        private $raio;
    
        public function __construct($idcirculo, $raio, $cor, $tabuleiro_idtabuleiro){
            parent::__construct($idcirculo, $cor, $tabuleiro_idtabuleiro);
            $this->setRaio($raio);
        }


        public function getRaio() {
            return $this->raio;
        }

        public function setRaio($raio) {
                $this->raio = $raio;
        }
        
        public function __toString(){
            $str = parent::__toString();
            $str .= "<br>Raio: ".$this->getRaio().
                    "<br>Diâmetro: ".$this->Diametro().
                    "<br>Área: ".$this->Area();
            return $str;
        }

        public function Diametro(){
            $diametro = $this->raio * 2;
            return $diametro;
        }

        public function Area(){
            $area = pi() * $this->raio;
            return $area;
        }


        public function desenha(){
            $style = ".circulo { height: ".$this->diametro()."px; width: ".$this->diametro()."px; border-radius: 50%; background: ".$this->getCor().";}";
            return $style;
        }
        
        public function buscarC($id){
            require_once("conf/Conexao.php");

            $conexao = Conexao::getInstance();

            $query = 'SELECT * FROM circulo';
            if($id > 0){
                $query .= ' WHERE idcirculo = :idcirculo';
                $stmt->bindParam(':idcirculo', $id);
            }
                $stmt = $conexao->prepare($query);
                if($stmt->execute())
                    return $stmt->fetchAll();
        
                return false;
        }

        public function inserir(){
            $sql = "INSERT INTO circulo (raio, cor, tabuleiro_idtabuleiro) VALUES(:raio, :cor, :tabuleiro_idtabuleiro)";
            $parametros = array(":raio"=> $this->getRaio(),
                                ":cor"=> $this->getCor(),
                                ":tabuleiro_idtabuleiro"=> $this->getIdTab());     
            return parent::executaComando($sql, $parametros);
        }
        
        public function excluir(){
            $sql = "DELETE FROM circulo WHERE idcirculo = :idcirculo";
            $parametros = array(":idcirculo" => $this->getId());
            return parent::executaComando($sql, $parametros);
        }

        public function editar(){
            $sql = "UPDATE circulo SET raio = :raio, cor = :cor, tabuleiro_idtabuleiro = :tabuleiro_idtabuleiro WHERE (idcirculo = :idcirculo)";
            $parametros = array(":raio"=> $this->getRaio(),
                                ":cor"=> $this->getCor(),
                                ":tabuleiro_idtabuleiro"=> $this->getIdTab(),
                                "idcirculo"=> $this->getId());       
            return parent::executaComando($sql, $parametros);
        }


        public static function listar($tipo = 0, $procurar = ""){
            $sql = "SELECT * FROM circulo";
            if ($tipo > 0)
                switch($tipo){
                    case(1): $sql .= " WHERE idcirculo = :procurar"; $procurar = $procurar."%";  break;
                    case(2): $sql .= " WHERE raio LIKE :procurar"; $procurar = $procurar."%"; break;
                    case(3): $sql .= " WHERE cor LIKE :procurar"; $procurar = "%".$procurar."%";  break;
                }
            if ($tipo > 0)
                $par = array(':procurar' => $procurar);
            else
                $par = array();
            return parent::buscar($sql, $par);
        }
    }
?>