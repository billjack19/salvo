<?php 
/* local_EntregaDAO .php */

require_once "../class/conexao.php";

class local_EntregaDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraLocalEntrega(Local_Entrega $entidadeLocal_Entrega){
		try{
			$param = array(
				":endereco"=>$entidadeLocal_Entrega->get('endereco'),
				":numero"=>$entidadeLocal_Entrega->get('numero'),
				":complemento"=>$entidadeLocal_Entrega->get('complemento'),
				":bairro"=>$entidadeLocal_Entrega->get('bairro'),
				":cidade"=>$entidadeLocal_Entrega->get('cidade'),
				":uf"=>$entidadeLocal_Entrega->get('uf'),
				":cep"=>$entidadeLocal_Entrega->get('cep'),
				":cliente_id"=>$entidadeLocal_Entrega->get('cliente_id'),
				":latitude"=>$entidadeLocal_Entrega->get('latitude'),
				":longitude"=>$entidadeLocal_Entrega->get('longitude'),
				":bool_ativo"=>$entidadeLocal_Entrega->get('bool_ativo')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO local_entrega ( endereco, numero, complemento, bairro, cidade, uf, cep, cliente_id, latitude, longitude, bool_ativo ) VALUES ( :endereco, :numero, :complemento, :bairro, :cidade, :uf, :cep, :cliente_id, :latitude, :longitude, :bool_ativo );"
			);
			$result = $stmt->execute($param);
			if ($result == 1 || $result == "1") {
				return (int) $this->pdo->lastInsertId();
			} else {
				return 0;
			}
		}catch(PDOException $ex){
			return "Erro ao cadastrar Caçamba ".$ex->getMessage();
		}
	}
	

	function atualizaLocalEntrega(Local_Entrega $entidadeLocal_Entrega, $id){
		try{
			$param = array(
				":endereco"=>$entidadeLocal_Entrega->get('endereco'),
				":numero"=>$entidadeLocal_Entrega->get('numero'),
				":complemento"=>$entidadeLocal_Entrega->get('complemento'),
				":bairro"=>$entidadeLocal_Entrega->get('bairro'),
				":cidade"=>$entidadeLocal_Entrega->get('cidade'),
				":uf"=>$entidadeLocal_Entrega->get('uf'),
				":cep"=>$entidadeLocal_Entrega->get('cep'),
				":cliente_id"=>$entidadeLocal_Entrega->get('cliente_id'),
				":latitude"=>$entidadeLocal_Entrega->get('latitude'),
				":longitude"=>$entidadeLocal_Entrega->get('longitude'),
				":bool_ativo"=>$entidadeLocal_Entrega->get('bool_ativo')
			);

			$stmt = $this->pdo->prepare("UPDATE local_entrega SET  endereco = :endereco, numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, uf = :uf, cep = :cep, cliente_id = :cliente_id, latitude = :latitude, longitude = :longitude, bool_ativo = :bool_ativo WHERE id_local_entrega = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Caçamba ".$ex->getMessage();
		}
	}
}
?>