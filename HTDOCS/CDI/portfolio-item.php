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
				Mais detalhes Projeto
				<!-- <small>Subheading</small> -->
			</h1>

			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php" style="color: blue;">Principal</a>
				</li>
				<li class="breadcrumb-item">
					<a href="portfolio.php" style="color: blue;">Portfólio</a>
				</li>
				<li class="breadcrumb-item active">Mais detalhes Projeto</li>
			</ol>


			<?php
			$textoCompleto = "";
			$id_projeto = $_POST['id_projeto'];
			$sql = "SELECT * FROM cards WHERE id_cards = $id_projeto;";
			$verifica = $pdo->query($sql);
			foreach ($verifica as $dados) {
				$textoCompleto .= "
			<div class=\"row\">
				<div class=\"col-md-8\">
					<img class=\"img-fluid\" width='100%' src=\"".$caminhoImg."/".$dados['imagem_cards']."\" alt=\"\">
				</div>
				<div class=\"col-md-4\">
					<h3 class=\"my-3\">".$dados['titulo_cards']."</h3>
					<p>".$dados['descricao_item_cards']."</p>";
					
			}

			$contTopicos = 0;
			$sql = "SELECT * FROM topicos_cards WHERE cards_id	 = $id_projeto;";
			$verifica = $pdo->query($sql);
			foreach ($verifica as $dados) {
				if ($contTopicos == 0) {
					$textoCompleto .= "
					<ul>";
				}
				$contTopicos++;
				$textoCompleto .= "
						<li>".$dados['descricao_topicos_cards']."</li>";
			}
			if ($contTopicos != 0) {
				$textoCompleto .= "
					</ul>";
			}
			$textoCompleto .= "
				</div>
			</div>";
			echo $textoCompleto;
			?>

			<!-- Portfolio Item Row -->
			<!-- <div class="row">

				

				<div class="col-md-4">
					<h3 class="my-3">Project Description</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
					<h3 class="my-3">Project Details</h3>
					<ul>
						<li>Lorem Ipsum</li>
						<li>Dolor Sit Amet</li>
						<li>Consectetur</li>
						<li>Adipiscing Elit</li>
					</ul>
				</div>

			</div> -->
			<!-- /.row -->

			<!-- Related Projects Row -->
			<!-- <h3 class="my-4">Related Projects</h3> -->

			<!-- <div class="row">

				<div class="col-md-3 col-sm-6 mb-4">
					<a href="#">
						<img class="img-fluid" src="http://placehold.it/500x300" alt="">
					</a>
				</div>

				<div class="col-md-3 col-sm-6 mb-4">
					<a href="#">
						<img class="img-fluid" src="http://placehold.it/500x300" alt="">
					</a>
				</div>

				<div class="col-md-3 col-sm-6 mb-4">
					<a href="#">
						<img class="img-fluid" src="http://placehold.it/500x300" alt="">
					</a>
				</div>

				<div class="col-md-3 col-sm-6 mb-4">
					<a href="#">
						<img class="img-fluid" src="http://placehold.it/500x300" alt="">
					</a>
				</div>

			</div> -->
			<!-- /.row -->

		</div>
		<!-- /.container -->

		<?php include "componentes/rodape.php";?>

		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<script src="lb/jquery-flexdatalist/jquery.flexdatalist.min.js"></script>
		
	</body>
</html>
