<?php 
require_once "../Connecao.php";
class cargoDAO{
	function __construct(){
		$this->conn = new Connecao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraCargo(Cargo $entidadeCargo){
		try{
			$stmt = $this->pdo->prepare("INSERT INTO cargo VALUES(NULL , :descricao_cargo )");
			
			$param = array( );
			// :descricao_cargo=>$entidadeCargoo->getDSescricao_cargo()
			return $stmt->execute($param);

		}catch(PDOException $ex){
			return "Erro ao cadastrar Aluno".$ex->getMessage();
		}
	}
}
?>