<?php 
require_once "../../_class/Conexao2.php";
	$conn = new Conexao();
	$pdo = $conn->Connect();

	$sql = "SELECT * FROM kit;";
	$stmt = $pdo->query($sql);

	foreach ($stmt as $dados) {
		echo "<option class='opcao' value='".$dados[0]."'>".$dados[1]."</option>
		";
	}
?>