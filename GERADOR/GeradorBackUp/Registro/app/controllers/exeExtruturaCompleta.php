<?php

ini_set('max_execution_time', 3000);

require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();

$arquivo = $_POST['arquivo'];


$myfile = fopen("../bd/".$arquivo."/".$arquivo.".sql", "r") or die("Unable to open file!");
$sql = fread($myfile,filesize("../bd/".$arquivo."/".$arquivo.".sql"));
fclose($myfile);



// $descricao_status = "";
// $id_baseDados = 0;
// $Id_SQL = 0;

/*
$sql = "
DROP DATABASE IF EXISTS $arquivo;
CREATE DATABASE $arquivo;";
*/

$stmt = $pdo->prepare($sql);
echo $stmt->execute();


?>