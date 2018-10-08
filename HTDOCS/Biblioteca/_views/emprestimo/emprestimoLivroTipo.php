<?php
	
?>
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
				<a href=
					<?php
						$_SESSION['idAluno'] = 0;
						$_SESSION['idLivro'] = 0;
						$link = "fazer_emprestimoLAluno.php";
						$aluno = "?aluno=";
						$url = $link.$aluno;
						echo "'".$url."'";
					?>
				>
					<!-- Imagem do aluno -->
					<img class="img-rounded" name="fazerEmprestimo" id="fazerEmprestimo" src="../../_imagens/emprestimo/aluno.jpg">
				</a>&nbsp;&nbsp;
				<a href=
					<?php
						$link = "fazer_emprestimoLProfessor.php";
						$professor = "?professor=";
						$url = $link.$professor;
						echo "'".$url."'";
					?>
				>
				<!-- Imagem do professor -->
				<img class="img-rounded" name="consultarEmprestimo" id="consultarEmprestimo" src="../../_imagens/emprestimo/professor.jpg">
				</a>&nbsp;&nbsp;

							
			</h2>
			</center>
			<a id="botaoProximo" class='botoesPadao btn btn-xs btn-primary' href="emprestimoLivro.php">
				Anterior
			</a>
		</div>
	</div>
</body>
</html>