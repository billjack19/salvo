<?php?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Aluno / Professor</title>

	<link rel="stylesheet" type="text/css" href="../../_css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="../../_css/emprestimoLivro.css"/>

	<script src="../../_js/funcoes.js"></script>
	<script src="../../_validacao/validarItens.js"></script>
	<script src="../../_js/trocaFotoProduto.js"></script>
</head>
<center>
<body>
	<div id="interface">
		<?php  
			include "../menu.php";
		?>
		<br>
		<div id="texto1">
			<center>
			<h2>
				<a href="consulta_emprestimoLAlunoELivro.php?aluno=&tipoFiltro=1&devolver=">
					<img name="fazerEmprestimo" id="fazerEmprestimo" src="../../_imagens/emprestimo/aluno.jpg">
				</a>&nbsp;&nbsp;
				<a href="#">
					<img name="consultarEmprestimo" id="consultarEmprestimo" src="../../_imagens/emprestimo/professor.jpg">
				</a>&nbsp;&nbsp;							
			</h2>
			</center>
			<a href="emprestimoLivro.php">
				<img src="../../_imagens/botao/botao-anterior.png">
			</a>
		</div>
	</div>
</body>
</html>