<?php


/* funcoes .php */
function criarDiretorio($diretorio){
	if(!is_dir($diretorio)){
		mkdir($diretorio, 0755);
	}
}

function copiarPasta($pastaSrc, $pastaDis){
	$files1 = scandir($dir);
	for ($i=0; $i < count($files1); $i++) { 
		if ($files1[$i] != "." && $files1[$i] != "..") {
			if (is_dir($files1[$i])) {
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
	return 1;
}

function letraMaiuscula($letra){
	switch ($letra) {
		case 'a': $letra = 'A'; break;
		case 'b': $letra = 'B'; break;
		case 'c': $letra = 'C'; break;
		case 'd': $letra = 'D'; break;
		case 'e': $letra = 'E'; break;
		case 'f': $letra = 'F'; break;
		case 'g': $letra = 'G'; break;
		case 'h': $letra = 'H'; break;
		case 'i': $letra = 'I'; break;
		case 'j': $letra = 'J'; break;
		case 'k': $letra = 'K'; break;
		case 'l': $letra = 'L'; break;
		case 'm': $letra = 'M'; break;
		case 'n': $letra = 'N'; break;
		case 'o': $letra = 'O'; break;
		case 'p': $letra = 'P'; break;
		case 'q': $letra = 'Q'; break;
		case 'r': $letra = 'R'; break;
		case 's': $letra = 'S'; break;
		case 't': $letra = 'T'; break;
		case 'u': $letra = 'U'; break;
		case 'v': $letra = 'V'; break;
		case 'w': $letra = 'W'; break;
		case 'x': $letra = 'X'; break;
		case 'y': $letra = 'Y'; break;
		case 'z': $letra = 'Z'; break;
		
		default: $letra = $letra; break;
	}
	return $letra;
}

function corretor($palavra){
	switch ($palavra) {
		case 'Descricao': $palavra = 'Descrição'; break;
		case 'descricao': $palavra = 'descrição'; break;
		
		default: $palavra = $palavra; break;
	}
	return $palavra;
}

function formatarNomeHeadTable($nome){
	$nomeVetor = explode("_",$nome);
	for ($i=0; $i < (count($nomeVetor) - 1); $i++) { 
		if ($i == 0) {
			$nome = corretor(
						letraMaiuscula(substr($nomeVetor[$i], 0, 1)).substr($nomeVetor[$i], 1, strlen($nomeVetor[$i]))
					);
		} else {
			$nome .= " ".corretor(
							letraMaiuscula(
								substr($nomeVetor[$i], 0, 1)).substr($nomeVetor[$i], 1, strlen($nomeVetor[$i])
							)
						);
		}
	}

	return $nome;
}

copiarArquivo("teste", "http://construtorabrothers.com.br/teste/up", "teste.html");


?>
