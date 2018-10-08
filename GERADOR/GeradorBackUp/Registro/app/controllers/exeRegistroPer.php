<?php

ini_set('max_execution_time', 3000);

require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();

$arquivo = $_POST['arquivo'];

$dir = "../bd/".$arquivo."/registroPersonalizado/";

$files1 = scandir($dir);
for ($i=0; $i < count($files1); $i++) { 
	if ($files1[$i] != "." && $files1[$i] != "..") {
		if (!is_dir($files1[$i])) {
			$myfile = fopen($dir.$files1[$i], "r") or die("Unable to open file!");
			$sql = fread($myfile,filesize($dir.$files1[$i]));
			fclose($myfile);
			$stmt = $pdo->prepare($sql);
			echo $stmt->execute();
		}
	}
}

?>