


<!-- *********************************************************************************************************************** -->
<!-- ** Login de Cliente * -->
<!-- *********************************************************************************************************************** -->

<div id="login_cliente" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom">
		<div class="w3-container">
			<span onclick="document.getElementById('login_cliente').style.display='none'" class="w3-button w3-display-topright">
				&times;
			</span>
			<form action="controllers/login.php" method="POST">
				<h2 class="corPrincipalText">Login</h2>
				<p></p>
				<p>
					<label><b>Login</b></label>
					<input required class="w3-input w3-border" name="login" type="text" id="txtLoginCliente">
					<input type="hidden" name="telaLogada" value="index">
				</p>
				<p>
					<label><b>Senha</b></label>
					<input required class="w3-input w3-border" name="senha" type="password">
				</p>
				<p>
					<label id="obsLogin"></label><br>
					<button class="corPrincipalFundo btn">Entrar</button>
					<br>
				</p>
				<p>
					<a href="#" onclick="modalEsqueciSenha()">Esqueci minha senha?</a>
				</p>
			</form>
		</div>
	</div>
</div>



<?php
	if (!empty($_SESSION['loginInvalido']) && $_SESSION['loginInvalido']) {
		$_SESSION['loginInvalido'] = false;
?>
	<script type="text/javascript">
		// alert("Login invalido");
		document.getElementById('login_cliente').style.display = 'block';
		document.getElementById('txtLoginCliente').focus();
		document.getElementById('obsLogin').innerHTML = "<b>* Observação: </b>Login ínvalido!";
	</script>
<?php
	} else if (!empty($_SESSION['loginValido']) && $_SESSION['loginValido']) {
		$_SESSION['loginValido'] = false;
?>
	<!-- Quando Login For Feito Com Sucesso -->
<?php
	}
?>





<!-- *********************************************************************************************************************** -->
<!-- ** Configuraçõe de tracar Senha * -->
<!-- *********************************************************************************************************************** -->

<div id="trocar_senha_modal" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom">
		<div class="w3-container">
			<span onclick="document.getElementById('trocar_senha_modal').style.display='none'" class="w3-button w3-display-topright">
				&times;
			</span>
			<h2 class="corPrincipalText">Trocar Senha</h2>
			<p>
				<label><b>Senha Antiga</b></label>
				<input required class="w3-input w3-border" name="login" type="password" id="senhaOld">
				<input type="hidden" name="telaLogada" value="index">
			</p>
			<p>
				<label><b>Senha Nova</b></label>
				<input required class="w3-input w3-border" name="senha" type="password" id="senhaNew">
			</p>
			<p>
				<label><b>Confirmação da Senha Nova</b></label>
				<input required class="w3-input w3-border" name="senha" type="password" id="comf_senhaNew">
			</p>
			<p>
				<label id="obsLogin"></label><br>
				<button class="corPrincipalFundo btn" onclick="trocarSenha();">Trocar Senha</button>
				<br>
			</p>
		</div>
	</div>
</div>

<script type="text/javascript">
	function trocarSenha(){
		var campoFocus = "";
		var senhaOld = $("#senhaOld").val();
		var senhaNew = $("#senhaNew").val();
		var comf_senhaNew = $("#comf_senhaNew").val();

			 if(senhaOld == "") 		campoFocus = "senhaOld";
		else if(senhaNew == "") 		campoFocus = "senhaNew";
		else if(comf_senhaNew == "") 	campoFocus = "comf_senhaNew";

		else {
			if (senhaNew == comf_senhaNew) {
				$.ajax({
					url:'controllers/funcoesController.php',
					type: 'POST',
					dataType: 'text',
					data: {
						'consultarSenha': true,
						'id_usuario': $("#cliente_site_id").val(),
						'table': "cliefornec",
						'senha': senhaOld
					}
				}).done( function(data){
					if (data != 1 && data != "1") alert("Senha inválida! Não encontrou sua senha antiga!");
					else {
						$.ajax({
							url:'controllers/funcoesController.php',
							type: 'POST',
							dataType: 'text',
							data: {
								'alterarPerfil': true,
								'id_usuario': $("#cliente_site_id").val(),
								'table': "cliefornec",
								'senha': senhaNew
							}
						}).done( function(data){
							console.log(data);
							if (data != 1 && data != "1") 	alert("Falha ao Alterar!");
							else {
								alert("Alterado com sucesso!");
								$("#senhaOld").val("");
								$("#senhaNew").val("");
								$("#comf_senhaNew").val("");
								document.getElementById('trocar_senha_modal').style.display='none'
							}
						});
					}
				});
			}
			else alert('Senha inválida! A primeira senha nova é diferente da confirmação!');
		} 
		if (campoFocus != "") {
			document.getElementById(campoFocus).focus();
			alert('Preencha no mínimo todos os campos obrigatórios!');
		}
	}
</script>





<!-- *********************************************************************************************************************** -->
<!-- ** Esqueci Minha Senha * -->
<!-- *********************************************************************************************************************** -->

<div id="esqueci_senha" class="w3-modal">
<!--<div id="login_corretor" class="modal-dialog modal-sm">-->
	<div class="w3-modal-content w3-animate-zoom">
		<div class="w3-container">
			<span onclick="document.getElementById('esqueci_senha').style.display='none'" class="w3-button w3-display-topright">
				&times;
			</span>
			<!-- <form action="controllers/verificacaoEmail.php" method="POST"> -->
				<h2 class="corPrincipalText">Esqueci minha senha</h2>
				<p>
					<label class="corPrincipalText"><b>Login</b></label>
					<input required class="w3-input w3-border" onkeyup="limparCamoEmail();" name="login" id="modalEsqueciLogin" type="text">
					<input type="hidden" name="telaLogada" id="telaLogadaEsqueci" value="index">
					<input type="hidden" name="email" id="emailEsqueci" value="index">
				</p>
				<p>
					<button class="corPrincipalFundo btn" type="button" onclick="verificarCPF();">Verificar</button>
					<br><br>
					<label class="corPrincipalText" id="emailEsqueciText"></label>
				</p>
				<p>
					<button class="corPrincipalFundo btn" id="btnEsqueci" onclick="mandarEmailEsquici()" disabled>Enviar</button>
				</p>
			<!-- </form> -->
		</div>
	</div>
</div>

<script type="text/javascript">
	function modalEsqueciSenha(){
		document.getElementById('login_cliente').style.display = 'none';
		document.getElementById('esqueci_senha').style.display = 'block';
		document.getElementById('modalEsqueciLogin').focus();
	}

	function verificarCPF(){
		document.getElementById('emailEsqueciText').innerHTML = "Carregando...";
		var rf = document.getElementById('modalEsqueciLogin').value;
		$.ajax({
			url:'controllers/funcoesController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'consultaContato': true,
				'login': rf
			}
		}).done( function(data){
			document.getElementById('emailEsqueciText').innerHTML = "Email: "+data;
			document.getElementById('emailEsqueci').value = data;
			if (data != "Sem Registro" && data != "") {
				document.getElementById("btnEsqueci").disabled = false;
			} else {
				document.getElementById("btnEsqueci").disabled = true;
			}
		});
	}

	function limparCamoEmail(){
		$("#emailEsqueci").val("");
		document.getElementById('emailEsqueciText').innerHTML = "";
		document.getElementById("btnEsqueci").disabled = true;
	}
	// cafepocos@cafepocos.com.br

	function mandarEmailEsquici(){
		document.getElementById('emailEsqueciText').innerHTML = "Carregando...";
		var rf = document.getElementById('modalEsqueciLogin').value;
		$.ajax({
			url:'mail/esqueci_minha_senha.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'login': rf,
				'telaLogada': $("#telaLogadaEsqueci").val(),
				'email': $("#emailEsqueci").val()
			}
		}).done( function(data){
			document.getElementById('emailEsqueciText').innerHTML = "Email: "+data;
			document.getElementById('emailEsqueci').value = data;
			document.getElementById("btnEsqueci").style.display = 'none';
			$("#modalEsqueciLogin").val("");
		});
	}
</script>

