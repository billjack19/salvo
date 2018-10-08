<?php 
// include "../../_class/dao/emprestimo_livroDAO2.php";
$num = 0;
$emprestimoLivroDAO = new emprestimoLivroDAO2();

if ($_GET['aluno'] != '' ) {
	$retorno = $emprestimoLivroDAO->pegaEmprestimo($_GET['aluno'],$_GET['tipoFiltro']);
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
 	<td style='width:250px'><center>".$dados[1]."</center></td>
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
}

else{
	$retorno = $emprestimoLivroDAO->pegaEmprestimo('',$_GET['tipoFiltro']);
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
	}
?>
<!--  
onclick='nomeEmprestimo(this)'
//mudar data final
UPDATE emprestimo_livro SET STATUS_EMPRESTIMO = 2 WHERE ID_EMPRESTIMO_LIVRO = 1;
UPDATE aluno SET NUMERO_LIVROS = NUMERO_LIVROS - 1 WHERE ID_ALUNO = (SELECT ID_ALUNO FROM emprestimo_livro WHERE ID_EMPRESTIMO_LIVRO = 1);
UPDATE livro SET STATUS_LIVRO = 1 WHERE ID_LIVRO = (SELECT ID_LIVRO FROM emprestimo_livro WHERE ID_EMPRESTIMO_LIVRO = 1);



SELECT e.ID_EMPRESTIMO_LIVRO , a.NOME_ALUNO , l.NOME_LIVRO , c.NOME_CADASTRO , e.DATA_INICIAL_EMPRESTIMO_LIVRO , e.DATA_FINAL_EMPRESTIMO_LIVRO , e.STATUS_EMPRESTIMO
FROM emprestimo_livro e
INNER JOIN aluno a ON a.ID_ALUNO = e.ID_ALUNO
INNER JOIN livro l ON l.ID_LIVRO = e.ID_LIVRO
INNER JOIN cadastro c ON c.ID_CADASTRO = e.ID_CADASTRO;


DELIMITER $$
CREATE OR REPLACE TRIGGER tr_LogEmprestimoLivro AFTER INSERT ON emprestimo_livro
FOR EACH ROW
BEGIN
SET @str.operacao = 'I';
INSERT INTO log_emprestimo_livro (ID_EMPRESTIMO_LIVRO , ID_LIVRO , ID_ALUNO , ID_CADASTRO , DATA_INICIAL_EMPRESTIMO_LIVRO , DATA_FINAL_EMPRESTIMO_LIVRO , STATUS_EMPRESTIMO , FLTIPOLOG , DATALOG) VALUES (new.ID_EMPRESTIMO_LIVRO , new.ID_LIVRO , new.ID_ALUNO , new.ID_CADASTRO , new.DATA_INICIAL_EMPRESTIMO_LIVRO , new.DATA_FINAL_EMPRESTIMO_LIVRO , new.STATUS_EMPRESTIMO , @str.operacao , now());
END; -->
