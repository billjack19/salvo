<?php

ini_set('max_execution_time', 3000);

// require_once "../classe/conexao.php";

// $conn = new Conexao();
// $pdo = $conn->Connect();

$arquivo = $_POST['arquivo'];

$dir = "../bd/".$arquivo."/estrutura/";

$resultado = "<table class='table'>";
$resultado .= "<tr>";
	$resultado .= "<td>Arquivo</td>";
	$resultado .= "<td>Executar</td>";
	$resultado .= "<td>Executado</td>";
$resultado .= "</tr>";


$files1 = scandir($dir);
for ($i=0; $i < count($files1); $i++) { 
	if ($files1[$i] != "." && $files1[$i] != "..") {
		if (!is_dir($files1[$i])) {
			$resultado .= "<tr>";
			$resultado .= "<td>".$files1[$i]."</td>";
			$resultado .= "<td><button onclick='exePer(\"exeEstruturaSelect\", \"".$files1[$i]."\");'>Executar</button></td>";
			$resultado .= "<td><div id='div".$files1[$i]."'>Não</div></td>";
			$resultado .= "</tr>";
		}
	}
}
$resultado .= "</table>";

echo $resultado;

?>