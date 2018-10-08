<?php 
session_start();
require_once "../_class/dao/alunoDAO.php";

$alunoDAO = new alunoDAO();
// $textoPesquisaAluno = '';

if ($_POST['idAluno'] != '' ) {
	$id  = (int) $_POST['idAluno'];
	$retorno = $alunoDAO->pegaIdAluno($id);
	// $idAluno = $_POST['idAluno'];

	foreach ($retorno as $dados) {
		$NumLivro = $dados[15];
		$_SESSION['idAluno'] = $dados[0];
		echo "
				<tr>
					<td>Nome do Aluno</td>
					<td><input type='text' value='".$dados[2]."' disabled></td>
				</tr>
				<tr>
					<td>Matricula</td>
					<td><input type='text' value='".$dados[1]."' disabled></td>
				</tr>
				<tr>
					<td>Sexo</td>
					<td><input type='text' value='".$dados[6]."' disabled></td>
				</tr>
				<tr>
					<td>Data de nascimento</td>
					<td><input type='date' value='".$dados[7]."' disabled></td>
				</tr>
				<tr>
					<td>Turno</td>
					<td><input type='text' value='".$dados[8]."' disabled></td>
				</tr>
				<tr>
					<td>Turma</td>
					<td><input type='text' value='".$dados[13]."' disabled></td>
				</tr>
				<tr>
					<td>Sala</td>
					<td><input type='text' value='".$dados[14]."' disabled></td>
				</tr>
				<tr>
					<td>Numeros de Livros</td>
					<td><input id='NumLivro' type='text' value='".$dados[15]."' disabled></td>
				</tr>";
			
	}
}
?>
<!-- processaPesquisaAluno2 -->