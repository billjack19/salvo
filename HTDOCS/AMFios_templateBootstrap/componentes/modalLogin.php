<div id="login_cliente" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom">
		<div class="w3-container">
			<span onclick="document.getElementById('login_cliente').style.display='none'" class="w3-button w3-display-topright">
				&times;
			</span>
			<form action="controllers/login.php" method="POST">
				<h2 class="corPrincipalText">Login</h2>
				<p>Faça seu orçamento aqui!</p>
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
					<!-- <a href="#" onclick="modalEsqueciSenha()">Esqueci minha senha?</a> -->
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