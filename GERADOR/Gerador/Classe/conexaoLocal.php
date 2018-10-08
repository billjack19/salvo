<?php

class ConexaoLocal {
    private static $conexao = null;

    private $db_host = "localhost";
    private $db_nome = "gerador";
    private $db_usuario = "root";
    private $db_senha = "";
    private $db_driver = "mysql";


    public function get($nome_campo){
        return $this->$nome_campo;
    }

    public function set($valor , $nome_campo){
        $this->$nome_campo = $valor;
    }
    
    function conectar() {        
        try{
            # Atribui o objeto PDO à variável $conexao.
            self::$conexao = new PDO("$this->db_driver:host=$this->db_host; dbname=$this->db_nome", $this->db_usuario, $this->db_senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            # Garante que o PDO lance exceções durante erros.
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            # Então não carrega nada mais da página.
            echo 'ERROR: ' . $e->getMessage();

        }
    }
    private function __clone() {}

    private function __wakeup() {}
    
    public static function Connect() {
        if(!isset(self::$conexao)) {            
            new Conexao();
        }
        return self::$conexao;
    }
}
?>