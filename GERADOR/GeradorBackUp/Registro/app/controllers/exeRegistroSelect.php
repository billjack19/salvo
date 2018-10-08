<?php

ini_set('max_execution_time', 3000);

require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();

$pasta = $_POST['pasta'];
$arquivo = $_POST['arquivo'];


$myfile = fopen("../bd/".$pasta."/registroPersonalizado/".$arquivo, "r") or die("Unable to open file!");
$sql = fread($myfile,filesize("../bd/".$pasta."/registroPersonalizado/".$arquivo));
fclose($myfile);


$stmt = $pdo->prepare($sql);
echo $stmt->execute();


?>