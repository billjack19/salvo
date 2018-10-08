<?php

session_start();

if (!empty($_SESSION['login_cliente']) && $_SESSION['login_cliente'] != "") {
	$usuario = $_SESSION['login_cliente'];
	$nomeUsusario = $_SESSION['nome_cliente'];
	$nomeUsusario = substr($nomeUsusario, 0, 25);
	$logado = true;
} else {
	$usuario = "";
	$nomeUsusario = "Fazer Login";
	$logado = false;
}



include "classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();



$id_configurar_site = 0;
$titulo = "";
$tituo_menu = "";
$corPagina = "rgb(126, 192, 250);";
$corPagina = "#7EC0FA;";
$contraCorPagina = "#fff;";
$corTexto = "";
$iconePagina = "img/logo/Logotipo.png";
$logoPagina = "";
$logoPaginaSm = "";
$tituloBemVindo = "Bem Vindo!";
// Site Oficial
$caminhoImg = "imagens/";
// Site Local
$caminhoImg = "admin/app/upload/img/";



$sql = "	SELECT *
			FROM configurar_site 
			WHERE bool_ativo_configurar_site = 1
			ORDER BY id_configurar_site DESC LIMIT 1;";

$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$id_configurar_site = $dados['id_configurar_site'];
	$titulo = $dados['titulo_configurar_site'];
	$corPagina = $dados['cor_pagina_configurar_site'];
	$contraCorPagina = $dados['contra_cor_pagina_configurar_site'];
	$corTexto = $dados['contra_cor_pagina_configurar_site'];
	$iconePagina = $caminhoImg.$dados['imagem_icone_configurar_site'];
	$tituloBemVindo = $dados['bem_vindo_configurar_site'];
	$tituo_menu = $dados['titulo_menu_configurar_site'];

	$logoPaginaSm = $caminhoImg.$dados['imagem_logo_sm_configurar_site'];
	$logoPaginaSm = $dados['imagem_logo_sm_configurar_site'] != "" ? "<img src='".$logoPaginaSm."' height=\"60px;\">" : "";
	$logoPagina = $caminhoImg.$dados['imagem_logo_configurar_site'];
	$logoPagina = $dados['imagem_logo_configurar_site'] != "" ?	"<img src='".$logoPagina."' height=\"60px;\">" : "";
}





$linkMenu = "";
$descricaoSubGrupo = "";
$ID_grupo_estoque = "";
$ID_sub_grupo_estoque = "";

$sql = "	SELECT *
			FROM grupo 
			WHERE bool_ativo_grupo = 1
			ORDER BY descricao_grupo;";

$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$descricaoSubGrupo = $dados["descricao_grupo"];
	$ID_grupo_estoque = $dados['id_grupo'];
	// $ID_sub_grupo_estoque = $dados['SUB_GRUPO'];

	$linkMenu .= "
				<a class=\"dropdown-item\" href=\"#\" onclick='setarIdGrupo(\"$ID_grupo_estoque\")'>
					$descricaoSubGrupo
				</a>";
}
?>