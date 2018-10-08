<?php 
require "../class/conexao.php";

class clienteDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraCliente(Cliente $entidadeCliente){
		try{
			$param = array(
				':razao_social'=>$entidadeCliente->get('razao_social'),
				':tipo'=>$entidadeCliente->get('tipo'),
				':inscricao_federal'=>$entidadeCliente->get('inscricao_federal'),
				':bool_ativo'=>$entidadeCliente->get('bool_ativo'),
				':telefone'=>$entidadeCliente->get('telefone'),
				':email'=>$entidadeCliente->get('email'),
				':cnpj_user'=>$entidadeCliente->get('cnpj_user')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO cliente ( razao_social, tipo, inscricao_federal, bool_ativo, telefone, email, cnpj_user ) VALUES ( :razao_social, :tipo, :inscricao_federal, :bool_ativo, :telefone, :email, :cnpj_user );"
			);
			$result = $stmt->execute($param);
			if ($result == 1 || $result == "1") {
				return (int) $this->pdo->lastInsertId();
			} else {
				return 0;
			}
		}catch(PDOException $ex){
			return "Erro ao cadastrar Cliente ".$ex->getMessage();
		}
	}


	function atualizaCliente(Cliente $entidadeCliente, $id){
		try{
			$param = array(
				':razao_social'=>$entidadeCliente->get('razao_social'),
				':tipo'=>$entidadeCliente->get('tipo'),
				':inscricao_federal'=>$entidadeCliente->get('inscricao_federal'),
				':telefone'=>$entidadeCliente->get('telefone'),
				':email'=>$entidadeCliente->get('email')
			);

			$stmt = $this->pdo->prepare("
				UPDATE cliente SET  razao_social = :razao_social, tipo = :tipo, inscricao_federal = :inscricao_federal, telefone = :telefone, email = :email WHERE id_cliente = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Cliente ".$ex->getMessage();
		}
	}

	function enderecoPrincipalCliente($endereco_id, $id){
		try{
			$stmt = $this->pdo->prepare("UPDATE cliente SET endereco = $endereco_id WHERE id_cliente = $id;");
			return $stmt->execute();
		}catch(PDOException $ex){
			return "Erro ao atualizar Cliente ".$ex->getMessage();
		}
	}
}
?>