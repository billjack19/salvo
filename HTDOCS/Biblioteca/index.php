<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>E.E.David Campista</title>

	<meta charset="utf-8">

	<link rel="icon" href="_imagens/login/icone.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="_imagens/login/icone.ico" type="image/x-icon" />
	<link rel="stylesheet" href="_css/estiloLogin.css" type="text/css"/>
</head>
<body>
	<div id="quadro">
		<div class="message"></div>
		<div class="logo"> <img id="cara" src="_imagens/login/cara.png"/></div><br>

		<center><h3 id="entre">Entre com sua conta</h3></center>

		<form name="loginform" method="post" action="_request/processa_login.php">
			<img id="loga" src="_imagens/login/log.png">
			<a id="e1">Usuário:</a>
			<input id="in1" type="text" name="usuario" size="33pt">

			<img id="passw" src="_imagens/login/pass.png">
			<a id="e2">Senha:</a>
			<input id="in2" type="password" name="senha" size="33pt">

			<div id="div_nivel">
				<input type="radio" name="nivel" value="1" checked="checked">
				Administrador
				<input type="radio" name="nivel" value="2">
				Bibliotecaria
			</div>
			<button class="botao" type="submit" value="Entrar" name="logar">Entrar</button>
		</form>

	</div>
</body>
</html>