<?php


$nomeArquivos = "";
$contArq = 0;
$nomeTable = $nomeTabela;
$arrayTabelaGrade = [];


// Verificação da tabela ser grade
for ($i=0; $i < sizeof($camposGrade); $i++) { 
	$arrayTabelaGrade = explode(",", $camposGrade[$i]);

	if ( sizeof($arrayTabelaGrade) > 1 && $arrayTabelaGrade[1] == $nomeTable ) {
		$contArq++;




$contElemetTable = explode("_", $nomeTable);
$nomeTableForm = formatarNomeHeadTable2($nomeTable);


$variaveisColunas = "";
$variaveisEstrangeiras = "";

$paramatroSubVetor = "";
$numColuna = 0;

$nomeEntidade = letraMaiuscula(substr($nomeTabela, 0, 1)).substr($nomeTabela, 1, strlen($nomeTabela));

$nomeEntidadePrimaria = letraMaiuscula(
							substr($arrayTabelaGrade[0], 0, 1)).substr($arrayTabelaGrade[0], 1, 
							strlen($arrayTabelaGrade[0])
						);

$classeNameAjax = "ajax_grade_".$nomeTabela."-".$arrayTabelaGrade[0];
$nomeFuncoesController = "funcoes_".$nomeTabela."Controller";

$tabelaView = "
			telaCadastro$nomeEntidade += 	\"<table class='table'>\";";
$tabelaViewHeader = "
			telaCadastro$nomeEntidade += 		\"<tr bgcolor='white'>\";";
$tabelaViewBody = "";



/*****************************************************************************************************************************/
/* Verificação por tipo */
/*****************************************************************************************************************************/

$arrayTabelasGrades = [];




$sql = "SHOW COLUMNS FROM $nomeTable";
$verifica = $pdo->query($sql);

$id_tabela = "";
$colunas = "";
$paramentros = "";
$nomeCampo = "";
$nomeCampoOriginal = "";
$tamanhoCampo = "";
$configAjax = "";

$verificaChaveEstrngeira = "";
$verificaCampoBool = "";
$verificaCampoTipo = "";

$tabelaEstrangeira = "";
$tabelaEstrangeiraPM = "";

$inputDefinido = "";
$scrpitsCombo = "";
$contColuna = 0;
$contObrigatorio = 0;
$indiceGeral = 0;

$tabelaViewHeader .= "
			telaCadastro$nomeEntidade += 			\"<td><b>Editar</b></td>\";
			telaCadastro$nomeEntidade += 			\"<td><b>Ativo</b></td>\";
			telaCadastro$nomeEntidade += 			\"<td><b>N°</b></td>\";";

foreach ($verifica as $dados) {
	if ($dados[3] == "PRI") {
		$id_tabela = $dados[0];
	} 
	// else {
		$contColuna++;

		$virgulaParamentros = $contColuna = 1 ? "" : ",";

		$nomeCampoOriginal = $dados[0];

		$nomeCampo = formatarNomeCampo($nomeCampoOriginal, sizeof($contElemetTable));
		$nomeCampo = formatarNomeHeadTable2($nomeCampo);

		$verificaChaveEstrngeira = retornaUltimaPosicao(explode("_", $nomeCampoOriginal));
		$verificaCampoBool = explode("_", $nomeCampoOriginal);
		$verificaCampoBool = $verificaCampoBool[0];
		$verificaCampoTipo = explode("(", $dados[1]);
		$tamanhoCampo = "";
		if (sizeof($verificaCampoTipo) > 1) {
			$tamanhoCampo = str_replace(")", "", $verificaCampoTipo[1]);
		}


		$variaveisColunas .= "
	var ".$nomeCampoOriginal." = \"\";";
	
		$paramatroSubVetor .= "
				".$nomeCampoOriginal." = subvetor[$indiceGeral];";


		if (
			$numColuna < 5  && 
			$dados[3] != "PRI" && 
			$nomeCampoOriginal != "bool_ativo_".$nomeTable &&
			$nomeCampoOriginal != $arrayTabelaGrade[0]."_id" &&
			$verificaCampoBool != "senha"
		) {
			$numColuna++;
			
			// Verificação de titulo da cabeçario
			if ($verificaCampoBool == "bool") {
				$nomeCampo = juntaTodosMenosPrimeiro(explode(" ", $nomeCampo))."?";
				$tabelaViewHeader .= "
			telaCadastro$nomeEntidade += 			\"<td><b>".formatarNomeHeadTable($nomeCampo)."</b></td>\";";
			} 
			else if ($verificaChaveEstrngeira == "id") {
				$tabelaEstrangeira = str_replace("_id", "", $nomeCampoOriginal);
				$tabelaViewHeader .= "
			telaCadastro$nomeEntidade += 			\"<td><b>".formatarNomeHeadTable2($tabelaEstrangeira)."</b></td>\";";
			}
			else {
				$tabelaViewHeader .= "
			telaCadastro$nomeEntidade += 			\"<td><b>".formatarNomeHeadTable($nomeCampo)."</b></td>\";";
			}
			

			// Verificação dos valores listados
			if ($verificaCampoTipo[0] == "date" || $verificaCampoTipo[0] == "datetime") {
				$tabelaViewBody .= "
				tabelaViewBody += 			\"<td>\"+formatarData(".$nomeCampoOriginal.")+\"</td>\";";
			} 
			else if ($verificaCampoBool == "bool") {
				$tabelaViewBody .= "
				simOUnao = $nomeCampoOriginal == 1 ? 'Sim' : 'Não';
				tabelaViewBody += 			\"<td>\"+simOUnao+\"</td>\";";
			} 
			else if ($verificaChaveEstrngeira == "id") {
				$tabelaEstrangeira = str_replace("_id", "", $nomeCampoOriginal);
				$tabelaEstrangeiraPM = formatarNomeHeadTable2($tabelaEstrangeira);
				$nomeCampo = $tabelaEstrangeiraPM;
	// 			$variaveisEstrangeiras .= "
	// var $tabelaEstrangeira = \"\";";
				$configAjax .= "
				acumularFunctionId.push(id_$nomeTable);
				acumularFunctionCampo.push(".$nomeCampoOriginal."+\"+$tabelaEstrangeira\");";
				$tabelaViewBody .= "
				tabelaViewBody += 			\"<td><div id='".$tabelaEstrangeira."_\"+parseInt(id_$nomeTable)+\"'></div></td>\";";
			}
			else if($verificaCampoBool == "imagem"){
				$tabelaViewBody .= "
				tabelaViewBody += 			\"<td align='center'>\";
				tabelaViewBody += 				\"<a href='app/upload/img/\"+".$nomeCampoOriginal."+\"' target='_blank'>\";
				tabelaViewBody += 					\"<img src='app/upload/img/\"+".$nomeCampoOriginal."+\"' style='max-height: 500px; max-width: 15%;'>\";
				tabelaViewBody += 				\"</a>\";
				tabelaViewBody += 			\"</td>\";";
			}
			else if($verificaCampoBool == "text"){
				$tabelaViewBody .= "
				tabelaViewBody += 			\"<td>\";
				tabelaViewBody += 				\"<a href='app/upload/text/\"+".$nomeCampoOriginal."+\"' target='_blank'>\";
				tabelaViewBody += 					\"Arquivo: .\"+ ".$nomeCampoOriginal.".split('.')[".$nomeCampoOriginal.".split('.').length - 1];
				tabelaViewBody += 				\"</a>\";
				tabelaViewBody += 			\"</td>\";";
			}
			else {
				$tabelaViewBody .= "
				tabelaViewBody += 			\"<td>\"+".$nomeCampoOriginal."+\"</td>\";";
			}
			
		}
		

		$indiceGeral++;

		// if ($contColuna == 1) {
		// 	$paramentros = "
		// 		'$nomeCampoOriginal': \$(\"#$nomeCampoOriginal\").val()";
		// } else {
		// 	$paramentros .= ",
		// 		'$nomeCampoOriginal': \$(\"#$nomeCampoOriginal\").val()";
		// }
	// }
}

$tabelaFormGrade = "";
for ($i=0; $i < sizeof($camposGrade); $i++) { 
	$arrayTabelasGrades = explode(",", $camposGrade[$i]);
	if ($arrayTabelasGrades[0] == $nomeTable) {
		$tabelaFormGrade = formatarNomeHeadTable2($arrayTabelasGrades[1]);
		$tabelaViewHeader .= "
			telaCadastro$nomeEntidade += 			\"<td><b>".$tabelaFormGrade."</b></td>\";";
		$tabelaViewBody .= "
				tabelaViewBody += 			\"<td align='center'>\";
				tabelaViewBody += 				\"<a href='principal.php#!grade_".$arrayTabelasGrades[1]."-".$nomeTable."' style='color: green' data-id='\"+id_$nomeTable+\"' onclick=\\\"grade(this , '".$nomeTable."', '".$arrayTabelasGrades[1]."')\\\" title='".$tabelaFormGrade."'>\";
				tabelaViewBody += 					\"<i class=\\\"fa fa-plus\\\" aria-hidden=\\\"true\\\"></i>\";
				tabelaViewBody +=  				\"</a>\";
				tabelaViewBody +=  			\"</td>\";";
	}
}


$tabelaViewHeader .= "
			telaCadastro$nomeEntidade += 		\"</tr>\";
			telaCadastro$nomeEntidade +=		tabelaViewBody;";

$tabelaView .= $tabelaViewHeader;
$tabelaView .= "
			telaCadastro$nomeEntidade += 	\"</table>\";";





$contrudoAjax = "
\$(document).ready(function(){
	buscar_$nomeTable();
});

/*function setarValorEstrangeiroLista(id, tabelaEstrangeira){
	id = parseInt(id);
	tabelaEstrangeira = tabelaEstrangeira.split(\"+\");
	var idTabelaEstrangeira = tabelaEstrangeira[0];
	tabelaEstrangeira = tabelaEstrangeira[1];
	var colunaParam = \"pequisa_\"+tabelaEstrangeira+\"_id\";

	var param = JSON.parse('{ \"'+colunaParam+'\":true, \"id\":'+idTabelaEstrangeira+' }');

	\$.ajax({
		url:'app/controllers/funcoes_'+tabelaEstrangeira+'Controller.php',
		type: 'POST',
		dataType: 'text',
		data: param
	}).done( function(data){
		vetor = data.split(\"{,}\");
		document.getElementById(tabelaEstrangeira+'_'+id).innerHTML = vetor[1];
	});
}*/



function buscar_$nomeTable(){
	$variaveisColunas

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = \"\";
	var icone_ativo = \"\";
	var cor_ativo = \"\";
	var telaCadastro$nomeEntidade = \"\";
	var valorAtivo = 0;
	var tabela_cliente = \"\";
	var tabelaViewBody = \"\";
	var numeroRegAtual = 1;
	var simOUnao = \"\";
	var accesskeyEditar = \" accesskey='w'\";

	var grades = document.getElementsByName(\"grade\");
	var id_tabela_primaria = 0;
	for (var i = grades.length - 1; i >= 0; i--) {
		if (\$(grades[i]).data(\"p\") == \"".$arrayTabelaGrade[0]."\" && \$(grades[i]).data(\"g\") == \"$nomeTable\") {
			id_tabela_primaria = \$(grades[i]).val();
			if (id_tabela_primaria == 0)
				window.location.assign(\"principal.php#!".$arrayTabelaGrade[0]."\");
			else {
				\$.ajax({
					url:'app/controllers/funcoes_".$arrayTabelaGrade[0]."Controller.php',
					type: 'POST',
					dataType: 'text',
					data: {
						'pequisa_".$arrayTabelaGrade[0]."_id': true,
						'id': id_tabela_primaria
					}
				}).done( function(data){
					// console.log(\"funcoes_".$arrayTabelaGrade[0]."Controller: \"+data);
					vetor = data.split(\"{,}\");
					document.getElementById('nome$nomeEntidadePrimaria').innerHTML = vetor[1];
				});
			}
		}
	}


	\$.ajax({
		url:'app/controllers/$nomeFuncoesController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_".$nomeTable."_grade': true,
			'filtro': \$(\"#pesquisa_$nomeTable\").val(),
			'tabela': \"".$arrayTabelaGrade[0]."\",
			'id': id_tabela_primaria
		}
	}).done( function(data){
		// _filtro_grade
		var vetor = data.split(\"[]\");
		var subvetor = vetor[0].split(\"{,}\");
		if (subvetor[1] == undefined) {
			telaCadastro$nomeEntidade += \"<h3>Nenhum registro encontrado!</h3>\";
		} else {
			telaCadastro$nomeEntidade += \"<br>\";

			telaCadastro$nomeEntidade += \"<div class='bloco2'>\";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(\"{,}\");

				$paramatroSubVetor
				$configAjax

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

				tabelaViewBody += 		\"<tr>\";
				tabelaViewBody +=			\"<td align='center'>\";
				tabelaViewBody +=				\"<a href='principal.php#!editar_grade_".$nomeTable."-".$arrayTabelaGrade[0]."' style='color: #f0ad4e;' data-id='\"+".$id_tabela."+\"' onclick='editar(this);' title='Editar'\"+accesskeyEditar+\" \"+desabilitar+\">\";
				tabelaViewBody +=				 	\"<b><i class=\\\"fa fa-pencil\\\" aria-hidden=\\\"true\\\"></i></b>\";
				tabelaViewBody += 				\"</a>\";
				tabelaViewBody +=			\"</td>\";
				tabelaViewBody += 			\"<td align='center'>\";
				tabelaViewBody += 				\"<div  id='ativo_\"+".$id_tabela."+\"'>\";
				tabelaViewBody += 				\"<a href='#!grade_".$nomeTable."-".$arrayTabelaGrade[0]."' style='color: \"+cor_ativo+\"' data-id='\"+".$id_tabela."+\"' onclick=\\\"excluir(this , '$nomeTable', \"+bool_ativo_$nomeTabela+\", 'grade_".$nomeTable."-".$arrayTabelaGrade[0]."')\\\" title='Excluir'>\";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				\"</a>\";
				tabelaViewBody += 				\"</div>\";
				tabelaViewBody +=  			\"</td>\";
				tabelaViewBody +=			\"<td align='center'>\";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			\"</td>\";$tabelaViewBody
				tabelaViewBody += 		\"</tr>\";

				numeroRegAtual++;
				accesskeyEditar = \"\";
			}$tabelaView
		}
		telaCadastro$nomeEntidade += \"</div>\";
		\$(\"#conteudo$nomeEntidade\").html(telaCadastro$nomeEntidade);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i], \"\");
		}
		var botaoBoltarGrade = verificaGrade('".$arrayTabelaGrade[0]."', '$nomeTable', '".formatarNomeHeadTable2($arrayTabelaGrade[0])."');
		$(\"#botaoVoltarGrade\").html(botaoBoltarGrade);
	});
}";

		criarArquivo("../GeradorProjetos/$projetoNome/app/js/ajax/$classeNameAjax.js", $contrudoAjax);
		// criarArquivo("../GeradorProjetos/$projetoNome/app/views/$classeNameView.htm", $contrudoView);
		$nomeArquivos .= $contArq == 1 ? $classeNameAjax : "+".$classeNameAjax;
	}
}
?>