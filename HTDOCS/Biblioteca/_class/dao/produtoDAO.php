<?php 
require_once "../_class/Conexao2.php";
class produtoDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraProduto(Produto $entidadeProduto){
		try{
			$param = array( 
				':descricao_produto'=>$entidadeProduto->getDescricao_produto(),
				':status_produto'=>$entidadeProduto->getStatus_produto()
			);

			$stmt = $this->pdo->prepare("INSERT INTO produto VALUES('null' , :descricao_produto , :status_produto);");
			
			return $stmt->execute($param);

		}catch(PDOException $ex){
			return "Erro ao cadastrar Aluno".$ex->getMessage();
		}
	}
}
?>