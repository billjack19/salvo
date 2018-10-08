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
		}
		else if ($j == 1) {
			$cond = 't';
		}
		else if ($j == 2) {
			$cond = 'n';
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
?>