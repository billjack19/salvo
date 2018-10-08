<?php
require_once "../../_class/Conexao2.php";
class emprestimo_kit2DAO{
	function __construct(){	
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function pegaEmprestimoKit($idKit , $data){
		$sql = "SELECT * FROM v_emprestimokit WHERE ID_KIT = ".$idKit." and DATA_EMPRESTIMO_KIT = '".$data."' and STATUS_EMPRESTIMO_KIT = 1;";
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}
}
?>
<!-- v_emprestimokit -->