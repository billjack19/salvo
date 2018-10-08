<?php

class Area_acesso{

	var $id_area_nivel_acesso;
	var $area_area_nivel_acesso;
	var $demostrativo_area_nivel_acesso;
	var $bool_list_area_nivel_acesso;
	var $bool_insert_area_nivel_acesso;
	var $bool_update_area_nivel_acesso;
	var $data_atualizacao_area_nivel_acesso;
	var $usuario_id;
	var $bool_ativo_area_nivel_acesso;


	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>