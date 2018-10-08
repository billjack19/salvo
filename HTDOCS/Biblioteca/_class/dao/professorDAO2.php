<?php 
require_once "../../_class/Conexao2.php";
class alunoDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function pegaAluno($aluno){
		$sql = "SELECT * FROM funcionario where CARGO_FUNCIONARIO = 'Professor' AND NOME_FUNCIONARIO like '%".$aluno."%' ORDER BY FREQUENCIA_LIVRO DESC LIMIT 25";
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}
	function pegaIdAluno($aluno){
		$sql = "SELECT * FROM funcionario where ID_FUNCIONARIO = ".$aluno.";";
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}
}
?>