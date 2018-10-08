<?php

$uploadAppJs = "";
$menuUploadOp = "";
$modalUploadImagem_BoolUpload = "
	<!-- Modal upload de Imagem -->
	<div class=\"modal fade\" id=\"modalImagem\" role=\"dialog\">
		<div class=\"modal-dialog\">
			<div class=\"modal-content\">
				<div class=\"modal-header\">
					<button type=\"button\" class=\"close\" id=\"fecharModalIpBottun\" data-dismiss=\"modal\">
						&times;
					</button>
					<h4 class=\"modal-title\">Imagens: </h4>
				</div>
				<div class=\"modal-body\">
					<div class=\"input-group\">
						<input type=\"text\" class=\"form-control\" placeholder=\"Pesquisar...\" aria-describedby=\"basic-addon2\" id='campoPesquisaModalImagem' onkeyup=\"chamarImgUp(this.value);\">
						<span class=\"input-group-addon\" id=\"basic-addon2\">
							<i class=\"fa fa-search\" aria-hidden=\"true\"></i>
						</span>
					</div>
					<br>
					<div id=\"viewImagensUpadas\"></div>
					<br>
					<input type=\"hidden\" id=\"campoSelecionadoModalImagemUp\">
					<input type=\"hidden\" id='tipoUploadValor' value=\"img\">
				</div>
				<div class=\"modal-footer\">
					<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">
						<i class=\"fa fa-times\" aria-hidden=\"true\"></i>&nbsp;&nbsp;Fechar
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- fim Modal upload de Imagem -->";


if ($bool_upload == 1 || $bool_upload == "1") {
	$uploadAppJs = "
	/*************************************************************************************************************/
	/* Upload */
	/*************************************************************************************************************/
	// Resultado do Upload
	.when('/upload_result', {
		templateUrl : 'app/views/upload_result.php',
	})

	// Upload de Imagem	
	.when('/upload_imagem', {
		templateUrl : 'app/views/upload_imagem.htm',
	})

	.when('/upload_imagem_view', {
		templateUrl : 'app/views/upload_imagem_view.htm',
	})


	// Upload de Video
	.when('/upload_video', {
		templateUrl : 'app/views/upload_video.htm',
	})

	.when('/upload_video_view', {
		templateUrl : 'app/views/upload_video_view.htm',
	})


	// Upload de Audio
	.when('/upload_audio', {
		templateUrl : 'app/views/upload_audio.htm',
	})

	.when('/upload_audio_view', {
		templateUrl : 'app/views/upload_audio_view.htm',
	})


	// Upload de Arquivo de Texto
	.when('/upload_texto', {
		templateUrl : 'app/views/upload_texto.htm',
	})

	.when('/upload_texto_view', {
		templateUrl : 'app/views/upload_texto_view.htm',
	})





	";

	$modalUploadImagem_BoolUpload = "
	<!-- Modal upload de Imagem -->
	<div class=\"modal fade\" id=\"modalImagem\" role=\"dialog\">
		<div class=\"modal-dialog\">
			<div class=\"modal-content\">
				<div class=\"modal-header\">
					<button type=\"button\" class=\"close\" id=\"fecharModalIpBottun\" data-dismiss=\"modal\">
						&times;
					</button>
					<h4 class=\"modal-title\">Upload de Arquivo: <span id='descricaoTipoUpload'></span></h4>
				</div>
				<div class=\"modal-body\">
					<img src=\"app/img/padraoUp.png\" id=\"imgemViewsUpload\" height=\"100px\">
					<form action=\"uploard.php\" id=\"formulario_imgem\" method=\"POST\" enctype=\"multipart/form-data\">
						<input type=\"file\" class=\"form-control\" name=\"arquivo\" id=\"imagemInputModalImagem\">
						<!--input type=\"hidden\" name=\"pasta\" value=\"\"-->
						<input type=\"hidden\" name=\"tipo\" id='tipoUploadValor' value=\"img\">
						<input type=\"hidden\" name=\"paginaLogar\" id=\"paginaLogarModalImagem\">
						<button type=\"submit\" class=\"btn btn-default\" id=\"btn_uploadImagem\" disabled>
							<i class=\"fa fa-upload\" aria-hidden=\"true\"></i>&nbsp;&nbsp;Uploard
						</button>
						<span id=\"erroExtencaoArqMoldaImagem\" style=\"color:red;\"></span>
					</form>
					<br>
					<div class=\"input-group\">
						<input type=\"text\" class=\"form-control\" placeholder=\"Pesquisar...\" aria-describedby=\"basic-addon2\" id='campoPesquisaModalImagem' onkeyup=\"chamarImgUp(this.value);\">
						<span class=\"input-group-addon\" id=\"basic-addon2\">
							<i class=\"fa fa-search\" aria-hidden=\"true\"></i>
						</span>
					</div>
					<br>
					<div id=\"viewImagensUpadas\"></div>
					<br>
					<input type=\"hidden\" id=\"campoSelecionadoModalImagemUp\">
				</div>
				<div class=\"modal-footer\">
					<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">
						<i class=\"fa fa-times\" aria-hidden=\"true\"></i>&nbsp;&nbsp;Fechar
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- fim Modal upload de Imagem -->";

	$menuUploadOp = "
					<li>
						<a href=\"#\">
							<i class='glyphicon glyphicon-upload'></i>
							&nbsp;<span class=\"txt\">Upload</span>
						</a>
						<ul class=\"sub\">
							<li>
								<a href=\"principal.php#!upload_imagem\"><span class=\"txt\">Imagem</span></a>
							</li>
							<li>
								<a href=\"principal.php#!upload_video\"><span class=\"txt\">Vídeo</span></a>
							</li>
							<li>
								<a href=\"principal.php#!upload_audio\"><span class=\"txt\">Áudio</span></a>
							</li>
							<li>
								<a href=\"principal.php#!upload_texto\"><span class=\"txt\">Texto</span></a>
							</li>
						</ul>
					</li>";
}
?>