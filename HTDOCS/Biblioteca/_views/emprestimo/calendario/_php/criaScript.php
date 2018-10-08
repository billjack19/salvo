<?php
require "../../_class/dao/emprestimo_kitDAO2.php";
$emprestimo_kit2DAO = new emprestimo_kit2DAO();
$data = '';
if ($_GET['data'] == '') {
	$data = date('Y-m-d');
}
else $data = $_GET['data'];

$retorno = $emprestimo_kit2DAO->pegaEmprestimoKit($_SESSION['idKit'] , $data);

foreach ($retorno as $dados) {
		for ($i=1; $i < 6; $i++) { 
			for ($j=0; $j < 3; $j++) { 
				if ($j == 0) $cond = 'm';
		else 	if ($j == 1) $cond = 't';
		else 	if ($j == 2) $cond = 'n';

				if ($dados[4]==$cond."h".$i) {

				// include "../../_request/processaPesquisaProfessor3Modal.php";
				echo "
				<script>

	document.getElementById('".$cond."h".$i."').className = 'botao btn btn-xs btn-danger';
	var equipamentoSelect = document.getElementById('equipamentoSelect').innerHTML;
	var corpoModal = document.getElementById('corpoModal_".$cond."h".$i."').innerHTML;
	var rodapeModal = document.getElementById('rodapeModal_".$cond."h".$i."').innerHTML;

					corpoModal  = 	'O equipamento: ';
					corpoModal += 	'<b>';
					corpoModal += 		equipamentoSelect;
					corpoModal += 	'</b>';
					corpoModal += 	'<br>';
					corpoModal += 	'ja esta agendado para: ';
					corpoModal += 	'<b>';
					corpoModal += 		'".$dados[2]."';
					corpoModal += 	'</b>';

					rodapeModal  =  '<button ';
					rodapeModal += 		'type=';
					rodapeModal += 			'button ';
					rodapeModal += 		'class=';
					rodapeModal += 			'\'btn btn-danger\' ';
					rodapeModal += 		'data-dismiss=';
					rodapeModal += 			'modal';
					rodapeModal += 	'>';
					rodapeModal += 		'Fechar';
					rodapeModal += '</button>';

	document.getElementById('corpoModal_".$cond."h".$i."').innerHTML = corpoModal;
	document.getElementById('rodapeModal_".$cond."h".$i."').innerHTML = rodapeModal;

				</script>
				";
				}
			}
		}
}
//  type=\'button\' class=\'btn btn-danger\' data-dismiss=\'modal\'
// rodapeModal_".$cond."h".$i."
//document.getElementById('".$cond."h".$i."').disabled = true;
?>