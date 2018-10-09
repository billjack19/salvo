<?php include "componentes/cabecarioConfig.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
	<?php include "componentes/cabecarioPagina.php"; ?>

	<body>
		<?php include "componentes/menu.php"; ?>

		<!-- Page Content -->
		<div class="container">
			<br>
			<h1 class="mt-4 mb-3">Sobre Nós</h1>

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
						<div class=\"col-lg-6 text-center\">
							<img class=\"img-fluid rounded mb-4\" src=\"".$caminhoImg.$dados['imagem_quem_somos']."\" alt=\"\">
						</div>
						<div class=\"col-lg-6\">
							<h2>".$dados['titulo_quem_somos']."</h2>
							".$dados['descricao_quem_somos']."
						</div>

						<br><br>";
				}

				echo $stringQuemSomos;
				?>
				
			</div>
		</div>

		<?php include "componentes/rodape.php";?>

		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<script src="lb/jquery-flexdatalist/jquery.flexdatalist.min.js"></script>
	</body>
</html>