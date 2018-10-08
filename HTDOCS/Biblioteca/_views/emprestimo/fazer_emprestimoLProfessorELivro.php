<?php?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Fazer Emprestimo de Livro</title>
	<link rel="stylesheet" type="text/css" href="../../_css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="../../_css/emprestimoLivro.css" />
	<script src="../../_js/calcularData.js"></script>

	<script type="text/javascript">
		function calcularData(){
			var dataFinal = document.getElementById('dataI').value;
			var valor = document.getElementById('prazoLivro').value;		
			var dataNova = calcDataAdiciona(valor , dataFinal);
			document.getElementById('dataF').value = dataNova;
		}
		function iniciar(){
			document.getElementById('dataI').value = hoje();
			calcularData();
		}
		function fazerEmprestimo(){
			var login = document.getElementById('login').value;
			var nome = document.getElementById('nome').value;
			var frase = document.getElementById('frase').value;
			var idAluno = document.getElementById('idAluno').value;
			var idLivro = document.getElementById('idLivro').value;
			var idUser = document.getElementById('idUser').value;
			var dataInicial = document.getElementById('dataI').value;
			var dataFinal = document.getElementById('dataF').value;
			var emprestimo = "ok";
			var url = "?login="+login;
			url += "&nome="+nome;
			url += "&frase="+frase;
			url += "&idLivro="+idLivro;
			url += "&idAluno="+idAluno;
			url += "&idUser="+idUser;
			url += "&dataI="+dataInicial;
			url += "&dataF="+dataFinal;
			url += "&emprestimo="+emprestimo;
			window.location = url;
		}
	</script>
<?php
	if($_GET['emprestimo']=="sim"){
?>
	<script type="text/javascript">
		alert("Salvo com sucesso!");
	</script>
<?php
	} else if($_GET['emprestimo']=="nao"){
?>
	<script type="text/javascript">
		alert("Erro ao salvar!");
	</script>
<?php
	}
?>
</head>
<center>
<body onload="iniciar()">
<div id="interface">
	<?php  
		include_once "../../_request/processaEmpretimoLivro2.php";
		include_once "../menu.php";
	?>
	<div id="texto1">
		<h2>
			<table>
				<tr>
					<td >
						Funcionario
						<input value=<?php echo"'".$_GET['login']."'"?> type="text" size="2" style="opacity: 0" id="login" disabled>
						<input value=<?php echo"'".$_GET['nome']."'"?> type="text" size="2" style="opacity: 0" id="nome" disabled>
						<input value=<?php echo"'".$_GET['frase']."'"?> type="text" size="2" style="opacity: 0" id="frase" disabled>
						<input value=<?php echo"'".$_GET['idAluno']."'"?> type="text" size="2" style="opacity: 0" id="idAluno" disabled>
						<input value=<?php echo"'".$_GET['idLivro']."'"?> type="text" size="2" style="opacity: 0" id="idLivro" disabled>
						<br>
						<table>
							<?php
							include_once "../../_request/processaPesquisaProfessor2.php";
							?>
						</table>
						<br>
						<p>.</p>

					</td>
					<td>
						Livro<br>
						<table>
							<?php
							include_once "../../_request/processaPesquisaLivro2.php";
							?>
						</table>
						<p>.</p>

					</td>
					<td>
						<table>
						<tr>
						<td>
						Calculo de data
						</td>
						</tr>
						<tr>
						<td>
							Data Inicial:<br>
							<input type="date" id="dataI" style="font-size:20px" onblur="calcularData();">
						</td>
						</tr>
						<tr>
						<td>
							Data Final: <br>
							<input type="date" id="dataF" style="font-size:20px" disabled>
						</td>
						</tr>
						</table>
						<br><br><br><br>
						<p>.</p>
					</td>
				</tr>
			</table>
			<br>
			<center>
			<table>
				<tr>
					<td>
						<a href=
						<?php
							if ($_GET['idAluno'] != '') {
								$link = "fazer_emprestimoLLivro2.php";
								$login = "?login=".$_GET['login'];
								$nome = "&nome=".$_GET['nome'];
								$frase = "&frase=".$_GET['frase'];
								$livro = "&livro=" ;
								$idLivro = "&idLivro=".$_GET['idLivro'];
								$idAluno = "&idAluno=".$_GET['idAluno'];
								$url = $link.$login.$nome.$frase.$livro.$idLivro.$idAluno;
								echo "'".$url."'";
							}	
							else echo "#";						
						?>
						>
							<img src="../../_imagens/botao/botao-anterior.png">
						</a>
					</td>
					<td>
						<a href=
						<?php
							$link = "emprestimoLivroTipo.php";
							$login = "?login=".$_GET['login'];
							$nome = "&nome=".$_GET['nome'];
							$frase = "&frase=".$_GET['frase'];
							$url = $link.$login.$nome.$frase;
							echo "'".$url."'";
						?>
						>
							<img src="../../_imagens/botao/botao-limpar.png">
						</a>
					</td>
					<td>
					<?php
						if($_GET['emprestimo']==""){
					?>
						<input class="fazerEmprestimo" type="button" onclick="fazerEmprestimo()" >
					<?php
						}
					?>
					</td>
				</tr>
			</table>
			</center>
		</h2>
	</div>
</div>
</body>
</center>
</html>

<!-- 
SELECT t1e.ID_EMPRESTIMO_LIVRO2 , t2a.NOME_FUNCIONARIO , t3l.NOME_LIVRO , t1e.DATA_INICIAL_EMPRESTIMO_LIVRO , t1e.DATA_FINAL_EMPRESTIMO_LIVRO
FROM emprestimo_livro2 t1e
INNER JOIN funcionario t2a ON (t1e.ID_FUNCIONARIO = t2a.ID_FUNCIONARIO)
INNER JOIN livro t3l ON (t1e.ID_LIVRO = t3l.ID_LIVRO) -->