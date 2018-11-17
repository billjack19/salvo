<?php 

/* contatoDAO .php */
require_once "../class/conexao.php";

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
				':MENSAGEM_CONTATO'=>$entidadeContato->get('MENSAGEM_CONTATO')
				);
			
			$stmt = $this->pdo->prepare("INSERT INTO CONTATO_SITE ( DT_CONTATO, NOME_CONTATO, EMAIL_CONTATO, TELEFONE_CONTATO, ASSUNTO_CONTATO, MENSAGEM_CONTATO )  VALUES ( :DT_CONTATO, :NOME_CONTATO, :EMAIL_CONTATO, :TELEFONE_CONTATO, :ASSUNTO_CONTATO, :MENSAGEM_CONTATO );"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Contato ".$ex->getMessage();
		}
	}
	function cadastraContatoLot(Contato $entidadeContato){
		try{
			$param = array(
				':DT_CONTATO'=>$entidadeContato->get('DT_CONTATO'),
				':NOME_CONTATO'=>$entidadeContato->get('NOME_CONTATO'),
				':EMAIL_CONTATO'=>$entidadeContato->get('EMAIL_CONTATO'),
				':TELEFONE_CONTATO'=>$entidadeContato->get('TELEFONE_CONTATO'),
				':ASSUNTO_CONTATO'=>$entidadeContato->get('ASSUNTO_CONTATO'),
				':MENSAGEM_CONTATO'=>$entidadeContato->get('MENSAGEM_CONTATO'),
				':LOTEAMENTO_CONTATO'=>$entidadeContato->get('LOTEAMENTO_CONTATO'),
				':LOTE_CONTATO'=>$entidadeContato->get('LOTE_CONTATO')
				);
			
			$stmt = $this->pdo->prepare("INSERT INTO CONTATO_SITE ( DT_CONTATO, NOME_CONTATO, EMAIL_CONTATO, TELEFONE_CONTATO, ASSUNTO_CONTATO, MENSAGEM_CONTATO, LOTEAMENTO_CONTATO, LOTE_CONTATO )  VALUES ( :DT_CONTATO, :NOME_CONTATO, :EMAIL_CONTATO, :TELEFONE_CONTATO, :ASSUNTO_CONTATO, :MENSAGEM_CONTATO, :LOTEAMENTO_CONTATO, :LOTE_CONTATO );"
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
				':LOTEAMENTO_CONTATO'=>$entidadeContato->get('LOTEAMENTO_CONTATO'),
				':LOTE_CONTATO'=>$entidadeContato->get('LOTE_CONTATO')
				);

			$stmt = $this->pdo->prepare("UPDATE CONTATO_SITE SET  DT_CONTATO = :DT_CONTATO, NOME_CONTATO = :NOME_CONTATO, EMAIL_CONTATO = :EMAIL_CONTATO, TELEFONE_CONTATO = :TELEFONE_CONTATO, ASSUNTO_CONTATO = :ASSUNTO_CONTATO, MENSAGEM_CONTATO = :MENSAGEM_CONTATO, LOTEAMENTO_CONTATO = :LOTEAMENTO_CONTATO, LOTE_CONTATO = :LOTE_CONTATO WHERE ID_CONTATO_SITE = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Contato ".$ex->getMessage();
		}
	}


	function cadastraContatoTotos(Contato $entidadeContato){
		try{
			$param = array(
				':DT_CONTATO'=>$entidadeContato->get('DT_CONTATO'),
				':NOME_CONTATO'=>$entidadeContato->get('NOME_CONTATO'),
				':EMAIL_CONTATO'=>$entidadeContato->get('EMAIL_CONTATO'),
				':TELEFONE_CONTATO'=>$entidadeContato->get('TELEFONE_CONTATO'),
				':ASSUNTO_CONTATO'=>$entidadeContato->get('ASSUNTO_CONTATO'),
				':MENSAGEM_CONTATO'=>$entidadeContato->get('MENSAGEM_CONTATO'),
				':LOTEAMENTO_CONTATO'=>$entidadeContato->get('LOTEAMENTO_CONTATO'),
				':LOTE_CONTATO'=>$entidadeContato->get('LOTE_CONTATO'),
				':DS_RETORNO'=>$entidadeContato->get('DS_RETORNO'),
				':DS_EMAIL_RETORNO'=>$entidadeContato->get('DS_EMAIL_RETORNO'),
				':DT_RETORNO'=>$entidadeContato->get('DT_RETORNO'),
				':FLAG_RETORNO'=>$entidadeContato->get('FLAG_RETORNO'),
				':DataAtualizacao'=>$entidadeContato->get('DataAtualizacao'),
				':HoraAtualizacao'=>$entidadeContato->get('HoraAtualizacao'),
				':UsuarioAtualizacao'=>$entidadeContato->get('UsuarioAtualizacao')
				);
			
			$stmt = $this->pdo->prepare("INSERT INTO CONTATO_SITE ( DT_CONTATO, NOME_CONTATO, EMAIL_CONTATO, TELEFONE_CONTATO, ASSUNTO_CONTATO, MENSAGEM_CONTATO, LOTEAMENTO_CONTATO, LOTE_CONTATO, DS_RETORNO, DS_EMAIL_RETORNO, DT_RETORNO, FLAG_RETORNO, DataAtualizacao, HoraAtualizacao, UsuarioAtualizacao ) VALUES ( :DT_CONTATO, :NOME_CONTATO, :EMAIL_CONTATO, :TELEFONE_CONTATO, :ASSUNTO_CONTATO, :MENSAGEM_CONTATO, :LOTEAMENTO_CONTATO, :LOTE_CONTATO, :DS_RETORNO, :DS_EMAIL_RETORNO, :DT_RETORNO, :FLAG_RETORNO, :DataAtualizacao, :HoraAtualizacao, :UsuarioAtualizacao );"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Contato ".$ex->getMessage();
		}
	}
	function atualizaContatoTodos(Contato $entidadeContato, $id){
		try{
			$param = array(
				':DT_CONTATO'=>$entidadeContato->get('DT_CONTATO'),
				':NOME_CONTATO'=>$entidadeContato->get('NOME_CONTATO'),
				':EMAIL_CONTATO'=>$entidadeContato->get('EMAIL_CONTATO'),
				':TELEFONE_CONTATO'=>$entidadeContato->get('TELEFONE_CONTATO'),
				':ASSUNTO_CONTATO'=>$entidadeContato->get('ASSUNTO_CONTATO'),
				':MENSAGEM_CONTATO'=>$entidadeContato->get('MENSAGEM_CONTATO'),
				':LOTEAMENTO_CONTATO'=>$entidadeContato->get('LOTEAMENTO_CONTATO'),
				':LOTE_CONTATO'=>$entidadeContato->get('LOTE_CONTATO'),
				':DS_RETORNO'=>$entidadeContato->get('DS_RETORNO'),
				':DS_EMAIL_RETORNO'=>$entidadeContato->get('DS_EMAIL_RETORNO'),
				':DT_RETORNO'=>$entidadeContato->get('DT_RETORNO'),
				':FLAG_RETORNO'=>$entidadeContato->get('FLAG_RETORNO'),
				':DataAtualizacao'=>$entidadeContato->get('DataAtualizacao'),
				':HoraAtualizacao'=>$entidadeContato->get('HoraAtualizacao'),
				':UsuarioAtualizacao'=>$entidadeContato->get('UsuarioAtualizacao')
				);

			$stmt = $this->pdo->prepare("UPDATE CONTATO_SITE SET  DT_CONTATO = :DT_CONTATO, NOME_CONTATO = :NOME_CONTATO, EMAIL_CONTATO = :EMAIL_CONTATO, TELEFONE_CONTATO = :TELEFONE_CONTATO, ASSUNTO_CONTATO = :ASSUNTO_CONTATO, MENSAGEM_CONTATO = :MENSAGEM_CONTATO, LOTEAMENTO_CONTATO = :LOTEAMENTO_CONTATO, LOTE_CONTATO = :LOTE_CONTATO, DS_RETORNO = :DS_RETORNO, DS_EMAIL_RETORNO = :DS_EMAIL_RETORNO, DT_RETORNO = :DT_RETORNO, FLAG_RETORNO = :FLAG_RETORNO, DataAtualizacao = :DataAtualizacao, HoraAtualizacao = :HoraAtualizacao, UsuarioAtualizacao = :UsuarioAtualizacao WHERE ID_CONTATO_SITE = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Contato ".$ex->getMessage();
		}
	}
}
?>