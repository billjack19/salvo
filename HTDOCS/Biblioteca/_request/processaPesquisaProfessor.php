<?php 

require_once "../../_class/dao/professorDAO2.php";

$alunoDAO = new alunoDAO();

if ($_GET['professor'] != '' ) {
	$retorno = $alunoDAO->pegaAluno($_GET['professor']);

	foreach ($retorno as $dados) {
		echo "
			<tr>
				<td>
					<button id='idProfessor".$dados[0]."' class='btn btn-xs btn-warning' style='font-size:20px;width:100px;' value='".$dados[0]."'>
						<span style='font-size:25px' class='glyphicon glyphicon-hand-right' aria-hidden='true'>
						</span>
					</button>
				</td>
		 		<td style='width:300px'><center>".$dados[1]."</center></td>
		 		<td style='width:200px'><center>".$dados[18]."</center></td>
		 	</tr>
		 	<tr>
	 			<td></br></td>
	 		</tr>";
	}
	echo "	</table>";
}

else {
	$retorno = $alunoDAO->pegaAluno('');

	foreach ($retorno as $dados) {
		echo "
			<tr>
				<td>
					<button id='idProfessor".$dados[0]."' class='btn btn-xs btn-warning' style='font-size:20px;width:100px;' value='".$dados[0]."'>
						<span style='font-size:25px' class='glyphicon glyphicon-hand-right' aria-hidden='true'>
						</span>
					</button>
				</td>
			 	<td style='width:300px'><center>".$dados[1]."</center></td>
				<td style='width:200px'><center>".$dados[18]."</center></td>
			</tr>
			<tr>
	 			<td></br></td>
	 		</tr>";
	}
	echo "	</table>";	
}
?>