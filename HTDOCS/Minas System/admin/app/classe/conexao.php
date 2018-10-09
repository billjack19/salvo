
<?php
class Conexao {
    private static $conexao = null;
    
    function __construct() {
        
        $db_host = "minas-system.mysql.uhserver.com";
        $db_nome = "minas_system";
        $db_usuario = "cdi_root";
        $db_senha = "Teste@12";
        $db_driver = "mysql";
        
        try{
            # Atribui o objeto PDO à variável $conexao.
            self::$conexao = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
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
