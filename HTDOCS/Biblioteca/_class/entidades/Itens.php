<?php
class Itens{
	private $id_kit;
	private $qtd_kit;
	private $descricao_kit;
	private $descricao_produto;

	
	public function getId_kit(){
		return $this->id_kit;
	}
	public function getQtd_kit(){
		return $this->qtd_kit;
	}
	public function getDescricao_kit(){
		return $this->descricao_kit;
	}
	public function getDescricao_produto(){
		return $this->descricao_produto;
	}



	public function setId_kit($id_kit){
		$this->id_kit = $id_kit;
	}
	public function setQtd_kit($qtd_kit){
		$this->qtd_kit = $qtd_kit;
	}
	public function setDescricao_kit($descricao_kit){
		$this->descricao_kit = $descricao_kit;
	}
	public function setDescricao_produto($descricao_produto){
		$this->descricao_produto = $descricao_produto;
	}
	
	

}
?>