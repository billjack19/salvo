<?php

class Cliente{
	private $id_cliente;
	private $razao_social;
	private $tipo;
	private $inscricao_federal;
	private $bool_ativo;
	private $telefone;
	private $email;
	private $endereco;
	private $cnpj_user;

	/*private $endereco_cliente;
	private $numero_cliente;
	private $bairro_cliente;
	private $cidade_cliente;
	private $uf_cliente;
	private $cep_cliente;
	private $latidude_cliente;
	private $longitude_cliente;*/
	

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}
?>