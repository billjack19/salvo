<?php 
	require_once "../_class/entidades/Livro.php";
	require_once "../_class/dao/livroDAO.php";

	$entidadeLivro = new Livro();
	$livroDAO = new livroDAO();

	$contErro = 0;

	//$entidadeLivro->setId_livro($_POST['id_livro']);
	$entidadeLivro->setCodigo_livro($_POST['codigo']);
	$entidadeLivro->setIsbn_livro($_POST['isbn']);
	$entidadeLivro->setNome_livro($_POST['nome']);
	$entidadeLivro->setAutor_livro($_POST['autor']);
	$entidadeLivro->setId_tema($_POST['tema']);

	if ($_POST['tema'] === 'Didático') {
		$entidadeLivro->setAno_livro($_POST['ano']);
		$entidadeLivro->setMateria_livro($_POST['materias']);
	}
	else if ($_POST['tema'] === 'Dicionario') {
		$entidadeLivro->setIdioma_livro($_POST['idioma']);
	}

	if ($_POST['estante'] != '') {
		$entidadeLivro->setEstante_livro($_POST['estante']);
	}

	if ($_POST['prateleira'] != '') {
		$entidadeLivro->setPrateleira_livro($_POST['prateleira']);
	}

	if ($_POST['editora'] != '') {
		$entidadeLivro->setEditora_livro($_POST['editora']);
	}

	if ($_POST['edicao'] != '') {
		$entidadeLivro->setEdicao_livro($_POST['edicao']);
	}

	$entidadeLivro->setPrazo_livro($_POST['prazo']);

	$retorno = $livroDAO->cadastraLivro($entidadeLivro);
	echo $retorno;

	// if ($_POST['idioma'] == '') {
	// 	$entidadeLivro->setIdioma_livro('null');
	// }
	// else $entidadeLivro->setIdioma_livro($_POST['idioma']);
		// if ($_POST['ano'] == 1) {
	// 	$entidadeLivro->setAno_livro('null');
	// }
	// else $entidadeLivro->setAno_livro($_POST['ano']);

	// if ($_POST['materias'] == 1) {
	// 		$entidadeLivro->setMateria_livro(' ');
	// }
	// else $entidadeLivro->setMateria_livro($_POST['materias']);

 ?>