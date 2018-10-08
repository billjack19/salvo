<?php 
require_once "../../_class/Conexao2.php";
class fraseDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function pegaFrase($idFrase){
		$sql = "SELECT * FROM frase_do_dia where ID_FRASE = ".$idFrase;
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}
}
?>
