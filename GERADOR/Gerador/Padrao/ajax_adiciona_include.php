<?php

// include "Classe/conexaoLocal.php";

// $conn = new ConexaoLocal();
// $conn->conectar();
// $pdo = $conn->Connect();

$nomeTable = $nomeTabela;

$contElemetTable = explode("_", $nomeTable);
$nomeTableForm = formatarNomeHeadTable2($nomeTable);


$variaveisColunas = "";
$paramatroSubVetor = "";
$numColuna = 0;

$nomeEntidade = letraMaiuscula(substr($nomeTabela, 0, 1)).substr($nomeTabela, 1, strlen($nomeTabela));

$classeNomeAjaxCadastro = "ajax_adicionar_".$nomeTabela;

$campos = "";
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
		$predefinido = $dados[4];
		if (sizeof($verificaCampoTipo) > 1) {
			$tamanhoCampo = str_replace(")", "", $verificaCampoTipo[1]);
		}

		if ($contColuna == 1) {
			$paramentros = "
				'$nomeCampoOriginal': \$(\"#$nomeCampoOriginal\").val()";
		} else {
			$paramentros .= ",
				'$nomeCampoOriginal': \$(\"#$nomeCampoOriginal\").val()";
		}

		/*
		if ($contColuna == 1) {
			if ($verificaCampoTipo[0] == "text") {
				$paramentros = "
				'$nomeCampoOriginal': \$(\"#$nomeCampoOriginal\").html()";
			} else {
				$paramentros = "
				'$nomeCampoOriginal': \$(\"#$nomeCampoOriginal\").val()";
			}
		} else {
			if ($verificaCampoTipo[0] == "text") {
				$paramentros .= ",
				'$nomeCampoOriginal': \$(\"#$nomeCampoOriginal\").html()";
			} else {
				$paramentros .= ",
				'$nomeCampoOriginal': \$(\"#$nomeCampoOriginal\").val()";
			}
		}
		*/
		

		if (
			$verificaChaveEstrngeira != "id" 		&& 
			$verificaCampoBool != "bool" 			&& 
			$predefinido != "CURRENT_TIMESTAMP" 	&& 
			$predefinido != "CURRENT_TIMESTAMP(1)"
		) {
			$campos .= "
				\$(\"#$nomeCampoOriginal\").val(\"\");";
		} 
	}
}

$configAjax = $contObrigatorio == 0 ? "if(true) {" : "else {";



$contrudoAjaxCadastro = "
function gravarRegistro(){
	var campoFocus = \"\";$obrigatorio


	$configAjax
		\$.ajax({
			url:'app/controllers/cadastro_".$nomeTable."Controller.php',
			type: 'POST',
			dataType: 'text',
			data: {".$paramentros.",
				'areaDeAtuacao': $(\"#areaDeAtuacao\").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != \"1\") 	toast.danger(\"Falha: \"+data);
			else {
				toast.success(\"Cadastrado com sucesso!\");$campos
			}
		});
	} 

	if (campoFocus != \"\") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}";



?>

<!-- 

Parametros Ajax

'descricao_cursos': \$(\"#descricao_cursos\").val(),
'nome_professor_cursos': \$(\"#nome_professor_cursos\").val(),
'pre_requisitos_cursos': \$(\"#pre_requisitos_cursos\").val(),
'numero_de_aluno_cursos': \$(\"#numero_de_aluno_cursos\").val(),
'bool_ativo_cursos': \$(\"#bool_ativo_cursos\").val()


Limpar Valores

\$(\"#descricao_cursos\").val(\"\");
\$(\"#nome_professor_cursos\").val(\"\");
\$(\"#pre_requisitos_cursos\").val(\"\");
\$(\"#numero_de_aluno_cursos\").val(\"\");



function validation(valor){
	if (valor == \"\") 	return false;
	else 				return true;
}

-->