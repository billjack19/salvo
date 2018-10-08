
<?php
/*************************************************************************************************************/
/* Configuração de Grade */
/*************************************************************************************************************/
$inputsGrade = "";
$inputGradeAcesso = "";
$session_grades = "

/*************************************************************************************
/** SESSÃO GRADES *
/************************************************************************************/
";
$camposGrade = "";
$arrayCamposGrade = [];
$complementoAppJs = "";
$mapa_grade = "";
$mapa_grade_zerada = "";
$contColunaGrade = 0;

$sql = "SELECT * FROM grade WHERE projetos_id = $id_projeto;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$inputsGrade .= "
														<input type=\"hidden\" name=\"grade\" id=\"el_".$dados['tabela_primaria']."-".$dados['tabela_grade']."\" data-p=\"".$dados['tabela_primaria']."\" data-g=\"".$dados['tabela_grade']."\" value=\"<?php echo \$".$dados['tabela_grade']."_".$dados['tabela_primaria']."; ?>\">
														<input type=\"hidden\" id='n_acs_".$dados['tabela_grade']."_".$dados['tabela_primaria']."' value='<?php echo \$acess_".$dados['tabela_grade']."_".$dados['tabela_primaria']."; ?>'>";

	$session_grades .= "
\$".$dados['tabela_grade']."_".$dados['tabela_primaria']." = \"0\";
if(!empty(\$_SESSION['".$dados['tabela_grade']."-".$dados['tabela_primaria']."'])) {
	\$".$dados['tabela_grade']."_".$dados['tabela_primaria']." = \$_SESSION['".$dados['tabela_grade']."-".$dados['tabela_primaria']."'];
}
	";

	$complementoAppJs .= "


	// Grades: ".$dados['tabela_grade']."-".$dados['tabela_primaria']."
	.when('/grade_".$dados['tabela_grade']."-".$dados['tabela_primaria']."', {
		templateUrl : 'app/views/grade_".$dados['tabela_grade']."-".$dados['tabela_primaria'].".htm',
	})
	.when('/adicionar_grade_".$dados['tabela_grade']."-".$dados['tabela_primaria']."', {
		templateUrl : 'app/views/adicionar_grade_".$dados['tabela_grade']."-".$dados['tabela_primaria'].".htm',
	})
	.when('/editar_grade_".$dados['tabela_grade']."-".$dados['tabela_primaria']."', {
		templateUrl : 'app/views/editar_grade_".$dados['tabela_grade']."-".$dados['tabela_primaria'].".htm',
	})";

	if ($contColunaGrade == 0)


/* ------------------------------------------------------------------------------------------------------------------------------- */
/* ------------------------------------------------------------------------------------------------------------------------------- */
		// Mapa de Grade
		$mapa_grade .= "
if(\$_POST['grade'] == '".$dados['tabela_grade']."-".$dados['tabela_primaria']."'){
	\$_SESSION['".$dados['tabela_grade']."-".$dados['tabela_primaria']."'] = \$_POST['id'];
}
";
	else 
		$mapa_grade .= "
else if(\$_POST['grade'] == '".$dados['tabela_grade']."-".$dados['tabela_primaria']."'){
	\$_SESSION['".$dados['tabela_grade']."-".$dados['tabela_primaria']."'] = \$_POST['id'];
}
";
	$mapa_grade_zerada .= "
	\$_SESSION['".$dados['tabela_grade']."-".$dados['tabela_primaria']."'] = 0;";
/* ------------------------------------------------------------------------------------------------------------------------------- */



/* ------------------------------------------------------------------------------------------------------------------------------- */
/* ------------------------------------------------------------------------------------------------------------------------------- */
	// Variaveis de Acesso
	$variaveisAcesso .= "
\$acess_".$dados['tabela_grade']."_".$dados['tabela_primaria']." = \"0\";
if(in_array('".$dados['tabela_grade']."-".$dados['tabela_primaria']."', \$minha_area_nivel_acesso)) \$acess_".$dados['tabela_grade']."_".$dados['tabela_primaria']." = \"1\";
";


	$areasAcesso .= "+".$dados['tabela_grade']."-".$dados['tabela_primaria'];
/* ------------------------------------------------------------------------------------------------------------------------------- */



	$contColunaGrade++;
}
?>