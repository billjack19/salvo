<?php 
require_once "../_class/Conexao2.php";
class kitDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraKit(Kit $entidadeKit){
		try{
			$param = array( 
				':descricao_kit'=>$entidadeKit->getDescricao_kit(),
				':numero_kit'=>$entidadeKit->getNumero_kit()
			);

			$stmt = $this->pdo->prepare("INSERT INTO kit VALUES(NULL , :descricao_kit , :numero_kit )");
			
			
			return $stmt->execute($param);

		}catch(PDOException $ex){
			return "Erro ao cadastrar Aluno".$ex->getMessage();
		}
	}
	function pegaItens($itens){
		$sql = "SELECT * FROM itens where DESCRICAO_KIT = ".$itens.";";
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}
}
?>