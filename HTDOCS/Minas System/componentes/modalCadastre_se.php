<div id="cadastrar_se" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom">
		<div class="w3-container">
			<span onclick="document.getElementById('cadastrar_se').style.display='none'" class="w3-button w3-display-topright">
				&times;
			</span>
			<!-- <form action="controllers/cadastro_cliente_siteController.php" method="POST"> -->
				<h2 class="corPrincipalText">Cadastre-se</h2>
				<p>Faça seu orçamento aqui!</p>
				<div class="row">
				<p class="col-md-4">
					<label>Nome: <span style="color: red">*</span></label>
					<input type="text" maxlength="200" class="form-control" id="nome_cliente_site" required>
				</p>
				<p class="col-md-8"></p>
				<p class="col-md-4">
					<label>Login: <span style="color: red">*</span></label>
					<input type="text" maxlength="200" class="form-control" id="login_cliente_site" required>
				</p>
				<p class="col-md-4">
					<label>Senha: <span style="color: red">*</span></label>
					<input type="password" maxlength="200" class="form-control" id="senha_cliente_site" required>
				</p>
				<p class="col-md-4">
					<label>Confirma Senha: <span style="color: red">*</span></label>
					<input type="password" maxlength="200" class="form-control" id="senha_confir_cliente_site" required>
				</p>
				<p class="col-md-4">
					<label>Telefone: <span style="color: red">*</span></label>
					<input type="text" maxlength="30" class="form-control" id="telefone_cliente_site" required>
				</p>
				<p class="col-md-4">
					<label>Celular: </label>
					<input type="text" maxlength="30" class="form-control" id="celular_cliente_site">
				</p>
				<p class="col-md-4"></p>
				<p class="col-md-4">
					<label>Enderco: </label>
					<input type="text" maxlength="500" class="form-control" id="endereco_cliente_site">
				</p>
				<p class="col-md-4">
					<label>Número: </label>
					<input type="number" maxlength="11" class="form-control" id="numero_cliente_site">
				</p>
				<p class="col-md-4">
					<label>Complemento: </label>
					<input type="text" maxlength="200" class="form-control" id="complemento_cliente_site">
				</p>
				<p class="col-md-4">
					<label>Bairro: </label>
					<input type="text" maxlength="200" class="form-control" id="bairro_cliente_site">
				</p>
				<p class="col-md-4">
					<label>Cidade: </label>
					<input type="text" maxlength="200" class="form-control" id="cidade_cliente_site">
				</p>
				<div class="col-md-4">
					<label>Estado: </label>
					<div id="estadoDiv"></div>
					<script type="text/javascript" src="js/combo/estadoCombo.js"></script>
				</div>
				<p class="col-md-4">
					<label>Cep: </label>
					<input type="text" maxlength="" class="form-control" id="cep_cliente_site">
					<input type="hidden" id="bool_ativo_cliente_site" value="1">
				</p>
				</div>
				<p>
					<button onclick="cadastrarCliente()">Cadastrar-se</button>
				</p>
			<!-- </form> -->
			<script type="text/javascript">
				function cadastrarCliente(){
					if (
						$("#nome_cliente_site").val() 		!= "" &&
						$("#login_cliente_site").val() 		!= "" &&
						$("#senha_cliente_site").val() 		!= "" &&
						$("#telefone_cliente_site").val() 	!= "" &&
						$("#senha_cliente_site").val() 		== $("#senha_confir_cliente_site").val()
					) {
						$.ajax({
							url:'controllers/cadastro_cliente_siteController.php',
							type: 'POST',
							dataType: 'text',
							data: {
								'nome_cliente_site': $("#nome_cliente_site").val(),
								'login_cliente_site': $("#login_cliente_site").val(),
								'senha_cliente_site': $("#senha_cliente_site").val(),
								'telefone_cliente_site': $("#telefone_cliente_site").val(),
								'celular_cliente_site': $("#celular_cliente_site").val(),
								'endereco_cliente_site': $("#endereco_cliente_site").val(),
								'numero_cliente_site': $("#numero_cliente_site").val(),
								'complemento_cliente_site': $("#complemento_cliente_site").val(),
								'bairro_cliente_site': $("#bairro_cliente_site").val(),
								'cidade_cliente_site': $("#cidade_cliente_site").val(),
								'estado_id': $("#estado_id").val(),
								'cep_cliente_site': $("#cep_cliente_site").val(),
								'bool_ativo_cliente_site': $("#bool_ativo_cliente_site").val()
							}
						}).done( function(data){
							// console.log(data.substring(data.lenght-2, data.lenght));
							if (parseInt(data) == -1) {
								alert("Login já exixte! Por Favor tente outro.");
								$("#login_cliente_site").val("");
								document.getElementById("login_cliente_site").focus();
							}
							else {
								window.location.assign("index.php");
							}

						});
					} else {
						alert("Preencha todos os dados obrigatórios corretamente!");
					}
				}
			</script>
		</div>
	</div>
</div>