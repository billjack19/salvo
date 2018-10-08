<!-- consulta_emprestimoLAlunoELivro -->
<?php  ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Consultar Emprestimos de Livros</title>
	<style type="text/css">

	</style>
	<script type="text/javascript">
function busca(){
	var aluno = document.getElementById('alunoNome').value;
	var tipoFiltro = document.getElementById('filtroEmprestimo').value;
	var url = "?aluno="+aluno+"&tipoFiltro="+tipoFiltro+"&devolver=";
	window.location = url;
}
function nomeEmprestimo(){
	var aluno = document.getElementById('alunoNome').value;
	var tipoFiltro = document.getElementById('filtroEmprestimo').value;
	var url = "?laluno="+aluno;
	url += "&tipoFiltro="+tipoFiltro;
	url += "&devolver=ok";
	window.location = url;
}
</script>
</head>
<center>
<body>
<div id="interface">
	<?php 
		include_once "../menu.php";
	?>
	<div id="texto1"><br>
		<h2>
		<?php 
			if ($_GET['tipoFiltro'] == '1') {?>
				<select style="font-size:18px" id="filtroEmprestimo" onblur="busca()">
					<option value="1" selected>Livros para devolver</option>
					<option value="2">Livros devolvidos</option>
					<option value="0">Todos</option>
				</select>
		<?php }
			else if ($_GET['tipoFiltro'] == '2') {?>
				<select style="font-size:18px" id="filtroEmprestimo" onblur="busca()">
					<option value="1">Livros para devolver</option>
					<option value="2" selected>Livros devolvidos</option>
					<option value="0">Todos</option>
				</select>
		<?php
			}else if ($_GET['tipoFiltro'] == '0') {
		?>
				<select style="font-size:18px" id="filtroEmprestimo" onblur="busca()">
					<option value="1">Livros para devolver</option>
					<option value="2">Livros devolvidos</option>
					<option value="0" selected>Todos</option>
				</select>
		<?php
			}
		?>
		Aluno
		<input type="text" id="alunoNome" class="inputDosCampos" value=<?php echo "'".$_GET['aluno']."'"?>>
		<button class="btn btn-xs btn-info" style="font-size:18px" onclick="busca()">
			Buscar
		</button>
		<br><br>
		<div class='bloco2'>
			<table>
				<tr>
					<th>
						<center><b>Selecionar</b></center>
					</th>
					<th>
						<center><b>Nome</b></center>
					</th>
					<th>
						<center><b>Livro</b></center>
					</th>
					<th>
						<center><b>Data Inicial</b></center>
					</th>	
					<th>
						<center><b>Data Final</b></center>
					</th>						
				</tr>
				<?php
				include "../../_request/processaPesquisaEmpresitmoLLivro.php";
				?>
			</table>
		</div>
		</h2>
		<br><br>
		<a class="botoesPadao btn btn-xs btn-primary" href="emprestimoLivroTipo2.php">
			Anterior
		</a>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $(".botaoDevolver").click(function(){
   	idEmprestimo = this.value;
	$.post( 
		"../../_request/processaDevolucaoLivro.php", 
		{"idEmprestimo" : idEmprestimo},
		function( data ) {
		});
	alert("O Livro foi devolvido com sucesso\nE já está disponivel para o proximo leitor!");
	busca();
    });
});
</script>
</body>
</center>
</html>