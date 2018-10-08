<?php 
require_once "../../_class/Conexao2.php";
	$conn = new Conexao();
	$pdo = $conn->Connect();

	$sql = "SELECT * FROM kit;";
	$stmt = $pdo->query($sql);

	foreach ($stmt as $dados) {
		if ($dados[1] != '') {
			echo "<div class='modal fade' id='".$dados[1]."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
				<div class='modal-dialog' role='document'>
				    <div class='modal-content'>
					    <div class='modal-header'>
					        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
					        	<span aria-hidden='true'>&times;</span>
					        </button>
					        <h1 class='modal-title' id='myModalLabel'>
					        		<span id='estaAqui'></span>
					        </h1>
					    </div>
					    <div class='modal-body'>
					        <b>Esse Kit contem:</b>
					        <br><br>
					    </div>
					    <div class='modal-footer'>
					    	<button type='button' class='btn btn-danger' data-dismiss='modal'>
					    		Fechar
					    	</button>
					    	 
					    	<button type='button' onclick='' class='btn btn-success' value=''>
					    		Agendar
					    	</button>
					    </div>
				    </div>
				</div>
			</div> ";
		}
	}
?>