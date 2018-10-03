<?php

// Variaveis recebidas
$end_inicial = $_POST['end_inicial'];
$end_final = $_POST['end_final'];
$array_entregas = explode("+", $_POST['array_entregas']);



// Variaveis de cofinguração
$array_entregas_demostrativo = "";
$numRegistro = 0;
$localStar = "localStar";
$localEnd = "localEnd";

// Outros array para marcadores
$arrayPositionInical = explode(",", $end_inicial);
$arrayPositionFinal = explode(",", $end_final);
$arrayPositionEntrega = [];

// Função marcadores para colocar marcadores no mapa quando traçar a rota
$marcadoresDoMapa = "
function marcadores(){
	var Marker;

	Marker = new google.maps.Marker({
		position: {lat: ".$arrayPositionInical[0].", lng: ".$arrayPositionInical[1]."},
		map: map,
		icon: caminhaoImg,
		title:\"Ponto inicial\"
	});
	Marker.setMap(map);

	Marker = new google.maps.Marker({
		position: {lat: ".$arrayPositionFinal[0].", lng: ".$arrayPositionFinal[1]."},
		map: map,
		icon: caminhaoImg,
		title:\"Ponto final\"
	});
	Marker.setMap(map);";



$textJavascrpitEntregas = "<script>var waypts = [];";

// Percorrendo as entregas e formando um array para jogar de referencia para objeto do Google
for ($i=0; $i < sizeof($array_entregas); $i++) { 
	
	// Montando o array
	$textJavascrpitEntregas .= '
	waypts.push({
		location: "'.$array_entregas[$i].'",
		stopover: true
	});';


	// Montando um decrição abaixo para aprecentar ao usuario
	$numRegistro = (int) $numRegistro + 1;
	if ($numRegistro < 10) {
		$numRegistro = "0".$numRegistro;
	} else {
		$numRegistro = $numRegistro;
	}
	$array_entregas_demostrativo .= '
		<tr>
			<td>
				<b>Entrega '.$numRegistro.':</b>
			</td>
			<td>
				'.$array_entregas[$i].'
			</td>
		</tr>';


	$arrayPositionEntrega = explode(",", $array_entregas[$i]);
	$marcadoresDoMapa .= "

	Marker = new google.maps.Marker({
		position: {lat: ".$arrayPositionEntrega[0].", lng: ".$arrayPositionEntrega[1]."},
		map: map,
		icon: pacoteImg,
		title:\"Minha Casa\"
	});
	Marker.setMap(map);";
}

$marcadoresDoMapa .= "
}";


$textJavascrpitEntregas .= $marcadoresDoMapa;
$textJavascrpitEntregas .= "</script>";


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<title>Entregas</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css">  
</head>

<body onload="submeterFormulario()">
	<div id="site">
		<!-- <h1>Entrega</h1> -->
		<button class="btn btn-primary btn-block" onclick="imprimirTela()" id="btnImprimir">
			Imprimir
		</button>

		<form method="post" action="index.html" style="display: none;">
			<fieldset>
				<legend>Criar rotas</legend>
				<div>
					<label for="txtEnderecoPartida">Endereço de partida:</label>
					<input type="text" id="txtEnderecoPartida" name="txtEnderecoPartida" value="-21.791617634953733,-46.558241682073474" />
				</div>
				
				<div>
					<label for="txtEnderecoChegada">Endereço de chegada:</label>
					<input type="text" id="txtEnderecoChegada" name="txtEnderecoChegada" value="rua dovilio taconi 150 poços de caldas minas gerais" />
					<!-- pernabuco 649 poços de caldas minas gerais -->
				</div>
				<!-- <div>
					<label for="referencia">Ponto referencia:</label>
					<input type="text" id="referencia" name="referencia" value="rua assis figueiredo 45 poços de caldas minas gerais" />
				</div> -->
				<div>
					<input type="submit" id="btnEnviar" name="btnEnviar" value="Enviar" />
				</div>
			</fieldset>
		</form>
	
		<div id="mapa"></div>

		<table width="100%">
			<tr>
				<td>
					<b>Local Inicial:</b>
				</td>
				<td>
					<?php echo $localStar; ?>
				</td>
			</tr>
			<?php echo $array_entregas_demostrativo; ?>
			<tr>
				<td>
					<b>Local Destino:</b>
				</td>
				<td>
					<?php echo $localEnd; ?>
				</td>
			</tr>
		</table>

		<div id="trajeto-texto" style="/*display: none;*/width: 100%;height: auto;"></div>
	</div>
</body>

<!-- Array com posntos de referencias para traçar a rota -->
<?php echo $textJavascrpitEntregas; ?>

<script src="js/jquery.min.js"></script>

<!-- Maps API Javascript -->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Arquivo de inicialização do mapa -->
<script src="js/mapa.js"></script>

<!-- Marcadores com as imagens de caminhão e pacotes para serem setados no mapa -->
<?php echo $marcadoresDoMapa; ?>



<script type="text/javascript">
	var render = 0;
	function submeterFormulario(){
		document.getElementById("btnEnviar").click();
	}

	function imprimirTela(){
		document.getElementById("btnImprimir").style.display = "none";
		window.print();
		document.getElementById("btnImprimir").style.display = "block";
	}
</script>
</html>