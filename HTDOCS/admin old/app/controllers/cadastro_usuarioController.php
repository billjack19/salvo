
<?php 
	require_once "../classe/entidade/Usuario.php";
	require_once "../classe/dao/usuarioDAO.php";

	$entidadeUsuario = new Usuario();
	$usuarioDAO = new usuarioDAO();
	
	$entidadeUsuario->set($_POST['nome_usuario'], 'nome_usuario');
	$entidadeUsuario->set($_POST['login_usuario'], 'login_usuario');
	$entidadeUsuario->set($_POST['senha_usuario'], 'senha_usuario');
	$entidadeUsuario->set($_POST['bool_ativo_usuario'], 'bool_ativo_usuario');

	$retorno = $usuarioDAO->cadastraUsuario($entidadeUsuario);
	echo $retorno;
?>
