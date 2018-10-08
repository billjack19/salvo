<?php 

require_once "../../_class/dao/usuarioDAO2.php";

$usuarioDAO = new usuarioDAO();

if ($_SESSION["nome"] != '' ) {
	// echo "Valor: ".$_GET['nome']."<br>";

$retorno = $usuarioDAO->pegaUsuario($_SESSION["nome"]);

foreach ($retorno as $dados) {
	$_SESSION['idCadastro'] = $dados[0];
echo "	
<h2 id='usuario' class='usuario form-control' style='text-align: right;'>
	<center>
		<i class='fa fa-user-circle' aria-hidden='true'></i>&nbsp;&nbsp;".$dados[1]."
	</center>
</h2>";
}
}
?>