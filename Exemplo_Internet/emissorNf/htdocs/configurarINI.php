<?php
try{
	$ponteiroArq = fopen("C:/xampp/htdocs/my portable files/nfeconfig.ini","r");
	while(!feof ($ponteiroArq)){
		$linha = fgets($ponteiroArq, 4096);
		echo $linha;
	}
	fclose($ponteiroArq);

}catch(Exception $e){	
	echo $e;
}
?>