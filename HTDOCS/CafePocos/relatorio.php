<?php 

include "componentes/cabecarioConfig.php"; 

$tipoRelatorio = "";

if (empty($_SESSION['login_cliente']) || $_SESSION['login_cliente'] == "" || empty($_POST['tipoRelatorio'])) {
	header("Location: index.php");
}
else if (empty($_SESSION['tipoRelatorio'])) {
	$_SESSION['tipoRelatorio'] = $_POST['tipoRelatorio'];
	$tipoRelatorio = $_POST['tipoRelatorio'];
}
else {
	$tipoRelatorio = $_SESSION['tipoRelatorio'];
}


?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include "componentes/cabecarioPagina.php"; ?>
	</head>

	<body>
		<!-- Navigation -->
		<?php include "componentes/menu.php"; ?>

		<!-- Page Content -->
		<div class="container">
			<br>
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3">
				Relatório
				<!-- <small>Subheading</small> -->
			</h1>

			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item active">Relatório</li>
			</ol>

			<br><br>
			<div id="relatorio">
				<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
				<?php 
		if ($tipoRelatorio == 'posicaoCafe') {
				include "pdf/posicaoCafe.php";
				?>
			</div>
			<br>
			<div class="text-center">
				<button class="btn" onclick="imprimirRelatorio();">
					<i class="fa fa-print"></i>&nbsp;&nbsp;Imprimir Relatório
				</button>
				&nbsp;&nbsp;
				<button class="btn" onclick="emitirPosicaoPdf()">
					<i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Download em Pdf
				</button>
			</div>
				<?php
		} else {
				?>

				<h3>Nenhum Relatório selecionado</h3>
			</div>
				<?php
		}
				?>
			<br><br>
		</div>
		<!-- /.container -->

		<script type="text/javascript">
			function imprimirRelatorio(){
				// var oldPagina = document.body.innerHTML;
				// document.body.innerHTML = $("#relatorio").html();
				window.print();
			}
		</script>

		<style type="text/css">
			@media print {
				body * {
				  visibility: hidden;
				}
				#relatorio, #relatorio * {
				  visibility: visible;
				}
				#relatorio {
				  position: fixed;
				  left: 0;
				  top: 0;
				}
			}
		</style>

		<?php include "componentes/rodape.php";?>

		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<script src="lb/jquery-flexdatalist/jquery.flexdatalist.min.js"></script>
	</body>
</html>

<form action="pdf/posicaoCafePdf.php" method="POST">
	<input type="hidden" name="cliente" id="setarClienteRelatorio">
	<button style="display: none;" type="submit" id="submeterRelatorioPdf"></button>
</form>

<script type="text/javascript">
	function emitirPosicaoPdf(){
		$("#setarClienteRelatorio").val($("#cliente_site_id").val());
		document.getElementById("submeterRelatorioPdf").click();
	}
</script>
