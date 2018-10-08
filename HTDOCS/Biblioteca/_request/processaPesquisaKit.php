<?php 

require_once "../../_class/dao/kitDAO2.php";

$kitDAO = new kitDAO();

if ($_GET['kit'] != '' ) {
	$retorno = $kitDAO->pegaKit($_GET['kit']);

	foreach ($retorno as $dados) {
		if ($dados[1]!='') {
			echo "
				<tr>
					<td>
						<button id='idKit".$dados[0]."' class=' btn btn-xs btn-warning'  style='width: 100px;' value='".$dados[0]."'>
							<span style='font-size:25px' class='glyphicon glyphicon-hand-right' aria-hidden='true'>
							</span>
						</button>
					</td>
			 		<td style='width:300px'><center>".$dados[1]."</center></td>
			 	</tr>
			 	<tr>
		 			<td></br></td>
		 		</tr>";
		 }
	}
	echo "	</table>";
}

else {
	$retorno = $kitDAO->pegaKit('');

	foreach ($retorno as $dados) {
		if ($dados[1]!='') {
		echo "
				<tr>
					<td>
						<button id='idKit".$dados[0]."' class=' btn btn-xs btn-warning'  style='width: 100px;' value='".$dados[0]."'>
							<span style='font-size:25px' class='glyphicon glyphicon-hand-right' aria-hidden='true'>
							</span>
						</button>
					</td>
				 	<td style='width:300px'><center>".$dados[1]."</center></td>
				</tr>
				<tr>
		 			<td></br></td>
		 		</tr>";
		}
		
	}
	echo "	</table>";
}
?>