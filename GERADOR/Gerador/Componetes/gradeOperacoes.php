<?php

include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();

echo "Teste arq";


if (!empty($_POST['gravar_grade_config'])) {
	$tabela_primaria = $_POST['tabela_primaria'];
	$tabela_grade = $_POST['tabela_grade'];
	$projeto_id = $_POST['projeto_id'];

	$sql = "INSERT INTO grade 
					(  tabela_primaria,    tabela_grade,   projetos_id)
			VALUES 	('$tabela_primaria', '$tabela_grade', $projeto_id);";

	$verifica = $pdo->prepare($sql);
	echo $verifica->execute();
}


if (!empty($_POST['excluit_grade_config'])) {
	$id = $_POST['id'];

	$sql = "DELETE FROM grade WHERE id_grade = $id;";
	
	$verifica = $pdo->prepare($sql);
	echo $verifica->execute();
}

if (!empty($_POST['listarGrade'])) {
	# code...
}


?>