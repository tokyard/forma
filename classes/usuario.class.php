<?php
    include_once ("classes/autoload.php");
    class Usuario extends Database{
        private $idusuario;
        private $nome;
        private $login;
        private $senha;

        public function __construct($idusuario,$nome,$login,$senha) {
            $this->setId($idusuario);
            $this->setNome($nome);
            $this->setlogin($login);
            $this->setSenha($senha);
        }

        public function getId() {
            return $this->idusuario;
        }
        public function getNome() {
            return $this->nome;
        }
        public function getLogin() {
            return $this->login;
        }
        public function getSenha() {
            return $this->senha;
        }
        

        public function setId($idusuario) {
                $this->idusuario = $idusuario;
        }
        public function setNome($nome) {
            if ($nome >  0)
                $this->nome = $nome;
        }
        public function setLogin($login) {
                $this->login = $login;
        }
        public function setSenha($senha) {
                $this->senha = $senha;
        }
    
        public static function inserir($nome, $login, $senha){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO usuario (nome, login, senha) 
            VALUES(:nome, :login, :senha)');

            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':login', $login);
            $stmt->bindValue(':senha', $senha);

            return $stmt->execute(); 
        }

        public static function excluir($idusuario){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM usuario WHERE idusuario = :idusuario');
            $stmt->bindValue(':idusuario', $idusuario);
            
            return $stmt->execute();
        }


        public static function editar($idusuario, $nome, $login, $senha){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('UPDATE usuario SET nome = :nome, login = :login, senha = :senha
            WHERE idusuario = :idusuario');

            $stmt->bindValue(':idusuario', $idusuario);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':login', $login);
            $stmt->bindValue(':senha', $senha);

            return $stmt->execute();
        }


        public static function listar($tipo = 0, $procurar = ""){
            $sql = "SELECT * FROM usuario";
            if ($tipo > 0)
                switch($tipo){
                    case(1): $sql .= " WHERE idusuario LIKE :procurar ORDER BY idusuario"; $procurar = "%".$procurar."%";  break;
                    case(2): $sql .= " WHERE nome LIKE :procurar ORDER BY nome"; $procurar = "%".$procurar."%";  break;
                    case(3): $sql .= " WHERE login LIKE :procurar ORDER BY login"; $procurar = "%".$procurar."%";  break;
                    case(4): $sql .= " WHERE senha LIKE :procurar ORDER BY senha"; $procurar = "%".$procurar."%";  break;
                    
                }
            if ($tipo > 0)
                $par = array(':procurar' => $procurar);
            else
                $par = array();
            return parent::buscar($sql, $par);
        }

        public function efetuarLogin($login, $senha){
            $pdo = Conexao::getInstance();
            $sql = "SELECT nome FROM usuario WHERE login = '$login' AND senha = '$senha';";
            $resultado = $pdo->query($sql)->fetchAll();
            if($resultado){
                $_SESSION['nome'] = $resultado[0]['nome'];
                return true;
            } else {
                $_SESSION['nome'] = null;
                return false;
            }
        }
    }
    
?>