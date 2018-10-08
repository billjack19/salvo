
<?php 

session_start();

// echo $_SESSION['login'];
// echo "<br>";
// $nomeUser = $_SESSION['nome'];

if (!empty($_SESSION['nome']) && $_SESSION['nome'] != "") {
	$nomeUser = $_SESSION['nome'];
} else {
	header("Location: index.php");
}

$editar = 0;
if (!empty($_SESSION['editar'])) $editar = $_SESSION['editar'];



/*************************************************************************************
/** SESSÃO GRADES *
/************************************************************************************/

$cards_configurar_site = "0";
if(!empty($_SESSION['cards-configurar_site'])) {
	$cards_configurar_site = $_SESSION['cards-configurar_site'];
}
	
$destaque_grupo_configurar_site = "0";
if(!empty($_SESSION['destaque_grupo-configurar_site'])) {
	$destaque_grupo_configurar_site = $_SESSION['destaque_grupo-configurar_site'];
}
	
$slide_show_configurar_site = "0";
if(!empty($_SESSION['slide_show-configurar_site'])) {
	$slide_show_configurar_site = $_SESSION['slide_show-configurar_site'];
}
	
$loja_configurar_site = "0";
if(!empty($_SESSION['loja-configurar_site'])) {
	$loja_configurar_site = $_SESSION['loja-configurar_site'];
}
	
$endereco_site_configurar_site = "0";
if(!empty($_SESSION['endereco_site-configurar_site'])) {
	$endereco_site_configurar_site = $_SESSION['endereco_site-configurar_site'];
}
	
$adicional_site_saiba_mais = "0";
if(!empty($_SESSION['adicional_site-saiba_mais'])) {
	$adicional_site_saiba_mais = $_SESSION['adicional_site-saiba_mais'];
}
	
$teste_grade_teste = "0";
if(!empty($_SESSION['teste_grade-teste'])) {
	$teste_grade_teste = $_SESSION['teste_grade-teste'];
}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin CaféPoços</title>
	<link rel='shortcut icon' href='app/img/Logo_cafe_pocos.png' />
	<?php include "app/componetes/bibliotecasHead.php"; ?>
	<?php include "app/componetes/biblioteca.php"; ?>
</head>
<body ng-app="myApp">
	<?php include "app/componetes/cabecario.php"; ?>
	<div id="wrapper">

		<?php include "app/componetes/menu.php"; ?>

			<!-- .page-content -->
			<div class="page-content sidebar-page right-sidebar-page clearfix">
				<!-- .page-content-wrapper -->
				<div class="page-content-wrapper">
					<div class="page-content-inner">
						<!-- .page-content-inner -->
						<div id="page-header" class="clearfix">
							<div class="page-header">
								<h2>Admin CaféPoços</h2>
								<span class="txt">Bem Vindo a este projeto!</span>
							</div>
							<div class="header-stats">
							</div>
						</div>

						<div class="row">
							<!-- Start .row -->
							<div class="col-lg-12 col-md-12">
								<!-- col-lg-12 start here -->
								<div class="row">
									<!-- Start .row -->
									<div class="col-lg-12 col-md-12 col-sm-12">
										<!-- col-lg-12 start here -->
										<div class="panel panel-default plain toggle panelClose panelRefresh">
											<!-- Start .panel -->
											<div class="panel-heading">
												<!--h4 class="panel-title">
													<i class="l-basic-target"></i> 
													<span id='tituloView'>Home</span>
												</h4-->
											</div>
											<div class="panel-body">
												<div class="row">
													<!-- Start .row -->
													<div class="col-md-12">

														<input type="hidden" id="editar" value="<?php echo $editar; ?>">
														<input type="hidden" name="grade" data-p="configurar_site" data-g="cards" value="<?php echo $cards_configurar_site; ?>">
														<input type="hidden" name="grade" data-p="configurar_site" data-g="destaque_grupo" value="<?php echo $destaque_grupo_configurar_site; ?>">
														<input type="hidden" name="grade" data-p="configurar_site" data-g="slide_show" value="<?php echo $slide_show_configurar_site; ?>">
														<input type="hidden" name="grade" data-p="configurar_site" data-g="loja" value="<?php echo $loja_configurar_site; ?>">
														<input type="hidden" name="grade" data-p="configurar_site" data-g="endereco_site" value="<?php echo $endereco_site_configurar_site; ?>">
														<input type="hidden" name="grade" data-p="saiba_mais" data-g="adicional_site" value="<?php echo $adicional_site_saiba_mais; ?>">
														<input type="hidden" name="grade" data-p="teste" data-g="teste_grade" value="<?php echo $teste_grade_teste; ?>">
														<input type="hidden" id="usuario" value="<?php echo $_SESSION['login']; ?>">
														<div ng-view class="col-md-12">

													</div>
												</div>
												<!-- End .row -->
											</div>
										</div>
										<!-- End .panel -->
									</div>
									<!-- col-lg-12 end here -->
								</div>
							</div>
						</div>
						<!-- End .row -->
					</div>
					<!-- / .page-content-inner -->
				</div>
				<!-- / page-content-wrapper -->
			</div>
			<!-- / page-content -->
		</div>
		<!-- / #wrapper -->

	
	<!-- Modal upload de Imagem -->
	<div class="modal fade" id="modalImagem" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" id="fecharModalIpBottun" data-dismiss="modal">
						&times;
					</button>
					<h4 class="modal-title">Upload de Arquivo: <span id='descricaoTipoUpload'></span></h4>
				</div>
				<div class="modal-body">
					<img src="app/img/padraoUp.png" id="imgemViewsUpload" height="100px">
					<form action="uploard.php" id="formulario_imgem" method="POST" enctype="multipart/form-data">
						<input type="file" class="form-control" name="arquivo" id="imagemInputModalImagem">
						<!--input type="hidden" name="pasta" value=""-->
						<input type="hidden" name="tipo" id='tipoUploadValor' value="img">
						<input type="hidden" name="paginaLogar" id="paginaLogarModalImagem">
						<button type="submit" class="btn btn-default" id="btn_uploadImagem" disabled>
							<i class="fa fa-upload" aria-hidden="true"></i>&nbsp;&nbsp;Uploard
						</button>
						<span id="erroExtencaoArqMoldaImagem" style="color:red;"></span>
					</form>
					<br>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Pesquisar..." aria-describedby="basic-addon2" onkeyup="chamarImgUp(this.value);">
						<span class="input-group-addon" id="basic-addon2">
							<i class="fa fa-search" aria-hidden="true"></i>
						</span>
					</div>
					<br>
					<div id="viewImagensUpadas"></div>
					<br>
					<input type="hidden" id="campoSelecionadoModalImagemUp">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						<i class="fa fa-times" aria-hidden="true"></i>&nbsp;&nbsp;Fechar
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- fim Modal upload de Imagem -->

	<style type="text/css">
		.divImg{
			background-color: #eee;
			border-style: solid;
			display: block;
		}
	</style>

	<script type="text/javascript">
		function chamarImgUp(filtro){
			$("#viewImagensUpadas").html("Carregando...");
			var tipo = $("#tipoUploadValor").val();
			$.ajax({
				url:'app/controllers/funcoesController.php',
				type: 'POST',
				dataType: 'text',
				data: {
					'listarArquivo': true,
					'filtro': filtro,
					'tipo': tipo,
					'operacao': true
				}
			}).done( function(data){
				$("#viewImagensUpadas").html(data);
			});
		}

		// $("#modalImagem").on('shown.bs.modal',function(){  });

		function selecionarArquivo(arquivo){
			var campoSerdefinido = $("#campoSelecionadoModalImagemUp").val();
			document.getElementById(campoSerdefinido).value = arquivo;
			$("#modalImagem").modal("hide");
		}

		$("#imagemInputModalImagem").on("change", function(){
			var tipo = $("#tipoUploadValor").val();
			var arquivo = '';
			var files = !!this.files ? this.files : [];
			if (!files.length || !window.FileReader) return;

			if(tipo == 'img'){
				if (/^image/.test( files[0].type)){
					var reader = new FileReader();
					reader.readAsDataURL(files[0]);

					reader.onload = function(){
						$("#imgemViewsUpload").attr('src', this.result);
						document.getElementById("btn_uploadImagem").disabled = false;
						$("#erroExtencaoArqMoldaImagem").html("");
					}
				} else {
					$("#imgemViewsUpload").attr('src', "app/img/padraoUp.png");
					document.getElementById("btn_uploadImagem").disabled = true;
					$("#erroExtencaoArqMoldaImagem").html("Arquivo inválido!");
				}
			}
			else {
				arquivo = files[0].type.split("/");
				if (tipo == arquivo[0]){
					var reader = new FileReader();
					reader.readAsDataURL(files[0]);

					reader.onload = function(){
						document.getElementById("btn_uploadImagem").disabled = false;
						$("#erroExtencaoArqMoldaImagem").html("");
					}
				} else {
					document.getElementById("btn_uploadImagem").disabled = true;
					$("#erroExtencaoArqMoldaImagem").html("Arquivo inválido!");
				}
			}
		});

		function chamarModalImagem(campoId, pagina, tipo){
			$('#modalImagem').modal('show');
			chamarImgUp("");
			$("#imgemViewsUpload").attr('src', "app/img/padraoUp.png");
			$("#imagemInputModalImagem").val("");
			document.getElementById("btn_uploadImagem").disabled = true;
			$('#campoSelecionadoModalImagemUp').val(campoId);
			$("#paginaLogarModalImagem").val(pagina);
			$("#tipoUploadValor").val(tipo);
					if(tipo == 'img') $('#descricaoTipoUpload').html('Imagem');
			else 	if(tipo == 'video') $('#descricaoTipoUpload').html('Vídeo');
			else 	if(tipo == 'audio') $('#descricaoTipoUpload').html('Áudio');
			else 	if(tipo == 'text') $('#descricaoTipoUpload').html('Arquivo de Texto');
		}
	</script>


	<?php include "app/componetes/bibliotecasFooter.php"; ?>
</body>
</html>