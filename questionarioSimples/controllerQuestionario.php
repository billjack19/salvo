<?php

include 'class/conexao.php';

$conn = new Conexao();
$pdo = $conn->Connect(); 

include 'class/entidade/PadraoObjeto.php';
include 'class/entidade/Questionario.php';

include 'funcoes.php';

if (!empty($_POST['listar'])) {
	$arrayQuestionario = array();
	$questionario = new questionario();
	$cont = 0; $oldDesc = ""; $indiceArray = -1;

	$sql = "SELECT 
				alternativas.id_alternativas,
				alternativas.pergunta_id,
				alternativas.descricao,
				alternativas.ck_correto,
				pergunta.descricao as descricaoPer
			FROM alternativas
			INNER JOIN pergunta 
				ON alternativas.pergunta_id = pergunta.id_pergunta";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if($dados['pergunta_id'] != $oldDesc){
			$questionario = new questionario();
			$questionario->set($dados['pergunta_id'], 	'id'				);
			$questionario->set($dados['descricaoPer'], 	'pergunta'			);
			$questionario->set(array(), 				'alternativas'		);
			array_push($arrayQuestionario, $questionario);
			$indiceArray++;
		}
		$alternativa = new alternativa();
		$alternativa->set($dados['id_alternativas'], 	'id_alternativas'	);
		$alternativa->set($dados['descricao'], 			'descricao'			);
		$alternativa->set($dados['ck_correto'], 		'ck_correto'		);

		$arrayQuestionario[$indiceArray]->push($alternativa, 'alternativas');

		$oldDesc = $dados['pergunta_id'];
		$cont++;
	}
	echo toJson($arrayQuestionario);
}

?>