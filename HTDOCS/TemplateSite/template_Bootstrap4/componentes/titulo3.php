<?php

$tituloContato = "Entre em contato conosco e solicite orçamento!";

?>


<!-- Contact Section -->
<div class="w3-container w3-padding-32" id="<?php echo $linkTitulo3; ?>">
	<br>
	<table width="100%">
		<tr>
			<td width="50%">
				<h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 corPrincipalText">
					<?php echo $titulo3; ?>
				</h3>
				<h4><?php echo $tituloContato; ?></h4>
	
				<form action="app/controllers/orcamentoController.php" target="_blank">
					<input class="w3-input" type="text" placeholder="Nome" required name="Nome">
					<input class="w3-input w3-section" type="text" placeholder="E-mail" required name="Email">
					<input class="w3-input w3-section" type="text" placeholder="Telefone" required name="Telefone">
					<input class="w3-input w3-section" type="text" placeholder="Assunto" required name="Assunto">
					<!-- <textarea class="w3-input w3-section" type="text" placeholder="Mensagem" required name="Mensagem" rows="2" ></textarea> -->
					<input class="w3-input w3-section" type="text" placeholder="Mensagem" required name="Mensagem">
					
					<!-- <br>Se preferir envie um arquivo com sua solicitação (ex: .doc, .xls, .ppt, .pdf): -->
					<!-- <br><input type="file" name="arquivo"><br> -->
					
					<button class="w3-button w3-section corPrincipalFundo" type="submit">
						<i class="fa fa-paper-plane"></i> ENVIAR MENSAGEM
					</button>
				</form>
			</td>
			<td width="50%" class="w3-hide-small">
				<img src="app/img/contato.jpg" width="100%">
			</td>
		</tr>
	</table>
</div>