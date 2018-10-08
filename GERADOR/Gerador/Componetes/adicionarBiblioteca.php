<?php

	$nomeProjeto = $_POST['nomeProjeto'];
	$biblioteca = $_POST['biblioteca'];


	criarDiretorio("../../GeradorProjetos/$nomeProjeto/app/lb/$biblioteca");
	copiarPasta("../bibliotecas/$biblioteca", "../../GeradorProjetos/$nomeProjeto/app/lb/$biblioteca");


	function criarDiretorio($diretorio){
		if(!is_dir($diretorio)){
			mkdir($diretorio, 0755);
		}
	}

	function copiarPasta($pastaSrc, $pastaDis){
		$files1 = scandir($pastaSrc);
		for ($i=0; $i < count($files1); $i++) { 
			if ($files1[$i] != "." && $files1[$i] != "..") {
				if (is_dir($pastaSrc."/".$files1[$i])) {
					criarDiretorio($pastaDis."/".$files1[$i]);
					copiarPasta($pastaSrc."/".$files1[$i], $pastaDis."/".$files1[$i]);
				} else {
					copiarArquivo($pastaSrc, $pastaDis, $files1[$i]);
				}
			}
		}
		// return 1;
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
		fwrite($myfile, $conteudo);
		fclose($myfile);
	}

	echo "Adicionado $biblioteca ao $nomeProjeto";
?>