<?php 
require_once "../../_class/Conexao2.php";
class livroDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function pegaLivro($livro){
		$sql = "SELECT * FROM livro where NOME_LIVRO like '%".$livro."%' AND STATUS_LIVRO = 1 ORDER BY FREQUENCIA_LIVRO DESC LIMIT 25";
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}
	function pegaIdLivro($livro){
		$sql = "SELECT * FROM livro where ID_LIVRO = '".$livro."'";
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}
}
?>