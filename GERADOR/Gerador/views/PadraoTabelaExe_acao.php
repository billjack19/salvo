<?php

include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();



if (!empty($_POST['criarPadrao'])) {
	$padrao = $_POST['padrao'];
	$sql = "INSERT INTO tabela_algoritimo_exe (descricao_padrao) VALUES ('$padrao');";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
}





if(!empty($_POST['listarPadrao'])){
	$padroesDefinidos = "<select id='padroaDeTabela' onchange='listarTabelasPadrao()'>";

	$sql = "SELECT * FROM tabela_algoritimo_exe;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$padroesDefinidos .= "<option value='".$dados['id_tabela_algoritimo_exe']."'>".$dados['descricao_padrao']."</option>";
	}
	$padroesDefinidos .= "</select>";

	echo $padroesDefinidos;
}





if (!empty($_POST['incluirTabela'])) {
	$id = $_POST['id'];
	$tabela = $_POST['tabela'];

	$sql = "INSERT INTO tabela_algoritimo_exe_item (tabela_algoritimo_exe_id, descricao_tabela) VALUES ($id, '$tabela');";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
}





if (!empty($_POST['listarTabelasPadrao'])) {
	$id = $_POST['id'];

	$resulatado = "
		<table width='100%'>
			<tr>
				<td align='center'><b>Descricao</b></td>
				<td align='center'><b>Excluir</b></td>
			</tr>";

	$sql = "SELECT * FROM tabela_algoritimo_exe_item WHERE tabela_algoritimo_exe_id = $id;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$resulatado .= "
			<tr>
				<td align='center'>".$dados['descricao_tabela']."</td>
				<td align='center'>
					<button onclick='excluirTabelaPadrao(".$dados['id_tabela_algoritimo_exe_item'].")'>Remover Tabela</button>
				</td>
			</tr>";
	}
	$resulatado .= "
		</table>";

	echo $resulatado;
}





if (!empty($_POST['excluirTabelaPadrao'])) {
	$id = $_POST['id'];
	$sql = "DELETE FROM tabela_algoritimo_exe_item WHERE id_tabela_algoritimo_exe_item = $id;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
}





if (!empty($_POST['excluirPadrao'])) {
	$id = $_POST['id'];
	$sql = "DELETE FROM tabela_algoritimo_exe_item WHERE tabela_algoritimo_exe_id = $id;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	$sql = "DELETE FROM tabela_algoritimo_exe WHERE id_tabela_algoritimo_exe = $id;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
}





if (!empty($_POST['alterarPardrao'])) {
	$id = $_POST['id'];
	$padrao = $_POST['padrao'];

	$sql = "UPDATE tabela_algoritimo_exe SET descricao_padrao = '$padrao' WHERE id_tabela_algoritimo_exe = $id;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
}

?>