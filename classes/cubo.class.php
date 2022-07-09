<?php
// classe cubo //
    include_once 'conf/Conexao.php';
    require_once 'conf/conf.inc.php';
    require_once "classes/autoload.php";
    class Cubo extends Quadrado{
        private $idcubo;
        private $cor;
        private static $contador;

        public function __construct($idcubo, $lado, $cor, $quadrado_idquadrado) {
            parent::__construct($quadrado_idquadrado, $lado, '', '');
            $this->setidcubo($idcubo);
            $this->setCor($cor);
            self::$contador = self::$contador + 1;
        }

        public function getIdCubo(){ 
            return $this->idcubo; 
        }

        public function setidcubo($idcubo){ 
            $this->idcubo = $idcubo;
        }      

        public function getCor() {
            return $this->cor;
        }

        public function setCor($cor) {
            if (strlen($cor) > 0)    
                $this->cor = $cor;
        }
        public function __toString() {
            return  "ID do Cubo: ".$this->getIdCubo()."<br>".
                    "ID do Quadrado: ".$this->getId()."<br>".
                    "Cor: ".$this->getCor()."<br>".
                    "Lado:".$this->getLado()."<br".
                    "Área do Cubo: ".round($this->AreaCubo(),2)." metros²<br>".
                    "Perimetro do Cubo: ".round($this->PerimetroCubo(),2)."<br>".
                    "Diagonal do Cubo: ".round($this->DiagonalCubo(),2)."<br>".
                    "Volume do Cubo: ".round($this->VolumeCubo(),2)."<br>".
                    "Contador: ".self::$contador."<br>";
        }

        public function AreaCubo() {
            $area = 6 * pow($this->getLado(),2);
            return $area;
        }

        public function PerimetroCubo() {
            $perimetro = $this->getLado() * 12;
            return $perimetro;
        }

        public function DiagonalCubo() {
            $diagonal = $this->getLado() * sqrt(3);
            return $diagonal;
        }

        public function VolumeCubo() {
            $volume = pow($this->getLado(),3);
            return $volume;
        }
        
        public function inserir(){
            $sql = 'INSERT INTO cubo (cor, quadrado_idquadrado) 
            VALUES(:cor, :quadrado_idquadrado)';
            $parametros = array(":cor"=>$this->getCor(), 
                                ":quadrado_idquadrado"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public function excluir(){
            $sql = 'DELETE FROM cubo WHERE idcubo = :idcubo';
            $parametros = array(":idcubo"=>$this->getIdCubo());
            return parent::executaComando($sql,$parametros);
        }

        public function editar(){
            $sql = 'UPDATE cubo 
            SET cor = :cor, quadrado_idquadrado = :quadrado_idquadrado WHERE idcubo = :idcubo';
            $parametros = array(":cor"=>$this->getCor(),
                                ":quadrado_idquadrado"=>$this->getId(),
                                ":idcubo"=>$this->getIdCubo());
            return parent::executaComando($sql,$parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            $sql = "SELECT *  FROM quadrado,cubo WHERE quadrado_idquadrado = idquadrado";
            if ($buscar > 0)
                switch($buscar){
                    case(1): $sql .= "&& idcubo = :procurar"; $procurar = "%".$procurar."%"; break;
                    case(2): $sql .= "&& cubo.cor LIKE :procurar"; $procurar = "%".$procurar."%"; break;
                    case(3): $sql .= "&& quadrado_idquadrado = :procurar"; $procurar = "%".$procurar."%"; break;
                }
            if ($buscar > 0)
                $parametros = array(':procurar'=>$procurar);
            else 
                $parametros = array();
            return parent::buscar($sql, $parametros);
        }

        
         public function rotate(){
            return $this->getLado() / 2;
        }

        public function desenha(){
            $str = "<div style='width: ".$this->getLado()."vh; height: ".$this->getLado()."vh; animation: rotate 10s infinite alternate; transform-style: preserve-3d;'>
                        <div style='bastrkground: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid black; display: flex; width: ".$this->getLado()."vh; height: ".$this->getLado()."vh; 
                            position: absolute; transform: translateZ(".$this->rotate()."vh);'></div>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid black; display: flex; width: ".$this->getLado()."vh; height: ".$this->getLado()."vh; 
                            position: absolute; transform: rotateY(90deg) translateZ(".$this->rotate()."vh);'></div>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid black; display: flex; width: ".$this->getLado()."vh; height: ".$this->getLado()."vh; 
                            position: absolute; transform: rotateY(180deg) translateZ(".$this->rotate()."vh);'></div>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid black; display: flex; width: ".$this->getLado()."vh; height: ".$this->getLado()."vh; 
                            position: absolute; transform: rotateY(-90deg) translateZ(".$this->rotate()."vh);'></div>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid black; display: flex; width: ".$this->getLado()."vh; height: ".$this->getLado()."vh; 
                            position: absolute; transform: rotateX(90deg) translateZ(".$this->rotate()."vh);'></div>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid black; display: flex; width: ".$this->getLado()."vh; height: ".$this->getLado()."vh; 
                            position: absolute; transform: rotateX(-90deg) translateZ(".$this->rotate()."vh);'></div>
                    </div><br><br><br>";
            return $str;
        }
        }