<?php

/*************************************************************************************************************/
/* Configuração das Tabelas de Cadastro */
/*************************************************************************************************************/
$tabelas = explode("+", $tabelas);
$nomeTabelaForm = "";
$areasAcesso = "";
$variaveisAcesso = "";

echo "\n".sizeof($tabelas)."\n";
$tabelaJs = "";
$tabelasHTML = "";
for ($i=0; $i < sizeof($tabelas); $i++) { 
	$tabelaJs .= "
	// Tabela: ".$tabelas[$i]."
	.when('/".$tabelas[$i]."', {
		templateUrl : 'app/views/".$tabelas[$i].".htm',
	})
	.when('/adicionar_".$tabelas[$i]."', {
		templateUrl : 'app/views/adicionar_".$tabelas[$i].".htm',
	})
	.when('/editar_".$tabelas[$i]."', {
		templateUrl : 'app/views/editar_".$tabelas[$i].".htm',
	})

	";
	$nomeTabelaForm = formatarNomeHeadTable2($tabelas[$i]);
	$tabelasHTML .= "
							<?php if(\$acess_".$tabelas[$i].") { ?>
							<li>
								<a href=\"principal.php#!".$tabelas[$i]."\" onclick=\"configAreaDeAtucao('".$tabelas[$i]."')\"><span class=\"txt\">".$nomeTabelaForm."</span></a>
							</li>
							<?php } ?>";

	$variaveisAcesso .= "
\$acess_".$tabelas[$i]." = false;
if(in_array('".$tabelas[$i]."', \$minha_area_nivel_acesso)) \$acess_".$tabelas[$i]." = true;
";

	$areasAcesso .= $areasAcesso == "" ? $tabelas[$i] : "+".$tabelas[$i];
}

// $tabelas = implode("+", $tabelas);

?>