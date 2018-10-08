<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<title>Cadastro de Intem</title>
		<link rel="stylesheet" type="text/css" href="../../_css/estilo.css" />
		<link rel="stylesheet" type="text/css" href="../../_css/fotoProduto.css" />
		
		<script src="../../_js/funcoes/funcoes.js"></script>
		<script src="../../_validacao/validarItens.js"></script>
		<script src="../../_js/trocaFotoProduto.js"></script>
</head>
<center>
<body>
	<div id="interface">
		<img name="fotoInterfase" id="fotoInterfase" src="../../_imagens/produtos/fundo.jpg">
		<?php  
			include "../menu.php";
		?>
		<br>
		<form name="form" action="../../_request/processaCadastroItens.php" method="POST" onsubmit="return validacao();">
		<div id="texto1">
		<h2>
			<table>
				<tr>
					<td >
						Equipamento<linh class="asterisco">*</linh>: <br><br>
						<select onchange="voltaImagem(this)" style="font-size:20px" name="select_equipamento" id="select_equipamento" required>
							<?php
								 include "../../_select/selectEmquipamento.php";
							 ?>
						</select>
					</td>
				</tr>
				<tr>
				<td><br></td>
				</tr>
				<tr>
					<td>
						Produto<linh class="asterisco">*</linh>: <br><br>
						<select style="font-size:20px" id="select_produto" name="select_produto" onchange="trocaFotoProduto(this)" required disabled>
							 <?php
								 include "../../_select/selectProduto.php";
							 ?>
						</select>
					</td>
				</tr>
				<tr>
				<td><br></td>
				</tr>
				<tr>
					<td>
						Quantidade<linh class="asterisco" >*</linh>:<br><br> 
						<input maxlength="3" type="text" size="4" style="font-size:20px" name="quantidade" required>
					</td>
				</tr>
				<tr>
				<td><br></td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="Enviar" class="btn btn-xs btn-success" style="font-size:20px">&nbsp;&nbsp;
						<input type="reset" value="Limpar" class="btn btn-xs btn-danger" style="font-size:20px" onclick="voltaImagem()">
					</td>
				</tr>
			</table>
			
		</h2>
		<br><br><br><br>
		<br><br><br><br>		
		</div>
		</form>
	</div>
</body>
</html>