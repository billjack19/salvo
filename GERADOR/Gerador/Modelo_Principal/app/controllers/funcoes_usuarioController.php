<?php
ob_start();
session_start();

require_once "../classe/conexao.php";
require_once "../classe/entidade/Usuario.php";
require_once "../classe/entidade/Area_acesso.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_usuario'])) {

	$usuario = new Usuario(); 		/* Usuario logado */
	$usuarioCtrl = new Usuario(); 	/* Objeto de COntrole */
	$area = new Area_acesso(); 		/* Objeto de COntrole */
	$usuariosArray = array(); 		/* Outros Usuario */

	$id_usuarioLogado = $_SESSION['login']; /* VERIFICAÇÃO DO ID CONSULTADO COM O USUARIO LOGADO */

	/* Variaveis e Configuração Padrão */
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$minha_area_nivel_acesso = "";
	$area_nivel_acesso = "";
	$sqlComplemento = "";
	$bool_pode_mostrar = false;
	$cont = 1;
	$cont_nivel = 0;
	
	$arrayGererico = array();

	$sql = "SELECT 
				  area_nivel_acesso.area_area_nivel_acesso
				, area_nivel_acesso.bool_list_area_nivel_acesso
				, area_nivel_acesso.bool_insert_area_nivel_acesso
				, area_nivel_acesso.bool_update_area_nivel_acesso
				, area_nivel_acesso.nivel_acesso_id
				, nivel_acesso.descricao_nivel_acesso
				, usuario.id_usuario
				, usuario.nome_usuario
				, usuario.login_usuario
				, usuario.bool_ativo_usuario
			FROM 
				area_nivel_acesso
			INNER JOIN 
				nivel_acesso ON area_nivel_acesso.nivel_acesso_id = nivel_acesso.id_nivel_acesso
			INNER JOIN 
				usuario ON usuario.nivel_acesso_id = nivel_acesso.id_nivel_acesso
			WHERE (
				   area_nivel_acesso.area_area_nivel_acesso LIKE '%$filtro%'
				-- OR area_nivel_acesso.bool_list_area_nivel_acesso LIKE '%$filtro%'
				-- OR area_nivel_acesso.bool_insert_area_nivel_acesso LIKE '%$filtro%'
				-- OR area_nivel_acesso.bool_update_area_nivel_acesso LIKE '%$filtro%'
				-- OR area_nivel_acesso.nivel_acesso_id LIKE '%$filtro%'
				OR nivel_acesso.descricao_nivel_acesso LIKE '%$filtro%'
				-- OR usuario.id_usuario LIKE '%$filtro%'
				OR usuario.nome_usuario LIKE '%$filtro%'
				OR usuario.login_usuario LIKE '%$filtro%')
			ORDER BY usuario.id_usuario";

	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados){
		$area = new Area_acesso();
		$area->set($dados['area_area_nivel_acesso'], 		'area_area_nivel_acesso'		);
		$area->set($dados['bool_list_area_nivel_acesso'], 	'bool_list_area_nivel_acesso'	);
		$area->set($dados['bool_insert_area_nivel_acesso'], 'bool_insert_area_nivel_acesso'	);
		$area->set($dados['bool_update_area_nivel_acesso'], 'bool_update_area_nivel_acesso'	);

		if ($id_usuarioLogado = $dados['id_usuario']){
			$usuario->set($dados['id_usuario'], 			'id_usuario'			);
			$usuario->set($dados['nome_usuario'], 			'nome_usuario'			);
			$usuario->set($dados['login_usuario'], 			'login_usuario'			);
			$usuario->set($dados['descricao_nivel_acesso'], 'descricao_nivel_acesso');
			$usuario->set($dados['nivel_acesso_id'], 		'nivel_acesso_id'		);
			$usuario->set($dados['bool_ativo_usuario'], 	'bool_ativo_usuario'	);

			if (gettype($usuario->get('areas')) == "string") { 
				$usuario->set($arrayGererico, 'areas');
			}
			array_push($usuario->get('areas'), $area);
		}

		if (
			sizeof($usuariosArray) == 0 
				|| 
			$usuariosArray[sizeof($usuariosArray) -1]->get("id_usuario") != $dados['id_usuario'] 
		) {
			$usuarioCtrl = new Usuario();
			$usuarioCtrl->set($dados['id_usuario'], 			'id_usuario'			);
			$usuarioCtrl->set($dados['nome_usuario'], 			'nome_usuario'			);
			$usuarioCtrl->set($dados['login_usuario'], 			'login_usuario'			);
			$usuarioCtrl->set($dados['descricao_nivel_acesso'], 'descricao_nivel_acesso');
			$usuarioCtrl->set($dados['nivel_acesso_id'], 		'nivel_acesso_id'		);
			$usuarioCtrl->set($dados['bool_ativo_usuario'], 	'bool_ativo_usuario'	);

			$usuarioCtrl->set($arrayGererico, 'areas');
			// $->get('areas') = array();
			array_push($usuarioCtrl->get('areas'), $area);
			array_push($usuariosArray, $usuarioCtrl);
		} else {
			array_push($usuariosArray[sizeof($usuariosArray) -1]->get('areas'), $area);
		}
	}

	echo "ignora/*/*/*/*/*/";

	for ($i=0; $i < sizeof($usuariosArray); $i++) { 
		$bool_pode_mostrar = true;
		$areaDaVez = $usuariosArray[$i]->get('areas');
		for ($j=0; $j < sizeof($areaDaVez); $j++) { 
			if (!in_array($areaDaVez[$j], $usuario->get('areas'))){
				$bool_pode_mostrar = false;
			}
		}
		if ($bool_pode_mostrar) {
			if ($cont ==  1) {
				echo 	
						$usuariosArray[$i]->get("id_usuario")."{,}".
						$usuariosArray[$i]->get("nome_usuario")."{,}".
						$usuariosArray[$i]->get("login_usuario")."{,}".
						// $usuariosArray[$i]->get("senha_usuario")."{,}".
						$usuariosArray[$i]->get("nivel_acesso_id")."{,}".
						$usuariosArray[$i]->get("bool_ativo_usuario");
			} else {
				echo    "[]".
						$usuariosArray[$i]->get("id_usuario")."{,}".
						$usuariosArray[$i]->get("nome_usuario")."{,}".
						$usuariosArray[$i]->get("login_usuario")."{,}".
						// $usuariosArray[$i]->get("senha_usuario")."{,}".
						$usuariosArray[$i]->get("nivel_acesso_id")."{,}".
						$usuariosArray[$i]->get("bool_ativo_usuario");
			}
			$cont++;
		}
	}
	

	/*
	
	OLD FUNCTION

	$filtro = "";
	$minha_area_nivel_acesso = "";
	$area_nivel_acesso = "";
	$sqlComplemento = "";
	$bool_pode_mostrar = false;
	$cont = 1;
	$cont_nivel = 0;

	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}

	$sql = "SELECT area_nivel_acesso FROM nivel_acesso
			WHERE id_nivel_acesso = (
				SELECT nivel_acesso_id FROM usuario WHERE id_usuario = ".$_SESSION['login']."
			);";

	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) $minha_area_nivel_acesso = explode("+", $dados[0]);


	$sql = "SELECT id_nivel_acesso, area_nivel_acesso FROM nivel_acesso;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$bool_pode_mostrar = true;
		$area_nivel_acesso  = explode("+", $dados['area_nivel_acesso']);

		for ($i=0; $i < sizeof($area_nivel_acesso); $i++) { 
			if (!in_array($area_nivel_acesso[$i], $minha_area_nivel_acesso)){
				$bool_pode_mostrar = false;
				$i = sizeof($area_nivel_acesso);
			}
		}

		if ($bool_pode_mostrar) {
			if ($cont_nivel == 0) {
				$sqlComplemento = " AND ( nivel_acesso_id = ".$dados['id_nivel_acesso'];
			}
			else {
				$sqlComplemento .= " OR nivel_acesso_id = ".$dados['id_nivel_acesso'];
			}
			$cont_nivel++;
		}
	}

	$sqlComplemento = $sqlComplemento != "" ? $sqlComplemento . " )" : "";



	$sql = "	SELECT usuario.* 
				FROM usuario usuario  
				WHERE ( nome_usuario LIKE '%$filtro%'
					OR  login_usuario LIKE '%$filtro%'
				)
				$sqlComplemento
			";

	echo $sql;
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_usuario"]."{,}".
					$dados["nome_usuario"]."{,}".
					$dados["login_usuario"]."{,}".
					$dados["senha_usuario"]."{,}".
					$dados["nivel_acesso_id"]."{,}".
					$dados["bool_ativo_usuario"];
		} else {
			echo    "[]".
					$dados["id_usuario"]."{,}".
					$dados["nome_usuario"]."{,}".
					$dados["login_usuario"]."{,}".
					$dados["senha_usuario"]."{,}".
					$dados["nivel_acesso_id"]."{,}".
					$dados["bool_ativo_usuario"];
		}
		$cont++;
	}
	*/
}

if (!empty($_POST['pequisa_usuario_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT usuario.* 
				FROM usuario usuario
				WHERE id_usuario = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_usuario"]."{,}".
					$dados["nome_usuario"]."{,}".
					$dados["login_usuario"]."{,}".
					$dados["senha_usuario"]."{,}".
					$dados["nivel_acesso_id"]."{,}".
					$dados["bool_ativo_usuario"];
	}
}




if (!empty($_POST['pequisa_usuario_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT usuario.* 
				FROM usuario usuario 
				WHERE $coluna = $id 
				AND (
					   nome_usuario LIKE '%$filtro%'
					OR login_usuario LIKE '%$filtro%'
					OR senha_usuario LIKE '%$filtro%'
					OR bool_ativo_usuario LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_usuario"]."{,}".
					$dados["nome_usuario"]."{,}".
					$dados["login_usuario"]."{,}".
					$dados["senha_usuario"]."{,}".
					$dados["nivel_acesso_id"]."{,}".
					$dados["bool_ativo_usuario"];
		} else {
			echo    "[]".
					$dados["id_usuario"]."{,}".
					$dados["nome_usuario"]."{,}".
					$dados["login_usuario"]."{,}".
					$dados["senha_usuario"]."{,}".
					$dados["nivel_acesso_id"]."{,}".
					$dados["bool_ativo_usuario"];
		}
		$cont++;
	}
}




if (!empty($_POST['atualizar'])) {
	$gravar = true;
	$saida = "";

	$sql = "SELECT COUNT(*), login_usuario 
			FROM usuario 
			WHERE login_usuario = '".$_POST['login_usuario']."'
			OR id_usuario = ".$_POST['id_usuario'].";";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($dados[0] > 1): $gravar = false; $saida = "O Login não pode ser esse!"; endif;
	}

	if ($gravar) {
		
		$nome_usuario = $_POST['nome_usuario'];
		$login_usuario = $_POST['login_usuario'];
		$nivel_acesso_id = $_POST['nivel_acesso_id'];
		$bool_ativo_usuario = $_POST['bool_ativo_usuario'];
		$id = $_POST['id_usuario'];


		$sql = "UPDATE usuario SET nome_usuario = '$nome_usuario', login_usuario = '$login_usuario', nivel_acesso_id = $nivel_acesso_id, bool_ativo_usuario = $bool_ativo_usuario WHERE id_usuario = $id;";

		$stmt = $pdo->prepare($sql);
		echo $stmt->execute();
	}
	else echo $saida;
}




if (!empty($_POST['cadastrar'])) {
	$gravar = true;
	$saida = "";

	$sql = "SELECT COUNT(*) 
			FROM usuario 
			WHERE login_usuario = '".$_POST['login_usuario']."'";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($dados[0] > 0): $gravar = false; $saida = "O Login não pode ser esse!"; endif;
	}

	if ($gravar) {		
		$nome_usuario = $_POST['nome_usuario'];
		$login_usuario = $_POST['login_usuario'];
		$senha_usuario = $_POST['senha_usuario'];
		$nivel_acesso_id = $_POST['nivel_acesso_id'];
		$bool_ativo_usuario = $_POST['bool_ativo_usuario'];

		$sql = "INSERT INTO usuario (nome_usuario, login_usuario, senha_usuario, nivel_acesso_id, bool_ativo_usuario) VALUES ('$nome_usuario', '$login_usuario', PASSWORD('$senha_usuario'), $nivel_acesso_id, $bool_ativo_usuario);";

		$stmt = $pdo->prepare($sql);
		echo $stmt->execute();
	}
	else echo $saida;
}

?>