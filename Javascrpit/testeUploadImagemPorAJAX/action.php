<?php
require 'conexao.php';

$acao         = (isset($_POST['acao'])) ? $_POST['acao'] : '';
$id           = (isset($_POST['id'])) ? $_POST['id'] : '';
$nome         = (isset($_POST['nome'])) ? $_POST['nome'] : '';
$escudo_atual = (isset($_POST['escudo_atual'])) ? $_POST['escudo_atual'] : '';
$conexao      = Conexao::getInstance();
$retorno      = array();

if ($acao == 'incluir'):

	$nome_escudo = 'padrao.jpg';
	if(isset($_FILES['imagem']) && $_FILES['imagem']['size'] > 0):  

		$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
		$array_extensoes   = explode('.', $_FILES['imagem']['name']);
	    $extensao = strtolower(end($array_extensoes));

	     // Validamos se a extensão do arquivo é aceita
	    if (array_search($extensao, $extensoes_aceitas) === false):
	   	   $retorno = array('status' => 0, 'mensagem' => 'Extensão Inválida!');
	       echo json_encode($retorno);
	       exit(); 
	    endif;

	     // Verifica se o upload foi enviado via POST   
	     if(is_uploaded_file($_FILES['imagem']['tmp_name'])):  
	             
	          // Verifica se o diretório de destino existe, senão existir cria o diretório  
	          if(!file_exists("img")):  
	               mkdir("img");  
	          endif;  
	  
	          // Monta o caminho de destino com o nome do arquivo  
	          $nome_escudo = date('dmY') . '_' . $_FILES['imagem']['name'];  
	            
	          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
	          if (!move_uploaded_file($_FILES['imagem']['tmp_name'], 'img/'. $nome_escudo)):  
	               $retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao gravar arquivo na pasta de destino!'); 
	               echo json_encode($retorno);
	               exit();  
	          endif;  
	     endif;  
	endif;

	$sql = 'INSERT INTO times (nome, escudo)VALUES(:nome, :escudo)';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $nome);
	$stm->bindValue(':escudo', $nome_escudo);
	$retorno = $stm->execute();

	if($retorno):
		$retorno = array('status' => '1', 'mensagem' => 'REGISTRO INSERIDO COM SUCESSO!');
	else:
		$retorno = array('status' => '0', 'mensagem' => 'ERRO AO INSERIR REGISTRO!');
	endif;

	echo json_encode($retorno);
endif;


if ($acao == 'editar'):


	if(isset($_FILES['imagem']) && $_FILES['imagem']['size'] > 0):  

		// Verifica se a foto é diferente da padrão, se verdadeiro exclui a foto antiga da pasta
		if ($escudo_atual <> 'padrao.jpg' && file_exists("img/" . $escudo_atual)):
			unlink("img/" . $escudo_atual);
		endif;

		$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
		$array_extensoes   = explode('.', $_FILES['imagem']['name']);
	    $extensao = strtolower(end($array_extensoes));

	     // Validamos se a extensão do arquivo é aceita
	    if (array_search($extensao, $extensoes_aceitas) === false):
	       $retorno = array('status' => 0, 'mensagem' => 'Extensão Inválida!');
	       echo json_encode($retorno);
	       exit(); 
	    endif;

	     // Verifica se o upload foi enviado via POST   
	     if(is_uploaded_file($_FILES['imagem']['tmp_name'])):  
	             
	          // Verifica se o diretório de destino existe, senão existir cria o diretório  
	          if(!file_exists("img")):  
	               mkdir("img");  
	          endif;  
	  
	          // Monta o caminho de destino com o nome do arquivo  
	          $nome_escudo = date('dmY') . '_' . $_FILES['imagem']['name'];  
	            
	          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
	          if (!move_uploaded_file($_FILES['imagem']['tmp_name'], 'img/'. $nome_escudo)):  
	               $retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao gravar arquivo na pasta de destino!');
	               echo json_encode($retorno);
	               exit();  
	          endif;  
	     endif; 
	else:
		$nome_escudo = $escudo_atual;      
	endif;

	$sql = 'UPDATE times SET nome=:nome, escudo=:escudo WHERE id=:id';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $nome);
	$stm->bindValue(':escudo', $nome_escudo);
	$stm->bindValue(':id', $id);
	$retorno = $stm->execute();

	if($retorno):
		$retorno = array('status' => '1', 'mensagem' => 'REGISTRO EDITADO COM SUCESSO!');
	else:
		$retorno = array('status' => '0', 'mensagem' => 'ERRO AO EDITAR REGISTRO!');
	endif;

	echo json_encode($retorno);
endif;