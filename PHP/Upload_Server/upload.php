<?php

$pastaOrigem = "file:///C:\Users\Jack\Downloads\\".$_POST['pastaSrc'];
$pastaDestino = "../";

// $pastaDestino = "../".$_POST['pastaSrc'];
// criarDiretorio($pastaDestino);

copiarPasta($pastaOrigem, $pastaDestino);


function criarDiretorio($diretorio){
	if(!is_dir($diretorio)){
		mkdir($diretorio, 0755);
	}
}

function copiarPasta($pastaSrc, $pastaDis){
	$files1 = scandir($pastaSrc);
	for ($i=0; $i < count($files1); $i++) { 
		echo "\$files1[\$i]".$files1[$i]."<br>"; 
		if ($files1[$i] != "." && $files1[$i] != "..") {
			if (is_dir($pastaSrc."/".$files1[$i])) {
				criarDiretorio($pastaDis."/".$files1[$i]);
				copiarPasta($pastaSrc."/".$files1[$i], $pastaDis."/".$files1[$i]);
			} else {
				copiarArquivo($pastaSrc, $pastaDis, $files1[$i]);
			}
		}
	}
}

function copiarArquivo($pastaSrc, $pastaDis, $nomeArquivo){
	$myfile = fopen($pastaSrc."/".$nomeArquivo, "r") or die("Unable to open file!");
	echo "<br><br><b>copiarArquivo:</b> ".$pastaSrc."/".$nomeArquivo."<br><br>";
	$arquivoCopia = fread($myfile,filesize($pastaSrc."/".$nomeArquivo));
	fclose($myfile);

	$myfile = fopen($pastaDis."/".$nomeArquivo, "w") or die("Unable to open file!");
	$txt = $arquivoCopia;
	fwrite($myfile, $txt);
	fclose($myfile);
}

function criarArquivo($nome, $conteudo){
	$myfile = fopen($nome, "w") or die("Unable to open file!");
	$txt = $conteudo;
	fwrite($myfile, $txt);
	fclose($myfile);	
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Uplord</title>
</head>
<body>

</body>
</html>