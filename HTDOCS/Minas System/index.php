<?php include "componentes/cabecarioConfig.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
	<?php include "componentes/cabecarioPagina.php"; ?>

	<body>
		<?php include "componentes/menu.php"; ?>

		<!-- Start Slides -->
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
								AND configurar_site_id = $id_configurar_site
								ORDER BY id_slide_show;";

					$verifica = $pdo->query($sql);
					foreach ($verifica as $dados) {
						$ativoSlide = $contSlide == 0 ? "active" : "";
						$classAtivoSlide = $contSlide == 0 ? "class='active'" : "";
						$configImgSlide_show = $dados['imagem_slide_show'] != "" ? $caminhoImg.$dados['imagem_slide_show'] : "";
						
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
		<!-- End Slides -->



		<!-- Page Content -->
		<div class="container">

			<br>
			<h2>Principais Produtos</h2>

			<div class="row">
				<?php
				$stringDestaque = "";
				$configImgDestaque = "";
				$sql = "	SELECT *
							FROM destaque_grupo 
							WHERE bool_ativo_destaque_grupo = 1
							AND configurar_site_id = $id_configurar_site
							ORDER BY id_destaque_grupo;";

				$verifica = $pdo->query($sql);
				foreach ($verifica as $dados) {
					$configImgDestaque = $dados['imagem_destaque_grupo'] != "" ? "<img class=\"card-img-top\" src=\"".$caminhoImg.$dados['imagem_destaque_grupo']."\" alt=\"\">" : "";
					$stringDestaque .= "
				<div class=\"col-lg-4 col-sm-6 portfolio-item\"  onclick='setarIdGrupo(\"".$dados['grupo_id']."\")'>
					<div class=\"card h-100\">
						<a href=\"#\">".$configImgDestaque."</a>
						<div class=\"card-body\">
							<h4 class=\"card-title\">
								<a href=\"#\">".$dados['titulo_destaque_grupo']."</a>
							</h4>
							<br>
							<p class=\"card-text\">
								".$dados['descricao_destaque_grupo']."
							</p>
						</div>
					</div>
				</div>";
				}

				echo $stringDestaque;
				?>
			</div>
			<!-- /.row -->

			<h2 class="my-4">Com quem trabalhamos?</h2>

			<!-- Marketing Icons Section -->
			<div class="row">
				<?php
				$stringCards = "";
				$configImgCard = "";
				$sql = "	SELECT *
							FROM cards 
							WHERE bool_ativo_cards = 1
							AND configurar_site_id = $id_configurar_site
							ORDER BY id_cards;";

				$verifica = $pdo->query($sql);
				foreach ($verifica as $dados) {
					$configImgCard = $dados['imagem_cards'] != "" ? "<img src=\"".$caminhoImg.$dados['imagem_cards']."\" width=\"100%\">" : "";
					$stringCards .= "
				<div class=\"col-lg-4 col-mb-4 col-sm-4 col-6\">
					<div class=\"card h-100\">
						<h4 class=\"card-header\">".$dados['titulo_cards']."</h4>
						<div class=\"card-body\">
							$configImgCard
							<br><br>
							<p class=\"card-text\" style='font-size: 15px;'>
								".$dados['descricao_cards']."
							</p>
						</div>
						<!-- <div class=\"card-footer\">
							<a href=\"#\" class=\"btn btn-primary\">Learn More</a>
						</div> -->
					</div>
				</div>";
				}

				echo $stringCards;
				?>
			</div>
			<!-- /.row -->

			
			<!-- <div class="row"> -->
				<?php
				// Topicos 
				// $stringQuemSomos = "";
				// $sql = "	SELECT *
				// 			FROM quem_somos 
				// 			WHERE bool_ativo_quem_somos = 1
				// 			ORDER BY id_quem_somos DESC
				// 			LIMIT 1;";

				// $verifica = $pdo->query($sql);
				// foreach ($verifica as $dados) {
				// 	$stringQuemSomos .= "
				// 		<br><br>

				// 		<hr>
				// 		<div class='col-md-12 text-center'>
				// 			<h1>".$dados['titulo_quem_somos']."</h1>
				// 			<h3>".$dados['descricao_quem_somos']."</h3>
				// 		</div>
				// 		<hr>

				// 		<br><br>";
				// }

				// echo $stringQuemSomos;
				?>
				<!-- <img class=\"img-fluid rounded\" src=\"img/loja.png\" alt=""> -->
			<!-- </div> -->
			<br><br>

			<?php
			// Topicos 
			$videos = "
			<br>
			<div class=\"text-center\">
				<h2>Vídeos</h2>
			</div><br>

			<div class=\"row\">";
			$linkVideo = "";
			$contVideos = 0;
			$sql = "	SELECT *
						FROM videos 
						WHERE bool_ativo_videos = 1
						ORDER BY id_videos;";

			$verifica = $pdo->query($sql);
			foreach ($verifica as $dados) {
				$contVideos++;
				$linkVideo = explode("watch?v=", $dados['link_videos']);
				$linkVideo = end($linkVideo);
				// "https://www.youtube.com/watch?v=WebuwmLTBrI"
				$videos .= "
					<div class=\"col-md-6\">
						<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/".$linkVideo."\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>
						<br>
						".$dados['descricao_videos']."
					</div>";
			}

			$videos = $contVideos != 0 ? $videos."</div>" : "";

			echo $videos;
			?>


			<br><br><br>

			<!-- Features Section -->
			<div class="row">
				<?php
				// Topicos 
				$topicos_loja = "";
				$sql = "	SELECT *
							FROM topicos_loja 
							WHERE bool_ativo_topicos_loja = 1
							AND loja_id = (
								SELECT id_loja
								FROM loja 
								WHERE bool_ativo_loja = 1
								AND configurar_site_id = $id_configurar_site
								ORDER BY id_loja DESC LIMIT 1
							)
							ORDER BY id_topicos_loja;";

				$verifica = $pdo->query($sql);
				foreach ($verifica as $dados) {
					$topicos_loja .= "
						<li><b>".$dados['titulo_topicos_loja']."</b>: ".$dados['descricao_topicos_loja']."</li>";
				}

				$stringLoja = "";
				$configImgLoja = "";
				$sql = "	SELECT *
							FROM loja 
							WHERE bool_ativo_loja = 1
							AND configurar_site_id = $id_configurar_site
							ORDER BY id_loja DESC LIMIT 1;";

				$verifica = $pdo->query($sql);
				foreach ($verifica as $dados) {
					$configImgCard = $dados['imagem_loja'] != "" ? "<img class=\"img-fluid rounded\" src=\"".$caminhoImg.$dados['imagem_loja']."\" alt=\"\">" : "";
					$stringLoja .= "
				<div class=\"col-lg-6\">
					<h2>".$dados['titulo_loja']."</h2>
					<ul>$topicos_loja
					</ul>
					<p>".$dados['descricao_loja']."</p>
				</div>
				<div class=\"col-lg-6\">
					$configImgCard
				</div>";
				}

				echo $stringLoja;
				?>
				<!-- <img class=\"img-fluid rounded\" src=\"img/loja.png\" alt=""> -->
			</div>
			<!-- http://placehold.it/700x450 -->
			<!-- /.row -->

			<!-- <hr> -->


			<!-- <div class="col-md-6">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/nfWlot6h_JM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			</div>
			<div class="col-md-6">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/nfWlot6h_JM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			</div> -->

			<!-- Call to Action Section -->
			<div class="row mb-4">
				<div class="col-md-8">
					<!-- <p></p> -->
				</div>
				<div class="col-md-4">
					<!-- <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a> -->
				</div>
			</div>

		</div>

		<br><br><br>
		<!-- /.container -->

		<?php include "componentes/rodape.php";?>

		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<script src="lb/jquery-flexdatalist/jquery.flexdatalist.min.js"></script>

<?php if ($usuario == -1) { ?>
		<!-- <script type="text/javascript">
			chamarModalCadastreSe();
			
		</script> -->
<?php } ?>

	</body>
</html>
