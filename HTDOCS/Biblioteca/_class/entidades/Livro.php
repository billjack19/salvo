<?php
class Livro{
	private $id_livro;
	private $codigo_livro;
	private $isbn_livro;
	private $nome_livro;
	private $autor_livro;
	private $id_tema;
	private $ano_livro;
	private $materia_livro;
	private $estante_livro;
	private $prateleira_livro;
	private $editora_livro;
	private $edicao_livro;
	private $idioma_livro;
	private $prazo_livro;


	public function getId_livro(){
		return $this->id_livro;
	}
	public function getCodigo_livro(){
		return $this->codigo_livro;
	}
	public function getIsbn_livro(){
		return $this->isbn_livro;
	}
	public function getNome_livro(){
		return $this->nome_livro;
	}
	public function getAutor_livro(){
		return $this->autor_livro;
	}
	public function getId_tema(){
		return $this->id_tema;
	}
	public function getAno_livro(){
		return $this->ano_livro;
	}
	public function getMateria_livro(){
		return $this->materia_livro;
	}
	public function getEstante_livro(){
		return $this->estante_livro;
	}
	public function getPrateleira_livro(){
		return $this->prateleira_livro;
	}
	public function getEditora_livro(){
		return $this->editora_livro;
	}
	public function getEdicao_livro(){
		return $this->edicao_livro;
	}
	public function getIdioma_livro(){
		return $this->idioma_livro;
	}
	public function getPrazo_livro(){
		return $this->prazo_livro;
	}
	





	public function setId_livro($id_livro){
		$this->id_livro = $id_livro;
	}
	public function setCodigo_livro($codigo_livro){
		$this->codigo_livro = $codigo_livro;
	}
	public function setIsbn_livro($isbn_livro){
		$this->isbn_livro = $isbn_livro;
	}
	public function setNome_livro($nome_livro){
		$this->nome_livro = $nome_livro;
	}
	public function setAutor_livro($autor_livro){
		$this->autor_livro = $autor_livro;
	}
	public function setId_tema($id_tema){
		$this->id_tema = $id_tema;
	}
	public function setAno_livro($ano_livro){
		$this->ano_livro = $ano_livro;
	}
	public function setMateria_livro($materia_livro){
		$this->materia_livro = $materia_livro;
	}
	public function setEstante_livro($estante_livro){
		$this->estante_livro = $estante_livro;
	}
	public function setPrateleira_livro($prateleira_livro){
		$this->prateleira_livro = $prateleira_livro;
	}
	public function setEditora_livro($editora_livro){
		$this->editora_livro = $editora_livro;
	}
	public function setEdicao_livro($edicao_livro){
		$this->edicao_livro = $edicao_livro;
	}
	public function setIdioma_livro($idioma_livro){
		$this->idioma_livro = $idioma_livro;
	}	
	public function setPrazo_livro($prazo_livro){
		$this->prazo_livro = $prazo_livro;
	}

}
?>