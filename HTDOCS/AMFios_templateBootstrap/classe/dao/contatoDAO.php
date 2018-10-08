
<?php 
require_once "../classe/conexao.php";

class contatoDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraContato(Contato $entidadeContato){
		try{
			$param = array(
				':DT_CONTATO'=>$entidadeContato->get('DT_CONTATO'), 
				':NOME_CONTATO'=>$entidadeContato->get('NOME_CONTATO'), 
				':EMAIL_CONTATO'=>$entidadeContato->get('EMAIL_CONTATO'), 
				':TELEFONE_CONTATO'=>$entidadeContato->get('TELEFONE_CONTATO'), 
				':ASSUNTO_CONTATO'=>$entidadeContato->get('ASSUNTO_CONTATO'), 
				':MENSAGEM_CONTATO'=>$entidadeContato->get('MENSAGEM_CONTATO'), 
				':ARQUIVO_CONTATO'=>$entidadeContato->get('ARQUIVO_CONTATO'), 
				':bool_ativo_contato'=>$entidadeContato->get('bool_ativo_contato')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO contato (DT_CONTATO, NOME_CONTATO, EMAIL_CONTATO, TELEFONE_CONTATO, ASSUNTO_CONTATO, MENSAGEM_CONTATO, ARQUIVO_CONTATO, bool_ativo_contato) VALUES (:DT_CONTATO, :NOME_CONTATO, :EMAIL_CONTATO, :TELEFONE_CONTATO, :ASSUNTO_CONTATO, :MENSAGEM_CONTATO, :ARQUIVO_CONTATO, :bool_ativo_contato);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Contato ".$ex->getMessage();
		}
	}
	function atualizaContato(Contato $entidadeContato, $id){
		try{
			$param = array(
				':DT_CONTATO'=>$entidadeContato->get('DT_CONTATO'), 
				':NOME_CONTATO'=>$entidadeContato->get('NOME_CONTATO'), 
				':EMAIL_CONTATO'=>$entidadeContato->get('EMAIL_CONTATO'), 
				':TELEFONE_CONTATO'=>$entidadeContato->get('TELEFONE_CONTATO'), 
				':ASSUNTO_CONTATO'=>$entidadeContato->get('ASSUNTO_CONTATO'), 
				':MENSAGEM_CONTATO'=>$entidadeContato->get('MENSAGEM_CONTATO'), 
				':ARQUIVO_CONTATO'=>$entidadeContato->get('ARQUIVO_CONTATO'), 
				':bool_ativo_contato'=>$entidadeContato->get('bool_ativo_contato')
			);

			$stmt = $this->pdo->prepare("UPDATE contato SET DT_CONTATO = :DT_CONTATO, NOME_CONTATO = :NOME_CONTATO, EMAIL_CONTATO = :EMAIL_CONTATO, TELEFONE_CONTATO = :TELEFONE_CONTATO, ASSUNTO_CONTATO = :ASSUNTO_CONTATO, MENSAGEM_CONTATO = :MENSAGEM_CONTATO, ARQUIVO_CONTATO = :ARQUIVO_CONTATO, bool_ativo_contato = :bool_ativo_contato WHERE ID_CONTATO = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Contato ".$ex->getMessage();
		}
	}
}
?>