<!DOCTYPE html>
<html>
<head>
	<title>Solar Minas - Envio de SMS</title>

	<script>
		/* IP do Web Service */
		var hostWebService = "192.168.0.105";

		/* IP das Imagens do servidor */
		var hostServeImage = "192.168.0.105";

		var portaWebService = ":8080";
		var portaImgService = "80";

		var caminhoWebService = "/SolarMinasSMS/app/"; /* LanchesCDI */
		var urlWebService = "http://"+hostWebService+portaWebService+caminhoWebService;
		var parametrosWebService = "?tagmode=any&jsoncallback=?";
		var listagem = false;

		var vendedor = 0;
		var filialGearl = 0;
		var sequencia = 0;
		var documentoGeral = "";
	</script>

	<meta charset="utf-8">
	<meta name="format-detection" content="telephone=no" />
	<meta name="msapplication-tap-highlight" content="no" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
	<!-- This is a wide open CSP declaration. To lock this down for production, see below. -->
	<meta http-equiv="Content-Security-Policy" content="default-src * 'unsafe-inline'; style-src 'self' 'unsafe-inline'; media-src *" />
	<script type="text/javascript" src="js/jQuery.js"></script>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css">      

	<!-- Scrips padrão -->
	<script type="text/javascript" src="js/config/element.js"></script>
	<script type="text/javascript" src="js/config/funcoes.js"></script>
	<script type="text/javascript" src="js/config/menu.js"></script>
	<script type="text/javascript" src="js/config/formulario.js"></script>
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

	<meta charset="utf-8">
</head>
<body onload='carregarContatos()'>

	<center>
		<h1>Solar Minas - Envio de SMS</h1>
		<div id="conteudo"></div>
		<br><br><br>
	</center>


	<div class="footer" id="rodapeEnviarTodos" style="display: none;">
		<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<button onfocus="enviarSelecionados()" class="btn btn-primary">
			<i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;Enviar Selecionados
		</button>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<button onfocus="cancelarSelecionados()" class="btn btn-danger">
			<i class="fa fa-times"></i>&nbsp;&nbsp;&nbsp;Cancelar Selecionados
		</button>
	</div>

	<style type="text/css">
		.footer{
			margin-right: 150px;
			position: fixed;
			height: 60px;
			bottom: 0px;
			width: 100%;
			background-color: white;
		}
		.linhaSelecionada:hover {
			background-color: lightblue;
		}
	</style>
	
	<script type="text/javascript" src="index.js"></script>
</body>
</html>