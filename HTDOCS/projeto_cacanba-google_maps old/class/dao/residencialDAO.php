<?php 
require_once "../class/conexao.php";

class residencialDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
		$this->result = '';
	}
	function cadastraResidencial(Residencial $entidadeResidencial){
		try{
			$param = array(
				':endereco_residencial'=>$entidadeResidencial->get('endereco_residencial'),
				':numero_residencial'=>$entidadeResidencial->get('numero_residencial'),
				':bairro_residencial'=>$entidadeResidencial->get('bairro_residencial'),
				':cidade_residencial'=>$entidadeResidencial->get('cidade_residencial'),
				':uf_residencial'=>$entidadeResidencial->get('uf_residencial'),
				':cep_residencial'=>$entidadeResidencial->get('cep_residencial'),
				':titulo_residencial'=>$entidadeResidencial->get('titulo_residencial')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO residencial ( endereco_residencial, numero_residencial, bairro_residencial, cidade_residencial, uf_residencial, cep_residencial, titulo_residencial ) VALUES ( :endereco_residencial, :numero_residencial, :bairro_residencial, :cidade_residencial, :uf_residencial, :cep_residencial, :titulo_residencial );"
			);

			$result = $stmt->execute($param);
			if ($result == 1 || $result == "1") {
				return (int) $this->pdo->lastInsertId();
			} else {
				return 0;
			}
			

		}catch(PDOException $ex){
			return "Erro ao cadastrar Empresa ".$ex->getMessage();
		}
	}


	// function atualizaEmpresa(Empresa $entidadeResidencial, $id){
	// 	try{
	// 		$param = array(
	// 			':nome'=>$entidadeResidencial->get('nome'),
	// 			':reg_federal'=>$entidadeResidencial->get('reg_federal'),
	// 			':reg_estadual'=>$entidadeResidencial->get('reg_estadual'),
	// 			':cep'=>$entidadeResidencial->get('cep'),
	// 			':endereco'=>$entidadeResidencial->get('endereco'),
	// 			':numero'=>$entidadeResidencial->get('numero'),
	// 			':complemento'=>$entidadeResidencial->get('complemento'),
	// 			':bairro'=>$entidadeResidencial->get('bairro'),
	// 			':cidade'=>$entidadeResidencial->get('cidade'),
	// 			':estado'=>$entidadeResidencial->get('estado')
	// 			);

	// 		$stmt = $this->pdo->prepare("UPDATE empresa SET nome = :nome, reg_federal = :reg_federal, reg_estadual = :reg_estadual, cep = :cep, endereco = :endereco, numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, estado_id = :estado WHERE id_empresa = ".$id.";"
	// 		);

	// 		return $stmt->execute($param);

	// 	}catch(PDOException $ex){
	// 		return "Erro ao cadastrar Empresa ".$ex->getMessage();
	// 	}
	// }
}
?>