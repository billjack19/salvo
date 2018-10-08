<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Bibliotecario</title>
	<link rel="stylesheet" type="text/css" href="../../_css/estilo.css" />
	
	<script src="../../_js/funcoes/funcoes.js"></script>
</head>
<center>
<body>
	<div id="interface">
		<?php  
			include "../menu.php";
		?>
		<br>
		<div id="texto1">
			<h1>Bibliotecario</h1>
			<!-- <img src="../../_imagens/menu_principal/livro.jpg"> -->
			<?php
				include_once "../../_request/processaPesquisaFrase_do_dia.php";
			?>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</div>
</body>
</center>
</html>