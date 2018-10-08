<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Emprestimo Livro</title>
	<link rel="stylesheet" type="text/css" href="../../_css/emprestimoLivro.css"/>

	<script src="../../_js/funcoes.js"></script>
	<script src="../../_js/trocaFotoProduto.js"></script>
</head>
<center>
<body>
	<div id="interface">
		<?php  
			include "../menu.php";
		?>
		<div id="texto1">
			<h1><center>Emprestimo de Livro</center></h1>
			<br><br><br>
			<table>
				<tr>
					<td>
						<a href="emprestimoLivroTipo.php">
							<img class="img-rounded" name="fazerEmprestimo" id="fazerEmprestimo" src="../../_imagens/emprestimo/emprestimo livro.jpg">
						</a>
					</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>
						<a href= "emprestimoLivroTipo2.php">
						<img class="img-rounded" name="consultarEmprestimo" id="consultarEmprestimo" src="../../_imagens/emprestimo/colsultar emprstimo.jpg">
						</a>
					</td>
				</tr>
			</table>
			<br><br><br><br><br><br>
		</div>
	</div>
</body>
</html>