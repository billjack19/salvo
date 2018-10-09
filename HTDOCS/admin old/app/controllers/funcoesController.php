<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();

if (!empty($_POST['excluir'])) {
	$id 	= $_POST['id'];
	$table 	= $_POST['table'];
	$colunn = "id_".$table;
	$colunnAtivo = "bool_ativo_".$table;

	$sql = "SELECT * FROM $table WHERE $colunn = ".$id;
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$situacao = $dados[$colunnAtivo] == 1 ? 0 : 1;
	}

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
	$filtro = $filtro == "" ? "" : "AND descricao_upload_arq LIKE '%".$filtro."%'";

	$sql = "SELECT * FROM upload_arq WHERE tipo_upload_arq = 'imagem' $filtro";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$contRegistro++;
		$resultado .= "
		<div class='col-md-3 col-xs-4 text-center divImg' onclick='selecionarImagem(\"".$dados[1]."\")'>
			<img src='app/upload/img/".$dados[1]."' width='100%'><br><!--  height=\"50px\"  -->
			<b>".$dados[1]."</b>
		</div>";
	}
	$resultado = $contRegistro == 0 ? "<h3>Nenhum registro encontrado</h3>" : $resultado;

	echo $resultado;
}

?>