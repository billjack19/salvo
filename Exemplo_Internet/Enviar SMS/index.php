<?php

$end_inicial = $_POST['end_inicial'];
$end_final = $_POST['end_final'];
$array_entregas = explode("+", $_POST['array_entregas']);
$array_entregas_demostrativo = "";
$numRegistro = 0;

$textJavascrpitEntregas = "<script>var waypts = [];";

for ($i=0; $i < sizeof($array_entregas); $i++) { 
	$textJavascrpitEntregas .= '
	waypts.push({
		location: "'.$array_entregas[$i].'",
		stopover: true
	});';

	$numRegistro = (int) $numRegistro++;
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
}

$textJavascrpitEntregas .= "</script>";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<title>Google Maps API v3: Criando rotas</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body onload="submeterFormulario()">
	<div id="site">
		<h1>Entrega</h1>
		<button onclick="imprimirTela()" id="btnImprimir">
			Imprimir
		</button>

		<form method="post" action="index.html" style="display: none;">
			<fieldset>
				<legend>Criar rotas</legend>
				
				<div>
					<label for="txtEnderecoPartida">Endereço de partida:</label>
					<input type="text" id="txtEnderecoPartida" name="txtEnderecoPartida" value="rua dovilio taconi 150 poços de caldas minas gerais" />
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
<?php echo $textJavascrpitEntregas; ?>

<script src="js/jquery.min.js"></script>

<!-- Maps API Javascript -->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Arquivo de inicialização do mapa -->
<script src="js/mapa.js"></script>

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