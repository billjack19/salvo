
<?php 
require_once "../classe/conexao.php";

class usuarioDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraUsuario(Usuario $entidadeUsuario){
		try{
			$param = array(
				':nome_usuario'=>$entidadeUsuario->get('nome_usuario'), 
				':login_usuario'=>$entidadeUsuario->get('login_usuario'), 
				':senha_usuario'=>$entidadeUsuario->get('senha_usuario'), 
				':bool_ativo_usuario'=>$entidadeUsuario->get('bool_ativo_usuario')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO usuario (nome_usuario, login_usuario, senha_usuario, bool_ativo_usuario) VALUES (:nome_usuario, :login_usuario, :senha_usuario, :bool_ativo_usuario);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Usuario ".$ex->getMessage();
		}
	}
	function atualizaUsuario(Usuario $entidadeUsuario, $id){
		try{
			$param = array(
				':nome_usuario'=>$entidadeUsuario->get('nome_usuario'), 
				':login_usuario'=>$entidadeUsuario->get('login_usuario'), 
				':senha_usuario'=>$entidadeUsuario->get('senha_usuario'), 
				':bool_ativo_usuario'=>$entidadeUsuario->get('bool_ativo_usuario')
			);

			$stmt = $this->pdo->prepare("UPDATE usuario SET nome_usuario = :nome_usuario, login_usuario = :login_usuario, senha_usuario = :senha_usuario, bool_ativo_usuario = :bool_ativo_usuario WHERE id_usuario = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Usuario ".$ex->getMessage();
		}
	}
}
?>