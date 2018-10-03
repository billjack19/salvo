<?php

print_r(PDO::getAvailableDrivers());

try {
	// $hostname = "sqlserver01.bancodedados.com";
	$hostname = '192.168.0.199:1433';
	$dbname = "FOGO";
	$username = "sa";
	$pw = "teste";
	$pdo = new PDO ("mssql:host=$hostname;dbname=$dbname","$username","$pw");
} catch (PDOException $e) {
	echo "Erro de Conexão " . $e->getMessage() . "\n";
	exit;
}
$query = $pdo->prepare("select * FROM ITEM");
$query->execute();

for($i=0; $row = $query->fetch(); $i++){
	echo $i." - ".$row['DESCRICAO']."<br/>";
}

unset($pdo); 
unset($query);
?>