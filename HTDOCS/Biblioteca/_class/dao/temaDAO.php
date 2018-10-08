<?php 
require_once "../Connecao.php";
class alunoDAO{
	function __construct(){
		$this->conn = new Connecao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraTema(Tema $entidadeTema){
		try{
			$stmt = $this->pdo->prepare("INSERT INTO produto VALUES(NULL , :descricao_tema )");
			
			$param = array( 
				// :descricao_tema=>$entidadeProduto->getDescricao_tema()
			);
			return $stmt->execute($param);

		}catch(PDOException $ex){
			return "Erro ao cadastrar Aluno".$ex->getMessage();
		}
	}
}
?>