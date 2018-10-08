<!DOCTYPE html>
<html>
<head>
	<title>Vai la garoto</title>
	<meta charset="utf-8">
</head>
<body>
	<table>
		<tr>
		   <td class="form-control tam3">
				<h2>
					<center>
						<b>Horario</b>
					</center>
				</h2>
		   	</td>
			<td class="padraoTabela">&nbsp;</td>
			<td class="form-control tam3">
				<h2>
					<center>
						<b>Manhã</b>
					</center>
				</h2>
			</td>
			<td class="padraoTabela">&nbsp;</td>
			<td class="form-control tam3">
				<h2>
					<center>
						<b>Tarde</b>
					</center>
				</h2>
			</td>
			<td class="padraoTabela">&nbsp;</td>
			<td class="form-control tam3">
				<h2>
					<center>
						<b>Noite</b>
					</center>
				</h2>
			</td>
		</tr>
		<tr>
			<td class="padraoTabela"></td>
		</tr>
<!-- SELECT * FROM `emprestimo_kit` WHERE ID_KIT = 2 AND DATA_EMPRESTIMO_KIT = '2017-04-10' -->










<?php
for ($i=1; $i < 6; $i++) { 
	echo"
	<tr>
		<td class='form-control tam'>
			<h2 class='tam2'>
				<center>".$i."°</center>
			</h2>
		</td>";
	for ($j=0; $j < 3; $j++) { 
		if ($j == 0) {
			$cond = 'm';
			$turno = "Manhã";
		}
		else if ($j == 1) {
			$cond = 't';
			$turno = "Tarde";
		}
		else if ($j == 2) {
			$cond = 'n';
			$turno = "Noite";
		}
		echo"
			<td class='padraoTabela'>&nbsp;</td>	
			<td>
				<input type='button' id='".$cond."h".$i."' name='disponivel' class='botao btn btn-xs btn-success' data-toggle='modal' data-target='#mod_".$cond."h".$i."' >
			</td>
			";
		
	}
	echo "</tr>
	<tr>
			<td class='padraoTabela'></td>
		</tr>";
}

for ($i=1; $i < 6; $i++) { 
	for ($j=0; $j < 3; $j++) { 
		if ($j == 0) {
			$cond = 'm';
			$turno = "Manhã";
		}
		else if ($j == 1) {
			$cond = 't';
			$turno = "Tarde";
		}
		else if ($j == 2) {
			$cond = 'n';
			$turno = "Noite";
		}

echo"
<div class='modal fade' id='mod_".$cond."h".$i."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	<div class='modal-dialog' role='document'>
	    <div class='modal-content'>
		    <div class='modal-header'>
		        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
		        	<span aria-hidden='true'>&times;</span>
		        </button>
				<h4 class='modal-title' id='myModalLabel'>".$i."° Horario de ".$turno."</h4>
		    </div>
		    <div class='modal-body'>
		        Angendar:".$cond."h".$i."
		   		
		    </div>
		    <div class='modal-footer'>
		    	<button type='button' class='btn btn-danger' data-dismiss='modal'>
		    		Fechar
		    	</button>
		    	<!-- nomeEmprestimo(this)' -->
		    	<button type='button' onclick='mostraValor(this)' value=".$cond."h".$i." class='btn btn-success' value=''>
		    		Agendar
		    	</button>
		    </div>
	    </div>
	</div>
</div>";
	}
}







































for ($i=1; $i < 6; $i++) { 
	for ($j=0; $j < 3; $j++) { 
		if ($j == 0) {
			$cond = 'm';
		}
		else if ($j == 1) {
			$cond = 't';
		}
		else if ($j == 2) {
			$cond = 'n';
		}
		echo "
		<input class='ocultar' id='in_".$cond."h".$i."' name='in_horario' type='text' size='1' value='0' disabled />
		";
	}
}


echo "<script>";
require_once "../_class/Conexao2.php";
	$conn = new Conexao();
	$pdo = $conn->Connect();

	$sql = "SELECT * FROM `emprestimo_kit` WHERE ID_KIT = 2 AND DATA_EMPRESTIMO_KIT = '2017-04-10';";
	$stmt = $pdo->query($sql);

	foreach ($stmt as $dados) {
		for ($i=1; $i < 6; $i++) { 
			for ($j=0; $j < 3; $j++) { 
				if ($j == 0) {
					$cond = 'm';
				}
				else if ($j == 1) {
					$cond = 't';
				}
				else if ($j == 2) {
					$cond = 'n';
				}

				if ($dados[4]==$cond."h".$i) {
		echo "
			document.getElementById('in_".$cond."h".$i."').value = 'sim';
			document.getElementById('".$cond."h".$i."').className = 'botao btn btn-xs btn-danger';
				document.getElementById('".$cond."h".$i."').disabled = true;
		";
				}
			}
		}
}
echo "</script>";
?>


<!-- <b><?php 
	include '../../_request/processaPesquisaKit3.php';
?></b> para o professor 
<b><?php
		include '../../_request/processaPesquisaProfessor3.php';
	?></b>
<br><br> 
<center>
	<img src='../../_imagens/livro/kit.png'>
</center>-->


















<script type="text/javascript">
	function mostraValor(documento){
		var valor = documento.value;
		alert(valor);
	}
</script>
</table>
<link rel="stylesheet" type="text/css" href="../_css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="../_js/lib/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="../_css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../_css/estilo.css" />
<link rel="stylesheet" type="text/css" href="../_css/emprestimoLivro.css" />

<script type="text/javascript" src="../_js/jquery.min.js"></script>
<script type="text/javascript" src="../_js/funcoes/fixed-header.js"></script>
<script type="text/javascript" src="../_js/jquery.min.js"></script>
<script type="text/javascript" src="../_js/bootstrap.min.js"></script>

<style type="text/css">
	.botao{
	font-size:20px; width:100px;height:60px;
}
.padraoTabela{
	height: 5px;
}
#calendar {
	width: 500px;
	margin: 1 auto;
	display: block;
}
.ocultar{
	opacity: 0;
	width: 10px;
}
.opcao{
	height: 15px;
	font-size: 15px; 
}
.calendarioFundo{
	/*background-image: url("../../_imagens/calendario/fundoCalendario2.png");*/
	background-color: #f2df4d;
	/*background-color: #fff;*/
}
h2 .fontTitulo{
	font-family: FonteTitulosHdois;
}
.tam{
	height: 60px;
	width: 100px;
	font-size: 40px;
	background-color: #428bca;
}
.tam2{
	font-size: 25px;
	color: black;
}
.tam3{
	height: 35px;
	width: 100px;
	font-size: 40px;
	background-color: #f0ad4e;
}
</style>
</body>
</html>