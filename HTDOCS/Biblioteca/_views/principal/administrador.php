<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Administrador</title>
</head>
<center>
<body>
	<div id="interface">
		<?php  
			include "../menu.php";
		?><br>
		<div id="texto1">
		<table>
		<tr>
			<td><img src="../../_imagens/menu_principal/atomo01.png"></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
				<div style="width: 500px;">
			<p class="paragrafoInto">Seja bem-vindo ao novo sistema da biblioteca do David Campista criado por nós da AtomTec. Somos uma empresa independente focada no desempenho e trabalho a outras empresas, nosso foco é desenvolver novas tecnologias para a evolução do trabalho	e o desempenhos dos nossos clintes. 

A AtomTec agradece a oportunidade proporcionada pela escola, e esperammos que você usuário goste de nosso trabalho!</p>
			<!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
			<!-- <div class='form-control'> -->
			
			</td>
		</tr>
		</table>
		<br>
			<?php
				include_once "../../_request/processaPesquisaFrase_do_dia.php";
			?>
		<!-- </div> -->
		</div>
	</div>
</body>
</center>
</html>
<!--  onload="inicioFoto()" -->