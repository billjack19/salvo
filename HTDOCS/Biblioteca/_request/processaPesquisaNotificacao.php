<?php 
// include "../../_class/dao/emprestimo_livroDAO2.php";
$num = 0;
$emprestimoLivroDAO = new emprestimoLivroDAO2();

	$retorno = $emprestimoLivroDAO->pegaEmprestimo('','1');
	foreach ($retorno as $dados) {
		$num = $num + 1;
		echo "	<tr>";
	if ($dados[6] == 2) {
		echo "
			<tr>
				<td>&nbsp;</td>
			</tr>
			<td>
				<button type='button' class='btn btn-xs btn-success' data-toggle='modal' data-target='#myModal".$dados[0]."' style='font-size:20px;width:100px;' disabled>
					<span style='font-size:25px' class='glyphicon glyphicon-hand-right' aria-hidden='true'>
					</span>
				</button>
			</td>";
	}
	else if ($dados[6] == 1) {
		echo "
			<tr>
				<td>&nbsp;</td>
			</tr>
			<td>
				<button type='button' class='btn btn-xs btn-danger' data-toggle='modal' data-target='#myModal".$dados[0]."' style='font-size:20px;width:100px;'>
					<span style='font-size:25px' class='glyphicon glyphicon-hand-right' aria-hidden='true'>
					</span>
				</button>
			</td>";
	}
echo	"
 	<td style='width:300px'><center>".$dados[1]."</center></td>
 	<td style='width:250px'><center>".$dados[2]."</center></td>
 	<td style='width:150px'>
	 	<center>
	 		<input type='date' value='".$dados[4]."' style='font-size:20px' disabled>
	 	</center>
	</td>
 	<td style='width:200px'>
		<center>
	 		<input type='date' value='".$dados[5]."' style='font-size:20px' disabled>
	 	</center>
	</td>
 </tr>

<div class='modal fade' id='myModal".$dados[0]."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	<div class='modal-dialog' role='document'>
	    <div class='modal-content'>
		    <div class='modal-header'>
		        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		        <h3 class='modal-title' id='myModalLabel'>
		        	<center>
		        		Devolver livro
		        	</center>

		        </h3>
		    </div>
		    <div class='modal-body'>
		   			O aluno: <b>".$dados[1]."</b> deseja devolver o livro <b>".$dados[2]."</b>?
		   			<br><br>
		   			<center>
		   				<img src='../../_imagens/livro/livro.gif'>
		   			</center>	 
		    </div>
		    <div class='modal-footer'>
		    	<button type='button' class='btn btn-danger' data-dismiss='modal'>
		    		Fechar
		    	</button>
		    	<button type='button' class='botaoDevolver btn btn-success' value='".$dados[0]."'>
		    		Devolver
		    	</button>
		    </div>
	    </div>
	</div>
</div>
";
		}
?>