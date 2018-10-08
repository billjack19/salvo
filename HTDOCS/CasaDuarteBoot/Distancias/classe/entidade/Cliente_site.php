<?php

class Cliente_site{

	private $id_cliente_site;
	private $nome_cliente_site;
	private $login_cliente_site;
	private $senha_cliente_site;
	private $telefone_cliente_site;
	private $celular_cliente_site;
	private $endereco_cliente_site;
	private $numero_cliente_site;
	private $complemento_cliente_site;
	private $bairro_cliente_site;
	private $cidade_cliente_site;
	private $estado_id;
	private $cep_cliente_site;
	private $bool_ativo_cliente_site;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>