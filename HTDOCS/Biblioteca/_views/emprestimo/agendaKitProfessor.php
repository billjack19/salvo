<?php 
	$_SESSION['idKit'] = 0;
	$NumLivro = 0;
	$idProfessor = "";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Fazer Agendamento</title>
	<link rel="stylesheet" type="text/css" href="../../_css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="../../_css/emprestimoLivro.css" />
	
	<script type="text/javascript">
var idProfessor = 0;

function chamaIdSelec(){
	if (idProfessor != 1) {
		alert('Selecione um professor!');
	}
}

function buscaAluno(){
	var professor = document.getElementById('professorNome').value;
	var url = "?professor="+professor;
	window.location = url;
}
</script>
<!-- 
<?php if ($_GET['idProfessor'] == '') { ?>
	<script>
		function validarProximo(){
			alert("Por favor, selecione o professor!");
		}
	</script>
<?php } ?> -->
</head>
<center>
<body>
<div id="interface">
	<?php  
		include_once "../menu.php";
	?>
	<div id="texto1">
	<br>
		<h2>
			<table>
				<tr>
					<td >
					
						Professor
						<input type="text" id="professorNome" value=
						<?php echo"'".$_GET['professor']."'"?>>
						<button class="btn btn-xs btn-info" style="font-size:18px" onclick="buscaAluno()">Buscar</button>
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
									<center><b>Masc</b></center>
								</td>							
							</tr>
							<tr>
								<td><br></td>
							</tr>
							<?php
							include_once "../../_request/processaPesquisaProfessor.php";
							?>
						</div>
					</td>
					<td>
						&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<table>
							<div id="pesquisaProfessor2"></div>
							<!-- <?php
							// include_once "../../_request/processaPesquisaProfessor2.php";
							?> -->
						</table>
					</td>
				</tr>
			</table>
			<br>
			<center>
			<table>
				<tr>
					<td>
						<a class="botoesPadao btn btn-xs btn-primary" href="agendaKit.php">
							Anterior
						</a>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<div id="desabilitarLink" class="desabilitarLink">
							<a id="botaoProximo" class='botoesPadao btn btn-xs btn-primary' onclick="chamaIdSelec()" href='#'>
								Próximo
							</a>
						</div>
						<!-- <a class="btn btn-xs btn-primary" style="font-size:20px" onclick="validarProximo()" href=
						<?php
							if ($_GET['idProfessor'] != '') {
									$link = "agendaKitEquipamento.php?kit=";
									$idProfessor = "&idProfessor=".$_GET['idProfessor'];
									$idKit = "&idKit=".$_GET['idKit'];
									$url = $link.$login.$nome.$frase.$kit.$idProfessor.$idKit;
									echo "'".$url."'";
							}	
							else echo "#";						
						?>
						>
							Proximo
						</a> -->
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
<!-- <?php
	if ($NumLivro >= 3) {
?>
	<script>
		function validarProximo(){
			alert("O professor não pode pegar mais um Livro\nDeviso ao numero de livros que ele ja possui!");
		}
	</script>							
<?php	
	}				
?> -->
<script type="text/javascript">
$(document).ready(function(){
    $("button").click(function(){
   	idProfessor = this.value;
	$.post( 
		"../../_request/processaPesquisaProfessor2.php", 
		{"idProfessor" : $('#idProfessor'+idProfessor).val()},
		function( data ) {
			$( "#pesquisaProfessor2" ).html(data);
			var NumLivro = document.getElementById('NumLivro').value;
			var NumLivro = parseInt(NumLivro);
			idProfessor = 1;

			if (NumLivro < 2) {
				document.getElementById('botaoProximo').href = 'agendaKitEquipamento.php?kit=';
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
				document.getElementById('textoInformativo').innerHTML = 'O professor possui o numero maximo de livros!';
			}
			
		}
	);
    });
});
</script>
</body>
</center>
</html>