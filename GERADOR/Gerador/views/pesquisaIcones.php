<?php



include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();


if (!empty($_POST['pesuisa'])) {
	$iconesModal = "<h3>Nenhum Registro Encontrado!</h3>";
	$pesquisa = $_POST['textoPesquisa'];
	$cont = 0;

	$sql = "SELECT * FROM icones
			WHERE descricao_icones LIKE '%$pesquisa%';";

	$verifica = $pdo->query($sql);

	foreach ($verifica as $dados) {
		if ($cont == 0) $iconesModal = "";

		$iconesModal .= "
			<div class='col-md-2 col-sx-3 text-center' onclick=\"pequisaIconeId(".$dados[0].")\">
				<h1 style='font-size: 25px;'>".$dados[2]."</h1>
				".$dados[1]." - tipo(".$dados[3].")
			</div>
			";

		$cont++;
	}


	echo $iconesModal;	
}

if (!empty($_POST["retornaicone"])) {
	$id = $_POST['id'];
	$resultado = "";

	$sql = "SELECT * FROM icones
			WHERE id_icones = $id;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) $resultado = $dados[2];

	echo $resultado;	
}


?>