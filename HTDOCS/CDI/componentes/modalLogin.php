
<script type="text/javascript">
	var usuario_Gloabal = "";
	var aplicativos_Global = "";
</script>

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
				<h2 class="">Login</h2>
				<p></p>
				<p>
					<label><b>CNPJ *</b></label>
					<input required class="w3-input w3-border" name="login" id="login" type="text" id="txtLoginCliente">
					<input type="hidden" name="telaLogada" value="index">
				</p>
				<p>
					<label><b>Senha *</b></label>
					<input required class="w3-input w3-border" name="senha" id="senha" type="password">
				</p>
				<p>
					<label id="obsLogin"></label><br>
					<!-- <button onclick="logarSistemaUnicoAjax()" class="corPrincipalFundo btn">Entrar</button> -->
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



<script type="text/javascript">
	function logarSistemaUnicoAjax(){
		$.ajax({
			url: "controllers/login.php",
			type: "POST",
			dataType: "text",
			data: {
				'login': $("#login").val(),
				'senha': $("#senha").val()
			}
		}).done( function (data){
			console.log(data);
			usuario_Gloabal = JSON.parse(data);
			console.log(usuario_Gloabal);
		});
	}
</script>




<?php
	if (!empty($_SESSION['loginInvalido']) && $_SESSION['loginInvalido']) {
		$_SESSION['loginInvalido'] = false;
?>
	<script type="text/javascript">
		// alert("Login invalido");
		document.getElementById('login_cliente').style.display = 'block';
		document.getElementById('txtLoginCliente').focus();
		document.getElementById('obsLogin').innerHTML = "<b>* Observação: </b>Login ínvalido!";
		try{
			localStorage.removeItem("empresa_Global");
		}catch(error){
			console.log(error);
		}
	</script>
<?php
	} else if (!empty($_SESSION['loginValido']) && $_SESSION['loginValido']) {
		/* $_SESSION['loginValido'] = false; */
		echo "
			<script type=\"text/javascript\"> 
				var codigoCliente_Gloabal = ".$_SESSION['login_cliente'].";
				function retornaCliente(){
					var nomeCliente = '".$_SESSION['nome_cliente']."';

					console.log(nomeCliente);
					var objetoString = \"{\\\"CODIGO\\\":\\\"".$_SESSION['login_cliente']."\\\",\\\"CPF_CGC\\\":\\\"".$_SESSION['CPF_CGC']."\\\",\\\"RAZAOSOCIAL\\\":\\\"".$_SESSION['nome_cliente']."\\\",\\\"WEB_NOME_REDUZIDO\\\":\\\"".$_SESSION['WEB_NOME_REDUZIDO']."\\\"}\";

					console.log(objetoString);
					localStorage.setItem(\"empresa_Global\", objetoString);
					return nomeCliente;
				}
			</script>";
?>
	<!-- Quando Login For Feito Com Sucesso -->
	<script type="text/javascript">
		var linkNomeCliente = "<a class=\"nav-link dropdown-toggle\" href='#' style=\"color: <?php echo $corTexto; ?>;\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" style=\"color: white;\">"
								+ 	"<i class='fa fa-user'></i>&nbsp;&nbsp;&nbsp;"+retornaCliente().split(" ")[0]
								+ "</a>"

								+ 	"<div class=\"dropdown-menu dropdown-menu-right\"  aria-labelledby=\"navbarDropdownPortfolio\">"
								+ 		"<a class=\"dropdown-item\" href=\"#\" onclick='abrirModalAplicaoes()'>"
								+ 			"Aplicações"
								+ 		"</a>"
								+ 		"<a class=\"dropdown-item\" href=\"#\" onclick='abrirModalTrocarSenha()'>"
								+ 			"Trocar Senha"
								+ 		"</a>"
								+ 		"<a class=\"dropdown-item\" href=\"#\" onclick='sairSistema()'>"
								+ 			"Sair"
								+ 		"</a>"
								+ 	"</div>";
		document.getElementById("clienteLogado").innerHTML = linkNomeCliente;
		document.getElementById("clienteLogado").className = "nav-item dropdown show";
	</script>
<?php
	}
?>

<form style="display: none" action="controllers/login.php" method="POST">
	<input type="submit" id="deslogarSistema" name="deslogar" value="true">
</form>


<script type="text/javascript">

	function abrirModalTrocarSenha(){
		document.getElementById("trocar_senha_modal").style.display = "block";
	}

	function sairSistema(){
		if (confirm("Tem certeza que deseja sair da aplicação?")) {
			document.getElementById("deslogarSistema").click();
		}
	}

	function abrirModalAplicaoes(){
		document.getElementById("modalAplicaoesWeb").style.display = "block";
		listarAplicacoes();
	}

	function listarAplicacoes(){
		console.log("codigoCliente_Gloabal: " + codigoCliente_Gloabal);
		$.ajax({
			url: "controllers/login.php",
			type: "POST",
			dataType: "text",
			data: {
				'listarAplicacoes': true,
				'id': codigoCliente_Gloabal
			}
		}).done( function (data){
			console.log(data);
			aplicativos_Global = JSON.parse(data);
			console.log(aplicativos_Global);
			var conteudoAplicativos = "";

			conteudoAplicativos += "<br>";
			for (var i = 0; i < aplicativos_Global.length; i++) {
				conteudoAplicativos += 	"<div class='col-md-4'>"
									+  		"<li>"
									+ 			"<a href='" + aplicativos_Global[i].local_web_aplicativo + "'>"
									+ 				aplicativos_Global[i].descricao_web_aplicativo
									+ 			"</a>"
									+		"</li>"
									+ 	"</div>";
			}
			conteudoAplicativos += "<br>";
			$("#listaDeAplicacoes").html(conteudoAplicativos);
		});
	}
</script>


<!-- *********************************************************************************************************************** -->
<!-- ** Modal de Aplicações Web * -->
<!-- *********************************************************************************************************************** -->

<div id="modalAplicaoesWeb" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom">
		<div class="w3-container" style="padding: 10px;">
			<span onclick="document.getElementById('modalAplicaoesWeb').style.display='none'" class="w3-button w3-display-topright">
				&times;
			</span>
			<h2 class="">Aplicativos</h2>
			<div id="listaDeAplicacoes"></div>
		</div>
	</div>
</div>











<!-- *********************************************************************************************************************** -->
<!-- ** Configuraçõe de tracar Senha * -->
<!-- *********************************************************************************************************************** -->

<div id="trocar_senha_modal" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom">
		<div class="w3-container">
			<span onclick="document.getElementById('trocar_senha_modal').style.display='none'" class="w3-button w3-display-topright">
				&times;
			</span>
			<h2 class="">Trocar Senha</h2>
			<p>
				<label><b>Senha Antiga *</b></label>
				<input required class="w3-input w3-border" name="login" type="password" id="senhaOld">
				<input type="hidden" name="telaLogada" value="index">
			</p>
			<p>
				<label><b>Senha Nova *</b></label>
				<input required class="w3-input w3-border" name="senha" type="password" id="senhaNew">
			</p>
			<p>
				<label><b>Confirmação da Senha Nova *</b></label>
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
						'senha': senhaOld
					}
				}).done( function(data){
					console.log("confimar se é a mesma senha: " + data);
					if (data != 1 && data != "1") alert("Senha inválida! Não encontrou sua senha antiga!");
					else {
						$.ajax({
							url:'controllers/funcoesController.php',
							type: 'POST',
							dataType: 'text',
							data: {
								'alterarPerfil': true,
								'id_usuario': $("#cliente_site_id").val(),
								'senha': senhaNew
							}
						}).done( function(data){
							console.log("confirma se alterou: " + data);
							if (data != 1 && data != "1") alert("Falha ao Alterar!");
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
				<h2 class="">Esqueci minha senha</h2>
				<p>
					<label class=""><b>Login *</b></label>
					<input required class="w3-input w3-border" onkeyup="limparCamoEmail();" name="login" id="modalEsqueciLogin" type="text">
					<input type="hidden" name="telaLogada" id="telaLogadaEsqueci" value="index">
					<input type="hidden" name="email" id="emailEsqueci" value="index">
				</p>
				<p>
					<button class="corPrincipalFundo btn" type="button" onclick="verificarCPF();">Verificar</button>
					<br><br>
					<label class="" id="emailEsqueciText"></label>
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
			/* console.log(data); */
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
			console.log(data);
			document.getElementById('emailEsqueciText').innerHTML = "Email Teste: "+data;
			document.getElementById('emailEsqueci').value = data;
			document.getElementById("btnEsqueci").style.display = 'none';
			$("#modalEsqueciLogin").val("");
		});
	}
</script>