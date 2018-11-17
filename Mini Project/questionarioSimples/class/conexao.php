<?php
class Conexao {
	private static $conexao = null;
	
	function __construct() {
		// $db_host = "http://construtorabrothers.com.br:3306 ";
		// $db_host = "https://hosting.pocos-net.com.br:8443/domains/databases";
		
		// $db_host = "186.193.152.31";
		// $db_usuario = "cdi";
		// $db_senha = "Teste#123";
		// $db_nome = "format1";

		$db_host = "localhost";
		$db_nome = "questionario";
		$db_usuario = "root";
		$db_senha = "";


		$db_driver = "mysql";
		
		try{
			# Atribui o objeto PDO à variável $conexao.
			self::$conexao = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			# Garante que o PDO lance exceções durante erros.
			self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// $stmt->bindColumn(1, $type, PDO::PARAM_STR, 256);
			// $stmt->bindColumn(2, $lob, PDO::PARAM_LOB);
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