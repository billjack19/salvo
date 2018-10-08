<?php
class Kit{
	private $id_kit;
	private $descricao_kit;
	private $numero_kit;

	
	public function getId_kit(){
		return $this->id_kit;
	}
	public function getDescricao_kit(){
		return $this->descricao_kit;
	}
	public function getNumero_kit(){
		return $this->numero_kit;
	}


	public function setId_kit($id_kit){
		$this->id_kit = $id_kit;
	}
	public function setDescricao_kit($descricao_kit){
		$this->descricao_kit = $descricao_kit;
	}
	public function setNumero_kit($numero_kit){
		$this->numero_kit = $numero_kit;
	}
	
	



}
?>