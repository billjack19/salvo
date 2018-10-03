<?php

$f = file("texto.txt");
foreach($f as $item){
	$item = explode(" | ", $item);
	if ($item[0] == 5) {
		echo $item[0] . ' - <b>' . $item[1] . '</b></br>';
	}
}

?>