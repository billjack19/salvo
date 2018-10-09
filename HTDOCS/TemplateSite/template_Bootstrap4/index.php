<?php include "componentes/cabecarioConfig.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include "componentes/cabecarioPagina.php"; ?>
	</head>

	<body>
		<!-- Navigation -->
		<?php include "componentes/menu.php"; ?>

		<header>
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<?php
					$stringSlide_show = "";
					$configImgSlide_show = "";
					$linhasSlides = "";
					$contSlide = 0;
					$ativoSlide = "";
					$classAtivoSlide = "";
					$sql = "	SELECT *
								FROM slide_show 
								WHERE bool_ativo_slide_show = 1
								ORDER BY id_slide_show;";

					$verifica = $pdo->query($sql);
					foreach ($verifica as $dados) {
						$ativoSlide = $contSlide == 0 ? "active" : "";
						$classAtivoSlide = $contSlide == 0 ? "class='active'" : "";
						$configImgSlide_show = $dados['imagem_slide_show'] != "" ? "admin/app/upload/img/".$dados['imagem_slide_show'] : "";
						
						$linhasSlides .= "
						<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"".$contSlide."\" ".$classAtivoSlide."></li>";
						
						$stringSlide_show .= "
					<div class=\"carousel-item $ativoSlide\" style=\"background-image: url('".$configImgSlide_show."')\">
						<div class=\"carousel-caption d-none d-md-block\">
							<h3 class=\"sobraText\"><b>".$dados['titulo_slide_show']."</b></h3>
							<h4 class=\"sobraText\"><b>".$dados['descricao_slide_show']."</b></h4>
						</div>
					</div>";

						$contSlide++;
					}

					?>
				<ol class="carousel-indicators">
					<?php echo $linhasSlides; ?>
					<!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
				</ol>
				<div class="carousel-inner" role="listbox">
					
					<?php echo $stringSlide_show; ?>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</header>

		<!-- Page Content -->
		<div class="container">

			<h1 class="my-4">Welcome to Modern Business</h1>

			<!-- Marketing Icons Section -->
			<div class="row">
				<div class="col-lg-4 mb-4">
					<div class="card h-100">
						<h4 class="card-header">Card Title</h4>
						<div class="card-body">
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
						</div>
						<div class="card-footer">
							<a href="#" class="btn btn-primary">Learn More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="card h-100">
						<h4 class="card-header">Card Title</h4>
						<div class="card-body">
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.</p>
						</div>
						<div class="card-footer">
							<a href="#" class="btn btn-primary">Learn More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="card h-100">
						<h4 class="card-header">Card Title</h4>
						<div class="card-body">
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
						</div>
						<div class="card-footer">
							<a href="#" class="btn btn-primary">Learn More</a>
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->

			<!-- Portfolio Section -->
			<h2>Portfolio Heading</h2>

			<div class="row">
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">Project One</a>
							</h4>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">Project Two</a>
							</h4>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">Project Three</a>
							</h4>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">Project Four</a>
							</h4>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">Project Five</a>
							</h4>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">Project Six</a>
							</h4>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->

			<!-- Features Section -->
			<div class="row">
				<div class="col-lg-6">
					<h2>Modern Business Features</h2>
					<p>The Modern Business template by Start Bootstrap includes:</p>
					<ul>
						<li>
							<strong>Bootstrap v4</strong>
						</li>
						<li>jQuery</li>
						<li>Font Awesome</li>
						<li>Working contact form with validation</li>
						<li>Unstyled page elements for easy customization</li>
					</ul>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
				</div>
				<div class="col-lg-6">
					<img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
				</div>
			</div>
			<!-- /.row -->

			<hr>

			<!-- Call to Action Section -->
			<div class="row mb-4">
				<div class="col-md-8">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
				</div>
				<div class="col-md-4">
					<a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
				</div>
			</div>

		</div>
		<!-- /.container -->

		<?php include "componentes/rodape.php"; ?>

		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	</body>

</html>
