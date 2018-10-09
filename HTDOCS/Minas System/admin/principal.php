
<?php 

session_start();

if (!empty($_SESSION['nome']) && $_SESSION['nome'] != "") {
	$nomeUser = $_SESSION['nome'];
} else {
	header("Location: index.php");
}

$areaDeAtuacao = "";
if (!empty($_SESSION['areaDeAtuacao'])) $areaDeAtuacao = $_SESSION['areaDeAtuacao'];


$editar = 0;
if (!empty($_SESSION['editar'])) $editar = $_SESSION['editar'];



/*************************************************************************************
/** SESSÃO GRADES *
/************************************************************************************/

$orcamento_cliente_site = "0";
if(!empty($_SESSION['orcamento-cliente_site'])) {
	$orcamento_cliente_site = $_SESSION['orcamento-cliente_site'];
}
	
$item_orcamento_orcamento = "0";
if(!empty($_SESSION['item_orcamento-orcamento'])) {
	$item_orcamento_orcamento = $_SESSION['item_orcamento-orcamento'];
}
	
$cards_configurar_site = "0";
if(!empty($_SESSION['cards-configurar_site'])) {
	$cards_configurar_site = $_SESSION['cards-configurar_site'];
}
	
$destaque_grupo_configurar_site = "0";
if(!empty($_SESSION['destaque_grupo-configurar_site'])) {
	$destaque_grupo_configurar_site = $_SESSION['destaque_grupo-configurar_site'];
}
	
$endereco_site_configurar_site = "0";
if(!empty($_SESSION['endereco_site-configurar_site'])) {
	$endereco_site_configurar_site = $_SESSION['endereco_site-configurar_site'];
}
	
$slide_show_configurar_site = "0";
if(!empty($_SESSION['slide_show-configurar_site'])) {
	$slide_show_configurar_site = $_SESSION['slide_show-configurar_site'];
}
	
$loja_configurar_site = "0";
if(!empty($_SESSION['loja-configurar_site'])) {
	$loja_configurar_site = $_SESSION['loja-configurar_site'];
}
	
$topicos_loja_loja = "0";
if(!empty($_SESSION['topicos_loja-loja'])) {
	$topicos_loja_loja = $_SESSION['topicos_loja-loja'];
}
	


include "app/classe/conexao.php";
$conn = new Conexao();
$pdo = $conn->Connect(); 

$sql = "SELECT area_nivel_acesso
		FROM nivel_acesso
		WHERE id_nivel_acesso = (
			SELECT nivel_acesso_id FROM usuario WHERE id_usuario = ".$_SESSION['login']."
		);";
$verifica = $pdo->query($sql);

foreach ($verifica as $dados) $minha_area_nivel_acesso = explode("+", $dados[0]);


$acess_cliente_site = false;
if(in_array('cliente_site', $minha_area_nivel_acesso)) $acess_cliente_site = true;

$acess_configurar_site = false;
if(in_array('configurar_site', $minha_area_nivel_acesso)) $acess_configurar_site = true;

$acess_contato = false;
if(in_array('contato', $minha_area_nivel_acesso)) $acess_contato = true;

$acess_empresa = false;
if(in_array('empresa', $minha_area_nivel_acesso)) $acess_empresa = true;

$acess_estado = false;
if(in_array('estado', $minha_area_nivel_acesso)) $acess_estado = true;

$acess_grupo = false;
if(in_array('grupo', $minha_area_nivel_acesso)) $acess_grupo = true;

$acess_item = false;
if(in_array('item', $minha_area_nivel_acesso)) $acess_item = true;

$acess_quem_somos = false;
if(in_array('quem_somos', $minha_area_nivel_acesso)) $acess_quem_somos = true;

$acess_videos = false;
if(in_array('videos', $minha_area_nivel_acesso)) $acess_videos = true;

$acess_orcamento_cliente_site = "0";
if(in_array('orcamento-cliente_site', $minha_area_nivel_acesso)) $acess_orcamento_cliente_site = "1";

$acess_item_orcamento_orcamento = "0";
if(in_array('item_orcamento-orcamento', $minha_area_nivel_acesso)) $acess_item_orcamento_orcamento = "1";

$acess_cards_configurar_site = "0";
if(in_array('cards-configurar_site', $minha_area_nivel_acesso)) $acess_cards_configurar_site = "1";

$acess_destaque_grupo_configurar_site = "0";
if(in_array('destaque_grupo-configurar_site', $minha_area_nivel_acesso)) $acess_destaque_grupo_configurar_site = "1";

$acess_endereco_site_configurar_site = "0";
if(in_array('endereco_site-configurar_site', $minha_area_nivel_acesso)) $acess_endereco_site_configurar_site = "1";

$acess_slide_show_configurar_site = "0";
if(in_array('slide_show-configurar_site', $minha_area_nivel_acesso)) $acess_slide_show_configurar_site = "1";

$acess_loja_configurar_site = "0";
if(in_array('loja-configurar_site', $minha_area_nivel_acesso)) $acess_loja_configurar_site = "1";

$acess_topicos_loja_loja = "0";
if(in_array('topicos_loja-loja', $minha_area_nivel_acesso)) $acess_topicos_loja_loja = "1";

$acess_upload = false;
if(in_array('upload', $minha_area_nivel_acesso)) $acess_upload = true;

$acess_mapa = false;
if(in_array('mapa', $minha_area_nivel_acesso)) $acess_mapa = true;

$acess_mov = false;
if(in_array('mov', $minha_area_nivel_acesso)) $acess_mov = true;

$acess_pdf = false;
if(in_array('pdf', $minha_area_nivel_acesso)) $acess_pdf = true;

$acess_notif = false;
if(in_array('notif', $minha_area_nivel_acesso)) $acess_notif = true;

$acess_usuario = false;
if(in_array('usuario', $minha_area_nivel_acesso)) $acess_usuario = true;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Minas System</title>
	<link rel='shortcut icon' href='app/img/LogoSmForm.png' />
	<?php include "app/componetes/bibliotecasHead.php"; ?>
	<?php include "app/componetes/biblioteca.php"; ?>
</head>
<body ng-app="myApp" onload="carregarNotificao();">
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
								<h2>Admin Minas System</h2>
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
														<input type="hidden" id="areaDeAtuacao" value="<?php echo $areaDeAtuacao; ?>">
														<input type="hidden" id="editar" value="<?php echo $editar; ?>">
														<input type="hidden" name="grade" id="el_cliente_site-orcamento" data-p="cliente_site" data-g="orcamento" value="<?php echo $orcamento_cliente_site; ?>">
														<input type="hidden" id='n_acs_orcamento_cliente_site' value='<?php echo $acess_orcamento_cliente_site; ?>'>
														<input type="hidden" name="grade" id="el_orcamento-item_orcamento" data-p="orcamento" data-g="item_orcamento" value="<?php echo $item_orcamento_orcamento; ?>">
														<input type="hidden" id='n_acs_item_orcamento_orcamento' value='<?php echo $acess_item_orcamento_orcamento; ?>'>
														<input type="hidden" name="grade" id="el_configurar_site-cards" data-p="configurar_site" data-g="cards" value="<?php echo $cards_configurar_site; ?>">
														<input type="hidden" id='n_acs_cards_configurar_site' value='<?php echo $acess_cards_configurar_site; ?>'>
														<input type="hidden" name="grade" id="el_configurar_site-destaque_grupo" data-p="configurar_site" data-g="destaque_grupo" value="<?php echo $destaque_grupo_configurar_site; ?>">
														<input type="hidden" id='n_acs_destaque_grupo_configurar_site' value='<?php echo $acess_destaque_grupo_configurar_site; ?>'>
														<input type="hidden" name="grade" id="el_configurar_site-endereco_site" data-p="configurar_site" data-g="endereco_site" value="<?php echo $endereco_site_configurar_site; ?>">
														<input type="hidden" id='n_acs_endereco_site_configurar_site' value='<?php echo $acess_endereco_site_configurar_site; ?>'>
														<input type="hidden" name="grade" id="el_configurar_site-slide_show" data-p="configurar_site" data-g="slide_show" value="<?php echo $slide_show_configurar_site; ?>">
														<input type="hidden" id='n_acs_slide_show_configurar_site' value='<?php echo $acess_slide_show_configurar_site; ?>'>
														<input type="hidden" name="grade" id="el_configurar_site-loja" data-p="configurar_site" data-g="loja" value="<?php echo $loja_configurar_site; ?>">
														<input type="hidden" id='n_acs_loja_configurar_site' value='<?php echo $acess_loja_configurar_site; ?>'>
														<input type="hidden" name="grade" id="el_loja-topicos_loja" data-p="loja" data-g="topicos_loja" value="<?php echo $topicos_loja_loja; ?>">
														<input type="hidden" id='n_acs_topicos_loja_loja' value='<?php echo $acess_topicos_loja_loja; ?>'>
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
						<input type="text" class="form-control" placeholder="Pesquisar..." aria-describedby="basic-addon2" id='campoPesquisaModalImagem' onkeyup="chamarImgUp(this.value);">
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
		.notificacaoStyle{
			/*bottom: 0px;*/
			/*margin-top: -25px;*/
			/*margin-left: 1%;*/
			height: 350px;
			/*width: 100%;*/
			border-top-style: solid;
			overflow: auto;
		}
		.infoNewView{
			position: absolute;
			width: 35px;
			height: 35px;
		}
	</style>

	<script type="text/javascript">
		function atualizaNotificacao(){
			$.ajax({
				url:'app/controllers/funcoes_notificacoesController.php',
				type: 'POST',
				dataType: 'text',
				data: { 'retornaStatusNotificacao': true }
			}).done( function(data){
				if (data == 0 || data == "0"){
					$("#notificacaoNView").html("");
				} else {
					$("#notificacaoNView").html("<span class='badge'>"+data+"</span>");
				}
			});
		}

		function carregarNotificao(){
			setInterval(function(){ atualizaNotificacao(); }, 5000);
		}

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
			else if(tipo == 'text'){
				if (/^text/.test( files[0].type) || files[0].type == 'application/pdf'){
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
			console.log(campoId);
			$('#modalImagem').modal('show');
			$("#campoPesquisaModalImagem").val("");
			$("#imgemViewsUpload").attr('src', "app/img/padraoUp.png");
			$("#imagemInputModalImagem").val("");
			document.getElementById("btn_uploadImagem").disabled = true;
			$('#campoSelecionadoModalImagemUp').val(campoId);
			$("#paginaLogarModalImagem").val(pagina);
			$("#tipoUploadValor").val(tipo);
			chamarImgUp("");
					if(tipo == 'img') $('#descricaoTipoUpload').html('Imagem');
			else 	if(tipo == 'video') $('#descricaoTipoUpload').html('Vídeo');
			else 	if(tipo == 'audio') $('#descricaoTipoUpload').html('Áudio');
			else 	if(tipo == 'text') $('#descricaoTipoUpload').html('Arquivo de Texto');
		}
	</script>


	<?php include "app/componetes/bibliotecasFooter.php"; ?>
</body>
</html>