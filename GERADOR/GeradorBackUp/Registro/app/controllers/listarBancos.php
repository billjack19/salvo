<?php 

require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();

$id = $_POST['servidor'];
$id_baseDados = $_POST['id_baseDados'];

$cont = 0;

$sql = "SELECT * FROM basedados WHERE regitros_id = $id;";
$verifica = $pdo->query($sql);
$projetos = "";
$select = "<select name='nameDadabase' id='nameDadabaseMigration' required>";

foreach ($verifica as $dados) {
	$cont++;
	if ($id_baseDados == $dados[0]) $select .= "<option value='".$dados[0]."+".$dados[1]."' selected>"	.$dados[1]."</option>";
	else 							$select .= "<option value='".$dados[0]."+".$dados[1]."'>"			.$dados[1]."</option>";
}
$select .= "</select>";

if ($cont != 0) echo "1-" . $select;
else echo "0-<input type=\"text\" value='Sem Base de Dados' disabled>";

?>