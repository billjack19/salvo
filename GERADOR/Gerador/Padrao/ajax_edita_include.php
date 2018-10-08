<?php


$nomeTable = $nomeTabela;

$contElemetTable = explode("_", $nomeTable);
$nomeTableForm = formatarNomeHeadTable2($nomeTable);


$variaveisColunas = "";
$paramatroSubVetor = "";
$numColuna = 0;

$nomeEntidade = letraMaiuscula(substr($nomeTabela, 0, 1)).substr($nomeTabela, 1, strlen($nomeTabela));

$classeNomeAjaxAtualiza = "ajax_editar_".$nomeTabela;

$campos = "";
$campos2 = "";
$campos3 = "";
$obrigatorio = "";


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

foreach ($verifica as $dados) {
	if ($dados[3] == "PRI") {
		$id_tabela = $dados[0];
	} else {
		$contColuna++;

		$nomeCampoOriginal = $dados[0];
		if ($dados[2] == "NO") {
			$contObrigatorio++;
			if ($contObrigatorio == 1) {
				$obrigatorio = "
		 if(\$(\"#$nomeCampoOriginal\").val() == \"\") campoFocus = \"$nomeCampoOriginal\";";
			} else {
				$obrigatorio .= "
	else if(\$(\"#$nomeCampoOriginal\").val() == \"\") campoFocus = \"$nomeCampoOriginal\";";
			}
		}
		
		$nomeCampo = formatarNomeCampo($nomeCampoOriginal, sizeof($contElemetTable));
		$nomeCampo = formatarNomeHeadTable2($nomeCampo);

		$verificaChaveEstrngeira = retornaUltimaPosicao(explode("_", $nomeCampoOriginal));
		$verificaCampoBool = explode("_", $nomeCampoOriginal);
		$verificaCampoBool = $verificaCampoBool[0];
		$verificaCampoTipo = explode("(", $dados[1]);
		$tamanhoCampo = "";

		if ($verificaCampoBool != "senha") {
			if (sizeof($verificaCampoTipo) > 1) {
				$tamanhoCampo = str_replace(")", "", $verificaCampoTipo[1]);
			}


			if ($verificaChaveEstrngeira == "id") {
				$tabelaEstrangeira = str_replace("_id", "", $nomeCampoOriginal);
				$tabelaEstrangeiraPM = formatarNomeHeadTable2($tabelaEstrangeira);
				$nomeCampo = $tabelaEstrangeiraPM;
				$inputDefinido = "<div id=\"".$tabelaEstrangeira."Div\"></div>";
				$scrpitsCombo .= "
		if($nomeCampoOriginal != 0){
			\$.ajax({
				url:'app/controllers/funcoes_".$tabelaEstrangeira."Controller.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'pequisa_$nomeCampoOriginal': true,
					'id': $nomeCampoOriginal
				}
			}).done( function(data){
				vetor = data.split(\"{,}\");
				combo_".$tabelaEstrangeira."($nomeCampoOriginal, vetor[1]);
				// \$(\"#$nomeCampoOriginal-flexdatalist\").val(vetor[1]);
				// \$(\"#$nomeCampoOriginal\").val(parseInt(vetor[0]));
			});
			\$(\"#$nomeCampoOriginal\").val($nomeCampoOriginal);
		}

		else combo_".$tabelaEstrangeira."_NV();";

			}

			if ($contColuna == 1) {
				$paramentros = "
				'$nomeCampoOriginal': \$(\"#$nomeCampoOriginal\").val()";
			} else {
				$paramentros .= ",
				'$nomeCampoOriginal': \$(\"#$nomeCampoOriginal\").val()";
			}

			$campos .= "
	var $nomeCampoOriginal = \"\";";

			$campos2 .= "
		\$(\"#$nomeCampoOriginal\").val($nomeCampoOriginal);";

			$campos3 .= "
		$nomeCampoOriginal = vetor[$contColuna];";
		}
	}
}

$configAjax = $contObrigatorio == 0 ? "if(true) {" : "else {";


$contrudoAjaxAtualiza = "
\$(document).ready(function(){
	var id_$nomeTable = \"\";$campos

	var vetor = [];
	\$.ajax({
		url:'app/controllers/funcoesController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'editar': true,
			'id': \$(\"#editar\").val()
		}
	}).done( function(data){});

	\$.ajax({
		url:'app/controllers/funcoes_".$nomeTable."Controller.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_".$nomeTable."_id': true,
			'id': \$(\"#editar\").val()
		}
	}).done( function(data){
		vetor = data.split(\"{,}\");

		id_$nomeTable = vetor[0];
		$campos3
		$campos2
		$scrpitsCombo
	});
});


function atualizarrRegistro(){
	var campoFocus = \"\";$obrigatorio


	$configAjax
		\$.ajax({
			url:'app/controllers/atualiza_".$nomeTable."Controller.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_$nomeTable': $(\"#editar\").val(),".$paramentros.",
				'areaDeAtuacao': $(\"#areaDeAtuacao\").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != \"1\") 	toast.danger(\"Falha: \"+data);
			else 								toast.success(\"Atualizado com sucesso!\");
		});
	} 

	if (campoFocus != \"\") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}";
?>

<!-- 
function validation(valor){
	if (valor == \"\") 	return false;
	else 				return true;
} -->