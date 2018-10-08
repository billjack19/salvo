
<?php 
require_once "../classe/conexao.php";

class cliefornec_telefoneDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraCliefornec_telefone(Cliefornec_telefone $entidadeCliefornec_telefone){
		try{
			$param = array(
				':Email'=>$entidadeCliefornec_telefone->get('Email')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO cliefornec_telefone (Email) VALUES (:Email);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Cliefornec_telefone ".$ex->getMessage();
		}
	}
	function atualizaCliefornec_telefone(Cliefornec_telefone $entidadeCliefornec_telefone, $id){
		try{
			$param = array(
				':Email'=>$entidadeCliefornec_telefone->get('Email')
			);

			$stmt = $this->pdo->prepare("UPDATE cliefornec_telefone SET Email = :Email WHERE Sequencia = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Cliefornec_telefone ".$ex->getMessage();
		}
	}
}
?>