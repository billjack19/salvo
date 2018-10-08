<?php

ini_set('max_execution_time', 300);

require_once "../classe/conexao.php";
$conn = new Conexao();
$pdo = $conn->Connect();


if (!empty($_REQUEST['listarRegioesCEP'])) {
	$resultado = '['; $auxVirgula = '';
	/*$sql = 'SELECT 
				cep_bairro_regiao.cep,
				cep.endereco,
				cep.bairro,
				cep.cidade,
				cep_bairro_regiao.regiao,
				tab_regioes.descricao
			FROM cep_bairro_regiao cep_bairro_regiao
			INNER JOIN cep ON cep_bairro_regiao.cep = cep.cep
			INNER JOIN tab_regioes ON cep_bairro_regiao.regiao = tab_regioes.codigo
			GROUP BY cep_bairro_regiao.bairro';

	$sql = "SELECT  
				cep_bairro_regiao.cep,
				cep.endereco,
				cep.bairro,
				cep.cidade,
				cep_bairro_regiao.regiao,
				tab_regioes.descricao
			FROM temp_lat_lng_bairro 
			INNER JOIN cep_bairro_regiao ON temp_lat_lng_bairro.cep = cep_bairro_regiao.bairro
			INNER JOIN cep ON cep_bairro_regiao.cep = cep.cep
			INNER JOIN tab_regioes ON cep_bairro_regiao.regiao = tab_regioes.codigo
			WHERE temp_lat_lng_bairro.cep LIKE '%vila flora%'
			OR temp_lat_lng_bairro.latitude = '-14.235004'
			group by cep_bairro_regiao.bairro
			ORDER BY temp_lat_lng_bairro.regiao_id;";*/
	
	$sql = "SELECT bairro, cidade, latitude_bairro, longitude_bairro 
			FROM cep
			WHERE COALESCE(latitude_bairro, '0') = '0'
			AND COALESCE(longitude_bairro, '0') = '0'
			AND bairro <> 'null'
			AND (
				cidade = 'sao paulo' OR 
				cidade = 'pocos de caldas'
				-- OR estado = 'MG'
			)
			AND cidade not like \"%'%\"
			AND bairro not like \"%'%\"
			GROUP BY bairro, cidade
			ORDER BY cidade asc";

	/* echo $sql; */
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {

		/*$sql = "SELECT count(*) FROM temp_lat_lng_regiao WHERE cep = '".$dados['cep']."'";
		$verifica2 = $pdo->query($sql);
		foreach ($verifica2 as $dados2) {
			if($dados2[0] == 0){*/
				$auxVirgula = $resultado == '[' ? '' : ',';
				/* $resultado .= $auxVirgula.'{
	"cep": "'.$dados['cep'].'",
	"endereco": "'.$dados['endereco'].'",
	"numero": 0,
	"bairro": "'.$dados['bairro'].'",
	"cidade": "'.$dados['cidade'].'",
	"id_regiao": '.$dados['regiao'].',
	"descricao_regiao": "'.$dados['descricao'].'"
}';*/
				$resultado .= $auxVirgula.'{
	"cep": "'.$dados['bairro'].'",
	"endereco": "'.$dados['bairro'].'",
	"numero": 0,
	"bairro": "'.$dados['bairro'].'",
	"cidade": "'.$dados['cidade'].'",
	"id_regiao": 0,
	"descricao_regiao": "'.$dados['bairro'].'"
}';
		/*	}
		}*/
	}
	echo $resultado."]";
}


if (!empty($_POST['atualizarPosicao'])) {
	$id_regiao = $_POST['id_regiao'];

	/* cep esta vindo como bairro */
	$cep = $_POST['cep'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$codigoTemp = 0;
	/* A descricao adicional serve para nome da cidade */
	$descricaoAdicional = "";
	if (!empty($_POST['descricaoAdicional'])) $descricaoAdicional = $_POST['descricaoAdicional'];

	/* $sql = "SELECT id_temp_lat_lng_regiao
			FROM  temp_lat_lng_bairro
			WHERE cep = '$cep'
			AND regiao_id = $id_regiao";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$codigoTemp = $dados['id_temp_lat_lng_regiao'];
	}


	if ($codigoTemp == 0) {
		$sql = "INSERT INTO temp_lat_lng_bairro 
					(regiao_id, cep, latitude, longitude)
				VALUES 
					($id_regiao, '$cep', '$latitude', '$longitude')";
	} else {
		$sql = "UPDATE temp_lat_lng_bairro 
				SET 
					regiao_id = $id_regiao, 
					cep = '$cep',
					latitude = '$latitude',
					longitude = '$longitude'
				WHERE id_temp_lat_lng_regiao = $codigoTemp";
	}*/


	$sql = "UPDATE cep 
			SET
				latitude_bairro = '$latitude',
				longitude_bairro = '$longitude'
			WHERE bairro = '$cep'
			AND cidade = '$descricaoAdicional'";

	// echo $sql;
	$verifica = $pdo->prepare($sql);
	echo $verifica->execute();
}




if (!empty($_REQUEST['arrayPontos'])) {
	$resultado = '['; $auxVirgula = '';
	$latitude = ""; $longitude = "";
	$sql = "SELECT 
				temp_lat_lng_bairro.regiao_id,
				temp_lat_lng_bairro.cep,
				/*cep.endereco,*/
				temp_lat_lng_bairro.latitude,
				temp_lat_lng_bairro.longitude 
			FROM temp_lat_lng_bairro temp_lat_lng_bairro
			WHERE temp_lat_lng_bairro.cep NOT LIKE '%chacara sao pedro%'
			AND temp_lat_lng_bairro.cep NOT LIKE '%jardim das acacias%'
			AND temp_lat_lng_bairro.cep NOT LIKE '%serras azuis%'
			AND temp_lat_lng_bairro.cep NOT LIKE '%real parque%'
			/*INNER JOIN cep cep ON temp_lat_lng_bairro.cep = cep.cep
			WHERE cep.endereco NOT LIKE '%projeta%'
			AND cep.endereco NOT LIKE '% um'
			AND cep.endereco NOT LIKE '% um %'
			AND cep.endereco NOT LIKE '%dezenove%'
			AND cep.endereco NOT LIKE '%dezessete%'
			AND cep.endereco NOT LIKE '%dezoito%'
			AND cep.endereco NOT LIKE '%dezesseis%'
			AND cep.endereco NOT LIKE '%VILA PAULA%'
			AND cep.endereco <> 'rua z'*/
			ORDER BY temp_lat_lng_bairro.regiao_id";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$latitude = $dados['latitude'];
		$longitude = $dados['longitude'];

		$sql = "SELECT count(*)
				FROM temp_lat_lng_bairro
				WHERE latitude = '$latitude'
				AND longitude = '$longitude';";

		$verifica2 = $pdo->query($sql);
		foreach ($verifica2 as $dados2) {
			if ($dados2[0] == 1){

				$auxVirgula = $resultado == '[' ? '' : ',';
				$resultado .= $auxVirgula.'{
	"id_regiao": '.$dados['regiao_id'].',
	"cep": "'.$dados['cep'].'",
	"x": '.$dados['latitude'].',
	"y": '.$dados['longitude'].'
}';

			}
		}
	}
	echo $resultado."]";
}


if (!empty($_REQUEST['atualizarEspaco'])) {
	$descricao = "";
	$sql = "SELECT * FROM temp_lat_lng_bairro";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$descricao = str_replace("_", " ", $dados['cep']);
		$sql = "UPDATE temp_lat_lng_bairro
				SET cep = '$descricao'
				WHERE id_temp_lat_lng_regiao = ".$dados['id_temp_lat_lng_regiao'];
		$verifica = $pdo->prepare($sql);
		echo "

Atualizando".$verifica->execute().": ".$dados['cep']." -> ".$descricao."<br><br>";
	}
}



if(!empty($_REQUEST['atualizarRegistroTemp'])){
	$regiao = ""; $bairro = "";
	$sql = "SELECT bairro, regiao FROM cep_bairro_regiao2 GROUP BY bairro";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$regiao = $dados['regiao'];
		$bairro = $dados['bairro'];
		$sql = "UPDATE temp_lat_lng_bairro
				SET regiao_id = $regiao
				WHERE cep = '$bairro'";

		$verifica = $pdo->prepare($sql);
		echo "
<br>

Atualizado:<br>
regiao: $regiao<br>
bairro: $bairro<br>
resultado: ".$verifica->execute();
	}
}



if (!empty($_REQUEST['atualizarcepgeo'])){

	$latitude = ""; $longitude = ""; $cep = "";

	$sql = "SELECT * FROM temp_lat_lng_bairro";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$latitude = $dados['latitude'];
		$longitude = $dados['longitude'];
		$cep = $dados['cep'];
		$sql = "UPDATE cep 
			SET 
				latitude_bairro = '$latitude',
				longitude_bairro = '$longitude'
			WHERE bairro = '$cep'
			AND cidade = 'POÇOS DE CALDAS'";
		/*echo $sql;*/
		$verifica = $pdo->prepare($sql);
		echo "

Atualizado:<br>
latitude: $latitude<br>
longitude: $longitude<br>
cep: $cep<br>
resultado: ".$verifica->execute();
	}
}





if (!empty($_POST['gravarDistancia'])) {
	$regiao = $_POST['regiao'];
	$distancia_max = $_POST['distancia_max'];
	$primeiro_ponto = $_POST['primeiro_ponto'];
	$segundo_ponto = $_POST['segundo_ponto'];
	$central_ponto = $_POST['central_ponto'];
	$raio = (float) $distancia_max / 2;
	$arrayPontoCentral = explode(",", $central_ponto);
	$latitude = $arrayPontoCentral[0];
	$longitude = $arrayPontoCentral[1];

	/*$sql = "UPDATE cep_bairro_regiao2
			SET 
				distancia_max = '$distancia_max',
				primeiro_ponto = '$primeiro_ponto',
				segundo_ponto = '$segundo_ponto',
				central_ponto = '$central_ponto',
				raio = $raio
			WHERE regiao = $regiao";*/
	$sql = "UPDATE tab_regioes
			SET 
				latitude = '$latitude',
				longitude = '$longitude',
				raio = $raio
			WHERE codigo = $regiao;";

	// echo $sql;
	$verifica = $pdo->prepare($sql);
	echo $verifica->execute();
}



function tratarString($texto){
	$texto = str_replace("\\", "\\\\", $texto);
	$texto = str_replace("\"", "\\\"", $texto);
	$texto = str_replace("'", "\\'", $texto);
	$texto = str_replace("=", "", $texto);

	return $texto;
}



/*function tratarString($texto){
	$texto = str_replace("\\", "\\\\", $texto);
	$texto = str_replace("\"", "\\\"", $texto);
	$texto = str_replace("'", "\\'", $texto);

	$texto = str_replace("=", "", $texto);

	return $texto;
}*/



/***************************************************************************************************************/
/* Provavelmente não irá usar */
/***************************************************************************************************************/
/*if (!empty($_POST['listarCaminhoesD'])) {
	$resultado = "
		<table class'table'>
			<tr>
				<td><b>Placa</b></td>
				<td><b>Selecionar</b></td>
			</tr>
		";
	$cont = 0;
	$sql = "SELECT * FROM caminhao WHERE bool_disponivel_caminhao = 1";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$cont++;
		$resultado .= "	<tr>
				<td>".$dados['placa_caminhao']."</td>
				<td>
					<button onclick='selecionarCaminhao(".$dados['id_caminhao'].")' class='btn'>
						Selecionar&nbsp;<i class='fa fa-arrow-right'></i>
					</button>
				</td>
			</tr>
		";
	}
	$resultado = $cont == 0 ? "Nenhum resultado!" : $resultado."</table>";

	echo $resultado;
}*/


if (!empty($_POST['entrarCaminhao'])) {
	$id = $_POST['id'];
	$motorista = $_POST['motorista'];
	$sql = "UPDATE viagem_simples SET motorista_viagem_simples = '$motorista' WHERE placa_viagem_simples = $id";
	$verifica = $pdo->prepare($sql);
	$verifica->execute();
	$sql = "UPDATE caminhao SET bool_disponivel_caminhao = 0 WHERE id_caminhao = $id";
	$verifica = $pdo->prepare($sql);
	echo $verifica->execute();
}



if (!empty($_POST['sairCaminhao'])) {
	$id = $_POST['id'];
	$sql = "UPDATE viagem_simples SET motorista_viagem_simples = '0' WHERE placa_viagem_simples = $id";
	$verifica = $pdo->prepare($sql);
	$verifica->execute();
	$sql = "UPDATE caminhao SET bool_disponivel_caminhao = 1 WHERE id_caminhao = $id";
	$verifica = $pdo->prepare($sql);
	echo $verifica->execute();
}



?>