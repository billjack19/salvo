<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Cadastro de Aluno</title>
	<script src="../../_js/funcoes/funcoes.js"></script>
</head>
<center>
<body>
	<div id="interface">
		<?php  
			include "../menu.php";
		?>
		<br>
		<div id="texto1">
		<form name="formCadastroAluno" id="formCadastroAluno">
		<h2>
			<table>
				<tr>
					<td >
						Nome do Aluno<linh class="asterisco">*</linh>: <br>
						<input type="text" size="50" class="inputDosCampos form-control" style="" maxlength="30" id="nome" name="nome" required>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						Matricula<linh class="asterisco">*</linh>:<br> 
						<input type="text" size="9"  class="inputDosCampos form-control" maxlength="10" id="matricula" name="matricula" required>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						Data de Nascimento<linh class="asterisco">*</linh>: <br>
						<input type="date" size="13"  class="inputDosCampos form-control" id="data_nascimento" name="data_nascimento" required>
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
			</table>
			<table>
				<tr>
					<td>
						CPF:<br>
						<input  onkeypress="formatar('000.000.000-00', this)" type="text" size="15"  class="inputDosCampos form-control" id="cpf" maxlength="14" name="cpf">		
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						RG: <br>
						<input maxlength="10" placeholder="Só números" onkeypress="formatar('##.###.###', this)" onkeyup="maiuscula(this)" type="text" size="10" name="rg"  class="inputDosCampos form-control" id="rg">
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						Sexo<linh class="asterisco">*</linh>: <br>
						<select id="sexo" name="sexo"  class="selectDosCampos" required>
							<option value=""></option>
							<option value="Masculino">Masculino</option>
							<option value="Feminino">Feminino</option>
						</select>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
					<tr>
					<td><br></td>
				</tr>
			</table>
			<table>
				<tr>
					<td>
						Email: <br>
						<input type="email" size="21"  class="inputDosCampos form-control" maxlength="50" id="email" name="email">
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						Telefone<linh class="asterisco">*</linh>: <br>
						<i><input maxlength="14" type="text" size="15" onkeypress="formatar('## # ####-####',this)"  class="inputDosCampos form-control" id="telefone" name="telefone" placeholder="## # ####-####" required></i>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						Turma<linh class="asterisco">*</linh>:<br>
						<input onkeypress="somenteNumeros(this);" maxlength="3" type="text" size="5"  class="inputDosCampos form-control" name="turma" id="turma" required>
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
			</table>
			<table>
				<tr>
					<td>
						Turno<linh class="asterisco">*</linh>: <br>
						<select class="selectDosCampos" name="turno" id="turno" required>
							<?php
								 include "../../_select/selectTurno.php";
							 ?>
						</select>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						Ano<linh class="asterisco">*</linh>: <br>
						<select  class="selectDosCampos" id="ano" name="ano" required>
							<option value=""></option>
							<?php
								 include "../../_select/selectAno.php";
							 ?>
						</select>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						Sala<linh class="asterisco">*</linh>:<br>
						<select  class="selectDosCampos" name="sala" id="sala" required>
							<option value=""></option>
							<?php
								 include "../../_select/selectSala.php";
							 ?>
						</select>
					</td>
					<td>&nbsp;&nbsp;</td>
				</tr>
			</table>
			<br><br><br>
		</h2>
		<input type="submit" value="Enviar" class="botoesPadao btn btn-xs btn-success">&nbsp;&nbsp;
		<i class="fa fa-trash" aria-hidden="true"></i>
		<input type="reset" value="Limpar" class="botoesPadao btn btn-xs btn-danger">
		<input type="text" id="aceita" value="n" size="1" disabled style="opacity:0;">
		</form>
		</div>
	</div>
</body>
<script src="../../_js/ajax/ajaxAluno.js"></script>
</center>
</html>