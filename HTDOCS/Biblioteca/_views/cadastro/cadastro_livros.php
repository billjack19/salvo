<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Cadastro de livros</title>
	<link rel="stylesheet" type="text/css" href="../../_css/estilo.css" />

	<script src="../../_js/funcoes/funcoes.js"></script>
	<!-- <script src="../../_validacao/validarLivro.js"></script> -->
	<script type="text/javascript">
		function pegaTemaLivro(selTag) {
			var x = selTag.options[selTag.selectedIndex].text;
			if (x == 'Didático') {
				id("ano_livro").disabled = false;
				id("ano_livro").required = true;

				id("materias").disabled = false;
				id("materias").required = true;

				id("idioma").disabled = true;
				id("idioma").required = true;
				id("idioma").value = 1;

				id('divAno').style.opacity = '1';
				id('divMateria').style.opacity = '1';
				id('divIdioma').style.opacity = '0.7';
			}
								    
			else if (x == 'Dicionario') {
				id("idioma").disabled = false;
				id("idioma").required = true;

				id("ano_livro").disabled = true;
				id("ano_livro").required = false;
				id("ano_livro").value = 1;

				id("materias").disabled = true;
				id("materias").required = false;
				id("materias").value = 1;

				id('divAno').style.opacity = '0.7';
				id('divMateria').style.opacity = '0.7';
				id('divIdioma').style.opacity = '1';
			}

			else {
				id("idioma").disabled = true;
				id("idioma").required = false;
				id("idioma").value = 1;

				id("ano_livro").disabled = true;
				id("ano_livro").required = false;
				id("ano_livro").value = 1;

				id("materias").disabled = true;
				id("materias").required = false;
				id("materias").value = 1;

				id('divAno').style.opacity = '0.7';
				id('divMateria').style.opacity = '0.7';
				id('divIdioma').style.opacity = '0.7';
			} 
		}
	</script>
</head>
<center>
<body>

	<div id="interface">
		<?php  
			include "../menu.php";
		?>
		<br>
		<div id="texto1">
		<form name="formCadastroLivro" >
			<h2>
				<table>
					<tr>
						<td>
							Nome do Livro<linh class="asterisco">*</linh>: <br>
							<input maxlength="35" type="text" id="nome" name="nome" size="40" class="inputDosCampos form-control" required='true'>
						</td>
						<td>&nbsp;&nbsp;</td>
						<td>
							Código<linh class="asterisco">*</linh>: <br>
							<input maxlength="15" type="text" id="codigo" size="7" name="codigo" class="inputDosCampos form-control" required>
						</td>
						<td>&nbsp;&nbsp;</td>
						<td>
							Tema<linh class="asterisco">*</linh>: <br>
							<select name="tema" class="selectDosCampos" onchange="pegaTemaLivro(this)" required>
								<?php
									 include "../../_select/selectTema.php";
								 ?>
							</select>&nbsp;&nbsp;
						</td>
					</tr>
					<tr>
						<td><br></td>
					</tr>
				</table>
				<table>
					<tr>
						<td>
							Autor<linh class="asterisco">*</linh>: <br>
							<input maxlength="30" type="text" size="25" id="liv_autor" name="autor" class="inputDosCampos form-control" required>
						</td>
						<td>&nbsp;&nbsp;</td>
						<td>
							ISBN<linh class="asterisco">*</linh>: <br>
							<input type="text" id="liv_isbn" name="isbn" class="inputDosCampos form-control" maxlength="17" size="13" type="text" onkeypress="formatar('###-#-####-####-#',this)" required>
						</td>
						<td>&nbsp;&nbsp;</td>
						<td>
							Estante: <br>
							<input maxlength="2" id="liv_edicao" name="estante" size="4" onkeyup="somenteNumeros(this);" class="inputDosCampos form-control">
						</td>
						<td>&nbsp;&nbsp;</td>
						<td>
							Prateleira: <br>
							<input maxlength="2" id="liv_edicao" name="prateleira" size="4" onkeyup="somenteNumeros(this);" class="inputDosCampos form-control">
						</td>								
					</tr>
					<tr>
						<td><br></td>
					</tr>
				</table>
				<table>
					<tr>
						<td>
							<div class="divSelect" id="divMateria">
								Matérias:<br>
								<select id="materias" name="materias" class="selectDosCampos" disabled>
									<option value=""></option>
									<?php
									  include "../../_select/selectMateria.php";
									?>
								</select>
							</div>
						</td>
						<td>&nbsp;&nbsp;</td>
						<td>
						</td>
						<td>
							<div class="divSelect" id="divAno">
								Ano: <br>
								<select class="selectDosCampos" name="ano" id="ano_livro" disabled>
									<option value=""></option>
									<?php
									  include "../../_select/selectAno.php";
									?>
								</select>
							</div>
						</td>
						<td>&nbsp;&nbsp;</td>
						<td>	
							Editora: <br>
							<input maxlength="20" type="text" id="liv_editora" name="editora" size="25" class="inputDosCampos form-control">
						</td>
						<td>&nbsp;&nbsp;</td>
						<td>
							Edição: <br>
							<input maxlength="10" type="text" id="liv_edicao" name="edicao" size="8" class="inputDosCampos form-control">
						</td>
					</tr>
					<tr>
						<td><br></td>
					</tr>
				</table>
				<table>
					<tr>
						<td>
							<div class="divSelect" id="divIdioma">
								Idioma: <br>
								<select class="selectDosCampos" name="idioma" id="idioma" disabled> 
									<?php
									  include "../../_select/selectIdioma.php";
									?>
								</select>&nbsp;&nbsp;
							</div>
						</td>
						<td>
							Prazo<linh class="asterisco">*</linh>: <br>
							<input maxlength="3" type="text" id="liv_prazo" name="prazo" size="5" onkeyup="somenteNumeros(this);" class="inputDosCampos form-control" required>
						</td>
					</tr>								
				</table>
			</h2>
			<br><br><br><br><br>
			<input type="submit" value="Enviar" class="botoesPadao btn btn-xs btn-success">&nbsp;&nbsp;
			<input type="reset" value="Limpar" class="botoesPadao btn btn-xs btn-danger">
		</form>
		</div>
	</div>
</body>
</center>
</html>
<!-- btn btn-xs btn-success -->