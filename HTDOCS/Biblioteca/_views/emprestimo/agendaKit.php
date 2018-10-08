<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Agendamento de Kit</title>
	<link rel="stylesheet" type="text/css" href="../../_css/emprestimoLivro.css"/>
</head>
<center>
<body>
	<div id="interface">
		<?php  
			include "../menu.php";
		?>
		<br>
		<div id="texto1">
			<h2>
			<table>
				<tr>
					<td>
						<a href="agendaKitProfessor.php?professor=">
							<img class="img-rounded" name="fazerEmprestimo" id="fazerEmprestimo" src="../../_imagens/emprestimo/emprestimo livro.jpg">
							<?php
								$_SESSION['idProfessor'] = 0;
							?>
						</a>
					</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>
						<a href= "consultaKit.php">
						<img class="img-rounded" name="consultarEmprestimo" id="consultarEmprestimo" src="../../_imagens/emprestimo/colsultar emprstimo.jpg">
						</a>
					</td>
					<!-- <td>
						<a href="#">
						<img name="consultarEmprestimo" id="consultarEmprestimo" src="../../_imagens/emprestimo/livros empilhados.jpg">	
						</a>
					</td> -->
				</tr>
			</table>
			<br><br><br><br><br><br><br><br><br>
			</h2>
		</div>
	</div>
</body>
</html>