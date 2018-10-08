<?php
session_start();
require_once "../_class/dao/livroDAO.php";

$livroDAO = new livroDAO();

if ($_POST['idLivro'] != '' ) {
	$id  = (int) $_POST['idLivro'];
	$retorno = $livroDAO->pegaIdLivro($id);

	foreach ($retorno as $dados) {
		$_SESSION['idLivro'] = $dados[0];
		$_SESSION['prazoLivro'] = $dados[13];
		echo "

				<tr>
					<td>Nome do Livro</td>
					<td><input type='text' value='".$dados[3]."' disabled></td>
				</tr>
				<tr>
					<td>Codigo</td>
					<td><input type='text' value='".$dados[1]."' disabled></td>
				</tr>
				<tr>
					<td>ISBN</td>
					<td><input type='text' value='".$dados[2]."' disabled></td>
				</tr>
				<tr>
					<td>Autor</td>
					<td><input type='text' value='".$dados[4]."' disabled></td>
				</tr>
				<tr>
					<td>Tema</td>
					<td><input type='text' value='".$dados[5]."' disabled></td>
				</tr>
				<tr>
					<td>Prazo</td>
					<td><input type='text' value='".$dados[13]."' disabled></td>
				</tr>";

	}
}
?>
<!-- if ($dados[14] == 1) {
			echo "
				<tr>
					<td>Status</td>
					<td><input id='' type='text' value='Disponível' disabled></td>
				</tr>
				<script>
				document.getElementById('livroNome').value = '".$dados[14]."'
				</script>";
		}
		else if ($dados[14] == 2) {
			echo "
				<tr>
					<td>Status</td>
					<td><input type='text' value='Indisponível' disabled></td>
				</tr>
				<script>
				document.getElementById('livroNome').value = '".$dados[14]."'
				</script>";
		} -->