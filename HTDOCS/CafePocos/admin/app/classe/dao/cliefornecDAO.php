
<?php 
require_once "../classe/conexao.php";

class cliefornecDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraCliefornec(Cliefornec $entidadeCliefornec){
		try{
			$param = array(
				':CPF_CGC'=>$entidadeCliefornec->get('CPF_CGC'), 
				':RAZAOSOCIAL'=>$entidadeCliefornec->get('RAZAOSOCIAL'), 
				':NOMEFANTASIA'=>$entidadeCliefornec->get('NOMEFANTASIA'), 
				':senha_site'=>$entidadeCliefornec->get('senha_site'), 
				':bool_ativo_cliefornec'=>$entidadeCliefornec->get('bool_ativo_cliefornec')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO cliefornec (CPF_CGC, RAZAOSOCIAL, NOMEFANTASIA, senha_site, bool_ativo_cliefornec) VALUES (:CPF_CGC, :RAZAOSOCIAL, :NOMEFANTASIA, :senha_site, :bool_ativo_cliefornec);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Cliefornec ".$ex->getMessage();
		}
	}
	function atualizaCliefornec(Cliefornec $entidadeCliefornec, $id){
		try{
			$param = array(
				':CPF_CGC'=>$entidadeCliefornec->get('CPF_CGC'), 
				':RAZAOSOCIAL'=>$entidadeCliefornec->get('RAZAOSOCIAL'), 
				':NOMEFANTASIA'=>$entidadeCliefornec->get('NOMEFANTASIA'), 
				':senha_site'=>$entidadeCliefornec->get('senha_site'), 
				':bool_ativo_cliefornec'=>$entidadeCliefornec->get('bool_ativo_cliefornec')
			);

			$stmt = $this->pdo->prepare("UPDATE cliefornec SET CPF_CGC = :CPF_CGC, RAZAOSOCIAL = :RAZAOSOCIAL, NOMEFANTASIA = :NOMEFANTASIA, senha_site = :senha_site, bool_ativo_cliefornec = :bool_ativo_cliefornec WHERE CODIGO = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Cliefornec ".$ex->getMessage();
		}
	}
}
?>