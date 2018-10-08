<?php
	include "../_class/Conexao2.php";

	$tabelas  = array();
	$numeroColunas = array();
	$numeroRegistros = array();
	$criaTabelas  = array();
	$insertTabelas = array();
	$cont = 0;
	$contRegistro = 0;
	$resultado = '';

	$conn = new Conexao();
	$pdo = $conn->Connect();

	$sql = "SHOW TABLES";
	$stmt = $pdo->query($sql);

	// conta e nomeia as tabelas
	foreach ($stmt as $dados) {
		$tabelas[] = $dados[0];
		$cont ++;
	}

	// conta os registros
	for ($i=0; $i < $cont; $i++) {
		$sql = "SELECT COUNT(*) FROM ".$tabelas[$i].";";
		$stmt = $pdo->query($sql);
		foreach ($stmt as $dados2) {
			$numeroRegistros[] = $dados2[0];
		}
	}

	// conta coluna
	for ($j=0; $j < $cont; $j++) {
		$sql = "SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '".$tabelas[$j]."';";
		$stmt = $pdo->query($sql);
		foreach ($stmt as $dados2) {
			$numeroColunas[] = $dados2[0];
		}
	}

	// gera o comando de criar a tabela
	for ($k=0; $k < $cont; $k++) { 
		$sql = "SHOW CREATE TABLE ".$tabelas[$k].";";
		$stmt = $pdo->query($sql);
		foreach ($stmt as $dados2) {
			$criaTabelas[] = $dados2[1];
		}
	}
	// gera insert into datas tabelas referentes aos registros //

	// enquanto houver tabelas
	for ($l=0; $l < $cont; $l++) { 
		$sql = "SELECT * FROM ".$tabelas[$l].";";
		$stmt = $pdo->query($sql);

		$resultado = 'INSERT INTO '.$tabelas[$l].' <br>VALUES(';

		foreach ($stmt as $dados3) {
			$contRegistro ++;
			// enquanto houver colunas
			for ($n=0; $n < $numeroColunas[$l]; $n++) {
				if ($n == 0) {
					$resultado .= "'".$dados3[$n]."',";
				}
				else if ($n == $numeroColunas[$l]-1) {
					if ($contRegistro == $numeroRegistros[$l]) {
						$resultado .= "'".$dados3[$n]."');<br>";
					}
					else {
						$resultado .= "'".$dados3[$n]."');<br><br>INSERT INTO ".$tabelas[$l]." <br>VALUES(";
					}
					
				}
				else {
					$resultado .= "'".$dados3[$n]."',";
				}
			}
		}
		$insertTabelas[] = $resultado;
		$resultado = "";
		$contRegistro = 0;
	}

	// for ($z=0; $z < $cont; $z++) { 
	// 	echo "A tabela: ".$tabelas[$z]."<br>
	// 		Colunas: ".$numeroColunas[$z]."<br>
	// 		Num de registros: ".$numeroRegistros[$z]."<br>
	// 		Codigo de criação: <br>".$criaTabelas[$z]."<br><br><br>
	// 		Registros: <br>".$insertTabelas[$z]."<br><br>";
	// }
	for ($z=0; $z < $cont; $z++) { 
		echo "<br>".$criaTabelas[$z].";<br><br><br>
			<br>".$insertTabelas[$z]."<br><br>";
	}
?>