<?php



$nomeArquivos = "";
$contArq = 0;
$arrayTabelaGrade = [];
$nomeTable = $nomeTable;


for ($i=0; $i < sizeof($camposGrade); $i++) { 
	$arrayTabelaGrade = explode(",", $camposGrade[$i]);

	if ( sizeof($arrayTabelaGrade) > 1 && $arrayTabelaGrade[1] == $nomeTable ) {
		$contArq++;



$contElemetTable = explode("_", $nomeTable);
$nomeTableForm = formatarNomeHeadTable2($nomeTable);
$nomeTabela = $nomeTable;

$variaveisColunas = "";
$paramatroSubVetor = "";
$numColuna = 0;

$nomeEntidade = letraMaiuscula(substr($nomeTable, 0, 1)).substr($nomeTable, 1, strlen($nomeTable));

$classeNomeViewAtualiza = "editar_grade_".$nomeTable."-".$arrayTabelaGrade[0];

$campos = "";
$obrigatorio = "";




$colunasBuscasRetroativas = "";
$colunasBuscasPrimarias = "";
$scriptAdicionaisComboGrade = "";
$parametrosDataListComboGrade = "";
$numCampoBoolAtivo = 0;
$numVezParametroDataListComboGrade = 0;
$camposJaIncluidosGradeCombo = array();
$sql = "SELECT * FROM grade_combo WHERE tabela = '$nomeTable' AND projetos_id = ".ID_PROJ;
$verifica = $pdoLocal->query($sql);
foreach ($verifica as $dados) {
	$colunasBuscasRetroativas .= $colunasBuscasRetroativas == "" 
			? $dados['campo_principal'] : "+".$dados['campo_principal'];

	$colunasBuscasPrimarias .= $colunasBuscasPrimarias == "" 
			? $dados['campo_primario'] : "+".$dados['campo_primario'];
}
$colunasBuscasRetroativas = explode("+", $colunasBuscasRetroativas);






$sql = "SHOW COLUMNS FROM $nomeTable";
$verifica = $pdo->query($sql);

$id_tabela = "";
$colunas = "";
$nomeCampo = "";
$nomeCampoOriginal = "";
$tamanhoCampo = "";

$verificaChaveEstrngeira = "";
$verificaCampoBool = "";
$verificaCampoTipo = "";

$tabelaEstrangeira = "";
$tabelaEstrangeiraPM = "";

$inputDefinido = "";
$inputHidden = "";
$scrpitsCombo = "";
$predefinido = "";
$contColuna = 0;

$accesskeyInicial = "accesskey=\"i\"";

foreach ($verifica as $dados) {
	if ($dados[3] == "PRI") {
		$id_tabela = $dados[0];
	} else {
		$nomeCampoOriginal = $dados[0];
		$obrigatorio = $dados[2] == "NO" ? "<span style='color: red'>*</span>" : "";
		$nomeCampo = formatarNomeCampo($nomeCampoOriginal, sizeof($contElemetTable));
		$nomeCampo = formatarNomeHeadTable2($nomeCampo);

		$verificaChaveEstrngeira = retornaUltimaPosicao(explode("_", $nomeCampoOriginal));
		$verificaCampoBool = explode("_", $nomeCampoOriginal);
		$verificaCampoBool = $verificaCampoBool[0];
		$verificaCampoTipo = explode("(", $dados[1]);
		$predefinido = $dados[4];
		$tamanhoCampo = "";
		
		if (sizeof($verificaCampoTipo) > 1) {
			$tamanhoCampo = str_replace(")", "", $verificaCampoTipo[1]);
		}


		$funcaoCampos = "";
		$funcaoPronta = "";
		$sql = "SELECT campos_logica_negocio, campos_data_logica_negocio, campo_resultado_logica_negocio, tipo_reultado_logica_negocio, formula_id
				FROM logica_negocio 
				WHERE tabela_logica_negocio = '$nomeTabela' AND projetos_id = ".ID_PROJ;
		$verifica = $pdoLocal->query($sql);
		foreach ($verifica as $dados) {
			$campos_logica_negocio = $dados['campos_logica_negocio']."+".$dados['campos_data_logica_negocio'];
			$campos_data_logica_negocio = $dados['campos_data_logica_negocio'];
			$campo_resultado_logica_negocio = $dados['campo_resultado_logica_negocio'];
			$tipo_reultado_logica_negocio = $dados['tipo_reultado_logica_negocio'];
			$formula_id = $dados['formula_id'];


			$funcaoPronta = "calculador($formula_id, '$campos_logica_negocio', 'campos_data_logica_negocio', '$campo_resultado_logica_negocio', '$nomeCampoOriginal', '$tipo_reultado_logica_negocio');";
			$campos_logica_negocio = explode("+", $campos_logica_negocio);
			for ($i=0; $i < sizeof($campos_logica_negocio); $i++) { 
				if ($nomeCampoOriginal == $campos_logica_negocio[$i]) {
					$funcaoCampos .= $funcaoPronta." ";
				}
			}
		}
		if (in_array($nomeCampoOriginal, $resultadosLogicaN)) {
			$funcaoCampos = " onclick=\"$funcaoCampos\"";
		}
		else {
			$funcaoCampos = " onkeyup=\"limitarValorNum('$nomeCampoOriginal', $tamanhoCampo);".$funcaoCampos."\"";
		}



		$disabilitar = "";
		if (in_array($nomeCampoOriginal, $resultadosLogicaN)) {
			$disabilitar = " disabled";
		}



		if ($nomeCampoOriginal == TAB_LOGIN."_id") {
			$inputHidden .= "
			<input type=\"hidden\" id=\"$nomeCampoOriginal\"$disabilitar>
			<script>\$(\"#$nomeCampoOriginal\").val(\$(\"#usuario\").val())</script>
			";
		}

		else if ($predefinido == "CURRENT_TIMESTAMP" || $predefinido == "CURRENT_TIMESTAMP(1)") {
			$inputHidden .= "
			<input type=\"hidden\" id=\"$nomeCampoOriginal\"$disabilitar>
			<script>\$(\"#$nomeCampoOriginal\").val(\"1\")</script>
			";
		}

		else if ($arrayTabelaGrade[0]."_id" == $nomeCampoOriginal) {
			$tabelaEstrangeira = str_replace("_id", "", $nomeCampoOriginal);
			$tabelaEstrangeiraPM = formatarNomeHeadTable2($tabelaEstrangeira);
			$nomeCampo = $tabelaEstrangeiraPM;
			$inputHidden .= "
			<input type=\"hidden\" id=\"$nomeCampoOriginal\"$disabilitar>
			<script>\$(\"#$nomeCampoOriginal\").val(retornaValorIdTabelaPrimaria('".$arrayTabelaGrade[0]."', '".$nomeTable."'))</script>
			";
		}

		else if ($verificaChaveEstrngeira == "id") {
			$tabelaEstrangeira = str_replace("_id", "", $nomeCampoOriginal);
			$tabelaEstrangeiraPM = formatarNomeHeadTable2($tabelaEstrangeira);
			$nomeCampo = $tabelaEstrangeiraPM;
			$inputDefinido = "<div id=\"".$tabelaEstrangeira."Div\"></div>";
			$scrpitsCombo .= "
<script type=\"text/javascript\" src=\"app/js/combo/".$tabelaEstrangeira."ComboPre.js\"></script>
<script type=\"text/javascript\" src=\"app/js/combo/".$tabelaEstrangeira."ComboGrade.js\"></script>";
		} 

		else if ($verificaCampoBool == "bool") {
			$nomeCampo = juntaTodosMenosPrimeiro(explode(" ", $nomeCampo))."?";
			$inputDefinido = "<select class=\"form-control\" id=\"$nomeCampoOriginal\" $accesskeyInicial>
		<option value=\"1\" selected>Sim</option>
		<option value=\"0\">Não</option>
	</select>";
		}
		else if ($verificaCampoBool == "imagem") {
			$inputDefinido = "<button onclick=\"chamarModalImagem('$nomeCampoOriginal', '$classeNomeViewAtualiza', 'img')\" class=\"btn\" $accesskeyInicial>
		Selecionar Imagem
	</button>
	<input type=\"text\" class=\"form-control\" id=\"$nomeCampoOriginal\" disabled>";
		}
		else if ($verificaCampoBool == "video") {
			$inputDefinido = "<button onclick=\"chamarModalImagem('$nomeCampoOriginal', '$classeNomeViewAtualiza', 'video')\" class=\"btn\" $accesskeyInicial>
		Selecionar Vídeo
	</button>
	<input type=\"text\" class=\"form-control\" id=\"$nomeCampoOriginal\" disabled>";
		}

		else if ($verificaCampoBool == "audio") {
			$inputDefinido = "<button onclick=\"chamarModalImagem('$nomeCampoOriginal', '$classeNomeViewAtualiza', 'audio')\" class=\"btn\" $accesskeyInicial>
		Selecionar Áudio
	</button>
	<input type=\"text\" class=\"form-control\" id=\"$nomeCampoOriginal\" disabled>";
		}

		else if ($verificaCampoBool == "text") {
			$inputDefinido = "<button onclick=\"chamarModalImagem('$nomeCampoOriginal', '$classeNomeViewAtualiza', 'text')\" class=\"btn\" $accesskeyInicial>
		Selecionar Arquivo de Texto
	</button>
	<input type=\"text\" class=\"form-control\" id=\"$nomeCampoOriginal\" disabled>";
		}

		else if (
			$verificaCampoTipo[0] == "date" ||
			$verificaCampoTipo[0] == "datetime" 
		) {
			$inputDefinido = "<input type=\"date\" class=\"form-control\" id=\"$nomeCampoOriginal\"$$funcaoCampos $disabilitar $accesskeyInicial>";
		}

		else if (
			$verificaCampoTipo[0] == "int"   	||
			$verificaCampoTipo[0] == "float" 	||
			$verificaCampoTipo[0] == "tinyint" 	||
			$verificaCampoTipo[0] == "smallint" ||
			$verificaCampoTipo[0] == "bigint"  	||
			$verificaCampoTipo[0] == "decimal" 	||
			$verificaCampoTipo[0] == "double"  	||
			$verificaCampoTipo[0] == "real"    	||
			$verificaCampoTipo[0] == "bit"     	||
			$verificaCampoTipo[0] == "boolean" 	||
			$verificaCampoTipo[0] == "serial"
		) {
			if ($funcaoCampos == '') {
				$inputDefinido = "<input type=\"number\" class=\"form-control\" id=\"$nomeCampoOriginal\" onkeyup='limitarValorNum(\"$nomeCampoOriginal\", $tamanhoCampo)' $disabilitar $accesskeyInicial>";
			}
			else {
				$inputDefinido = "<input type=\"number\" class=\"form-control\" id=\"$nomeCampoOriginal\"$funcaoCampos $disabilitar $accesskeyInicial>";
			}
		}

		else if (
			$verificaCampoTipo[0] == "varchar" ||
			$verificaCampoTipo[0] == "char"
		) {
			$inputDefinido = "<input type=\"text\" maxlength=\"$tamanhoCampo\" class=\"form-control\"$disabilitar id=\"$nomeCampoOriginal\" $accesskeyInicial>";
		}

		else if (
			$verificaCampoTipo[0] == "text"
		) {
			$inputDefinido = "<textarea class=\"form-control\" style=\"resize: vertical\" id=\"$nomeCampoOriginal\"$disabilitar $accesskeyInicial></textarea>";
		}

		// verifica se é um select kkk
		else if (
			$verificaCampoTipo[0] == "enum"
		) {
			$tiposEnum = explode(",", str_replace("'", "", $tamanhoCampo));
			$inputDefinido = "<select class=\"form-control\" id=\"$nomeCampoOriginal\"$disabilitar $accesskeyInicial>";
			for ($i=0; $i < sizeof($tiposEnum); $i++) { 
				$inputDefinido .= "<option value='".$tiposEnum[$i]."'>".$tiposEnum[$i]."</option>";
			}
			$inputDefinido .= "</select>";
		}
		$accesskeyInicial = "";
















	/*******************************************************************************************************/
	/* Incio config Buspa por busca da grade combo
	/*******************************************************************************************************/
		$camposDePesquisaRetroativa = "";
		$tabelaEstrnageira = "";
		if (in_array($nomeCampoOriginal, $colunasBuscasRetroativas) && $arrayTabelaGrade[0]."_id" != $nomeCampoOriginal) {
			$tabelaEstrnageira = substr($nomeCampoOriginal, 0, strlen($nomeCampoOriginal) - 3);

			$sql = "
				SELECT * FROM grade_combo 
				WHERE tabela = '$nomeTable'
				AND campo_principal = '$nomeCampoOriginal'
				AND projetos_id = ".ID_PROJ."
				ORDER BY sequencia";
			$verifica = $pdoLocal->query($sql);
			foreach ($verifica as $dados) {
				if (!in_array($dados['campo_primario'], $camposJaIncluidosGradeCombo)) {

					$camposDePesquisaRetroativa .= "
<div class=\"col-md-4\">
	<br>".formatarNomeHeadTable2($dados['campo_primario'])." &nbsp;&nbsp;$obrigatorio
	<div id=\"".$dados['campo_primario']."Div\">
		<input type=\"text\" value=\"Aguardando seleção...\" class=\"form-control\" disabled>
	</div>
</div>";
				}

				if (!in_array($dados['campo_grade'], $camposJaIncluidosGradeCombo)) {
					array_push($camposJaIncluidosGradeCombo, $dados['campo_grade']);

					$camposDePesquisaRetroativa .= "
<div class=\"col-md-4\">
	<br>".formatarNomeHeadTable2($dados['campo_grade'])." &nbsp;&nbsp;$obrigatorio
	<div id=\"".$dados['campo_grade']."Div\">
		<input type=\"text\" value=\"Aguardando seleção...\" class=\"form-control\" disabled>
	</div>
</div>";
				}

				$parametrosDataListComboGrade = "";
				$numCampoBoolAtivo = -1;
				$numVezParametroDataListComboGrade = 0;
				if (!in_array($dados['campo_primario'], $camposJaIncluidosGradeCombo)) {
					array_push($camposJaIncluidosGradeCombo, $dados['campo_primario']);

					$sql = "SHOW COLUMNS FROM ".$dados['campo_primario'];
					$verifica = $pdo->query($sql);
					foreach ($verifica as $dados2) {
						$numVezParametroDataListComboGrade++;
						$parametrosDataListComboGrade .= $numVezParametroDataListComboGrade == 1 ? "\"".$numVezParametroDataListComboGrade."\"" : ",\"".$numVezParametroDataListComboGrade."\"";
						$numCampoBoolAtivo++;
					}

					$validarPergunta = false;
					if (sizeof($colunasBuscasPrimarias) == 1) {
						if ($dados['campo_grade'] == $colunasBuscasPrimarias[0]) {
							$validarPergunta = true;
						}
					} else {
						if (!in_array($dados['campo_grade'], $colunasBuscasPrimarias)) {
							$validarPergunta = true;
						}	
					}
					if($validarPergunta) {
						$scriptAdicionaisComboGrade .= "
	jk_comboDataList(
		\"".$dados['campo_primario']."\", \"funcoes_".$dados['campo_primario']."Controller\", 
		{
			'pequisa_".$dados['campo_primario']."': true
		}, \"".$dados['campo_primario']."_id\", 
		[ $parametrosDataListComboGrade ], 
		0, [1], \"\", \"".$dados['campo_primario']."Div\", \"jk_".$dados['campo_grade']."DataListGradePer(\\\"".$dados['campo_primario']."\\\", this.value);\", $numCampoBoolAtivo
	);";						
					}
					else {
						$scriptAdicionaisComboGrade .= "
	jk_comboDataList(
		\"".$dados['campo_primario']."\", \"funcoes_".$dados['campo_primario']."Controller\", 
		{
			'pequisa_".$dados['campo_primario']."': true
		}, \"".$dados['campo_primario']."_id\", 
		[ $parametrosDataListComboGrade ], 
		0, [1], \"\", \"".$dados['campo_primario']."Div\", \"jk_".$dados['campo_grade']."DataListGrade(\\\"".$dados['campo_primario']."\\\", this.value);\", $numCampoBoolAtivo
	);";
					}
					
				}



				$parametrosDataListComboGrade = "";
				$numCampoBoolAtivo = -1;
				$numVezParametroDataListComboGrade = 0;
				if ($tabelaEstrnageira != $dados['campo_grade']) {

					$sql = "SHOW COLUMNS FROM ".$dados['campo_grade'];
					$verifica = $pdo->query($sql);
					foreach ($verifica as $dados2) {
						$numVezParametroDataListComboGrade++;
						$parametrosDataListComboGrade .= $numVezParametroDataListComboGrade == 1 ? "\"".$numVezParametroDataListComboGrade."\"" : ",\"".$numVezParametroDataListComboGrade."\"";
						$numCampoBoolAtivo++;
					}

					$scriptAdicionaisComboGrade .= "
	function jk_".$dados['campo_grade']."DataListGradePer(tabela, id_grade) {
		if (id_grade != \"\" && id_grade != 0) {


			jk_comboDataList(
				\"".$dados['campo_grade']."\", \"funcoes_".$dados['campo_grade']."Controller\", 
				{
					'pequisa_".$dados['campo_grade']."': true
				}, \"".$dados['campo_grade']."_id\", 
				[ $parametrosDataListComboGrade ], 
				0, [1], \"\", \"".$dados['campo_grade']."Div\", \"jk_".$dados['campo_grade_primario']."DataListGradePer(\\\"".$dados['campo_grade']."\\\", this.value);\", $numCampoBoolAtivo
			);
		}
		else {
			var campo = \"<input type='text' value='Aguardando seleção...' class='form-control' id='".$dados['campo_grade']."_id' disabled>\";
			\$(\"#".$dados['campo_grade']."Div\").html(campo);
		}
	}";

				}

			}
		} 
	/*******************************************************************************************************/
	/* Final config Buspa por busca da grade combo
	/*******************************************************************************************************/




















if (
	$nomeCampoOriginal != TAB_LOGIN."_id" && 
	$predefinido != "CURRENT_TIMESTAMP" && 
	$predefinido != "CURRENT_TIMESTAMP(1)" && 
	$arrayTabelaGrade[0]."_id" != $nomeCampoOriginal && 
	$verificaCampoBool != "senha" &&
	$verificaCampoBool != "status" &&
	!in_array($nomeCampoOriginal, $colunasBuscasRetroativas)
) {
		$campos .="
<div class=\"col-md-4\">
	<br>$nomeCampo &nbsp;&nbsp;$obrigatorio
	$inputDefinido
</div>";
}
else if(in_array($nomeCampoOriginal, $colunasBuscasRetroativas)) {
		$campos .= $camposDePesquisaRetroativa;
}

	}
}




$contrudoViewAtualiza = "

<h1>Editar: $nomeTableForm</h1>

<div class=\"text-right\">
	<a href=\"principal.php#!grade_$nomeTable-".$arrayTabelaGrade[0]."\" class=\"btn btn-primary\" accesskey=\"v\">
		<i class=\"fa fa-arrow-left\" aria-hidden=\"true\"></i>&nbsp;&nbsp;Voltar
	</a>
</div>
<br>
<div class=\"row\">$campos
	<div class=\"col-md-12 text-center\">
		<br>
		$inputHidden
		<button class=\"btn btn-success\" onclick='atualizarrRegistro()' accesskey=\"s\">
			<i class=\"fa fa-floppy-o\" aria-hidden=\"true\"></i>&nbsp;&nbsp;&nbsp;Atualizar
		</button>
	</div>
</div>

<script type=\"text/javascript\">
	verificaAcess('".$nomeTable."-".$arrayTabelaGrade[0]."', 'A');
</script>

<script type=\"text/javascript\" src=\"app/js/ajax/ajax_editar_$nomeTable.js\"></script>
$scrpitsCombo
";

		criarArquivo("../GeradorProjetos/$projetoNome/app/views/$classeNomeViewAtualiza.htm", $contrudoViewAtualiza);
		// criarArquivo("../GeradorProjetos/$projetoNome/app/views/$classeNameView.htm", $contrudoView);
		$nomeArquivos .= $contArq == 1 ? $classeNomeViewAtualiza : "+".$classeNomeViewAtualiza;
	}
}

?>
