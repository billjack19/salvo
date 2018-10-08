<?php
require_once "../classe/conexao.php";

$caminhoUploadImagem = "../upload/img";

$conn = new Conexao();
$pdo = $conn->Connect();

if (!empty($_POST['excluir'])) {

	$id 	= $_POST['id'];
	$table 	= $_POST['table'];
	$situacao = $_POST['boolAtivo'];

	$colunn = "id_".$table;
	$colunnAtivo = "bool_ativo_".$table;

	// $situacao = $boolAtivo == 1 ? 0 : 1;

	// $sql = "SELECT * FROM $table WHERE $colunn = $id";
	// $verifica = $pdo->query($sql);
	// foreach ($verifica as $dados) {
	// 	$situacao = $dados[$colunnAtivo] == 1 ? 0 : 1;
	// }

	$sql = "UPDATE $table SET $colunnAtivo = $situacao WHERE $colunn = $id;";
	if ($table == "vinculado") {
		$verifica = "Registro possui vinculo e não pode se excluido!";
	} else {
		$verifica = $pdo->prepare($sql);
		$verifica->execute();
		$verifica = "1";
	}
	echo $verifica;
}




if (!empty($_POST['listarImgem'])) {
	$resultado = "";
	$contRegistro = 0;
	$filtro = $_POST['filtro'];

	$files1 = scandir($caminhoUploadImagem);
	for ($i=0; $i < count($files1); $i++) { 
		if (
			$files1[$i] != "." &&
			$files1[$i] != ".." &&
			!is_dir($files1[$i]) &&
			substr($files1[$i], 0, strlen($filtro)) == $filtro
		) {
			$contRegistro++;
			$resultado .= "
		<div class='col-md-3 col-xs-4 text-center divImg' onclick='selecionarImagem(\"".$files1[$i]."\")'>
			<img src='app/upload/img/".$files1[$i]."' width='100%'><br><!--  height=\"50px\"  -->
			<b>".$files1[$i]."</b>
		</div>";
		}
	}
	// $filtro = $filtro == "" ? "" : "AND descricao_upload_arq LIKE '%".$filtro."%'";

	// $sql = "SELECT * FROM upload_arq WHERE tipo_upload_arq = 'imagem' $filtro";
	// $verifica = $pdo->query($sql);
	// foreach ($verifica as $dados) {
	// }
	$resultado = $contRegistro == 0 ? "<h3>Nenhum registro encontrado</h3>" : $resultado;

	echo $resultado;
}



if (!empty($_POST['soListarImgem'])) {
	$resultado = "";
	$contRegistro = 0;
	$filtro = $_POST['filtro'];

	$files1 = scandir($caminhoUploadImagem);
	for ($i=0; $i < count($files1); $i++) { 
		if (
			

			!is_dir($files1[$i]) &&
			substr($files1[$i], 0, strlen($filtro)) == $filtro
		) {
			$contRegistro++;
			$resultado .= "
		<div class='col-md-2 col-xs-3 text-center divImg'>
			<img src='app/upload/img/".$files1[$i]."' width='100%'><br><!--  height=\"50px\"  -->
			<b>".$files1[$i]."</b>
		</div>";
		}
	}
	// $filtro = $filtro == "" ? "" : "AND descricao_upload_arq LIKE '%".$filtro."%'";

	// $sql = "SELECT * FROM upload_arq WHERE tipo_upload_arq = 'imagem' $filtro";
	// $verifica = $pdo->query($sql);
	// foreach ($verifica as $dados) {
		
	// }
	$resultado = $contRegistro == 0 ? "<h3>Nenhum registro encontrado</h3>" : $resultado;

	echo $resultado;
}

?>