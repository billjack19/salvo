<?php

include "../Classe/funcoes.php";



/*************************************************************************************************************/
/* Variaveis de Configuração */
/*************************************************************************************************************/
$modeloCorMenu = $_POST['modeloCorMenu'];
$icone = $_POST['icone'];
$tabelas = $_POST['tabelas'];
$id_projeto = $_POST['id_projeto'];

$logoLg = $_POST['logoLg'];
$logoSm = $_POST['logoSm'];

$bool_upload = $_POST['bool_upload'];

$imagem_icone = "";











/*************************************************************************************************************/
/* Iniciando Conexão Base de Dados Gerador */
/*************************************************************************************************************/
include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();











/*************************************************************************************************************/
/* Dados do Projeto */
/*************************************************************************************************************/
$sql = "SELECT * FROM projetos WHERE id_projeto = $id_projeto;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$projetoNome = $dados['nome'];
	$hostConexao = $dados['host'];
	$userConexao = $dados['user'];
	$pwsConexao = $dados['pws'];
	$nameDbConexao = $dados['bancoDados'];
}











/*************************************************************************************************************/
/* Definir conexão do Banco de Dados do Projeto */
/*************************************************************************************************************/
include "../Classe/conexao.php";

$conn = new Conexao();
$conn->set($hostConexao, 'db_host');
$conn->set($userConexao, 'db_usuario');
$conn->set($pwsConexao, 'db_senha');
$conn->set($nameDbConexao, 'db_nome');
$conn->conectar();

$pdo_projeto = $conn->Connect();











/*************************************************************************************************************/
/* Salvando Configurações  */
/*************************************************************************************************************/
$id_config_principal = 0;
$sql = "SELECT id_config_principal FROM config_principal WHERE projetos_id = $id_projeto;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$id_config_principal = $dados['id_config_principal'];
}

if ($id_config_principal == 0) {
	$sql = "INSERT INTO config_principal
			(projetos_id, modelo_cores_menu_id, icone_cadastro_config_principa, tabelas_cadastro_config_principa, logoLg_config_principa, logoSm_config_principa, bool_upload_config_principa)
			VALUES ($id_projeto, $modeloCorMenu, '$icone', '$tabelas', '$logoLg', '$logoSm', $bool_upload);";
} else {
	$sql = "UPDATE config_principal 
			SET
				modelo_cores_menu_id 				= $modeloCorMenu, 
				icone_cadastro_config_principa 		= '$icone',
				tabelas_cadastro_config_principa 	= '$tabelas',
				logoLg_config_principa 				= '$logoLg',
				logoSm_config_principa 				= '$logoSm',
				bool_upload_config_principa			= '$bool_upload'
			WHERE 
				id_config_principal = $id_config_principal;";
}

$stmt = $pdo->prepare($sql);
$stmt->execute();










/*************************************************************************************************************/
/* Configuração das Tabelas de Cadastro */
/*************************************************************************************************************/
/* 
	- Cria as variaveis de acesso
	- Configura o roteamento para app.js
	- Cria os link para o menu
	OBS: tudo referente as das tabelas selecionadas na view de criar tabela principal
*/
include "tabela_cadastro.php";








/*
	- Configura mapeamento de grade para gerar sessão do id da grade
	- Configura roteamento para app.js
	- Cria as variaveis de acesso
	- Cria os input hidden para armazenar o id da tabela anterior
*/
include "tabela_grade.php";











/*************************************************************************************************************/
/* Configuração do icone da Aba */
/*************************************************************************************************************/
$sql = "SELECT imagem_icone.descricao_imagem_icone FROM config_login 
		INNER JOIN imagem_icone ON config_login.imagem_icone_id = imagem_icone.id_imagem_icone
		WHERE config_login.projetos_id = $id_projeto;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$imagem_icone = "<link rel='shortcut icon' href='app/img/".$dados['descricao_imagem_icone']."' />";
}











/*************************************************************************************************************/
/* Configuração de Cor do Menu Principal */
/*************************************************************************************************************/
$sql = "SELECT * FROM `cor_modelo_menu` WHERE modelo_cores_menu_id = $modeloCorMenu;";
$verifica = $pdo->query($sql);

$cor2 = "#000";

$cor1 = "#303946";
$cor3 = "#1c2128";
$cor4 = "#3b4655";
$cor5 = "#262d37";
$cor6 = "#505e73";
$cor7 = "#455264";
$cor8 = "#071e24";
$cor9 = "#344154";

foreach ($verifica as $dados) {
	switch ($dados['num_cor_modelo_menu']) {
		case 1: $cor1 = "#".$dados['descricao_cor_modelo_menu']; break;
		case 2: $cor3 = "#".$dados['descricao_cor_modelo_menu']; break;
		case 3: $cor4 = "#".$dados['descricao_cor_modelo_menu']; break;
		case 4: $cor5 = "#".$dados['descricao_cor_modelo_menu']; break;
		case 5: $cor6 = "#".$dados['descricao_cor_modelo_menu']; break;
		case 6: $cor7 = "#".$dados['descricao_cor_modelo_menu']; break;
		case 7: $cor8 = "#".$dados['descricao_cor_modelo_menu']; break;
		case 8: $cor9 = "#".$dados['descricao_cor_modelo_menu']; break;
	}
}

include "mainCssPrincipal.php";











/*
	- Faz um Arquivo chamando Calculador
		Ele comtem todas as formulas cadastradas no Gerador e toda a configuração para fazer calculos entre campos numa tela de cadastro
*/
include "tabela_formula.php";










/*************************************************************************************************************/
/* Configuração de Tabelas para emitir relatórios */
/*************************************************************************************************************/
$tabelas_config_relatorio = "";
$sql = "SELECT * FROM config_relatorio WHERE projetos_id = $id_projeto;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$tabelas_config_relatorio = $dados['tabelas_config_relatorio'];
}
$tabelas_config_relatorio = explode("+", $tabelas_config_relatorio);

$sql = "TRUNCATE relatorio_tabela;";
$stmt = $pdo_projeto->prepare($sql);
$stmt->execute();

if ($tabelas_config_relatorio[0] != "") {
	for ($i=0; $i < sizeof($tabelas_config_relatorio); $i++) { 
		$sql = "INSERT INTO relatorio_tabela (descricao_relatorio_tabela) VALUES ('".$tabelas_config_relatorio[$i]."')";
		$stmt = $pdo_projeto->prepare($sql);
		$stmt->execute();
	}
}











/*************************************************************************************************************/
/* Configuração de Areas de Acesso */
/*************************************************************************************************************/
$areasAcesso .= $bool_upload == 1 || $bool_upload == "1" ? "+upload" : "";
$areasAcesso .= "+mapa";
$areasAcesso .= "+mov";
$areasAcesso .= "+relatorio";
$areasAcesso .= "+notificacao";
$areasAcesso .= "+usuario";

$variaveisAcesso .= "
\$acess_upload = false;
if(in_array('upload', \$minha_area_nivel_acesso)) \$acess_upload = true;

\$acess_mapa = false;
if(in_array('mapa', \$minha_area_nivel_acesso)) \$acess_mapa = true;

\$acess_mov = false;
if(in_array('mov', \$minha_area_nivel_acesso)) \$acess_mov = true;

\$acess_pdf = false;
if(in_array('relatorio', \$minha_area_nivel_acesso)) \$acess_pdf = true;

\$acess_notif = false;
if(in_array('notificacao', \$minha_area_nivel_acesso)) \$acess_notif = true;

\$acess_usuario = false;
if(in_array('usuario', \$minha_area_nivel_acesso)) \$acess_usuario = true;";


$sql = "UPDATE nivel_acesso SET area_nivel_acesso = '$areasAcesso' WHERE id_nivel_acesso = 1";
$stmt = $pdo_projeto->prepare($sql);
$stmt->execute();

$sql = "DELETE FROM area_nivel_acesso WHERE nivel_acesso_id = 1";
$stmt = $pdo_projeto->prepare($sql);
$stmt->execute();

$areasAcesso = explode("+", $areasAcesso);
for ($i=0; $i < sizeof($areasAcesso); $i++) { 
	$sql = "INSERT INTO area_nivel_acesso (nivel_acesso_id, area_area_nivel_acesso, demostrativo_area_nivel_acesso, usuario_id) VALUES (1, '".$areasAcesso[$i]."', '".formatarNomeHeadTable2($areasAcesso[$i])."', 1);";
	$stmt = $pdo_projeto->prepare($sql);
	$stmt->execute();
}

// $areasAcesso = explode("+", $areasAcesso);

// $sql = "TRUNCATE area_acesso;";
// $stmt = $pdo->prepare($sql);
// $stmt->execute();

// for ($i=0; $i < sizeof($areasAcesso); $i++) { 
// 	$sql = "INSERT INTO area_acesso (descricao_area_acesso, usuario_id) VALUES ('".$areasAcesso[$i]."', 1);";
// 	$stmt = $pdo->prepare($sql);
// 	$stmt->execute();
// }











/*************************************************************************************************************/
/* Configuração de Upload */
/*************************************************************************************************************/
include "config_upload.php";












/*************************************************************************************************************/
/* Gerando arquivo que mapeia as grade.js */
/*************************************************************************************************************/
$mapa_gradeArq = "
<?php

session_start();

$mapa_grade

if(!empty(\$_POST['zerarGrades'])){ $mapa_grade_zerada
}

?>";

criarArquivo("../../GeradorProjetos/$projetoNome/app/controllers/mapa_gradeController.php", $mapa_gradeArq);








/*************************************************************************************************************/
/* Gerando arquivo app.js */
/*************************************************************************************************************/
include "arquivo_app_js.php";
criarArquivo("../../GeradorProjetos/$projetoNome/app/app.js", $appJS);








/*************************************************************************************************************/
/* Criar view home */
/*************************************************************************************************************/
$homeHtm = "
<!-- h1>Hello Word</h1 -->
<h1>Página Principal</h1>
<h2>Bem Vindo ao projeto <b>".formatarNomeHeadTable2($projetoNome)."</b></h2>
";
criarArquivo("../../GeradorProjetos/$projetoNome/app/views/home.htm", $homeHtm);









/************************************************************************************************************/
/* Menu Principal */
/************************************************************************************************************/
$menuPrincipal = "

<aside id=\"sidebar\" class=\"page-sidebar hidden-md hidden-sm hidden-xs\">
	<!-- Start .sidebar-inner -->
	<div class=\"sidebar-inner\">
		<!-- Start .sidebar-scrollarea -->
		<div class=\"sidebar-scrollarea\">
			<!--  .sidebar-panel -->
			<div class=\"sidebar-panel\">
			    <h5 class=\"sidebar-panel-title\">Perfil</h5>
			</div>
			<!-- / .sidebar-panel -->
			<div class=\"user-info clearfix\">
				<div class='row fluit-container'>
					<div class='col-md-4'>
						<img src=\"app/img/avatars/iconAvatar.png\" widht='100%' alt=\"avatar\">
					</div>
					<div class='col-md-8 text-left'>
						<a href='#' class=\"name\">
							<span id='nomeLogado'><?php echo \$nomeUser; ?></span>
						</a>

						<center>
							<button type=\"button\" class=\"btn btn-default btn-xs text-right\" onclick='deslogar()'>
								<i class=\"fa fa-sign-out\"></i>&nbsp;Sair
							</button>
						</center>
					</div>
				</div>
			</div>
			<!--  .sidebar-panel -->
			<div class=\"sidebar-panel\">
			    <h5 class=\"sidebar-panel-title\">Navigation</h5>
			</div>
			<!-- / .sidebar-panel -->
			<!-- .side-nav -->
			<div class=\"side-nav\">
				<ul class=\"nav\">
					<li>
						<a href=\"principal.php#!home\">
							<i class=\"glyphicon glyphicon-home\"></i>
							&nbsp;<span class=\"txt\">Home</span>
						</a>
					</li>
					<li>
						<a href=\"#\">
							<i class=\"fa fa-user-circle\" aria-hidden=\"true\"></i>
							&nbsp;<span class=\"txt\">Perfil</span>
						</a>
						<ul class=\"sub\">
							<li>
								<a href=\"principal.php#!perfil_editar\"><span class=\"txt\">Editar Perfil</span></a>
							</li>
							<li>
								<a href=\"principal.php#!perfil_trocar_senha\"><span class=\"txt\">Trocar Senha</span></a>
							</li>
						</ul>
					</li>
					<li>
						<a href=\"#\">
							$icone
							&nbsp;<span class=\"txt\">Cadastro</span>
						</a>
						<ul class=\"sub\">$tabelasHTML
						</ul>
					</li>
					<?php if(\$acess_pdf){ ?>
					<li>
						<a href=\"#\">
							<i class='fa fa-file-pdf-o' aria-hidden=\"true\"></i>
							&nbsp;<span class=\"txt\">Relatório</span>
						</a>
						<ul class=\"sub\">
							<li>
								<a href=\"principal.php#!pdf_lista\"><span class=\"txt\">Cadastro / Emissão</span></a>
							</li>
							<!--li>
								<a href=\"principal.php#!pdf_emiti\"><span class=\"txt\">Personalizado</span></a>
							</li-->
						</ul>
					</li>
					<?php } ?>
					<?php if(\$acess_notif){ ?>
					<li>
						<a href=\"#\">
							<i class='fa fa-bell' aria-hidden=\"true\"></i>
							&nbsp;<span class=\"txt\">Notificação <span id='notificacaoNView'></span></span>
						</a>
						<ul class=\"sub\">
							<li>
								<a href=\"principal.php#!notif_lista\"><span class=\"txt\">Atuais</span></a>
							</li>
							<li>
								<a href=\"principal.php#!pdf_lista\"><span class=\"txt\">Salvas</span></a>
							</li>
							<li>
								<a href=\"principal.php#!pdf_lista\"><span class=\"txt\">Pendentes</span></a>
							</li>
							<li>
								<a href=\"principal.php#!notif_lista_config\"><span class=\"txt\">Configuração</span></a>
							</li>
						</ul>
					</li>
					<?php } ?>
					<?php if(\$acess_upload) { ?>$menuUploadOp
					<?php } ?>
					<?php if(\$acess_mov) { ?>
					<li>
						<a href=\"#\">
							<i class='fa fa-folder-open' aria-hidden=\"true\"></i>
							&nbsp;<span class=\"txt\">Arquivo</span>
						</a>
						<ul class=\"sub\">
							<li>
								<a href=\"principal.php#!mov_img\"><span class=\"txt\">Movimentação Imagem</span></a>
							</li>
						</ul>
					</li>
					<?php } ?>
					<?php if(\$acess_mapa) { ?>
					<li>
						<a href=\"#\">
							<i class='fa fa-map-signs' aria-hidden=\"true\"></i>
							&nbsp;<span class=\"txt\">Maps</span>
						</a>
						<ul class=\"sub\">
							<li>
								<a href=\"principal.php#!maps_Lat_Lng\"><span class=\"txt\">Latitude/Longitude</span></a>
							</li>
						</ul>
					</li>
					<?php } ?>
					<?php if(\$acess_usuario) { ?>
					<li>
						<a href=\"#\">
							<i class='fa fa-user-plus' aria-hidden=\"true\"></i>
							&nbsp;<span class=\"txt\">Acesso</span>
						</a>
						<ul class=\"sub\">
							<li>
								<a href=\"principal.php#!usuario_lista\"><span class=\"txt\">Usuário</span></a>
							</li>
							<li>
								<a href=\"principal.php#!usuario_nivel_acesso\"><span class=\"txt\">Nível de Acesso</span></a>
							</li>
						</ul>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<!-- End .sidebar-scrollarea -->
	</div>
	<!-- End .sidebar-inner -->
</aside>
<!-- / page-sidebar -->
<!-- Start #right-sidebar -->
";

criarArquivo("../../GeradorProjetos/$projetoNome/app/componetes/menu.php", $menuPrincipal);


copiarArquivoSemNome(
	"../Img_logo/$logoLg", 
	"../../GeradorProjetos/$projetoNome/app/img/logo.png"
);
copiarArquivoSemNome(
	"../Img_logo/$logoSm", 
	"../../GeradorProjetos/$projetoNome/app/img/logosm.png"
);







/***************************************************************************************************************/
/* Pagina Principal ****************************************************************************************************************/
$paginaPrincipal = "<?php 
ob_start();
session_start();

if (!empty(\$_SESSION['nome']) && \$_SESSION['nome'] != \"\") {
	\$nomeUser = \$_SESSION['nome'];
} else {
	header(\"Location: index.php\");
}

\$areaDeAtuacao = \"\";
if (!empty(\$_SESSION['areaDeAtuacao'])) \$areaDeAtuacao = \$_SESSION['areaDeAtuacao'];


\$editar = 0;
if (!empty(\$_SESSION['editar'])) \$editar = \$_SESSION['editar'];

$session_grades

include \"app/classe/conexao.php\";
\$conn = new Conexao();
\$pdo = \$conn->Connect(); 

/*
Verificação Antiga
\$sql = \"SELECT area_nivel_acesso
		FROM nivel_acesso
		WHERE id_nivel_acesso = (
			SELECT nivel_acesso_id FROM usuario WHERE id_usuario = \".\$_SESSION['login'].\"
		);\";
\$verifica = \$pdo->query(\$sql); 

foreach (\$verifica as \$dados) \$minha_area_nivel_acesso = explode(\"+\", \$dados[0]);
*/

\$minha_area_nivel_acesso = array();
\$sql = \"SELECT area_area_nivel_acesso
		FROM area_nivel_acesso
		WHERE nivel_acesso_id = (
			SELECT nivel_acesso_id FROM usuario WHERE id_usuario = \".\$_SESSION['login'].\"
		);\";
\$verifica = \$pdo->query(\$sql);

foreach (\$verifica as \$dados) array_push(\$minha_area_nivel_acesso, \$dados[0]);


$variaveisAcesso

?>
<!DOCTYPE html>
<html>
<head>
	<title>".formatarNomeHeadTable2($projetoNome)."</title>
	$imagem_icone
	<?php include \"app/componetes/bibliotecasHead.php\"; ?>
	<?php include \"app/componetes/biblioteca.php\"; ?>
</head>
<body ng-app=\"myApp\" onload=\"carregarNotificao();\">
	<?php include \"app/componetes/cabecario.php\"; ?>
	<div id=\"wrapper\">

		<?php include \"app/componetes/menu.php\"; ?>

			<!-- .page-content -->
			<div class=\"page-content sidebar-page right-sidebar-page clearfix\">
				<!-- .page-content-wrapper -->
				<div class=\"page-content-wrapper\">
					<div class=\"page-content-inner\">
						<!-- .page-content-inner -->
						<div id=\"page-header\" class=\"clearfix\">
							<div class=\"page-header\">
								<h2>".formatarNomeHeadTable2($projetoNome)."</h2>
								<span class=\"txt\">Bem Vindo a este projeto!</span>
							</div>
							<div class=\"header-stats\">
							</div>
						</div>

						<div class=\"row\">
							<!-- Start .row -->
							<div class=\"col-lg-12 col-md-12\">
								<!-- col-lg-12 start here -->
								<div class=\"row\">
									<!-- Start .row -->
									<div class=\"col-lg-12 col-md-12 col-sm-12\">
										<!-- col-lg-12 start here -->
										<div class=\"panel panel-default plain toggle panelClose panelRefresh\">
											<!-- Start .panel -->
											<div class=\"panel-heading\">
												<!--h4 class=\"panel-title\">
													<i class=\"l-basic-target\"></i> 
													<span id='tituloView'>Home</span>
												</h4-->
											</div>
											<div class=\"panel-body\">
												<div class=\"row\">
													<!-- Start .row -->
													<div class=\"col-md-12\">
														<input type=\"hidden\" id=\"areaDeAtuacao\" value=\"<?php echo \$areaDeAtuacao; ?>\">
														<input type=\"hidden\" id=\"editar\" value=\"<?php echo \$editar; ?>\">$inputsGrade
														<input type=\"hidden\" id=\"usuario\" value=\"<?php echo \$_SESSION['login']; ?>\">
														<div ng-view class=\"col-md-12\">

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

	$modalUploadImagem_BoolUpload

	<style type=\"text/css\">
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

	<script type=\"text/javascript\">
		function atualizaNotificacao(){
			\$.ajax({
				url:'app/controllers/funcoes_notificacoesController.php',
				type: 'POST',
				dataType: 'text',
				data: { 'retornaStatusNotificacao': true }
			}).done( function(data){
				if (data == 0 || data == \"0\"){
					$(\"#notificacaoNView\").html(\"\");
				} else {
					$(\"#notificacaoNView\").html(\"<span class='badge'>\"+data+\"</span>\");
				}
			});
		}

		function carregarNotificao(){
			setInterval(function(){ atualizaNotificacao(); }, 5000);
		}

		function chamarImgUp(filtro){
			\$(\"#viewImagensUpadas\").html(\"Carregando...\");
			var tipo = \$(\"#tipoUploadValor\").val();
			\$.ajax({
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
				\$(\"#viewImagensUpadas\").html(data);
			});
		}

		// \$(\"#modalImagem\").on('shown.bs.modal',function(){  });

		function selecionarArquivo(arquivo){
			var campoSerdefinido = \$(\"#campoSelecionadoModalImagemUp\").val();
			document.getElementById(campoSerdefinido).value = arquivo;
			\$(\"#modalImagem\").modal(\"hide\");
		}

		\$(\"#imagemInputModalImagem\").on(\"change\", function(){
			var tipo = \$(\"#tipoUploadValor\").val();
			var arquivo = '';
			var files = !!this.files ? this.files : [];
			if (!files.length || !window.FileReader) return;

			if(tipo == 'img'){
				if (/^image/.test( files[0].type)){
					var reader = new FileReader();
					reader.readAsDataURL(files[0]);

					reader.onload = function(){
						\$(\"#imgemViewsUpload\").attr('src', this.result);
						document.getElementById(\"btn_uploadImagem\").disabled = false;
						\$(\"#erroExtencaoArqMoldaImagem\").html(\"\");
					}
				} else {
					\$(\"#imgemViewsUpload\").attr('src', \"app/img/padraoUp.png\");
					document.getElementById(\"btn_uploadImagem\").disabled = true;
					\$(\"#erroExtencaoArqMoldaImagem\").html(\"Arquivo inválido!\");
				}
			}
			else if(tipo == 'text'){
				if (/^text/.test( files[0].type) || files[0].type == 'application/pdf'){
					var reader = new FileReader();
					reader.readAsDataURL(files[0]);

					reader.onload = function(){
						document.getElementById(\"btn_uploadImagem\").disabled = false;
						\$(\"#erroExtencaoArqMoldaImagem\").html(\"\");
					}
				} else {
					document.getElementById(\"btn_uploadImagem\").disabled = true;
					\$(\"#erroExtencaoArqMoldaImagem\").html(\"Arquivo inválido!\");
				}
			}
			else {
				arquivo = files[0].type.split(\"/\");
				if (tipo == arquivo[0]){
					var reader = new FileReader();
					reader.readAsDataURL(files[0]);

					reader.onload = function(){
						document.getElementById(\"btn_uploadImagem\").disabled = false;
						\$(\"#erroExtencaoArqMoldaImagem\").html(\"\");
					}
				} else {
					document.getElementById(\"btn_uploadImagem\").disabled = true;
					\$(\"#erroExtencaoArqMoldaImagem\").html(\"Arquivo inválido!\");
				}
			}
		});

		function chamarModalImagem(campoId, pagina, tipo){
			console.log(campoId);
			\$('#modalImagem').modal('show');
			\$(\"#campoPesquisaModalImagem\").val(\"\");
			\$(\"#imgemViewsUpload\").attr('src', \"app/img/padraoUp.png\");
			\$(\"#imagemInputModalImagem\").val(\"\");";
if ($bool_upload == 1 || $bool_upload == "1") {
$paginaPrincipal .= "
			document.getElementById(\"btn_uploadImagem\").disabled = true;";
} 
$paginaPrincipal .= "
			\$('#campoSelecionadoModalImagemUp').val(campoId);
			\$(\"#paginaLogarModalImagem\").val(pagina);
			\$(\"#tipoUploadValor\").val(tipo);
			chamarImgUp(\"\");
					if(tipo == 'img') \$('#descricaoTipoUpload').html('Imagem');
			else 	if(tipo == 'video') \$('#descricaoTipoUpload').html('Vídeo');
			else 	if(tipo == 'audio') \$('#descricaoTipoUpload').html('Áudio');
			else 	if(tipo == 'text') \$('#descricaoTipoUpload').html('Arquivo de Texto');
		}
	</script>


	<?php include \"app/componetes/bibliotecasFooter.php\"; ?>
</body>
</html>";

// echo 
criarArquivo("../../GeradorProjetos/$projetoNome/principal.php", $paginaPrincipal);

?>