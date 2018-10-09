
<?php 
require_once "../classe/conexao.php";

class sub_grupoDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraSub_grupo(Sub_grupo $entidadeSub_grupo){
		try{
			$param = array(
				':descricao_sub_grupo'=>$entidadeSub_grupo->get('descricao_sub_grupo'), 
				':grupo_id'=>$entidadeSub_grupo->get('grupo_id'), 
				':data_atualizacao_sub_grupo'=>$entidadeSub_grupo->get('data_atualizacao_sub_grupo'), 
				':usuario_id'=>$entidadeSub_grupo->get('usuario_id'), 
				':imagem_sub_grupo'=>$entidadeSub_grupo->get('imagem_sub_grupo'), 
				':bool_ativo_sub_grupo'=>$entidadeSub_grupo->get('bool_ativo_sub_grupo')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO sub_grupo (descricao_sub_grupo, grupo_id, data_atualizacao_sub_grupo, usuario_id, imagem_sub_grupo, bool_ativo_sub_grupo) VALUES (:descricao_sub_grupo, :grupo_id, :data_atualizacao_sub_grupo, :usuario_id, :imagem_sub_grupo, :bool_ativo_sub_grupo);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Sub_grupo ".$ex->getMessage();
		}
	}
	function atualizaSub_grupo(Sub_grupo $entidadeSub_grupo, $id){
		try{
			$param = array(
				':descricao_sub_grupo'=>$entidadeSub_grupo->get('descricao_sub_grupo'), 
				':grupo_id'=>$entidadeSub_grupo->get('grupo_id'), 
				':data_atualizacao_sub_grupo'=>$entidadeSub_grupo->get('data_atualizacao_sub_grupo'), 
				':usuario_id'=>$entidadeSub_grupo->get('usuario_id'), 
				':imagem_sub_grupo'=>$entidadeSub_grupo->get('imagem_sub_grupo'), 
				':bool_ativo_sub_grupo'=>$entidadeSub_grupo->get('bool_ativo_sub_grupo')
			);

			$stmt = $this->pdo->prepare("UPDATE sub_grupo SET descricao_sub_grupo = :descricao_sub_grupo, grupo_id = :grupo_id, data_atualizacao_sub_grupo = :data_atualizacao_sub_grupo, usuario_id = :usuario_id, imagem_sub_grupo = :imagem_sub_grupo, bool_ativo_sub_grupo = :bool_ativo_sub_grupo WHERE id_sub_grupo = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Sub_grupo ".$ex->getMessage();
		}
	}
}
?>