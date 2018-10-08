<?php include "componentes/cabecarioConfig.php"; ?>



<!DOCTYPE html>
<html lang="pt-br">

	<?php include "componentes/cabecarioPagina.php"; ?>
	<body>

		<?php include "componentes/menu.php"; ?>

		<!-- Page Content -->
		<div class="container">
			<br>
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3" style='color: <?php echo $corPagina; ?>'>
				<br>
				Contato
				<!-- <small>Subheading</small> -->
			</h1>

			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php" style="color: blue;">Principal</a>
				</li>
				<li class="breadcrumb-item active">Contato</li>
			</ol>

			<!-- Content Row -->
			<div class="row">
				<!-- Map Column -->
				<div class="col-lg-8 mb-4" style='color: <?php echo $corPagina; ?>'>
					<?php
					$stringEnderecoSite = "";
					$verificaCelularEnderecoSite = "";
					$verificaEmailEnderecoSite = "";
					$verificaHorarioFuncionamento = "";
					$latitudeMap = "";
					$longitudeMap = "";
					$sql = "	SELECT endereco_site.* , estado.*
								FROM endereco_site 
								INNER JOIN estado ON endereco_site.estado_id = estado.id_estado
								WHERE endereco_site.bool_ativo_endereco_site = 1
								AND endereco_site.configurar_site_id = $id_configurar_site
								ORDER BY endereco_site.id_endereco_site DESC LIMIT 1;";

					$verifica = $pdo->query($sql);
					foreach ($verifica as $dados) {
						$latitudeMap = $dados['latitude_endereco_site'];
						$longitudeMap = $dados['longitude_endereco_site'];

						if ($dados['celular_endereco_site'] != "") {
							$verificaCelularEnderecoSite =" 
							<p style='color: $corPagina'>
								<b>Celular</b>: <i class=\"fa fa-whatsapp\" aria-hidden=\"true\"></i> ".$dados['celular_endereco_site']."
							</p>";
						}
						if ($dados['email_endereco_site'] != "") {
							$verificaEmailEnderecoSite =" 
							<p style='color: $corPagina'>
								<b>E-mail</b>: ".$dados['email_endereco_site']."
							</p>";
						}
						if ($dados['horario_funcionamento_endereco_site'] != "") {
							$verificaHorarioFuncionamento =" 
							<p style='color: $corPagina'>
								<b>Horário de Funcionamento</b>: ".$dados['horario_funcionamento_endereco_site']."
							</p>";
						}
						
						$stringEnderecoSite .= "
					<p style='color: $corPagina'>
						".$dados['endereco_endereco_site'].", ".$dados['numero_endereco_site']." - ".$dados['bairro_endereco_site']." 
						<br>".$dados['cidade_endereco_site']." - ".$dados['sigla_estado'].", ".$dados['cep_endereco_site']."
						<br>
					</p>
					<p style='color: $corPagina'>
						<b>Telefone</b>: <i class=\"fa fa-phone\" aria-hidden=\"true\"></i> ".$dados['telefone_endereco_site']."
					</p>
					$verificaCelularEnderecoSite
					$verificaEmailEnderecoSite
					$verificaHorarioFuncionamento";
					}

					
					?>
					<!-- Google Map -->
					<div id="googleMap"  style="width:100%;height:400px;"></div>

					<!-- Add Google Maps -->
					<script>
					function myMap(){
						myCenter=new google.maps.LatLng(<?php echo $latitudeMap ;?>, <?php echo $longitudeMap ;?>);

						var mapOptions= {
							center:myCenter,
							zoom:15, scrollwheel: false, draggable: false,
							mapTypeId:google.maps.MapTypeId.ROADMAP
						};
						var map = new google.maps.Map(document.getElementById("googleMap"),mapOptions);

						var marker = new google.maps.Marker({
							position: myCenter,
						});
						marker.setMap(map);
					}
					</script>

					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoMdP7QZuhbnjCzwcBjqydWDaCzUisWlA&callback=myMap"></script>
					<!-- Embedded Google Map -->
					<!-- <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=pt-br&amp;ie=UTF8&amp;ll=-21.779533,-46.60325899999998&amp;spn=56.506174,79.013672&amp;t=m&amp;z=15&amp;output=embed"></iframe> -->
				</div>
				<!-- Contact Details Column -->
				<div class="col-lg-4 mb-4" style='color: <?php echo $corPagina; ?>'>


					<?php echo $stringEnderecoSite; ?>
					<!-- <h3></h3> -->


				</div>
			</div>
			<!-- /.row -->

			<!-- Contact Form -->
			<!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
			<div class="row" style='color: <?php echo $corPagina; ?>'>
				<div class="col-lg-8 mb-4">
					<h3>Entre em Contato</h3>

					<form action="mail/contact_me.php" enctype="multipart/form-data" method="POST">
						<div class="row">
							<div class="file-field input-field col s8">
								<div class="control-group form-group">
									<div class="controls">
										<label>Nome:</label>
										<input type="text" class="form-control" name="name" required data-validation-required-message="Por favor entre com seu Nome.">
									</div>
								</div>
								<div class="control-group form-group">
									<div class="controls">
										<label>Telefone:</label>
										<input type="tel" class="form-control" name="phone" required data-validation-required-message="Por Favor entre com seu telefone.">
									</div>
								</div>
								<div class="control-group form-group">
									<div class="controls">
										<label>E-mail:</label>
										<input type="email" class="form-control" name="email" required data-validation-required-message="Por Favor entre com seu endereço de E-mail.">
									</div>
								</div>
								<div class="control-group form-group">
									<div class="controls">
										<label>Mensagem:</label>
										<textarea rows="10" cols="100" class="form-control" name="message" required data-validation-required-message="Por Favor entre com a mensagem" maxlength="999" style="resize:none"></textarea>
									</div>
								</div>
								<!-- <div class="control-group form-group">
									<div class="controls">
										<span>Se optar envie seu orçamento em PDF:</span><br>
										<input type="file" name="arquivo">
									</div>
								</div> -->
								<button type="submit" id='gravar' class="waves-effect waves-light btn corPrincipalFundo">
									<i class="fa fa-paper-plane"></i>&nbsp;&nbsp;Enviar Mensagem
								</button>
							</div>
							<span class="blue-text text-darken-2 mensagem"></span>
						</div>
					</form>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->

		<button class="w3-hover-opacity-off corPrincipalFundo" onclick="topFunction()" id="tbnInicio" title="Ir para o topo">
			<!-- Início -->
			<span style="font-size: 30px;">
				&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-up" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
				
			</span>
			<!-- <i class="fa fa-angle-up" aria-hidden="true"></i> -->
		</button>
		<?php include "componentes/rodape.php";?>

		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Contact form JavaScript -->
		<!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
		<script src="js/jqBootstrapValidation.js"></script>
		<!-- <script src="js/contact_me.js"></script> -->

	</body>
	<script type="text/javascript">
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				document.getElementById("tbnInicio").style.display = "block";
			} else {
				document.getElementById("tbnInicio").style.display = "none";
			}
		}
		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>
</html>


<div id="bibliotecasDesc">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/toast.js"></script>
	<script type="text/javascript" src="js/config/funcoes.js"></script>
</div>

<?php
	if (!empty($_SESSION['contatoInvalido']) && $_SESSION['contatoInvalido']) {
		$_SESSION['contatoInvalido'] = false;
?>
	<script type="text/javascript">
		jk_toasth("error", "Falha ao tentar enviar contato!", 6000);
	</script>
<?php
	} else if (!empty($_SESSION['contatoValido']) && $_SESSION['contatoValido']) {
		$_SESSION['contatoValido'] = false;
?>
	<script type="text/javascript">
		jk_toasth("success", "Contato enviado com sucesso!", 6000);
	</script>
<?php
	}
?>

<script type="text/javascript">
	$("#bibliotecasDesc").html("");
</script>