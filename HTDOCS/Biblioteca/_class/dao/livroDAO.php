<?php 
require_once "../_class/Conexao2.php";
class livroDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraLivro(Livro $entidadeLivro){
		try{
			$param = array( 
				':codigo_livro'=>$entidadeLivro->getCodigo_livro(),
				':isbn_livro'=>$entidadeLivro->getIsbn_livro(),
				':nome_livro'=>$entidadeLivro->getNome_livro(),
				':autor_livro'=>$entidadeLivro->getAutor_livro(),
				':id_tema'=>$entidadeLivro->getId_tema(),
				':ano_livro'=>$entidadeLivro->getAno_livro(),
				':materia_livro'=>$entidadeLivro->getMateria_livro(),
				':estante_livro'=>$entidadeLivro->getEstante_livro(),
				':prateleira_livro'=>$entidadeLivro->getPrateleira_livro(),
				':editora_livro'=>$entidadeLivro->getEditora_livro(),
				':edicao_livro'=>$entidadeLivro->getEdicao_livro(),
				':idioma_livro'=>$entidadeLivro->getIdioma_livro(),
				':prazo_livro'=>$entidadeLivro->getPrazo_livro()
			);

			$stmt = $this->pdo->prepare("INSERT INTO livro VALUES ( 'null' , :codigo_livro , :isbn_livro , :nome_livro ,  :autor_livro , :id_tema , :ano_livro , :materia_livro , :estante_livro , :prateleira_livro  , :editora_livro , :edicao_livro , :idioma_livro , :prazo_livro , 1 , 0)");
			
			return $stmt->execute($param);

		}catch(PDOException $ex){
			return "Erro ao cadastrar Livro".$ex->getMessage();
		}
	}

	function pegaIdLivro($livro){
		$sql = "SELECT * FROM livro where ID_LIVRO = '".$livro."';";
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}






	//SELECT da função;
	function pesquisaLivro(Livro $entidadeLivro){
		try{
			$where = "";
			if (!empty($entidadeLivro->getId_livro())) {
				if (!empty($where)) {
						$where.="WHERE ID_LIVRO=".$entidadeLivro->getId_livro();
				}
				else $where.="AND ID_LIVRO=".$entidadeLivro->getId_livro();
			}
			if (!empty($entidadeLivro->getCodigo_livro())) {
				if (!empty($where)) {
						$where.="WHERE CODIGO_LIVRO=".$entidadeLivro->getCodigo_livro();
				}
				else $where.="AND CODIGO_LIVRO LIKE '%".$entidadeLivro->getCodigo_livro()."%'";
			}
			if (!empty($entidadeLivro->getIsbn_livro())) {
				if (!empty($where)) {
						$where.="WHERE ISBN=".$entidadeLivro->getIsbn_livro();
				}
				else $where.="AND ISBN LIKE '%".$entidadeLivro->getIsbn_livro()."%'";
			}
			if (!empty($entidadeLivro->getNome_livro())) {
				if (!empty($where)) {
						$where.="WHERE NOME_LIVRO=".$entidadeLivro->getNome_livro();
				}
				else $where.="AND NOME_LIVRO LIKE '%".$entidadeLivro->getNome_livro()."%'";
			}
			if (!empty($entidadeLivro->getAutor_livro())) {
				if (!empty($where)) {
						$where.="WHERE AUTOR_LIVRO=".$entidadeLivro->getAutor_livro();
				}
				else $where.="AND AUTOR_LIVRO LIKE '%".$entidadeLivro->getAutor_livro()."%'";
			}
			if (!empty($entidadeLivro->getId_tema())) {
				if (!empty($where)) {
						$where.="WHERE TEMA_LIVRO=".$entidadeLivro->getId_tema();
				}
				else $where.="AND TEMA_LIVRO LIKE '%".$entidadeLivro->getId_tema()."%'";
			}
			if (!empty($entidadeLivro->getAno_livro())) {
				if (!empty($where)) {
						$where.="WHERE ANO_LIVRO=".$entidadeLivro->getAno_livro();
				}
				else $where.="AND ANO_LIVRO LIKE '%".$entidadeLivro->getAno_livro()."%'";
			}
			if (!empty($entidadeLivro->getMateria_livro())) {
				if (!empty($where)) {
						$where.="WHERE MATERIA_LIVRO=".$entidadeLivro->getMateria_livro();
				}
				else $where.="AND MATERIA_LIVRO LIKE '%".$entidadeLivro->getMateria_livro()."%'";
			}
			if (!empty($entidadeLivro->getEstante_livro())) {
				if (!empty($where)) {
						$where.="WHERE ESTANTE_LIVRO=".$entidadeLivro->getEstante_livro();
				}
				else $where.="AND ANO_LIVRO LIKE '%".$entidadeLivro->getEstante_livro()."%'";
			}
			if (!empty($entidadeLivro->getPrateleira_livro())) {
				if (!empty($where)) {
						$where.="WHERE PRATELEIRA_LIVRO=".$entidadeLivro->getPrateleira_livro();
				}
				else $where.="AND PRATELEIRA_LIVRO LIKE '%".$entidadeLivro->getPrateleira_livro()."%'";
			}
			if (!empty($entidadeLivro->getEditora_livro())) {
				if (!empty($where)) {
						$where.="WHERE EDITORA_LIVRO=".$entidadeLivro->getEditora_livro();
				}
				else $where.="AND EDITORA_LIVRO LIKE '%".$entidadeLivro->getEditora_livro()."%'";
			}
			if (!empty($entidadeLivro->getEdicao_livro())) {
				if (!empty($where)) {
						$where.="WHERE EDICAO_LIVRO=".$entidadeLivro->getEdicao_livro();
				}
				else $where.="AND EDICAO_LIVRO LIKE '%".$entidadeLivro->getEdicao_livro()."%'";
			}
			if (!empty($entidadeLivro->getIdioma_livro())) {
				if (!empty($where)) {
						$where.="WHERE IDIOMA_LIVRO=".$entidadeLivro->getIdioma_livro();
				}
				else $where.="AND IDIOMA_LIVRO LIKE '%".$entidadeLivro->getIdioma_livro()."%'";
			}
			if (!empty($entidadeLivro->getPrazo_livro())) {
				if (!empty($where)) {
						$where.="WHERE PRAZO_LIVRO=".$entidadeLivro->getPrazo_livro();
				}
				else $where.="AND PRAZO_LIVRO LIKE '%".$entidadeLivro->getPrazo_livro()."%'";
			}

			$sql = "SELECT * FROM livro ".$where." ORDER BY ID_LIVRO";
			$stmt = $this->pdo->prepare($sql);
			$stmt_>execute();
			$retorno = '';

			if (!$stmt->rowCount()) {
				$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

				return $retorno;
			}
		}catch(PDOException $ex){
			return "Erro ao consultar Livro: ".$ex->getMessage();
		}
	}
}
?>