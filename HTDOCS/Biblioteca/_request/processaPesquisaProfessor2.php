<?php 
session_start();
require_once "../_class/dao/funcionarioDAO.php";

$funcionarioDAO = new funcionarioDAO();

if ($_POST['idProfessor'] != '' ) {
	$id  = (int) $_POST['idProfessor'];
	$retorno = $funcionarioDAO->pegaIdProfessor($id);

	foreach ($retorno as $dados) {
		$NumLivro = $dados[19];
		$_SESSION['idProfessor'] = $dados[0];
		echo "
				<tr>
					<td><br><br></td>
				</tr>
				<tr>
					<td>Nome do Professor&nbsp;</td>
					<td><input type='text' value='".$dados[1]."' disabled></td>
				</tr>
				<tr>
					<td>MASP</td>
					<td><input type='text' value='".$dados[18]."' disabled></td>
				</tr>
				<tr>
					<td>Sexo</td>
					<td><input type='text' value='".$dados[4]."' disabled></td>
				</tr>
				<tr>
				<tr>
					<td>Data de nascimento</td>
					<td><input type='date' value='".$dados[5]."' disabled></td>
				</tr>
				<tr>
					<td>Turno</td>
					<td><input type='text' value='".$dados[15]."' disabled></td>
				</tr>
				<tr>
					<td>Numeros de Livros</td>
					<td><input id='NumLivro' type='text' value='".$dados[19]."' disabled></td>
				</tr>";
	}
}
?>