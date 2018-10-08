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
var idLivro = 0;

function chamaIdSelec(){
	if (idLivro != 1) {
		alert('Selecione um livro!');
	}
}

function buscaLivro(){
	var livro = document.getElementById('livroNome').value;
	url = "?livro="+livro;
	window.location = url;
}
</script>
</head>
<center>
<body>
<div id="interface">
	<?php  
		include_once "../menu.php";
	?><br>
	<div id="texto1">

		<h2>
			<table>
				<tr>
					<td >
						Livro
						<input type="text" id="livroNome" class="inputDosCampos" style='width: 250px;' value=<?php echo"'".$_GET['livro']."'"?>>&nbsp;&nbsp;&nbsp;
						<button class="btn btn-xs btn-info" style="font-size:18px" onclick="buscaLivro()">
							<i class="fa fa-search" aria-hidden="true"></i>&nbsp;&nbsp;Buscar
						</button>
						<br><br>
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
							<tr>
								<td><br></td>
							</tr>
							<?php
							include_once "../../_request/processaPesquisaLivro.php";
							?>
						</table>
						</div>
					</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>
						<table>
							<div id="pesquisaLivro2"></div>
						</table>
					</td>
				</tr>
			</table>
			<br>
			<center>
			<table>
				<tr>
					<td>
						<a class='botoesPadao btn btn-xs btn-primary' href=
							<?php
								$link = "fazer_emprestimoLAluno.php";
								$aluno = "?aluno=";
								$url = $link.$aluno;
								echo "'".$url."'";
							?>
						>
							Anterior
						</a>
					&nbsp;&nbsp;
						<a id="botaoProximo" class='botoesPadao btn btn-xs btn-primary' onclick="chamaIdSelec()" href='#'>Próximo</a>
						<!-- <a id="botaoProximo" class='botoesPadao btn btn-xs btn-primary' onclick="validarProximo()" href=
							<?php
								$link = "fazer_emprestimoLAlunoELivro.php";
								$livro = "&livro=" ;
								$emprestimo = "&emprestimo=";
								$url = $link.$livro.$emprestimo;
								$arquivo = str_replace("#", "", $url);
								echo "'".$url."'";						
							?>
						>
							Proximo
						</a> -->
					</td>
				</tr>
			</table>
			</center>
		</h2>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("button").click(function(){
   	idLivro = this.value;
	$.post( 
		"../../_request/processaPesquisaLivro2.php", 
		{"idLivro" : $('#idLivro'+idLivro).val()},
		function( data ) {
			$( "#pesquisaLivro2" ).html(data);
		});
	document.getElementById('botaoProximo').href = 'fazer_emprestimoLAlunoELivro.php?emprestimo=';
	idLivro = 1;
    });
});
</script>
</body>
</center>
</html>