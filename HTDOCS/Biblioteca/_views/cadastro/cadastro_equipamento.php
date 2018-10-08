<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<title>Cadastro de Equipamento</title>
		<link rel="stylesheet" type="text/css" href="../../_css/estilo.css" />
		
		<script src="../../_js/funcoes/funcoes.js"></script>
		<script src="../../_js/validacao/validarKit.js"></script>
		
	</head>
	<center>
	<body>

		<div id="interface">
			<?php  
				include "../menu.php";
			?>
			<br>
			<div id="texto1">
			<form name="form" action="../../_request/processaCadastroKit.php" method="POST" onsubmit="return validacao();">
			<h2>
				<table>
					<tr>
						<td >
							Descrição do Equipamento<linh class="asterisco">*</linh>: <br>
							<input type="text" size="44" class="inputDosCampos form-control" id="nome" name="nome">
						</td>
						<td>&nbsp;&nbsp;</td>
						<td>
							Numero: <br>
							<input type="text" size="4" class="inputDosCampos form-control" id="numero" onkeyup="somenteNumeros(this)" name="numero">
						</td>
					</tr>
				</table>
				</h2>
			<br><br><br><br>
			<br><br><br><br>
			<br><br><br><br>
			<br><br><br><br>
			<br><br><br>
			<input type="submit" value="Enviar" class="botoesPadao btn btn-xs btn-success">&nbsp;&nbsp;
		<input type="reset" value="Limpar" class="botoesPadao btn btn-xs btn-danger">
			</form>
		</div>
	</body>
</html>