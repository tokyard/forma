<?php
    include_once ("class/autoload.php");
    class Tabuleiro extends Forma{
        private $idtabuleiro;
        private $lado;

    
        public function __construct($idtabuleiro,$lado) {
            $this->setId($idtabuleiro);
            $this->setLado($lado);
        }
             
        public function getId() {
            return $this->idtabuleiro;
        }
        public function getLado() {
            return $this->lado;
        }
        
        public function setLado($lado) {
            if ($lado >  0)
                $this->lado = $lado;
        }
        public function setId($idtabuleiro) {
                $this->idtabuleiro = $idtabuleiro;
        }
        
        public function __toString() {
            return  "Lado: ".$this->getLado()."<br>".
                    "Area: ".$this->Area()."<br>".
                    "Perimetro: ".$this->Perimetro()."<br>";
        }

        public function Area() {
            return $this->getLado()*$this->getLado();
        }
        
        public function Perimetro() {
            return $this->getLado()*4;
        }
        
        public function desenha() {
            $style = ".tabuleiro { height: ".$this->getLado()."px;width: ".$this->getLado()."px;  background-color: #7B68EE;}";
         
             return $style;
     }
     
        public function buscarTab($id){
            require_once("../../conf/Conexao.php");
            $conexao = Conexao::getInstance();
            $query = 'SELECT * FROM tabuleiro';
            if($id > 0){
                $query .= ' WHERE idtabuleiro = :Id';
                $stmt->bindParam(':Id', $id);
            }
                $stmt = $conexao->prepare($query);
                if($stmt->execute())
                    return $stmt->fetchAll();
                    return false;
        }

        public function inserir(){
            $sql = "INSERT INTO tabuleiro (lado) VALUES(:lado)";
            $parametros = array(":lado"=>$this->getLado());
            return parent::executaComando($sql, $parametros);
        }

        public function excluir(){
            $sql = "DELETE FROM tabuleiro WHERE idtabuleiro = :idtabuleiro";
            $parametros = array(":idtabuleiro"=>$this->getId());
            return parent::executaComando($sql, $parametros);
        }

        public function editar(){
            $sql = "UPDATE tabuleiro SET lado = :lado WHERE (idtabuleiro = :idtabuleiro)";
            $parametros = array(":lado"=>$this->getLado(),
                                ":idtabuleiro"=>$this->getId());
            return parent::executaComando($sql, $parametros);
        }
        
        public static function listar($tipo = 0, $procurar = ""){
            $sql = "SELECT * FROM tabuleiro";
            if ($tipo > 0)
                switch($tipo){
                    case(1): $sql .= " WHERE idtabuleiro = :procurar "; $procurar = $procurar."%";  break;
                    case(2): $sql .= " WHERE lado LIKE :procurar "; $procurar = $procurar."%";  break;
                }
            if ($tipo > 0)
                $par = array(':procurar' => $procurar);
            else
                $par = array();
            return parent::buscar($sql, $par);
        }



    }
    
?>