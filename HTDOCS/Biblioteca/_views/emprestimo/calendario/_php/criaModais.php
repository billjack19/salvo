<?php
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
		    <div id='corpoModal_".$cond."h".$i."' class='modal-body'>
		        Angendar:
		        <b>";
		        	include '../../_request/processaPesquisaKit3.php';
		        echo "</b> para o professor 
		        <b>";
						include '../../_request/processaPesquisaProfessor3.php';
				echo	"</b>
		        <br><br>
		   		<center>
		   			<img src='../../_imagens/livro/kit.png'>
		   		</center>
		   		<input class='ocultar' id='codigo".$cond."h".$i."' value='".$cond."h".$i."'>
		    </div>
		    <div id='rodapeModal_".$cond."h".$i."' class='modal-footer'>
		    	<button type='button' class='btn btn-danger' data-dismiss='modal'>
		    		Fechar
		    	</button>
		    	<button value=".$cond."h".$i." class='agendarTal btn btn-success' value=''>
		    		Agendar
		    	</button>
		    </div>
	    </div>
	</div>
</div>";
	}
}
?>