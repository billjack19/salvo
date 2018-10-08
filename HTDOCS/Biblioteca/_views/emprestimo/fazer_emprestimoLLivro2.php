<?php
	$status = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Fazer Emprestimo de Livro</title>
	<link rel="stylesheet" type="text/css" href="../../_css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="../../_css/emprestimoLivro.css" />
	<script type="text/javascript">
function nomeLivro(documento){
	var id_livro = documento.value;
	var livro = document.getElementById('livroNome').value;
	var login = document.getElementById('login').value;
	var nome = document.getElementById('nome').value;
	var frase = document.getElementById('frase').value;
	var id_aluno = document.getElementById('idAluno').value;
	var url = "?login="+login;
	url += "&nome="+nome;
	url += "&frase="+frase;
	url += "&livro="+livro;
	url += "&idLivro="+id_livro;
	url += "&idAluno="+id_aluno;
	window.location = url;
}
function buscaLivro(){
	var id_aluno = document.getElementById('idAluno').value;
	var livro = document.getElementById('livroNome').value;
	var login = document.getElementById('login').value;
	var nome = document.getElementById('nome').value;
	var frase = document.getElementById('frase').value;
	var id_livro = document.getElementById('idLivro').value;
	var url = "?login="+login;
	url += "&nome="+nome;
	url += "&frase="+frase;
	url += "&livro="+livro;
	url += "&idAluno="+id_aluno;
	url += "&idLivro="+id_livro;
	window.location = url;
}
</script>
<?php if ($_GET['idLivro'] == '') { ?>
	<script>
		function validarProximo(){
			alert("Por favor, selecione um livro!");
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
						Livro
						<input type="text" id="livroNome" value=
						<?php echo"'".$_GET['livro']."'"?>>
						<button onclick="buscaLivro()">Buscar</button>
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
									<center><b>Prazo</b></center>
								</td>
								<td>
									<center><b>Codigo</b></center>
								</td>							
							</tr>
							<?php
							include_once "../../_request/processaPesquisaLivro.php";
							?>
						</table>
						</div>
					</td>
					<td>
						<table>
							<?php
							include_once "../../_request/processaPesquisaLivro2.php";
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
							$link = "fazer_emprestimoLProfessor.php";
							$login = "?login=".$_GET['login'];
							$nome = "&nome=".$_GET['nome'];
							$frase = "&frase=".$_GET['frase'];
							$aluno = "&aluno=";
							$idLivro = "&idLivro=".$_GET['idLivro'];
							$idAluno = "&idAluno=".$_GET['idAluno'];
							$url = $link.$login.$nome.$frase.$aluno.$idLivro.$idAluno;
							echo "'".$url."'";
						?>
						>
							<img src="../../_imagens/botao/botao-anterior.png">
						</a>
					</td>
					<td>
						<a onclick="validarProximo()" href=
						<?php
							if ($_GET['idLivro'] != '') {
								if ($status == 1) {
									$link = "fazer_emprestimoLProfessorELivro.php";
									$login = "?login=".$_GET['login'];
									$nome = "&nome=".$_GET['nome'];
									$frase = "&frase=".$_GET['frase'];
									$livro = "&livro=" ;
									$idLivro = "&idLivro=".$_GET['idLivro'];
									$idAluno = "&idAluno=".$_GET['idAluno'];
									$emprestimo = "&emprestimo=";
									$url = $link.$login.$nome.$frase.$livro.$idLivro.$idAluno.$emprestimo;
									$arquivo = str_replace("#", "", $url);
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
	if ($status == 2) {
?>
	<script>
		function validarProximo(){
			alert("Livro Indisponivel!");
		}
	</script>							
<?php	
	}				
?>
</body>
</center>
</html>