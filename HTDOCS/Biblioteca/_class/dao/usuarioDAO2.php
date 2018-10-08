<?php 
require_once "../../_class/Conexao2.php";
class usuarioDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function pegaUsuario($usuario){
		$sql = "SELECT * FROM cadastro where LOGIN_CADASTRO like '%".$usuario."%'";
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}
}
?>