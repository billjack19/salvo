<?php 
	$NumLivro = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Fazer Agendamento</title>
	<link rel="stylesheet" type="text/css" href="../../_css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="../../_css/emprestimoLivro.css" />
	
	<script type="text/javascript">

var idKit = 0;

function chamaIdSelec(){
	if (idKit != 1) {
		alert('Selecione um equipamento!');
	}
}
function buscaAluno(){
	var kit = document.getElementById('kitNome').value;
	var url = "?kit="+kit;
	window.location = url;
}
</script>
<!-- 
<?php 
 if ($_GET['idKit'] == '') { ?>
	<script>
		function validarProximo(){
			alert("Por favor, selecione o equipamento a ser agendado!");
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
						Equipamento
						<input type="text" id="kitNome" class="inputDosCampos" style='width: 250px;' value=<?php echo"'".$_GET['kit']."'"?>>&nbsp;&nbsp;&nbsp;
						<button class="btn btn-xs btn-info" style="font-size:18px"  onclick="buscaAluno()">
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
									<center><b>Descrição</b></center>
								</td>							
							</tr>
							<tr>
								<td><br></td>
							</tr>
							<?php
							include_once "../../_request/processaPesquisaKit.php";
							?>
						</div>
					</td>
					<td>
						&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<table>
							<div id="processaPesquisaKit2"></div>
							<!-- <?php
							//include_once "../../_request/processaPesquisaKit2.php";
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
						<a class="btn btn-xs btn-primary" style="font-size:20px" href="agendaKitProfessor.php?professor=">
							Voltar
						</a>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<a id="botaoProximo" class='botoesPadao btn btn-xs btn-primary' onclick="chamaIdSelec()" href='#'>Próximo</a>
						<a href=""></a>
						<!-- <href=
						<?php
							// if ($_GET['idKit'] != '') {
									$link = "agendaKitCalendario.php";
									$agendar = "?agendar=";
									$date = '';//date('Y-m-d');
									$date2 = date('d/m/Y')-1;
									$data = "&data=".$date;
									$data2 = "&data2=".$date2;
									$url = $link.$agendar.$data.$data2;
									echo "'".$url."'";
							// }	
							// else echo "#";						
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
	idKit = this.value;
	$.post( 
		"../../_request/processaPesquisaKit2.php", 
		{"idKit" : $('#idKit'+idKit).val()},
		function( data ) {
			$( "#processaPesquisaKit2" ).html(data);
		});
	document.getElementById('botaoProximo').href = 'agendaKitCalendario.php?data=';
	idKit = 1;
    });
});
</script>
</body>
</center>
</html>