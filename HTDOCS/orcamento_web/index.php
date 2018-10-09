<?php

session_start();

if (!empty($_SESSION['loginValido']) && $_SESSION['loginValido']) {
	include "classe/conexao.php";

	$conexao = new ConexaoCDI();
	$pdo = $conexao->Connect();
	$validador = 0;

	if (
		!empty($_SESSION['WEB_SENHA_CNPJ'])  && 
		!empty($_SESSION['WEB_BANCO_DADOS']) &&
		!empty($_SESSION['WEB_USUARIO_BD'])  &&
		!empty($_SESSION['WEB_SENHA_BD'])
	) {
		$sql = "SELECT COUNT(*) FROM web_aplicativos_cliente
		WHERE cliefornec_id = 208
		AND web_aplicativo_id = 1";
		$verifica = $pdo->query($sql);
		foreach ($verifica as $dados) $validador = $dados[0];
	} else {
		$sql = "SELECT 
					cliefornec.WEB_SENHA_CNPJ, 
					cliefornec.WEB_BANCO_DADOS, 
					cliefornec.WEB_USUARIO_BD,
					cliefornec.WEB_SENHA_BD
				FROM web_aplicativos_cliente
				INNER JOIN cliefornec ON web_aplicativos_cliente.cliefornec_id = cliefornec.CODIGO
				WHERE web_aplicativo_id = 1 -- CODIGO DA APLICAÇÃO ORCAMENTO CDI
				AND cliefornec_id = ".$_SESSION['login_cliente'];
		$verifica = $pdo->query($sql);
		foreach ($verifica as $dados){
			$validador++;
			$_SESSION['WEB_SENHA_CNPJ'] 	= $dados['WEB_SENHA_CNPJ'];
			$_SESSION['WEB_BANCO_DADOS'] 	= $dados['WEB_BANCO_DADOS'];
			$_SESSION['WEB_USUARIO_BD'] 	= $dados['WEB_USUARIO_BD'];
			$_SESSION['WEB_SENHA_BD'] 		= $dados['WEB_SENHA_BD'];
		}
	}

	if ($validador == 0) sairTela();
	/*$_SESSION['aplicativo'] = !empty($_SESSION['aplicativo']) ? $_SESSION['aplicativo'] : [];
	$parametro = [ 'app'=>'orcamento', 'cliente'=>$_SESSION['login_cliente'] ];
	array_push($_SESSION['aplicativo'], $parametro);*/
} else sairTela();

function sairTela(){
	echo "	<script>
				alert(\"Você não está logado para este tipo de operação.\\\nPor favor tente logar no site para depois acessar este aplicativo!\");
				window.location.assign(\"http://localhost:8088/CDI/index.php\");
			</script>";
}
/* 
echo "	<script>
			var cliente_Gloabal = ".$_SESSION['login_cliente'].";
			console.log('".$_SESSION['login_cliente']." - ".$_SESSION['nome_cliente']."');
		</script>"; 
}*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Orçamento - CDI</title>
	<script>
		// var caminhoServer = "http://192.168.100.15:8088/Araguaia/controllers/"; 
		var caminhoServer = "http://www.cdiinfo.com.br/ARAGUAIA/web/controllers/";
		var usuario_Global = "";
		var pedido_Global = "";
		var pedido_item_Global = "";
		var pedido_edit_Global = "";
		var indicePedido_Global = 0;
		var clientes_list_Global = "";
		var cliente_Global = "";
		var item_list_Global = "";
		var item_Global = "";
		var preco_minimo_Global = true;
		var statusPedido_Gloabal = "";
		var ultimaPaginaGlobal = "conteudoPedido";

		var parametroCodigoDinheiro_Global = 5;


		/* IP do Web Service */
		var hostWebService = "192.168.0.105";

		/* IP das Imagens do servidor */
		var hostServeImage = "192.168.0.105";

		var portaWebService = ":8080";
		var portaImgService = "80";

		var caminhoWebService = "/LanchesCDI_MySQL/webresources/";/* LanchesCDI */
		var urlWebService = "http://"+hostWebService+portaWebService+caminhoWebService;
		var parametrosWebService = "?tagmode=any&jsoncallback=?";
		var listagem = false;

		var vendedor = 0;
		var filialGearl = 0;
		var sequencia = 0;
		var documentoGeral = "";
	</script>

	<meta charset="utf-8" />
	<link rel='shortcut icon' href="img/icone.ico" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="msapplication-tap-highlight" content="no" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
	<!-- This is a wide open CSP declaration. To lock this down for production, see below. -->
	<meta http-equiv="Content-Security-Policy" content="default-src * 'unsafe-inline'; style-src 'self' 'unsafe-inline'; media-src *" />

	<script type="text/javascript" src="js/jQuery.js"></script>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css">      


	<script type="text/javascript" src="js/config/element.js"></script>
	<script type="text/javascript" src="js/config/funcoes.js"></script>
	<script type="text/javascript" src="js/config/funcoes2.js"></script>
	<script type="text/javascript" src="js/config/menu.js"></script>
	<script type="text/javascript" src="js/config/formulario.js"></script>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<!-- Scrips padrão -->
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript" src="js/valorPorExtenco.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<script type="text/javascript" src="js/bootbox.js"></script>
	<script type="text/javascript" src="js/masked2.js"></script>
	<script type="text/javascript" src="js/masked.js"></script>
	<script type="text/javascript" src="js/toast.js"></script>
	<script type="text/javascript" src="js/maskmoney.js"></script>
	<script type="text/javascript" src="js/moment.js"></script>

	<!-- Biblioteca dataList usando Jquery  -->
	<link href="lb/jquery-flexdatalist/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
	<script src="lb/jquery-flexdatalist/jquery.flexdatalist.min.js"></script>

	<script src="js/jquery.maskMoney.min.js" type="text/javascript"></script>

	<link rel="stylesheet" type="text/css" href="css/toast.css">

	<!-- <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->

	<!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Our Custom CSS -->
	<link rel="stylesheet" href="https://bootstrapious.com/tutorial/sidebar/style3.css">
	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

</head>
<body> <!-- onload="configIp()" -->
<!-- <body onload="document.getElementById('textUsuario').focus()"> -->

	<div id="wrapper">
		<div class="overlay"></div>
	
		<!-- Sidebar -->
		<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
			<ul class="nav sidebar-nav">
				<li class="sidebar-brand">
					<a href="#">
					   Orçamento: <span id='codigoPedido' name='codigoPedido'></span>
					</a>
				</li>
				<li>
					<a href="#" name='linkPeginaPedido' onclick='mostrarPedidoPre("conteudoPedido", this);'>
						<i class='fa fa-user'></i> Cliente
					</a>
				</li>
				<li>
					<a href="#" name='linkPeginaPedido' onclick='mostrarPedidoPre("conteudoPedidoItem", this)'>
						<i class='fa fa-shopping-cart'></i> Produtos
					</a>
				</li>
				<li>
					<a href="#" name='linkPeginaPedido' onclick='mostrarPedidoPre("conteudoPedidoEntrega", this)'>
						<i class='fa fa-truck'></i> Entrega
					</a>
				</li>
				<li>
					<a href="#" name='linkPeginaPedido' onclick='mostrarPedidoPre("conteudoPedidoPagamento", this)'>
						<i class='fa fa-money'></i> Pagamento
					</a>
				</li>
				<li class="dropdown hidden">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Works <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li class="dropdown-header">Dropdown heading</li>
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li><a href="#">Separated link</a></li>
						<li><a href="#">One more separated link</a></li>
					</ul>
				</li>
				<li class="hidden">
					<a href="#">Services</a>
				</li>
				<li class="hidden">
					<a href="#">Contact</a>
				</li>
				<li class="hidden">
					<a href="https://twitter.com/maridlcrmn">Follow me</a>
				</li>
			</ul>
		</nav>
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">
			<button type="button" class="hamburger is-closed hidden" id="btnMenuGeralOrcamento" data-toggle="offcanvas">
				<span class="hamb-top"></span>
				<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
			</button>


			<div class="container" style="margin-top: 0px;">
				<br><br>
				<div id="conteudoView">
					<!-- <div class="col-xs-12">
						<h1>Orçamento - CDI</h1>
						<div class="col-xs-5 iconPrincipal"><br>
							<span class="fontIcon"><i class="fa fa-shopping-cart"></i></span><br>
							<h3>Vendas</h3>
						</div>
						<div class="col-xs-5 iconPrincipal"><br>
							<span class="fontIcon"><i class="fa fa-users"></i></span><br>
							<h3>Clientes</h3>
						</div>
					</div> -->

					<div class="col-md-6 col-md-offset-3">
						<div class="col-xs-12">
							<label class="label-float" for="name" accesskey="i">Usuário:</label>
							<input id="login" type="text" class="form-control" size="12pt" required>
						</div>
						<br>
						<div class="col-xs-12" id="subMenu">
							<label class="label-float" for="name">Senha:</label>
							<input id="password" type="password" class="form-control" size="12pt" required>
						</div>
						<br>
						<div class="col-xs-12"  id="listaConteudo">
							<button class="btn btn-primary btn-block" onclick="validarLogarSistema()">
								Entrar
							</button><br>
							<br><br><br>
							<a href="http://www.cdiinfo.com.br/" target="_blank"><img src="img/Logo.png" width="80%"></a>
							<br>
							<span id="msmErrorLogin"></span>
							<br><br><br><br><br>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- /#page-content-wrapper -->
	</div>
	<!-- /#wrapper -->
</div>

<style type="text/css">

	.fontBranca{
		color: white;
	}

	.tamanhoTotal{
		width: 50px;
		bottom: 0px;
		/*height: 225px;*/
		/*width: 100%;*/
		margin-top: -10px;
		/*margin-left: 5px;*/
		overflow: auto;
		overflow-x: scroll;
	}

	.tabela{
		margin-bottom: 15px;
		width: 100%; 
	}


	.fontIcon{
		font-size: 50px;
	}
	.iconPrincipal{
		border-style: solid;
		border-color: gray;
		border-radius: 10px;
		box-shadow: 10px 10px 10px #eee;
		text-align: center;
		margin-left: 15px;
		margin-bottom: 15px;
	}
	.iconPrincipal:hover {
		background-color: lightblue;
		color: white;

	}

	.imgFixedTopPedido{
		width: 7%;
		position: absolute;
		right: 3px;
	}


	.botaoMenuPedido {
		font-size: 20px;
		padding-left: 50px;
		padding-right: 50px;
	}


	@media screen and (max-width: 900px)  {
		.imgFixedTopPedido{
			width: 10%;
			position: absolute;
			right: 0px;
		}
	}

	@media screen and (max-width: 610px)  {
		.imgFixedTopPedido{
			width: 13%;
			position: absolute;
			right: 0px;
		}
	}
</style>




<div class="styleFooter fixed-top" id="cabecarioOpcao">
	<div class="text-center">
		<h2 class="text-center">Orçamento CDI</h2>
	</div>
</div>




<!-- ************************************************************************************************** -->
<!-- Radapé Inicial -->
<!-- ************************************************************************************************** -->
<footer class="fixed-bottom" id="rodapeView">
	<div class="row">
		<div class="col-xs-12" style="background-color: #fff;">
			<table class="table">
				<tr>
					<td align="left" width="35%">
						<div id="botaoFixoEsquerda">
							
						</div>
					</td>
					<td align="center" width="15%" id="logoCentroRodape">
						<!-- <a href="http://www.cdiinfo.com.br/" target="_blank"><img src="img/LogotipoCDI.jpg" width="100%"></a> -->
					</td>
					<td align="right" width="35%">
						<div id="botaoFixoDireita">
							<!-- <button onclick='configIp();' class="btn btn-primary">
								data-toggle='modal' data-target='#modalConfiguraIp'
								<i class="fa fa-cog" aria-hidden="true"></i>&nbsp;&nbsp;Configurar IP
							</button> -->
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</footer>








<!-- Modal Visualizar Item -->
<div class="modal fade" id="modalVisuPedido" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="setStatus('pagina3');setarIpCampoConfig();"  id="fecharModalIpBottun" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Visualizar Orçamento: <b><span id="pedidoTituloModalVisuPedido"></span></b></h4>
			</div>
			<div class="modal-body">
				<table class="table" style="margin-top: -15px;">
					<tr class="hidden">
						<td width="20%" class="pedidoTabelaModalVisuPedido">Orçamento</td>
						<td id="pedidoModalVisuPedido"></td>
					</tr>
					<tr>
						<td width="20%" class="pedidoTabelaModalVisuPedido">Emissão</td>
						<td id="emissaoModalVisuPedido"></td>
					</tr>
					<tr>
						<td width="20%" class="pedidoTabelaModalVisuPedido">Cliente</td>
						<td id="clienteModalVisuPedido"></td>
					</tr>
					<tr>
						<td width="20%" class="pedidoTabelaModalVisuPedido">Telefone</td>
						<td id="telefoneModalVisuPedido"></td>
					</tr>
					<tr>
						<td width="20%" class="pedidoTabelaModalVisuPedido">Total</td>
						<td id="totalModalVisuPedido"></td>
					</tr>
					<tr>
						<td width="20%" class="pedidoTabelaModalVisuPedido">Endereço</td>
						<td id="enderecoModalVisuPedido"></td>
					</tr>
					<tr>
						<td width="20%" class="pedidoTabelaModalVisuPedido">Contato</td>
						<td id="contatoModalVisuPedido"></td>
					</tr>
					<tr>
						<td width="20%" class="pedidoTabelaModalVisuPedido">Pagamento</td>
						<td id="pagamentoModalVisuPedido"></td>
					</tr>
				</table>
				<div id="gradeItenModalVisuPedido"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Fechar
				</button>
			</div>
		</div>
	</div>
</div>


   




<!-- *********************************************************************************************************** -->
<!-- Scripts para configuração de pagina -->
<!-- *********************************************************************************************************** -->

<script src="js/tela/pagamento.js"></script>
<script src="js/tela/adicionaItem.js"></script>
<script src="js/tela/pedido.js"></script>
<script src="js/tela/entrega.js"></script>
<script src="js/tela/pedidoItem.js"></script>

<script src="js/ajax/ajax_login.js"></script>
<script src="js/ajax/ajax_pedido.js"></script>
<!-- <script src="js/ajax/ajax_pedido.min.js"></script> -->
<script src="js/ajax/ajax_endereco.js"></script>
<script src="js/ajax/ajax_menu.js"></script>
<!-- <script src="js/ajax/ajax_item.js"></script> -->
<!-- <script src="js/ajax/ajax_mesa.js"></script> -->
<script src="js/ajax/ajax_sql.js"></script>
<script src="js/ajax/ajax_outros.js"></script>
<!-- <script src="js/ajax/ajax_pedido_view.js"></script> -->
<!-- <script src="js/ajax/ajax_pedido_impressao.js"></script> -->
<!-- <script src="js/ajax/ajax_confgAndroid.js"></script> -->


<style>
@media screen and (min-width: 450px)  {
	[data-role=page]{height: 100% !important; position:relative !important; top:0 !important;}

	.legenda{
		border-style: ridge;
		width: 50px;
		height: 25px;
	}
	.btn {
		/*height: 40px;*/
		font-size: 20px;
	}
	.form-control {
		height: 35px;
		font-size: 27px;
	}
	select.form-control{
		height: 35px;
		font-size: 20px;
	}
	footer {
		position: fixed;
		height: 90px;
		bottom: 0px;
		width: 100%;
		background-color: white;
		padding-bottom: 30px;
	}

	.menuLegenda{
		position: fixed;
		height: 45px;
		bottom: 90px;
		width: 100%;
		background-color: white;
		padding: 15px;
	}

	.styleFooter{
		background-color: white;
		position: fixed;
		height: 120px;
		top: 0px;
		padding-top: 5px;
		padding-bottom: 5px;
		width: 100%;
	}

	.fontTable{
		font-size: 25px;
		color: #fff;
		margin-bottom: 0px;
	}


	.fontTable2{
		font-size: 20px;
	}
}

@media screen and (max-width: 450px) {
	footer {
		position: fixed;
		height: 45px;
		bottom: 0px;
		width: 100%;
		background-color: white;
		padding-bottom: 30px;
	}


	.legenda{
		border-style: ridge;
		width: 25px;
		height: 12.5px;
	}



	.menuLegenda{
		position: fixed;
		height: 25px;
		bottom: 45px;
		width: 100%;
		background-color: white;
		padding: 5px;
	}


	.styleFooter{
		background-color: white;
		position: fixed;
		height: 55px;
		top: 0px;
		padding-top: 5px;
		padding-bottom: 5px;
		width: 100%;
	}

	.fontTable{
		font-size: 10px;
		color: #fff;
	}

	.fontTable2{
		font-size: 10px;
	}

	.btn{
		padding-left: 6px;
		padding-right: 6px;
		padding-top: 3px;
		padding-bottom: 3px;
	}

	.form-control {
		height: 35px;
		font-size: 15px;
	}
	select.form-control{
		height: 35px;
		font-size: 15px;
	}
}






.corRed{color: red;}
.corVerde{color: green;}

.botoesTelaPedidoImprimir{
	color:blue;
}


@font-face {
	font-family: font_titulo2;
	src: url(fonts/Crown_Heights.ttf);
}
@font-face {
	font-family: font_titulo3;
	src: url(fonts/Shania&Heinz_PersonalUseOnly.ttf);
}
@font-face {
	font-family: font_titulo;
	src: url(fonts/Black_Party.ttf);
}
@font-face {
	font-family: font_texto2;
	src: url(fonts/Lobster 1.4.otf);
}
@font-face {
	font-family: font_texto;
	src: url(fonts/Uptown-Market-Upright-Demo.ttf);
}

body{
	font-family: calibri;
	font-size: 17px;
}
h1{
	font-family: font_texto;
}
h2{
	font-family: calibri;
}



.pedidoTabelaModalVisuPedido{
	border-right-style: solid;

	/*position: absolute;
	right: */
}
</style>
<link rel="stylesheet" type="text/css" href="css/estiloSideBar.css">
</body>


<script type="text/javascript">
/* ************************************************************************************************** */
/** configurações do menu de lado */
$(document).ready(function () {
	var trigger = $('.hamburger'),
		overlay = $('.overlay'),
	   isClosed = false;

	trigger.click(function () {
		hamburger_cross();      
	});

	function hamburger_cross() {
		if (isClosed == true) {          
			overlay.hide();
			trigger.removeClass('is-open');
			trigger.addClass('is-closed');
			isClosed = false;
		} else {   
			overlay.show();
			trigger.removeClass('is-closed');
			trigger.addClass('is-open');
			isClosed = true;
		}
	}
  
	$('[data-toggle="offcanvas"]').click(function () {
		$('#wrapper').toggleClass('toggled');
	});  
});
















if (navigator.appName != "Microsoft Internet Explorer")
	document.captureEvents(Event.KEYDOWN);
	document.onkeydown = NetscapeKeyDown;
	function NetscapeKeyDown(key){
		KeyDown(key.which);
	}
if (window.event) KeyDown(window.event.keyCode);
function KeyDown(whichkey){
	/* console.log(whichkey); */

	/* Tecla ENTER */
	/*if (whichkey == 13) {

		if ($("#login").is(":focus")) {
			document.getElementById("password").focus();
		}
		else if ($("#password").is(":focus") || document.getElementById("telaLogin").style.display == "") {
			validarLogarSistema();
		}

		if ($("#modalFinalizar_Nome").is(":focus")) {
			document.getElementById("modalFinalizar_Telefone").focus();
		}
		else if ($("#modalFinalizar_Telefone").is(":focus")) {
			mandarFinalizarPedido();
		}


		if (*/
			/*document.getElementById("modalFinalizarPedido").style.display == "none" &&*/
			/*document.getElementById("codigoProduto").value != ""
		) {
			concluirCodigoItem();
			selecioneItemCodigoSId();
		}

		if ($("#codigoProduto").is(":focus")) {
			/*alert*/
		/*}
	}


	/* Tecla ESC */
	/*if (whichkey == 27){
		if(document.getElementById("tecladoNumerioCodigo").style.display == "block"){
			concluirCodigoItem();
		}
		else if(document.getElementById("modalFinalizarPedido").style.display == "block"){
			fecharModalModalFinalizaPedido();
		}
		else if(document.getElementById("tecladoNumerico").style.display == "block"){
			concluirValor();
		}
		else if(document.getElementById("modalAdicionarItemConfig").style.display == "block"){
			fecharPseudoModalItem();
		}
		else if(document.getElementById("modalSubGrupo").style.display == "block"){
			document.getElementById('modalSubGrupo').style.display = 'none';
		}
	}

	/* alert("tecla ESC pressionada!"); */
	/*if (whichkey == 38) Rotate();
	if (whichkey == 39) Right();
	if (whichkey == 40) Down();

	if (whichkey == 50) Down();
	if (whichkey == 52) Left();
	if (whichkey == 53) Down();
	if (whichkey == 54) Right();
	if (whichkey == 56) Rotate();

	if (whichkey == 65458) Down();
	if (whichkey == 65460) Left();
	if (whichkey == 65461) Down();
	if (whichkey == 65462) Right();
	if (whichkey == 65464) Rotate();*/
}

document.getElementById("login").focus();

/* var pressedCtrl = false; /* variável de controle */
/* $(document).ready(function(){
	alert("deu o ready");
	$(document).keyup(function (e) {  /* O evento Kyeup é acionado quando as teclas são soltas */
		/*if(e.which == 17) pressedCtrl=false; /* Quando qualuer tecla for solta é preciso informar que Crtl não está pressionada */
	/*});
	$(document).keydown(function (e) { /* Quando uma tecla é pressionada */
		/*if(e.which == 17) pressedCtrl = true; /* Informando que Crtl está acionado */
		/*if((e.which == 32|| e.keyCode == 32) &amp;&amp; pressedCtrl == true) {
			/* Reconhecendo tecla Enter */
			/*alert('O comando Crtl+Enter foi acionado')
			fecharModalModalFinalizaPedido();
			document.getElementById('modalAdicionarItemConfig').style.display='none';
			$("#itemInputList-flexdatalist").val("");
			document.getElementById('modalSubGrupo').style.display='none';
		 } 
	/*-});
	$(document).keypress(function(e){
		if(e.wich == 27 || e.keyCode == 27){
			alert('A tecla ENTER foi pressionada');
		}
	});
});*/

function configIp(){
	$.ajax({
		url:'chamada/operacoesTela.php',
		type: 'POST',
		dataType: 'text',
		data: { 'retornaIp': true }
	}).done( function(data){
		console.log(data);
		// var resultado = data.substring(2, data.length);
		data = JSON.parse(data);

		for (var i = data.length - 1; i >= 0; i--) {
			hostWebService = data[i].ip;
			portaImgService = data[i].porta;
			
			caminhoWebService = "/LanchesCDI_MySQL/webresources/";/* LanchesCDI */
			urlWebService = "http://"+hostWebService+portaWebService+caminhoWebService;
			parametrosWebService = "?tagmode=any&jsoncallback=?";

			testeConectServer(hostWebService, portaImgService)
		}
		// var arrayData = resultado.split("+");

		/* console.log(arrayData); */

		/*hostWebService = arrayData[0];
		portaImgService = arrayData[1];

		caminhoWebService = "/LanchesCDI_MySQL/webresources/";/* LanchesCDI */
		/*urlWebService = "http://"+hostWebService+portaWebService+caminhoWebService;
		parametrosWebService = "?tagmode=any&jsoncallback=?";

		adicionarIpDireto(hostWebService, portaImgService);*/
		/* console.log(urlWebService); */
	});
}

/*function testeConectServer(hostWebService, portaImgService){
	var pseudoUrlWebService = "http://"+hostWebService+portaWebService+caminhoWebService;
	/* console.log(pseudoUrlWebService+"Ping/ping"+parametrosWebService); */
	/*$.ajax({
		url: pseudoUrlWebService+"Ping/ping"+parametrosWebService,
		type: 'GET',
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback",
		error: function(){
			var info = "<i class='fa fa-asterisk' style='color:red'></i>&nbsp;&nbsp;Sem conexão!";
			$("#botaoVoltarFixo").html(info);
			toastGeral("error", "Sem conexão com o servidor!")
		}
	}).done( function(data){
		adicionarIpDireto(hostWebService, portaImgService);
		var info = "<i class='fa fa-asterisk' style='color:green'></i>&nbsp;&nbsp;Você está conectado!";
		if(data == "1") $("#botaoVoltarFixo").html(info);
	});
}*/



function definirTamanho(){
	var altura = window.innerHeight;
	// document.getElementById("cabecarioOpcao").style.height = altura * 0.5;
	// document.getElementById("conteudoView").style.height = altura * 0.5;
}
definirTamanho();


</script>
</html>
<!-- 
	amarelo     #f0ad4e
	verde       #5cb85c
	azul        #428bca
	azul claro  #5bc0de
	vermelho    #d9534f
 -->
</body>
</html>