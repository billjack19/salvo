<?php

ini_set('max_execution_time', 300);

$sql = "SHOW TABLES";
$verifica = $pdo->query($sql);
$entidadeGerada = "";
foreach ($verifica as $dados) {
	$nomeTable = $dados[0];

	if (!in_array($nomeTable, $tabelasPadrao)){
		gerarEntidade($dados[0], $pdo, $projetoNome);
		$entidadeGerada .= "<li>".$dados[0]."</li>";
	}
}


function gerarEntidade($nomeTable, $pdo, $projetoNome){
	$nomeTableMaiusculo = letraMaiuscula(substr($nomeTable, 0, 1)).substr($nomeTable, 1, strlen($nomeTable));
	$entidadeName = $nomeTableMaiusculo;
	$variaveisEntidade = "";

	$sql = "SHOW COLUMNS FROM $nomeTable";
	$verifica = $pdo->query($sql);
	$complemantoTabela = "";

	foreach ($verifica as $dados) {
		// $variaveisEntidade .= "
	// private \$".$dados[0].";"; 		// variaveis da entidade tipo private(privado) encapsula a classe prendendo a variavel somente ao objeto
		$variaveisEntidade .= "
	var \$".$dados[0].";"; 			// variaveis da entidade tipo var para sereme lidas na conversão de objeto
	}

	$classEntidade = gerarEntidadeModel($entidadeName, $variaveisEntidade);
	criarArquivo("../GeradorProjetos/$projetoNome/app/classe/entidade/$entidadeName.php", $classEntidade);
}


function gerarEntidadeModel($entidadeName, $variaveisEntidade){
$classEntidade = "<?php

class $entidadeName{$variaveisEntidade

	public function get(\$nome_campo){
		return \$this->\$nome_campo;
	}

	public function set(\$valor , \$nome_campo){
		\$this->\$nome_campo = \$valor;
	}
}

?>";
return $classEntidade;
}
?>
