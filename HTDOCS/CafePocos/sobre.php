<?php include "componentes/cabecarioConfig.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
	<?php include "componentes/cabecarioPagina.php"; ?>

	<body>
		<?php include "componentes/menu.php"; ?>

		<!-- Page Content -->
		<div class="container">
			<br>
			<h1 class="mt-4 mb-3" style='color: <?php echo $corPagina; ?>'>
				<br>
				Sobre Nós
			</h1>

		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php" style="color: blue;">Principal</a>
			</li>
			<li class="breadcrumb-item active">Sobre Nós</li>
		</ol>

			<!-- Intro Content -->
			<div class="row">
				<?php
				// Topicos 
				$stringQuemSomos = "";
				$sql = "	SELECT *
							FROM quem_somos 
							WHERE bool_ativo_quem_somos = 1
							ORDER BY id_quem_somos DESC
							LIMIT 1;";

				$verifica = $pdo->query($sql);
				foreach ($verifica as $dados) {
					$stringQuemSomos .= "
						<div class=\"col-lg-6\" style='color: $corPagina'>
							<img class=\"img-fluid rounded mb-4\" src=\"".$caminhoImg.$dados['imagem_quem_somos']."\" alt=\"\">
						</div>
						<div class=\"col-lg-6\" style='color: $corPagina' >
							<h2>".$dados['titulo_quem_somos']."</h2>
							".$dados['descricao_quem_somos']."
						</div>

						<br><br>";
				}

				echo $stringQuemSomos;
				?>
				
			</div>
			<!-- /.row -->

			<!-- Team Members -->
			<!-- <h2>Our Team</h2>

			<div class="row">
				<div class="col-lg-4 mb-4">
					<div class="card h-100 text-center">
						<img class="card-img-top" src="http://placehold.it/750x450" alt="">
						<div class="card-body">
							<h4 class="card-title">Team Member</h4>
							<h6 class="card-subtitle mb-2 text-muted">Position</h6>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
						</div>
						<div class="card-footer">
							<a href="#">name@example.com</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="card h-100 text-center">
						<img class="card-img-top" src="http://placehold.it/750x450" alt="">
						<div class="card-body">
							<h4 class="card-title">Team Member</h4>
							<h6 class="card-subtitle mb-2 text-muted">Position</h6>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
						</div>
						<div class="card-footer">
							<a href="#">name@example.com</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="card h-100 text-center">
						<img class="card-img-top" src="http://placehold.it/750x450" alt="">
						<div class="card-body">
							<h4 class="card-title">Team Member</h4>
							<h6 class="card-subtitle mb-2 text-muted">Position</h6>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
						</div>
						<div class="card-footer">
							<a href="#">name@example.com</a>
						</div>
					</div>
				</div>
			</div> -->
			<!-- /.row -->

			<!-- Our Customers -->
			<!-- <h2>Our Customers</h2>
			<div class="row">
				<div class="col-lg-2 col-sm-4 mb-4">
					<img class="img-fluid" src="http://placehold.it/500x300" alt="">
				</div>
				<div class="col-lg-2 col-sm-4 mb-4">
					<img class="img-fluid" src="http://placehold.it/500x300" alt="">
				</div>
				<div class="col-lg-2 col-sm-4 mb-4">
					<img class="img-fluid" src="http://placehold.it/500x300" alt="">
				</div>
				<div class="col-lg-2 col-sm-4 mb-4">
					<img class="img-fluid" src="http://placehold.it/500x300" alt="">
				</div>
				<div class="col-lg-2 col-sm-4 mb-4">
					<img class="img-fluid" src="http://placehold.it/500x300" alt="">
				</div>
				<div class="col-lg-2 col-sm-4 mb-4">
					<img class="img-fluid" src="http://placehold.it/500x300" alt="">
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