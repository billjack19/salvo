<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Cadastro de Produto</title>
	<!-- Padrão js -->
	<script src="../../_js/funcoes/funcoes.js"></script>
	<script src="../../_js/jquery.js"></script>
	<script src="../../_js/ajax/ajaxProduto.js"></script>	
</head>
<center>
<body>
<div id="interface">
	<?php  
		include "../menu.php";
	?>
	<br>
	<div id="texto1">
		<form class="form" name="form" method="post">
		<h2>
			Descrição do Produto<linh class="asterisco">*</linh>: <br>
			<input type="text" size="44" class="inputDosCampos form-control" id="produto" name="produto" class="produto" required="required">
		</h2>
		<br><br><br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br><br><br>
		<input type="submit" value="Enviar" class="btn btn-xs btn-success" style="font-size:20px">&nbsp;&nbsp;
		<input type="reset" value="Limpar" class="btn btn-xs btn-danger" style="font-size:20px">
		</form>
	</div>
</div>
</body>
</center>
<input value=<?php echo"'".$_GET['login']."'"?> type="text" size="2" style="opacity: 0" id="login" disabled>
<input value=<?php echo"'".$_GET['nome']."'"?> type="text" size="2" style="opacity: 0" id="nome" disabled>
<input value=<?php echo"'".$_GET['frase']."'"?> type="text" size="2" style="opacity: 0" id="frase" disabled>
	<!-- action="../../_request/processaCadastroProduto.php" method="POST" -->
</html>