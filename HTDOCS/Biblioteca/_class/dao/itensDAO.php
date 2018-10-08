<?php 
require_once "../_class/Conexao2.php";

class intensDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraItens(Itens $entidadeItens){
		try{
			$param = array( 
				':qtd_kit'=>$entidadeItens->getQtd_kit(),
				':descricao_kit'=>$entidadeItens->getDescricao_kit(),
				':descricao_produto'=>$entidadeItens->getDescricao_produto()
			);

			$stmt = $this->pdo->prepare("INSERT INTO itens VALUES('null' , :qtd_kit , :descricao_kit , :descricao_produto );");
						
			return $stmt->execute($param);

		}catch(PDOException $ex){
			return "Erro ao cadastrar Item".$ex->getMessage();
		}
	}
}
?>