<?php 
require_once "../class/conexao.php";

class cacambaDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraCacamba(Cacamba $entidadeCacamba){
		try{
			$param = array(
				':descricao_cacamba'=>$entidadeCacamba->get('descricao_cacamba'),
				':cnpj_user'=>$entidadeCacamba->get('cnpj_user')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO cacamba (descricao_cacamba,cnpj_user) VALUES (:descricao_cacamba,:cnpj_user);"
			);

			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Caçamba ".$ex->getMessage();
		}
	}
	

	function atualizaCacamba(Cacamba $entidadeCacamba, $id){
		try{
			$param = array(
				':descricao_cacamba'=>$entidadeCacamba->get('descricao_cacamba')
			);

			$stmt = $this->pdo->prepare("UPDATE cacamba SET descricao_cacamba = :descricao_cacamba WHERE id_cacamba = ".$id.";"
			);
			$resultado = $stmt->execute($param);
			if ($resultado == 1) {
				return $id;
			} else {
				return 0;
			}
		}catch(PDOException $ex){
			return "Erro ao atualizar Caçamba ".$ex->getMessage();
		}
	}
}
?>