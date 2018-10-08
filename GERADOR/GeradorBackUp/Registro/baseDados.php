<?php 

require_once "app/classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();

$sql = "SELECT * FROM regitros;";
$verifica = $pdo->query($sql);
$projetos = "";
$select = "<select name='regitros_id' id='registro_id' required>";

foreach ($verifica as $dados) {
	$projetos .= "
		<input type=\"hidden\" id=\"ServerName".$dados[0]."\" value='".$dados[1]."'>
		<input type=\"hidden\" id=\"ServiceName".$dados[0]."\" value='".$dados[2]."'>
		<input type=\"hidden\" id=\"Key_SQL_servive".$dados[0]."\" value='".$dados[3]."'>
		<input type=\"hidden\" id=\"Port_Number".$dados[0]."\" value='".$dados[4]."'>
	";

	$select .= "<option value='".$dados[0]."'>".$dados[1]."</option>";
}
$select .= "</select>";

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php include "app/componentes/header.php" ?>

	<center>
		<h1>SQLServe -> MySQL</h1>
		<form action="app/controllers/cadastro_basedadosController.php" method="POST">
			Servidores <br>
			<?php echo $select; ?><br><br>
			Base de Dados <br>
			<input type="text" name="descricao_baseDados"><br><br>
			<button type="submit">Gravar</button>
		</form>
	</center>
</body>
</html>