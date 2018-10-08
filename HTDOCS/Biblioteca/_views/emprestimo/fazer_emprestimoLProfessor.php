<?php 
	$NumLivro = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Fazer Emprestimo de Livro</title>
	<link rel="stylesheet" type="text/css" href="../../_css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="../../_css/emprestimoLivro.css" />
	
	<script type="text/javascript">
function nomeAluno(documento){
	var id_aluno = documento.value;
	var aluno = document.getElementById('alunoNome').value;
	var login = document.getElementById('login').value;
	var nome = document.getElementById('nome').value;
	var frase = document.getElementById('frase').value;
	var id_livro = document.getElementById('idLivro').value;
	var url = "?login="+login;
	url += "&nome="+nome;
	url += "&frase="+frase;
	url += "&aluno="+aluno;
	url += "&idAluno="+id_aluno;
	url += "&idLivro="+id_livro;
	window.location = url;
}
function buscaAluno(){
	var id_aluno = document.getElementById('idAluno').value;
	var aluno = document.getElementById('alunoNome').value;
	var login = document.getElementById('login').value;
	var nome = document.getElementById('nome').value;
	var frase = document.getElementById('frase').value;
	var id_livro = document.getElementById('idLivro').value;
	var url = "?login="+login;
	url += "&nome="+nome;
	url += "&frase="+frase;
	url += "&aluno="+aluno;
	url += "&idAluno="+id_aluno;
	url += "&idLivro="+id_livro;
	window.location = url;
}
</script>

<?php if ($_GET['idAluno'] == '') { ?>
	<script>
		function validarProximo(){
			alert("Por favor, selecione o professor!");
		}
	</script>
<?php } ?>
</head>
<center>
<body>
<div id="interface">
	<?php  
		include_once "../menu.php";
	?>
	<div id="texto1">
		<h2>
			<table>
				<tr>
					<td >
						Professor
						<input type="text" id="alunoNome" value=
						<?php echo"'".$_GET['aluno']."'"?>>
						<button onclick="buscaAluno()">Buscar</button>
						<input value=<?php echo"'".$_GET['login']."'"?> type="text" size="2" style="opacity: 0" id="login" disabled>
						<input value=<?php echo"'".$_GET['nome']."'"?> type="text" size="2" style="opacity: 0" id="nome" disabled>
						<input value=<?php echo"'".$_GET['frase']."'"?> type="text" size="2" style="opacity: 0" id="frase" disabled>
						<input value=<?php echo"'".$_GET['idAluno']."'"?> type="text" size="2" style="opacity: 0" id="idAluno" disabled>
						<input value=<?php echo"'".$_GET['idLivro']."'"?> type="text" size="2" style="opacity: 0" id="idLivro" disabled>
						
						<div class='bloco'>
						<table>
							<tr>
								<td>
									<center><b>Selecionar</b></center>
								</td>
								<td>
									<center><b>Nome</b></center>
								</td>
								<td>
									<center><b>Masc</b></center>
								</td>							
							</tr>
							<?php
							include_once "../../_request/processaPesquisaProfessor.php";
							?>
						</div>
					</td>
					<td>
						<table>
							<?php
							include_once "../../_request/processaPesquisaProfessor2.php";
							?>
						</table>
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
							$link = "emprestimoLivroTipo.php";
							$login = "?login=".$_GET['login'];
							$nome = "&nome=".$_GET['nome'];
							$frase = "&frase=".$_GET['frase'];
							$url = $link.$login.$nome.$frase;
							echo "'".$url."'";
						?>
						>
							<img src="../../_imagens/botao/botao-anterior.png">
						</a>
					</td>
					<td>

						<a onclick="validarProximo()" href=
						<?php
							if ($_GET['idAluno'] != '') {
								if ($NumLivro < 3) {
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
								
							}	
							else echo "#";						
						?>
						>
							<img src="../../_imagens/botao/botao-proximo.png">
						</a>
					</td>
				</tr>
			</table>
			</center>
		</h2>
	</div>
</div>
<?php
	if ($NumLivro >= 3) {
?>
	<script>
		function validarProximo(){
			alert("O professor não pode pegar mais um Livro\nDeviso ao numero de livros que ele ja possui!");
		}
	</script>							
<?php	
	}				
?>
</body>
</center>
</html>