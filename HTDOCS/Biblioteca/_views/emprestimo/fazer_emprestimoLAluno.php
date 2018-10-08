<?php 
	$_SESSION['prazoLivro'] = 0;
	$NumLivro = 0;
	$idAluno = "";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Fazer Emprestimo de Livro</title>
	<link rel="stylesheet" type="text/css" href="../../_css/emprestimoLivro.css" />
	<style type="text/css">
		.desabilitarLink{
			position: relative;
			opacity: 1;
		}
	</style>	
</head>
<center>
<body>
<div id="interface">
	<?php  
		include_once "../menu.php";
	?>
	<script type="text/javascript">
var idAluno = 0;

function chamaIdSelec(){
	if (idAluno != 1) {
		alert('Selecione um aluno!');
	}
}
function buscaAluno(){
	var aluno = document.getElementById('alunoNome').value;
	var url = "?aluno="+aluno;
	window.location = url;
}
	</script>
<style type="text/css">
	.bu{
		width: 
	}
</style>
	<br>
	<div id="texto1">
		<h2>
			<table>
				<tr>
					<td >
						Aluno
						<input type="text" id="alunoNome" class="inputDosCampos" style='width: 250px;' value=<?php echo"'".$_GET['aluno']."'"?>>&nbsp;&nbsp;&nbsp;
						<button class="btn btn-xs btn-info" style="font-size:18px" onclick="buscaAluno()">Buscar</button>
						<br><br>
						<div class='bloco'>
						<table>
							<tr>
								<th style='width:120px;'>
									<center><b>Selecionar</b></center>
								</th>
								<th style='width:230px'>
									<center><b>Nome</b></center>
								</th>
								<th style='width:200px'>
									<center><b>Matricula</b></center>
								</th>							
							</tr>
							<tr>
								<td><br></td>
							</tr>
							<?php
							include_once "../../_request/processaPesquisaAluno.php";
							?>
						</table>
						</div>
					</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>
						<table>
							<div id="pesquisaAluno2"></div>
						</table>
					</td>
				</tr>
			</table>
			<br>
			<center>
			<table>
				<tr>
					<td>
					   <a class='botoesPadao btn btn-xs btn-primary' href='emprestimoLivroTipo.php'>
							Anterior
						</a>
					</td>
					<td>
						&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<div id="desabilitarLink" class="desabilitarLink">
							<a id="botaoProximo" class='botoesPadao btn btn-xs btn-primary' onclick="chamaIdSelec()" href='#'>
								Próximo
							</a>
						</div>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td colspan="3">
						<linh id="asterisco" class="asterisco"></linh>
						<span id="textoInformativo"></span>
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
	   	idAluno = this.value;
		$.post( 
			"../../_request/processaPesquisaAluno2.php", 
			{"idAluno" : $('#idAluno'+idAluno).val()},
			function( data ) {
				$( "#pesquisaAluno2" ).html(data);
				var NumLivro = document.getElementById('NumLivro').value;
				var NumLivro = parseInt(NumLivro);
				idAluno = 1;

				if (NumLivro < 2) {
					document.getElementById('botaoProximo').href = 'fazer_emprestimoLLivro.php?livro=';
					document.getElementById('botaoProximo').className = 'botoesPadao btn btn-xs btn-success';
					document.getElementById('desabilitarLink').style.opacity = 1;
					document.getElementById('asterisco').innerHTML = '';textoInformativo
					document.getElementById('textoInformativo').innerHTML = '';
				}
				else {
					document.getElementById('botaoProximo').href = '#';
					document.getElementById('botaoProximo').className = 'botoesPadao btn btn-xs btn-danger';
					document.getElementById('desabilitarLink').style.opacity = 0.7;
					document.getElementById('asterisco').innerHTML = '*';textoInformativo
					document.getElementById('textoInformativo').innerHTML = 'O aluno possui o numero maximo de livros!';
				}
				
			}
		);
    });
});
</script>
</body>
</center>
</html>