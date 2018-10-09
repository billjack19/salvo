<?php
/* funcoesController .php */

require_once "../class/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();


// Metodos do mapa

// Usuário
if (!empty($_POST['autenticarUsuario'])) {
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$cnpj = $_POST['cnpj'];

	$cont = 1;
	$sql = "SELECT u.id_usuario, u.login_ususario, u.senha_usuario, u.nome_usuario, u.cnpj_user, e.imagem
			FROM usuario u 
			INNER JOIN empresa e ON u.cnpj_user = e.CNPJ
			WHERE login_ususario = '$usuario' 
			AND senha_usuario = '$senha' 
			AND cnpj_user = '$cnpj'";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 
					$dados["id_usuario"].",".
					$dados["login_ususario"].",".
					$dados["senha_usuario"].",".
					$dados["nome_usuario"].",".
					$dados["cnpj_user"].",".
					$dados["imagem"];
		} else {
			echo    "[]".
					$dados["id_usuario"].",".
					$dados["login_ususario"].",".
					$dados["senha_usuario"].",".
					$dados["nome_usuario"].",".
					$dados["cnpj_user"].",".
					$dados["imagem"];
		}
		$cont++;
	}
}



// Empresa
if (!empty($_POST['logo_empresa'])) {
	$cnpj = $_POST['cnpj'];

	$sql = "SELECT * FROM empresa WHERE CNPJ = '$cnpj'";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		echo $dados["imagem"];
	}
}




// Caçamba
if (!empty($_POST['deletar_cacamba'])) {
	$id = $_POST['id'];

	$sql = "DELETE FROM cacamba 
			WHERE id_cacamba = $id";

	$stmt = $pdo->prepare($sql);
	echo $stmt->execute();
}

if (!empty($_POST['atualizar_situacao'])) {
	$situacao = $_POST['situacao'];
	$id = $_POST['id'];

	$sql = "UPDATE cacamba 
			SET situacao = $situacao 
			WHERE id_cacamba = $id";

	$stmt = $pdo->prepare($sql);
	echo $stmt->execute();
}



// Flag Imprsssao
if (!empty($_POST['flagImspressoMov'])) {
	$id = $_POST['id'];
	$sql = "UPDATE movimentacao_cacamba 
			SET flag_impressao = 0
			WHERE id_movimentacao_cacamba = $id";

	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	echo $stmt->execute();
}



// Caminhão
if (!empty($_POST['pequisa_caminhao'])) {
	$cont = 1;
	$sql = "SELECT * FROM caminhao ";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 
					$dados["id_caminhao"].",".
					$dados["descricao"].",".
					$dados["longitude"].",".
					$dados["latidude"].",".
					$dados["motorista_id"].",".
					$dados["status_caminhao"].",".
					$dados["ultima_atualizacao"].",".
					$dados["ativo_caminhao"];
		} else {
			echo    "[]".
					$dados["id_caminhao"].",".
					$dados["descricao"].",".
					$dados["longitude"].",".
					$dados["latidude"].",".
					$dados["motorista_id"].",".
					$dados["status_caminhao"].",".
					$dados["ultima_atualizacao"].",".
					$dados["ativo_caminhao"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_caminhao_id'])) {
	$id = $_POST['id'];
	$cont = 1;
	$sql = "SELECT * FROM caminhao WHERE id_caminhao = $id";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 
					$dados["id_caminhao"].",".
					$dados["descricao"].",".
					$dados["longitude"].",".
					$dados["latidude"].",".
					$dados["motorista_id"].",".
					$dados["status_caminhao"].",".
					$dados["ultima_atualizacao"].",".
					$dados["ativo_caminhao"];
		} else {
			echo    "[]".
					$dados["id_caminhao"].",".
					$dados["descricao"].",".
					$dados["longitude"].",".
					$dados["latidude"].",".
					$dados["motorista_id"].",".
					$dados["status_caminhao"].",".
					$dados["ultima_atualizacao"].",".
					$dados["ativo_caminhao"];
		}
		$cont++;
	}
}



// Região
if (!empty($_POST['pequisa_regiao'])) {
	$cont = 1;
	$sql = "SELECT * FROM regiao order by descricao_regiao";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 
					$dados["id_regiao"].",".
					$dados["descricao_regiao"].",".
					$dados["latitude_regiao"].",".
					$dados["longitude_regiao"];
		} else {
			echo    "[]".
					$dados["id_regiao"].",".
					$dados["descricao_regiao"].",".
					$dados["latitude_regiao"].",".
					$dados["longitude_regiao"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_regiao_id'])) {
	$id = $_POST['regiao_id'];
	$cont = 1;
	$sql = "SELECT * FROM regiao where id_regiao = ".$id;
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 
					$dados["id_regiao"].",".
					$dados["descricao_regiao"].",".
					$dados["latitude_regiao"].",".
					$dados["longitude_regiao"];
		} else {
			echo    "[]".
					$dados["id_regiao"].",".
					$dados["descricao_regiao"].",".
					$dados["latitude_regiao"].",".
					$dados["longitude_regiao"];
		}
		$cont++;
	}
}


// Sub Região
if (!empty($_POST['pequisa_sub_regiao'])) {
	$regiao_id = $_POST['regiao_id'];
	$cont = 1;
	$sql = "SELECT * FROM sub_regiao WHERE regiao_id = $regiao_id order by descricao_sub_regiao";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 
					$dados["id_sub_regiao"].",".
					$dados["descricao_sub_regiao"].",".
					$dados["latitude_sub_regiao"].",".
					$dados["longitude_sub_regiao"];
		} else {
			echo    "[]".
					$dados["id_sub_regiao"].",".
					$dados["descricao_sub_regiao"].",".
					$dados["latitude_sub_regiao"].",".
					$dados["longitude_sub_regiao"];
		}
		$cont++;
	}
}


if (!empty($_POST['pequisa_sub_regiao_id'])) {
	$id = $_POST['sub_regiao_id'];
	$cont = 1;
	$sql = "SELECT * FROM sub_regiao where id_sub_regiao = ".$id;
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 
					$dados["id_sub_regiao"].",".
					$dados["descricao_sub_regiao"].",".
					$dados["latitude_sub_regiao"].",".
					$dados["longitude_sub_regiao"];
		} else {
			echo    "[]".
					$dados["id_sub_regiao"].",".
					$dados["descricao_sub_regiao"].",".
					$dados["latitude_sub_regiao"].",".
					$dados["longitude_sub_regiao"];
		}
		$cont++;
	}
}







//  Metodos da aplicaçã do motorista

if (!empty($_POST['autenticarMotorista'])) {
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	$cont = 1;
	$sql = "SELECT * FROM motorista WHERE login_motorista = '$usuario' AND senha_motorista = '$senha'";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 
					$dados["id_motorista"].",".
					$dados["login_motorista"].",".
					$dados["senha_motorista"].",".
					$dados["nome_motorista"];
		} else {
			echo    "[]".
					$dados["id_motorista"].",".
					$dados["login_motorista"].",".
					$dados["senha_motorista"].",".
					$dados["nome_motorista"];
		}
		$cont++;
	}
}


if (!empty($_POST['listar_ocupado_caminhao'])) {
	$id_motorista = $_POST['id_motorista'];
	$id_caminhao = 0;
	$sql = "SELECT * FROM caminhao WHERE motorista_id = $id_motorista LIMIT 1";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$id_caminhao = $dados["id_caminhao"];
	}
	echo $id_caminhao;
}





if (!empty($_POST['listar_diponivel_caminhao'])) {
	$cont = 1;
	$id_caminhao = 0;
	$sql = "SELECT * FROM caminhao WHERE motorista_id = 0;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 
					$dados["id_caminhao"].",".
					$dados["descricao"].",".
					$dados["longitude"].",".
					$dados["latidude"].",".
					$dados["motorista_id"].",".
					$dados["status_caminhao"];
		} else {
			echo    "[]".
					$dados["id_caminhao"].",".
					$dados["descricao"].",".
					$dados["longitude"].",".
					$dados["latidude"].",".
					$dados["motorista_id"].",".
					$dados["status_caminhao"];
		}
		$cont++;
	}
}




if (!empty($_POST['selecionar_caminhao'])) {
	$id_caminhao = $_POST['id_caminhao'];
	$id_motorista = $_POST['id_motorista'];

	$sql = "UPDATE caminhao 
			SET motorista_id = $id_motorista 
			WHERE id_caminhao = $id_caminhao";
	$stmt = $pdo->prepare($sql);
	echo $stmt->execute();
}



if (!empty($_POST['sair_caminhao'])) {
	$id_caminhao = $_POST['id_caminhao'];

	$sql = "UPDATE caminhao 
			SET motorista_id = 0 
			WHERE id_caminhao = $id_caminhao";
	$stmt = $pdo->prepare($sql);
	echo $stmt->execute();
}




if (!empty($_POST['listar_pendente_cacamba'])) {
	$cont = 1;
	$id_caminhao = 0;
	$sql = "SELECT * FROM cacamba WHERE confirma_carreto = 0 AND (situacao = 0 OR situacao = 3);";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 
					$dados["id_cacamba"].",".
					$dados["latidude"].",".
					$dados["logitude"].",".
					$dados["situacao"].",".
					$dados["titulo"];
		} else {
			echo    "[]".
					$dados["id_cacamba"].",".
					$dados["latidude"].",".
					$dados["logitude"].",".
					$dados["situacao"].",".
					$dados["titulo"];
		}
		$cont++;
	}
}





if (!empty($_POST['manda_localizacao'])) {
	$lng = $_POST['logitude'];
	$lat = $_POST['latitude'];
	$id_caminhao = $_POST['id_caminhao'];
	$ultima_atualizacao = $_POST['ultima_atualizacao'];

	$sql = "UPDATE caminhao 
			SET 
				longitude = '$lng', 
				latidude = '$lat', 
				ultima_atualizacao = '$ultima_atualizacao' 
			WHERE id_caminhao = $id_caminhao";
	$stmt = $pdo->prepare($sql);
	echo $stmt->execute();
}





/*
if (!empty($_POST['chave'])) {
	$cont = 1;
	$sql = "SELECT * FROM chave_map;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) { echo $dados["descricao"]; }
		$cont++;
	}
}
*/

if (!empty($_POST['chave'])) {
	$chave = "0";
	$sql = "SELECT * FROM chave_map;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$chave = $dados["descricao"];
	}
	echo $chave;
}
?>