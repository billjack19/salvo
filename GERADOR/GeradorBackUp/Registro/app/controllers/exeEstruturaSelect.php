<?php

ini_set('max_execution_time', 3000);

require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();

$pasta = $_POST['pasta'];
$arquivo = $_POST['arquivo'];


$myfile = fopen("../bd/".$pasta."/estrutura/".$arquivo, "r") or die("Unable to open file!");
$sql = fread($myfile,filesize("../bd/".$pasta."/estrutura/".$arquivo));
fclose($myfile);


$stmt = $pdo->prepare($sql);
echo $stmt->execute();


?>