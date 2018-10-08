<?php
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
?>