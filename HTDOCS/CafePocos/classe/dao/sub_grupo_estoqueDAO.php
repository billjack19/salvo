
<?php 
require_once "../classe/conexao.php";

class sub_grupo_estoqueDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraSub_grupo_estoque(Sub_grupo_estoque $entidadeSub_grupo_estoque){
		try{
			$param = array(
				':DESCRICAO'=>$entidadeSub_grupo_estoque->get('DESCRICAO'), 
				':DataAtualizacao'=>$entidadeSub_grupo_estoque->get('DataAtualizacao'), 
				':HoraAtualizacao'=>$entidadeSub_grupo_estoque->get('HoraAtualizacao'), 
				':UsuarioAtualizacao'=>$entidadeSub_grupo_estoque->get('UsuarioAtualizacao')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO sub_grupo_estoque (DESCRICAO, DataAtualizacao, HoraAtualizacao, UsuarioAtualizacao) VALUES (:DESCRICAO, :DataAtualizacao, :HoraAtualizacao, :UsuarioAtualizacao);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Sub_grupo_estoque ".$ex->getMessage();
		}
	}
	function atualizaSub_grupo_estoque(Sub_grupo_estoque $entidadeSub_grupo_estoque, $id){
		try{
			$param = array(
				':DESCRICAO'=>$entidadeSub_grupo_estoque->get('DESCRICAO'), 
				':DataAtualizacao'=>$entidadeSub_grupo_estoque->get('DataAtualizacao'), 
				':HoraAtualizacao'=>$entidadeSub_grupo_estoque->get('HoraAtualizacao'), 
				':UsuarioAtualizacao'=>$entidadeSub_grupo_estoque->get('UsuarioAtualizacao')
			);

			$stmt = $this->pdo->prepare("UPDATE sub_grupo_estoque SET DESCRICAO = :DESCRICAO, DataAtualizacao = :DataAtualizacao, HoraAtualizacao = :HoraAtualizacao, UsuarioAtualizacao = :UsuarioAtualizacao WHERE SUB_GRUPO = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Sub_grupo_estoque ".$ex->getMessage();
		}
	}
}
?>