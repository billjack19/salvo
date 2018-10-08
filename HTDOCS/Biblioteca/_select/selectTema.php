<?php 
require_once "../../_class/Conexao2.php";
	$conn = new Conexao();
	$pdo = $conn->Connect();

	$sql = "SELECT * FROM tema;";
	$stmt = $pdo->query($sql);

	foreach ($stmt as $dados) {
		echo "	<option value='".$dados[1]."'>".$dados[1]."</option>
		";
	}
?>