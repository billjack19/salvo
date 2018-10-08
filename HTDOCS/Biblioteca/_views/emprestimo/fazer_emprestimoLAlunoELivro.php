<?php
$data = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Fazer Emprestimo de Livro</title>
	<link rel="stylesheet" type="text/css" href="../../_css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="../../_css/emprestimoLivro.css" />
	<script src="../../_js/calcularData.js"></script>

	<script type="text/javascript">
		// function calcularData(){
		// 	var dataFinal = document.getElementById('dataI').value;
		// 	var valor = document.getElementById('prazoLivro').value;		
		// 	var dataNova = calcDataAdiciona(valor , dataFinal);
		// 	document.getElementById('dataF').value = dataNova;
		// }
		// function iniciar(){
		// 	document.getElementById('dataI').value = hoje();
		// 	calcularData();
		// }
		function fazerEmprestimo(){
			var emprestimo = "ok";
			var url = "?emprestimo="+emprestimo;
			window.location = url;
		}
	</script>
<!-- <?php
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
?> -->
</head>
<center>
<body onload="iniciar()">
<div id="interface">
	<?php  
		
		include "../menu.php";
		include_once "../../_request/processaEmpretimoLivro.php";
	?>
	<br>
	<div id="texto1">
		<h2>
			<table>
				<tr>
					<td>
						Aluno<br>
						<input type="text" class="oculta" id='idAluno' value=<?php echo "'".$_SESSION['idAluno']."'";?> disabled>
						<table>
							<div id="dadosAluno"></div>
						</table>

					</td>
					<td>&nbsp;</td>
					<td>
						Livro<br>
						<input type="text" class="oculta" id='idLivro' value=<?php echo "'".$_SESSION['idLivro']."'";?> disabled>
						<table>
							<div id="dadosLivro"></div>
						</table>
						<br>
						<p>.</p>

					</td>
					<td>&nbsp;</td>
					<td>
							<table>
							<tr>
								<td>Calculo de data</td>
							</tr>
							<tr>
								<td>Data Inicial:<br>
									<input type="date" id="dataI" style="font-size:20px" value=<?php echo "'".date('Y-m-d')."'";?> disabled>
								</td>
							</tr>
							<tr>
								<td><i class="fa fa-plus"></i> <?php echo $_SESSION['prazoLivro']?> dias</td>
							</tr>
							<tr>
								<td>
									Data Final: <br>
									<input type="date" id="dataF" style="font-size:20px" value=<?php echo "'".date('Y-m-d', strtotime($data . "+".$_SESSION['prazoLivro']." days"))."'";?> disabled>
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
						<a class="botoesPadao btn btn-xs btn-primary" href="fazer_emprestimoLLivro.php?livro=">
							Anterior
						</a>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<a class="botoesPadao btn btn-xs btn-danger" href="emprestimoLivroTipo.php">
							Limpar
						</a>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
					<!--?php
						if($_GET['emprestimo']==""){
					?-->
						<a class="botoesPadao btn btn-xs btn-success" onclick="fazerEmprestimo()" >
							Enviar
						</a>
					
					</td>
				</tr>
			</table>
			</center>
		</h2>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
   	// idAluno = $_SESSION['idAluno'];
   	$.post( 
		"../../_request/processaPesquisaLivro2.php", 
		{"idLivro" : $('#idLivro').val()},
		function( data ) {
			$( "#dadosLivro" ).html(data);
		});
	// document.getElementById('botaoProximo').href = 'fazer_emprestimoLAlunoELivro.php';
	// idLivro = 1;
	$.post( 
		"../../_request/processaPesquisaAluno2.php", 
		{"idAluno" : $('#idAluno').val()},
		function(data) {
			$( "#dadosAluno" ).html(data);
		});
	// document.getElementById('botaoProximo').href = 'fazer_emprestimoLLivro.php?livro=';
	// idAluno = 1;
	});
	
// });
</script>
</body>
</center>
</html>
<!-- 
SELECT t1e.ID_EMPRESTIMO_LIVRO , t2a.NOME_ALUNO , t3l.NOME_LIVRO , t1e.DATA_INICIAL_EMPRESTIMO_LIVRO , t1e.DATA_FINAL_EMPRESTIMO_LIVRO
FROM emprestimo_livro t1e
INNER JOIN aluno t2a ON (t1e.ID_ALUNO = t2a.ID_ALUNO)
INNER JOIN livro t3l ON (t1e.ID_LIVRO = t3l.ID_LIVRO) -->