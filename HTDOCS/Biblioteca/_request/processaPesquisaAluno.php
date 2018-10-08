<?php 

require "../../_class/dao/alunoDAO2.php";

$alunoDAO = new alunoDAO();

if ($_GET['aluno'] != '' ) {
	$retorno = $alunoDAO->pegaAluno($_GET['aluno']);

	foreach ($retorno as $dados) {
		echo "
			<tr>
				<td>
					<button id='idAluno".$dados[0]."' class=' btn btn-xs btn-warning'  style='width: 100px;' value='".$dados[0]."'>
						<span style='font-size:25px' class='glyphicon glyphicon-hand-right' aria-hidden='true'>
						</span>
					</button>
				</td>
		 		<td style='width:300px'><center>".$dados[2]."</center></td>
		 		<td style='width:200px'><center>".$dados[1]."</center></td>
			</tr>
			<tr>
	 			<td></br></td>
	 		</tr>";

	}
}

else {
	$retorno = $alunoDAO->pegaAluno('');

	foreach ($retorno as $dados) {
		echo "
			<tr>
				<td>
					<button id='idAluno".$dados[0]."' class=' btn btn-xs btn-warning'  style='width: 100px;' value='".$dados[0]."'>
						<span style='font-size:25px' class='glyphicon glyphicon-hand-right' aria-hidden='true'>
						</span>
					</button>
				</td>
		 		<td style='width:300px'><center>".$dados[2]."</center></td>
		 		<td style='width:200px'><center>".$dados[1]."</center></td>
			</tr>
			<tr>
	 			<td></br></td>
	 		</tr>";
	}
}
?>