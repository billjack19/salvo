<?php
	session_start();
	date_default_timezone_set("America/Sao_Paulo");
	setlocale(LC_ALL, 'pt_BR');
	include_once "menus/link.php";
?>
<style>
#logo{
	background: url('http://localhost/Biblioteca/_imagens/foto2.png') no-repeat 30px 10px;
	/*background-color: red; */
	animation-name: imagemLogo;
    animation-duration: 5s;
    animation-delay: 0s;
    animation-iteration-count: infinite;
}
@keyframes imagemLogo {
	0%   {opacity: 0}
    50%  {opacity: 1}
    100%   {opacity: 0}
}
</style>
<script type="text/javascript">
	// trocaFoto();
	var segundos = 5;
	var fotoLogo = 2;
	setInterval("trocaFoto();",segundos*1000);

	function trocaFoto(){		
		// alert('fotoLogo');
		if (fotoLogo == 2){
			fotoLogo = 1;
			document.getElementById('logo').style.backgroundImage = "url('http://localhost/Biblioteca/_imagens/foto1.png')";
		}
		else{
			fotoLogo = 2;
			document.getElementById('logo').style.backgroundImage = "url('http://localhost/Biblioteca/_imagens/foto2.png')";
		}
	}
</script>
<div id="cabecalho">

	<div id="logo" class="logo">
	<!-- <img id="logo" class="logo" src="http://localhost/Biblioteca/_imagens/foto2.png"> -->
	<!--  w3-hover-sepia -->
	</div>
<?php 
	include_once "../../_request/processaPesquisaUsuario.php";
?>
<?php
	if ($_SESSION["login"] == 1) {
		include_once "menus/menu1.php";	
	}
	else if ($_SESSION["login"] == 2){
		include_once "menus/menu2.php"; 
	}
?>
