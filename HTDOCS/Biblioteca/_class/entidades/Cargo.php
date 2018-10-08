<?php
class Cargo{
	private $id_cargo;
	private $descricao_cargo;

	public function getId_cargo(){
		return $this->id_cargo;
	}
	public function getDSescricao_cargo(){
		return $this->descricao_cargo;
	}
	public function setId_cargo($id_cargo){
		$this->id_cargo = $id_cargo;
	}
	public function setDescricao_cargo($descricao_cargo){
		$this->descricao_cargo = $descricao_cargo;
	}
}
?>