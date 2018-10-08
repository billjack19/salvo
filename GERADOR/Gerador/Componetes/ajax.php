<?php

include "../Classe/funcoes.php";

$nomeTabela = $_POST['nomeTabela'];
$id_tabela = $_POST['id_tabela'];
$colunas = $_POST['colunas'];
$projetoNome = $_POST['projetoNome'];

$nomeTable = $nomeTabela;

$variaveisColunas = "";
$paramatroSubVetor = "";
$numColuna = 0;

$nomeEntidade = letraMaiuscula(substr($nomeTabela, 0, 1)).substr($nomeTabela, 1, strlen($nomeTabela));

$classeName = "ajax_lista_".$nomeTabela;
$nomeFuncoesController = "funcoes_".$nomeTabela."Controller";

$tabelaView = "
			telaCadastro$nomeEntidade += 	\"<table class='table'>\";";
$tabelaViewHeader = "
			telaCadastro$nomeEntidade += 		\"<tr bgcolor='white'>\";";
$tabelaViewBody = "";



$colunas = explode(",",$colunas);
for ($i=0; $i < count($colunas); $i++) { 
	$virgulaParamentros = $i != (count($colunas) - 1) ? ", " : "";
	$variaveisColunas .= "
	var ".$colunas[$i]." = \"\";";
	
	$paramatroSubVetor .= "
				".$colunas[$i]." = subvetor[$i];";

	if ($i != 0 && $numColuna < 5 && $colunas[$i] != "bool_ativo_".$nomeTabela && substr($colunas[$i], -3) != "_id") {
		$numColuna++;
		$tabelaViewHeader .= "
			telaCadastro$nomeEntidade += 			\"<td><b>".formatarNomeHeadTable($colunas[$i])."</b></td>\";";

		$tabelaViewBody .= "
				tabelaViewBody += 			\"<td>\"+".$colunas[$i]."+\"</td>\";";
	}
}

$tabelaViewHeader .= "
			telaCadastro$nomeEntidade += 			\"<td>Editar</td>\";
			telaCadastro$nomeEntidade += 			\"<td>Ativo</td>\";
			telaCadastro$nomeEntidade += 		\"</tr>\";
			telaCadastro$nomeEntidade +=		tabelaViewBody;";

$tabelaView .= $tabelaViewHeader;
$tabelaView .= "
			telaCadastro$nomeEntidade += 	\"</table>\";";
// $funcoesComplementares = "";
// $chamarFuncoesComplementares = "";


// echo "
// 	<table class='table'>
// 		<tr bgcolor='white'>
// 			<td><b>Descrição</b></td>
// 			<td><b>Editar</b></td>
// 			<td><b>Ativo</b></td>
// 		</tr>
// 	";
// foreach ($verifica as $dados) {
// 	echo "
// 		<tr id='linha".$dados[0]."'>
// 			<td>".$dados[1]."</td>
// 			<td align='center'>
// 				<a href='#!editar_$nomeTable' style='color: #f0ad4e;' data-id='".$dados[0]."' onclick='editar(this);' title='Editar'>
// 					<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>
// 				</a>
// 			</td>
// 			<td align='center'>
// 				<a href='#!$nomeTable' style='color: red;' data-id='".$dados[0]."' onclick=\"excluir(this , '$nomeTable')\" title='Excluir'>
// 					<i class=\"fa fa-times\" aria-hidden=\"true\"></i>
// 				</a>
// 			</td>
// 		</tr>
// 	";
// }
// echo "</table>";





$contrudoAjax = "
\$(document).ready(function(){
	$variaveisColunas


	var desabilitar = \"\";
	var icone_ativo = \"\";
	var cor_ativo = \"\";
	var telaCadastro$nomeEntidade = \"\";
	var valorAtivo = 0;
	var tabela_cliente = \"\";
	var tabelaViewBody = \"\";

	\$.ajax({
		url:'app/controllers/$nomeFuncoesController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'pequisa_$nomeTable': true }
	}).done( function(data){
		if (data == \"\") {
			telaCadastro$nomeEntidade += \"<h3>Nenhum registro encontrado!</h3>\";
		} else {
			telaCadastro$nomeEntidade += \"<br>\";

			telaCadastro$nomeEntidade += \"<div class='bloco2'>\";

			var vetor = data.split(\"[]\");
			var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(\",\");

				$paramatroSubVetor

				if (bool_ativo_$nomeTabela == 1) { 
					desabilitar = \"\";
					icone_ativo = \"<i class=\\\"fa fa-check\\\" aria-hidden=\\\"true\\\"></i>\";
					cor_ativo = \"#0f0;\";
					valorAtivo = 0;
				} else {
					desabilitar = \"disabled\";
					cor_ativo = \"#f00;\";
					icone_ativo = \"<i class=\\\"fa fa-times\\\" aria-hidden=\\\"true\\\"></i>\";
					valorAtivo = 1;
				}

				tabelaViewBody += 		\"<tr>\";$tabelaViewBody
				tabelaViewBody +=			\"<td align='center'>\";
				tabelaViewBody +=				\"<a href='principal.php#!editar_$nomeTable' style='color: #f0ad4e;' data-id='\"+".$id_tabela."+\"' onclick='editar(this);' title='Editar'>\";
				tabelaViewBody +=				 	\"<b><i class=\\\"fa fa-pencil\\\" aria-hidden=\\\"true\\\"></i></b>\";
				tabelaViewBody += 				\"</a>\";
				tabelaViewBody +=			\"</td>\";
				tabelaViewBody += 			\"<td align='center'>\";
				tabelaViewBody += 				\"<a href='#!$nomeTable' style='color: \"+cor_ativo+\"' data-id='\"+".$id_tabela."+\"' onclick=\\\"excluir(this , '$nomeTable')\\\" title='Excluir'>\";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				\"</a>\";
				tabelaViewBody +=  			\"</td>\";
				tabelaViewBody += 		\"</tr>\";
				// 	tabela_cliente += jk_tr(\"\",\"\",
				// 		  jk_td(\"left\", razao_social)
				// 		+ jk_td(\"left\", inscricao_federal)
				// 		+ jk_td(\"left\", telefone)
				// 		+ jk_td(\"left\", email)
				// 		// jk_td(\"left\", \"<td>Bairro</td>\";
				// 		// jk_td(\"left\", \"<td>Cidade</td>\";
				// 		// jk_td(\"left\", \"<td>UF</td>\";
				// 		+ jk_td(\"left\",  
				// 			jk_buttonComplemento(\"\", \"\", \"\", \"\", \"telaAdicionarCliente(\"+id_cliente+\");\", 
				// 				jk_icon(\"pencil\"), \"style='color:#f0ad4e;' \"+desabilitar)
				// 		)
				// 		/* + jk_td(\"left\",  
				// 			jk_buttonComplemento(\"\", \"\", \"\", \"\", \"chamarTelaLocalEntrega(\"+id_cliente+\");\", 
				// 				jk_icon(\"plus\"), style='color:green;' \"+desabilitar)
				// 		)*/
				// 		+ jk_td(\"center\",  
				// 			jk_buttonComplemento(\"\", \"\", \"\", \"\", \"alteraAtivoCliente(\"+id_cliente+\", \"+valorAtivo+\");\", 
				// 				icone_ativo, \"style='color:\"+cor_ativo+\"'\")
				// 		)
				// 	);
			}$tabelaView
			// 	telaCadastro$nomeEntidade += jk_table(\"table\", \"0\",
			// 		jk_tr(\"\",\"\",
			// 			  jk_td(\"left\", \"Razão Social\")
			// 			+ jk_td(\"left\", \"CPF/cnpj\")
			// 			+ jk_td(\"left\", \"Telefone\")
			// 			+ jk_td(\"left\", \"E-mail\")
			// 			// jk_td(\"left\", \"<td>Bairro</td>\";
			// 			// jk_td(\"left\", \"<td>Cidade</td>\";
			// 			// jk_td(\"left\", \"<td>UF</td>\";
			// 			+ jk_td(\"left\", \"Editar\")
			// 			// + jk_td(\"left\", \"Interagir\")
			// 			+ jk_td(\"center\", \"Ativo\")
			// 		) + tabela_cliente
			// 	);
			// telaCadastro$nomeEntidade += \"</div>\";	
		}
		telaCadastro$nomeEntidade += \"</div>\";
		\$(\"#conteudo$nomeEntidade\").html(telaCadastro$nomeEntidade);
		// montarComboBuscaCliente();
	});
});";

echo criarArquivo("../../GeradorProjetos/$projetoNome/app/js/ajax/$classeName.js", $contrudoAjax);

?>