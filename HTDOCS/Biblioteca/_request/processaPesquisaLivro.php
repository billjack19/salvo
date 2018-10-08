<?php 
require_once "../../_class/dao/livroDAO2.php";

$livroDAO = new livroDAO();

if ($_GET['livro'] != '' ) {
	$retorno = $livroDAO->pegaLivro($_GET['livro']);
	foreach ($retorno as $dados) {
		echo "			
			<tr>
				<td>
					<button id='idLivro".$dados[0]."' class=' btn btn-xs btn-warning'  style='width: 100px;' value='".$dados[0]."'>
						<span  style='font-size:25px' class='glyphicon glyphicon-hand-right' aria-hidden='true'>
						</span>
					</button>
				</td>
	 			<td style='width:200px'><center>".$dados[3]."</center></td>
	 			<td style='width:50px'><center>".$dados[13]."</center></td>
	 			<td style='width:200px'><center>".$dados[1]."</center></td>
	 		</tr>
	 		<tr>
	 			<td></br></td>
	 		</tr>";
	}	
}

else{
	$retorno = $livroDAO->pegaLivro('');
	foreach ($retorno as $dados) {
		echo "			
		<tr>
			<td>
				<button id='idLivro".$dados[0]."' class=' btn btn-xs btn-warning'  style='width: 100px;' value='".$dados[0]."'>
					<span  style='font-size:25px' class='glyphicon glyphicon-hand-right' aria-hidden='true'>
					</span>
				</button>
			</td>
			<td style='width:200px'><center>".$dados[3]."</center></td>
			<td style='width:50px'><center>".$dados[13]."</center></td>
			<td style='width:200px'><center>".$dados[1]."</center></td>
		</tr>
		<tr>
	 		<td></br></td>
	 	</tr>";
	}	
}
?>