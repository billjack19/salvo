<?php include "componentes/cabecarioConfig.php"; ?>

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

			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3" style='color: <?php echo $corTexto; ?>'>
				<br>
				Portfólio
				<!-- <small>Subheading</small> -->
			</h1>

			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php" style="color: blue;">Principal</a>
				</li>
				<li class="breadcrumb-item active">Portfólio</li>
			</ol>
			<!-- Project One -->
			<?php 
			$textoCompleto = "";
			$sql = "SELECT * FROM cards WHERE bool_ativo_cards = 1 ORDER BY sequencia_cards;";
			$verifica = $pdo->query($sql);
			foreach ($verifica as $dados) {
				$textoCompleto .= "
			<div class=\"row\">
				<div class=\"col-md-7\">
					<a href=\"#\">
						<img class=\"img-fluid rounded mb-3 mb-md-0\" src=\"".$caminhoImg."/".$dados['imagem_cards']."\" alt=\"\">
					</a>
				</div>
				<div class=\"col-md-5\">
					<h3>".$dados['titulo_cards']."</h3>
					<p>".$dados['descricao_cards']."</p>";
					if ($dados['descricao_item_cards'] != "") {
						$textoCompleto .= "
						<button class=\"btn btn-primary\" onclick='abrirProjeto(".$dados['id_cards'].")'>Leia mais sobre o projeto
							<span class=\"glyphicon glyphicon-chevron-right\"></span>
						</button>";
					}
					$textoCompleto .= "
				</div>
			</div>
			<hr>";
			}

			echo $textoCompleto;

			?>


			<script type="text/javascript">
				function abrirProjeto(id){
					$("#campo_id_cards").val(id);
					document.getElementById("btn_id_card_item").click();
				}
			</script>
			<form action="portfolio-item.php" method="POST">
				<input type="hidden" name="id_projeto" id="campo_id_cards">
				<button type="submit" style="display: none;" id="btn_id_card_item"></button>
			</form>

			<!-- Pagination -->
			<!-- <ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#">1</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#">2</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#">3</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			</ul> -->

		</div>
		<!-- /.container -->

		<?php include "componentes/rodape.php";?>

		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<script src="lb/jquery-flexdatalist/jquery.flexdatalist.min.js"></script>
		
	</body>
</html>
