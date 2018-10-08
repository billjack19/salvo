<?php 
require_once "../../_class/Conexao2.php";

class emprestimoLivroDAO2{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function pegaEmprestimo($Emprestimo,$status){
		if ($status == '0') {
			$sql = "SELECT * FROM v_emprestimolivro where NOME_ALUNO LIKE '%".$Emprestimo."%' ORDER BY DATA_INICIAL_EMPRESTIMO_LIVRO DESC LIMIT 25";
		
		}
		else if ($status == '1') {
			$sql = "SELECT * FROM v_emprestimolivro where STATUS_EMPRESTIMO = '1' AND NOME_ALUNO LIKE '%".$Emprestimo."%' ORDER BY DATA_INICIAL_EMPRESTIMO_LIVRO DESC LIMIT 25";
		
		}
		else if ($status == '2') {
			$sql = "SELECT * FROM v_emprestimolivro where STATUS_EMPRESTIMO = '2' AND NOME_ALUNO LIKE '%".$Emprestimo."%' ORDER BY DATA_INICIAL_EMPRESTIMO_LIVRO DESC LIMIT 25";
			
		
		}
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}
	function pegaIdEmprestimo($Emprestimo){
		$sql = "SELECT * FROM v_emprestimolivro where ID_EMPRESTIMO_LIVRO = ".$Emprestimo.";";
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}
}
?>