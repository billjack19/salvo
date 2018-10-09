<?php

$con = new Conexao();
$pdo = $con->Connect();
echo $pdo;

$sql = 'SELECT TOP 50 CODIGO, CPF_CGC, RAZAOSOCIAL 
		FROM CLIEFORNEC 
		WHERE RAZAOSOCIAL LIKE \'%Ã%\'';

$resultado = $pdo->query($sql);

echo "<table border='1'>";
foreach ($resultado as $row) {
	echo "
	<tr>
		<td>" . $row['CODIGO']		. "</td>
		<td>" . $row['CPF_CGC']		. "</td>
		<td>" . $row['RAZAOSOCIAL']	. "</td>
	</tr>";
}
echo "</table>";
// unset( $pdo );


class Conexao {
	private static $conexao = null;

	private $servidor = "SUPORTECDI\SQL2014";
	private $instancia = "sql2014";
	// private $instancia = "SQL2014";
	// private $porta = 1433;
	private $porta = 50207;
	private $database = "CasaDuarte";
	private $usuario = "sa";
	private $senha = "teste";

	public function get($nome_campo){
		return $this->$nome_campo;
	}
	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}

	function conectar() {
		try {
			self::$conexao = new PDO( "sqlsrv:Server={$servidor}\\{$instancia},{$porta};Database={$database}", $usuario, $senha, array(PDO::SQLSRV_ENCODING_UTF8  => 1));
			// $conexao = new PDO( "sqlsrv:Server={$this->servidor}\\{$this->instancia},{$this->porta};Database={$this->database}", $this->usuario, $this->senha, array(PDO::SQLSRV_ENCODING_UTF8  => 1));
			// Usando no MySQL
			// self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch ( PDOException $e ) {
			echo "Drivers disponiveis: " . implode( ",", PDO::getAvailableDrivers() );
			echo "\nErro: " . $e->getMessage();
			// exit;
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