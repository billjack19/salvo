<div id="cadastrar_se" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom">
		<div class="w3-container">
			<span onclick="document.getElementById('cadastrar_se').style.display='none'" class="w3-button w3-display-topright">
				&times;
			</span>
			<form action="controllers/cadastro_cliente_siteController.php" method="POST">
				<h2 class="corPrincipalText">Cadastre-se</h2>
				<p>Faça seu orçamento aqui!</p>
				<div class="row">
				<p class="col-md-4">
					<label>Nome: <span style="color: red">*</span></label>
					<input type="text" maxlength="200" class="form-control" name="nome_cliente_site" required>
				</p>
				<p class="col-md-8"></p>
				<p class="col-md-4">
					<label>Login: <span style="color: red">*</span></label>
					<input type="text" maxlength="200" class="form-control" name="login_cliente_site" required>
				</p>
				<p class="col-md-4">
					<label>Senha: <span style="color: red">*</span></label>
					<input type="password" maxlength="200" class="form-control" name="senha_cliente_site" required>
				</p>
				<p class="col-md-4">
					<label>Confirma Senha: <span style="color: red">*</span></label>
					<input type="password" maxlength="200" class="form-control" name="senha" required>
				</p>
				<p class="col-md-4">
					<label>Telefone: <span style="color: red">*</span></label>
					<input type="text" maxlength="30" class="form-control" name="telefone_cliente_site" required>
				</p>
				<p class="col-md-4">
					<label>Celular: </label>
					<input type="text" maxlength="30" class="form-control" name="celular_cliente_site">
				</p>
				<p class="col-md-4"></p>
				<p class="col-md-4">
					<label>Enderco: </label>
					<input type="text" maxlength="500" class="form-control" name="endereco_cliente_site">
				</p>
				<p class="col-md-4">
					<label>Número: </label>
					<input type="number" maxlength="11" class="form-control" name="numero_cliente_site">
				</p>
				<p class="col-md-4">
					<label>Complemento: </label>
					<input type="text" maxlength="200" class="form-control" name="complemento_cliente_site">
				</p>
				<p class="col-md-4">
					<label>Bairro: </label>
					<input type="text" maxlength="200" class="form-control" name="bairro_cliente_site">
				</p>
				<p class="col-md-4">
					<label>Cidade: </label>
					<input type="text" maxlength="200" class="form-control" name="cidade_cliente_site">
				</p>
				<div class="col-md-4">
					<label>Estado: </label>
					<div id="estadoDiv"></div>
					<script type="text/javascript" src="js/combo/estadoCombo.js"></script>
				</div>
				<p class="col-md-4">
					<label>Cep: </label>
					<input type="text" maxlength="" class="form-control" name="cep_cliente_site">
					<input type="hidden" name="bool_ativo_cliente_site" value="1">
				</p>
				</div>
				<p>
					<button type="submit">Cadastrar-se</button>
				</p>
			</form>
		</div>
	</div>
</div>