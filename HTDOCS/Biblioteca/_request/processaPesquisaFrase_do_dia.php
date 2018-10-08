<?php 

require_once "../../_class/dao/frase_do_diaDAO2.php";

$fraseDAO = new fraseDAO();

if ($_SESSION["frase"] != '' ) {
	// echo "Valor: ".$_GET['nome']."<br>";

$retorno = $fraseDAO->pegaFrase( $_SESSION["frase"] );

foreach ($retorno as $dados) {
echo "	
<h2 class='style_frase_do_dia form-control'>
	<center>
		<b>Frase do dia:</b><br>
		".$dados[1]." 
		<br>
		".$dados[2]."
	</center>
</h2>";
}
}
?>