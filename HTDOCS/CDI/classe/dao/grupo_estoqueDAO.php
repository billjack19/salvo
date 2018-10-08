
<?php 
require_once "../classe/conexao.php";

class grupo_estoqueDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraGrupo_estoque(Grupo_estoque $entidadeGrupo_estoque){
		try{
			$param = array(
				':DESCRICAO'=>$entidadeGrupo_estoque->get('DESCRICAO'), 
				':DataAtualizacao'=>$entidadeGrupo_estoque->get('DataAtualizacao'), 
				':HoraAtualizacao'=>$entidadeGrupo_estoque->get('HoraAtualizacao'), 
				':UsuarioAtualizacao'=>$entidadeGrupo_estoque->get('UsuarioAtualizacao'), 
				':Conta_Contabil'=>$entidadeGrupo_estoque->get('Conta_Contabil')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO grupo_estoque (DESCRICAO, DataAtualizacao, HoraAtualizacao, UsuarioAtualizacao, Conta_Contabil) VALUES (:DESCRICAO, :DataAtualizacao, :HoraAtualizacao, :UsuarioAtualizacao, :Conta_Contabil);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Grupo_estoque ".$ex->getMessage();
		}
	}
	function atualizaGrupo_estoque(Grupo_estoque $entidadeGrupo_estoque, $id){
		try{
			$param = array(
				':DESCRICAO'=>$entidadeGrupo_estoque->get('DESCRICAO'), 
				':DataAtualizacao'=>$entidadeGrupo_estoque->get('DataAtualizacao'), 
				':HoraAtualizacao'=>$entidadeGrupo_estoque->get('HoraAtualizacao'), 
				':UsuarioAtualizacao'=>$entidadeGrupo_estoque->get('UsuarioAtualizacao'), 
				':Conta_Contabil'=>$entidadeGrupo_estoque->get('Conta_Contabil')
			);

			$stmt = $this->pdo->prepare("UPDATE grupo_estoque SET DESCRICAO = :DESCRICAO, DataAtualizacao = :DataAtualizacao, HoraAtualizacao = :HoraAtualizacao, UsuarioAtualizacao = :UsuarioAtualizacao, Conta_Contabil = :Conta_Contabil WHERE GRUPO = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Grupo_estoque ".$ex->getMessage();
		}
	}
}
?>