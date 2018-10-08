<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Cadastro de Funcionario</title>
	<link rel="stylesheet" type="text/css" href="../../_css/estilo.css" />
		
	<script src="../../_js/funcoes/funcoes.js"></script>
	<!-- <script src="../../_validacao/validarFuncionario.js"></script> -->
</head>
<center>
<body>
	<div id="interface">
		<?php  
			include "../menu.php";
		?>
		<br>
		<div id="texto1">
		<form name="form" action="../../_request/processaCadastroFuncionario.php?" method="POST">
		<h2>
			<table>
				<tr>
					<td >
						Nome do Funcionario<linh class="asterisco">*</linh>: <br>
						<input maxlength="30" type="text" size="44" class="inputDosCampos" id="nome" name="nome" required>&nbsp;&nbsp;
					</td>
					<td>
						Data de Nascimento<linh class="asterisco">*</linh>: <br>
						<input type="date" value="" size="13" class="selectDosCampos" id="data_nascimento" name="data_nascimento" required>&nbsp;&nbsp;
					</td>
					<td>
						Sexo<linh class="asterisco">*</linh>: <br>
						<select  class="selectDosCampos" name="sexo" required>
							<option value="1"></option>
							<option value="Masculino">Masculino</option>
							<option value="Feminino">Feminino</option>
						</select>&nbsp;&nbsp;
					</td>
				</tr>
			</table>
			<br>
			<table>
				<tr>
					<td>
						CPF<linh class="asterisco">*</linh>:<br>
						<input  onkeypress="formatar('###.###.###-##', this)" type="text" size="10" class="inputDosCampos" id="cpf" maxlength="14" name="cpf" required>&nbsp;&nbsp;
					</td>
					<td>
						RG: <br>
						<input maxlength="13" onkeypress="formatar('##-##.###.###', this)" onkeyup="maiuscula(this)" type="text" size="10" class="inputDosCampos" id="rg" name="rg">&nbsp;&nbsp;
					</td>
				</tr>
			</table>
			<br>
			<table>
				<tr>
					<td>
						Email: <br>
						<input type="email" size="21" class="inputDosCampos" id="email" name="email" maxlength="30">&nbsp;&nbsp;
					</td>
					<td>
						Telefone<linh class="asterisco">*</linh>: <br>
						<input maxlength="14" type="text" size="10" onkeypress="formatar('## # ####-####',this)" class="inputDosCampos" id="telefone" name="telefone" required>&nbsp;&nbsp;
					</td>
					<td>
						MASP<linh class="asterisco">*</linh>: <br>
						<input type="text" size="10" class="inputDosCampos" id="masp" name="masp" onkeypress="formatar('#.###.###-#', this)" maxlength="11" required>&nbsp;&nbsp;
					</td>
					<td>
						Cargo<linh class="asterisco">*</linh>:<br> 
						<select class="selectDosCampos" name="cargo" required>
							<?php
								 include "../../_select/selectCargo.php";
							 ?>
						</select>&nbsp;&nbsp;
					</td>
					<td>
						Turno<linh class="asterisco">*</linh>: <br>
						<select class="selectDosCampos" name="turno" required>
							<?php
								 include "../../_select/selectTurno.php"
							 ?>
						</select>&nbsp;&nbsp;
					</td>
				</tr>
			</table>
			<br>
			<table>
				<tr>
					<td>
						CEP<linh class="asterisco">*</linh>: <br>
						<input type="text" size="10" class="inputDosCampos" id="cep" name="cep" onkeypress="formatar('#####-###', this)" maxlength="9" required>&nbsp;&nbsp;

					</td>
					<td>
						Bairro<linh class="asterisco">*</linh>: <br>
						<input type="text" maxlength="20" size="20" class="inputDosCampos" id="bairro" name="bairro" required>&nbsp;&nbsp;
					</td>
					<td>
						Cidade<linh class="asterisco">*</linh>: <br>
						<input type="text" size="20" class="inputDosCampos" id="cidade" name="cidade" maxlength="20" required>&nbsp;&nbsp;
					</td>
					<td>
						UF<linh class="asterisco">*</linh>: <br>
						<input onkeyup="maiuscula(this)" type="text" maxlength="2" size="4" class="inputDosCampos" id="uf" name="estado" required>
						&nbsp;&nbsp;
					</td>
				</tr>
			</table>
			<br>
			<table>
				<tr>
					<td>
						Endereço<linh class="asterisco">*</linh>: <br>
						<input type="text" size="50" class="inputDosCampos" id="endereco" name="endereco" maxlength="50" required>&nbsp;&nbsp;
					</td>
					<td>
						Número<linh class="asterisco">*</linh>:&nbsp;&nbsp; <br>
						<input type="text" size="3" class="inputDosCampos" id="numero_end" onkeyup="somenteNumeros(this);" maxlength="3" name="numero_end" required>&nbsp;&nbsp;
					</td>
					<td>
						Complemento: <br>
						<input type="text" size="7" class="inputDosCampos" id="complemento_end" maxlength="15" name="complemento_end" required>&nbsp;&nbsp;
					</td>
				</tr>
			</table>
		</h2>
		<br><br><br>
		<input type="submit" value="Enviar" class="botoesPadao btn btn-xs btn-success">&nbsp;&nbsp;
		<input type="reset" value="Limpar" class="botoesPadao btn btn-xs btn-danger">
		</form>
	</div>
</body>
</html>