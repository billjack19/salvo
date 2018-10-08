<?php
	session_start();
	require_once "../_class/dao/kitDAO.php";

	$kitDAO = new kitDAO();
	if ($_POST['idKit'] != '' ) {		
		$id  = (int) $_POST['idKit'];
		$_SESSION['idKit'] = $_POST['idKit'];
		$numProduto = 0;
		$retorno = $kitDAO->pegaItens($id);
		echo "
			<tr>
				<td>Produto</td>
				<td>Quantidade</td>
			</tr>";
		foreach ($retorno as $dados) {
			$numProduto ++;
			echo "
			<tr>
				<td><input type='text' style='width: auto;' value='".$dados[3]."' disabled></td>
				<td><input type='text' style='width: 110px;' value='".$dados[1]."' disabled></td>
			</tr>";
		}
	}
?>