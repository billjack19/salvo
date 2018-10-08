<?php

class Contato{

	private $id_contato;
	private $nome_contato;
	private $email_contato;
	private $telefone_contato;
	private $assunto_contato;
	private $mensagem_contato;
	private $usuario_id;
	private $data_atualizacao_contato;
	private $bool_ativo_contato;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>