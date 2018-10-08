<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Notificacao</title>
</head>
<center>
<body>
	<div id="interface">
		<?php  
			include "../menu.php";
		?>
		<div id="texto1">
		
		<h2>
			<br>
			<center><b>Pendencias</b></center>
			<br>
			<div class='bloco3'>
			<table>
				<tr>
					<th>
						<center><b>Selecionar</b></center>
					</th>
					<th>
						<center><b>Nome</b></center>
					</th>
					<th>
						<center><b>Livro</b></center>
					</th>
					<th>
						<center><b>Data Inicial</b></center>
					</th>	
					<th>
						<center><b>Data Final</b></center>
					</th>						
				</tr>
				<?php
				include "../../_request/processaPesquisaNotificacao.php";
				?>
			</table>
			</div>
			<br>
		</h2>
		</div>
	</div>
</body>
</center>
</html>