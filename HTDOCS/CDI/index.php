
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
						<div class=\"carousel-caption\"><!-- d-none d-md-block -->
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
			<br><center>
			<h1 class="my-4" style="color: <?php echo $corTexto;?>"><?php echo $tituloBemVindo; ?></h1>
			<h1 class="my-4"  style="color: <?php echo $corTexto;?>">
				Conheça nosso Portfólio <br><br>
				<a href="portfolio.php" style="font-size: 25px;" class="btn btn-primary">
					<i class="fa fa-hand-pointer-o"></i>&nbsp;&nbsp;Click Aqui
				</a>
			</h1>
			</center>
			<!-- Marketing Icons Section -->
			<!-- <div class="row" style="color: <?php echo $corTexto; ?>"> -->
				<?php
				// $stringCards = "";
				// $configImgCard = "";
				// $sql = "	SELECT *
				// 			FROM cards 
				// 			WHERE bool_ativo_cards = 1
				// 			AND configurar_site_id = $id_configurar_site
				// 			ORDER BY sequencia_cards;";

				// $verifica = $pdo->query($sql);
				// foreach ($verifica as $dados) {
				// 	$configImgCard = $dados['imagem_cards'] != "" ? "<img src=\"".$caminhoImg.$dados['imagem_cards']."\" width=\"100%\">" : "";
				// 	$stringCards .= "
				// <div class=\"col-lg-4 mb-4\">
				// 	<div class=\"card h-100\">
				// 		<h4 class=\"card-header\">".$dados['titulo_cards']."</h4>
				// 		<div class=\"card-body\">
				// 			$configImgCard
				// 			<br><br>
				// 			<p class=\"card-text\">
				// 				".$dados['descricao_cards']."
				// 			</p>
				// 		</div>
				// 		<!-- <div class=\"card-footer\">
				// 			<a href=\"#\" class=\"btn btn-primary\">Learn More</a>
				// 		</div> -->
				// 	</div>
				// </div>";
				// }

				// echo $stringCards;
				?>
			<!-- </div> -->
			<!-- /.row -->
			
			<!-- Portfolio Section -->
			<!-- <br> -->

			<div class="row">
				<?php
				$stringDestaque = "<h2>Principais Produtos</h2>";
				$configImgDestaque = "";
				$contDestaque = 0;
				$sql = "	SELECT *
							FROM destaque_grupo 
							WHERE bool_ativo_destaque_grupo = 1
							AND configurar_site_id = $id_configurar_site
							ORDER BY id_destaque_grupo;";

				$verifica = $pdo->query($sql);
				foreach ($verifica as $dados) {
					$contDestaque++;
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
				$stringDestaque = $contDestaque == 0 ? "" : $stringDestaque;

				echo $stringDestaque;
				?>
				
				<!-- <div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="#"><img class="card-img-top" src="img/produto/fusiveis.jpg" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">Chaves e Fusíveis</a>
							</h4>
							<p class="card-text">

							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="#"><img class="card-img-top" src="img/produto/luminarias.png" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">Luminária Pública, Luminária Spot, Luminária Prism</a>
							</h4>
							<p class="card-text">

							</p>
						</div>
					</div>
				</div> -->

			</div>
			<!-- /.row -->

			
			<br><br>

			<?php
			// Topicos 
			$videos = "
			<br>
			<div class=\"text-center corPrincipalText\">
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
				$linkVideo = explode("&", $dados['link_videos']);
				$linkVideo = explode("watch?v=", $linkVideo[0]);
				$linkVideo = end($linkVideo);
				// "https://www.youtube.com/watch?v=WebuwmLTBrI"
				$videos .= "
					<div class=\"col-md-6 corPrincipalText\">
						<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/".$linkVideo."\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>
						<br>
						".$dados['descricao_videos']."
					</div>";
			}

			$videos = $contVideos != 0 ? $videos."</div>" : "";

			echo $videos;
			?>



			<br><br>
			<?php
			// Topicos 
			if ($corTexto == $contraCorPagina) $classeBtnEnviarContato = "corPrincipalText";
			else $classeBtnEnviarContato = "corPrincipalFundo";
			$videos = "
			<br><hr>
			<center>
			<div style='width:100%;padding:30px;margin:-30px;' class='$classeBtnEnviarContato'>
			<div class=\"text-center\">
				<h2>Link Úteis</h2>
			</div><br>

			<div class=\"row\">";
			$linkVideo = "";
			$contVideos = 0;
			$sql = "	SELECT *
						FROM links_uteis 
						WHERE bool_ativo_links_uteis = 1
						ORDER BY id_links_uteis;";

			$verifica = $pdo->query($sql);
			foreach ($verifica as $dados) {
				$contVideos++;
				$links_uteis = $dados['link_links_uteis'];
				$descricao_links_uteis = $dados['descricao_links_uteis'];
				// "https://www.youtube.com/watch?v=WebuwmLTBrI"
				$videos .= "
					<div class=\"col-md-3 col-sm-4 col-6\">
						<a href=\"$links_uteis\"  target=\"_blank\">$descricao_links_uteis</a>
					</div>";
			}

			$videos = $contVideos != 0 ? $videos."</div></div></center>" : "";

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
				<div class=\"col-lg-6\" style='color: $corTexto'>
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
			

				<?php
				$descricaoSibaMais = "";
				$idSaibaMais = 0;
				$sql = "	SELECT *
							FROM saiba_mais 
							WHERE bool_ativo_saiba_mais = 1
							ORDER BY id_saiba_mais DESC
							LIMIT 1;";

				$verifica = $pdo->query($sql);
				foreach ($verifica as $dados) {
					$descricaoSibaMais = $dados['descricao_saiba_mais'];
					$idSaibaMais = $dados['id_saiba_mais'];
				}
				$stringAdicionalSite = "
			<br><br><br>
			<h2 style='color: $corTexto'>$descricaoSibaMais</h2>
			<div class='row'>
			<!--div class=\"row\" style=\"background-color: #ddd;border-radius: 10px;\"-->";
				$configImgAdicionalSite = "";
				$bloco1_AdicionalSite = "";
				$bloco2_AdicionalSite = "";
				$ativoBloco = 1;
				$contAdicionalSite = 0;
				if ($idSaibaMais != 0) {
					$sql = "	SELECT *
								FROM adicional_site 
								WHERE bool_ativo_adicional_site = 1
								AND saiba_mais_id = $idSaibaMais
								ORDER BY id_adicional_site;";

					$verifica = $pdo->query($sql);
					foreach ($verifica as $dados) {
						$contAdicionalSite++;
						$configImgAdicionalSite = $dados['imagem_adicional_site'] != "" ? "<img class=\"\" style=\"border-radius: 0px;\" height=\"auto\" width=\"100%\" src=\"".$caminhoImg.$dados['imagem_adicional_site']."\" alt=\"\">" : "";

						$bloco1_AdicionalSite = "
					<div class='col-lg-2 col-md-3 col-sm-4 col-6 text-center'>
					<div class=\" card h-100\"'>
						<div class='card-body'>
							".$configImgAdicionalSite."
						</div>
						<div class='card-footer'>
							<div class='card-title'>
								<p style='font-size: 12px;'>".$dados['titulo_adicional_site']."</p>
							</div>
							<div style='color: $corTexto'>".$dados['descricao_adicional_site']."</div>
						</div>
					</div>
					</div>";
						$bloco2_AdicionalSite = "
					<!--div class=\"col-md-4 col-xs-6 text-center\">
							<br><br><br>
							
							<br><br><br>
					</div-->";

						if ($ativoBloco == 1) {
							$stringAdicionalSite .= $bloco1_AdicionalSite . $bloco2_AdicionalSite;
							$ativoBloco = 2;
						} else {
							$stringAdicionalSite .= $bloco2_AdicionalSite . $bloco1_AdicionalSite;
							$ativoBloco = 1;
						}
					}
					$stringAdicionalSite = $contAdicionalSite == 0 ? "</div>" : $stringAdicionalSite;

					echo $stringAdicionalSite;
				}
				?>
			</div>

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

	</body>
</html>
