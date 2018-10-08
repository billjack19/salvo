<?php 
require_once "../../_class/Conexao2.php";
class kitDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function pegaKit($kit){
		$sql = "SELECT * FROM kit where DESCRICAO_KIT like '%".$kit."%'";
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}
	function pegaIdKit($kit){
		$sql = "SELECT * FROM kit where ID_KIT = ".$kit.";";
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}
	function pegaItens($itens){
		$sql = "SELECT * FROM itens where DESCRICAO_KIT = ".$itens.";";
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}
}
?>