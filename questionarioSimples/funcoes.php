<?php

function toJson($variavel){
	// header('Content-type: text/html; charset=ISO-8859-1');
	$resultado = $variavel;
		 if(gettype($variavel) == 'object') $resultado = objectEmJson($variavel);
	else if(gettype($variavel) == 'array' ) $resultado = arrayEmJson($variavel);

	return $resultado;
}

function objectEmJson($objeto){
	$class_vars = get_class_vars(get_class($objeto));
	$arrayObjeto = array();
	// $arrayObjeto = [];

	foreach ($class_vars as $name => $value) {
		array_push($arrayObjeto, $name , $objeto->get($name));
	}

	$verifica = true;
	$primeiro = true;
	$stringArray = "";
	$preStringArray = "";
	$oldValue = "teste";
	foreach ($arrayObjeto as $key => $value) {
		if ($verifica) {
			if($primeiro) 	$preStringArray = "{\"".$value."\":";
			else 			$preStringArray = ",\"".$value."\":";
			$verifica = false;
		} else {
			switch (gettype($value)) {
				case 'string':
					$stringArray .= $preStringArray."\"".$value."\"";
					break;
				case 'integer':
					$stringArray .= $preStringArray.$value;
					break;
				case 'double':
					$stringArray .= $preStringArray.$value;
					break; 
				case 'floute':
					$stringArray .= $preStringArray.$value;
					break;
				case 'boolean':
					$stringArray .= $value ? $preStringArray."1" : $preStringArray."0";
					break;
				case 'object':
					$stringArray .= $preStringArray.objectEmJson($value);
					break;
				case 'array':
					$stringArray .= $preStringArray.arrayEmJson($value);
					break;
				case 'NULL':
					// $stringArray .= $preStringArray.arrayEmJson($value); 
					break;
				default:
					$stringArray .= $preStringArray."\"".$value."\"";
			}
			if (gettype($value) != 'NULL') $primeiro = false;
			$verifica = true;
		}
	}
	return $stringArray."}";
}


function arrayEmJson($array){
	$stringArray = "[";
	$primeiro = true;

	foreach ($array as $key => $value) {
		switch (gettype($value)) {
			case 'string':
				if($primeiro) 	$stringArray .= "\"".$value."\"";
				else 			$stringArray .= ",\"".$value."\"";
				break;
			case 'interger':
				if($primeiro)	$stringArray .= $value;
				else 			$stringArray .= ",".$value;
				break;
			case 'int':
				if($primeiro)	$stringArray .= $value;
				else 			$stringArray .= ",".$value;
				break;
			case 'double':
				if($primeiro) 	$stringArray .= $value;
				else 			$stringArray .= ",".$value;
				break; 
			case 'float':
				if($primeiro)	$stringArray .= $value;
				else 			$stringArray .= ",".$value;
				break;
			case 'boolean':
				if($value)		$value = "1";
				else 			$value = "0";
				if($primeiro) 	$stringArray .= $value;
				else 			$stringArray .= ",".$value;
				break;
			case 'object':
				if($primeiro) 	$stringArray .= objectEmJson($value);
				else 			$stringArray .= ",".objectEmJson($value);
				break;
			case 'array':
				if($primeiro)	$stringArray .= arrayEmJson($value);
				else 			$stringArray .= ",".arrayEmJson($value);
				break;
			default:
				$stringArray .= "\"".$value."\"";
				break;
		}
		$primeiro = false;
	}
	return $stringArray."]";
}



/** FUNÇÕES COM DATAS */
function formataDatUN($dataUN){
	return implode("/", array_reverse(explode("-", $dataUN)));
	// return $dataUN[2] . "/" . $dataUN[1] . "/" . $dataUN[0];
}

function formataDataBR($dataBR){
	return implode("-", array_reverse(explode("/", $dataUN)));
}

function formatarDataMes($dataBR){
	$dataBR = explode('/', $dataBR);
	return retornaMes($dataBR[1], 'abr') . "/" . $dataBR[2];
}

function formatarDataMesUN($dataUN){
	// echo "\n".$dataUN;
	$dataUN = explode('-', $dataUN);
	return  $dataUN[0] . "-" . retornaMes($dataUN[1], 'abr');
}

function formatarDataPadraoAmericano($data){
		 if(strpos($data, '.'))  		return implode('-', array_reverse(explode('.', $data)));
	else if(strpos($data, '/'))			return implode('-', array_reverse(explode('/', $data)));
	else 								return $data;
}


function retornaMes($mes, $tipo){
	switch($mes){
		case  1:  	$mes = $tipo == 'abr' ? 'Jan' : 'Janeiro'; 		break;
		case  2:  	$mes = $tipo == 'abr' ? 'Fev' : 'Fevereiro'; 	break;
		case  3:  	$mes = $tipo == 'abr' ? 'Mar' : 'Março'; 		break;
		case  4:  	$mes = $tipo == 'abr' ? 'Abr' : 'Abril'; 		break;
		case  5:  	$mes = $tipo == 'abr' ? 'Mai' : 'Maio'; 		break;
		case  6:  	$mes = $tipo == 'abr' ? 'Jun' : 'Junho'; 		break;
		case  7:  	$mes = $tipo == 'abr' ? 'Jul' : 'Junlho'; 		break;
		case  8:  	$mes = $tipo == 'abr' ? 'Ago' : 'Agosto'; 		break;
		case  9:  	$mes = $tipo == 'abr' ? 'Set' : 'Setembro'; 	break;
		case 10:  	$mes = $tipo == 'abr' ? 'Out' : 'Outubro'; 		break;
		case 11:  	$mes = $tipo == 'abr' ? 'Nov' : 'Novembro'; 	break;
		case 12:  	$mes = $tipo == 'abr' ? 'Dez' : 'Dezembro'; 	break;
	}
	return $mes;
}




function ordernarArray($array){
	for ($i=0; $i < sizeof($array); $i++) { 
		$dataAtual = $array[$i];
		for ($x=$i+1; $x < sizeof($array); $x++) { 
			if ($dataAtual > $array[$x]) {
				$novaData = $dataAtual;
				$array[$i] = $array[$x];
				$dataAtual = $array[$x];
				$array[$x] = $novaData;
			}
		}
	}
	return $array;
}


function removerEspacoDuplo($str){
	while(strpos($str,"  ")) $str = str_replace("  ", " ", $str);
	return $str;
}



function formataParaQuery($texto, $tabelaSql, $campoSql){
	$texto = explode(" ", $texto);
	// if (sizeof($texto) > 1) {
		$descricaoCompleta = "";
		for ($i=0; $i < sizeof($texto); $i++) { 
			if ($texto[$i] != "") {
				// $descricaoCompleta .= $descricaoCompleta == "(" ? 
					// "$tabelaSql.$campoSql LIKE '%" . mb_strtoupper($texto[$i]) . "%'" : 
					// " OR $tabelaSql.$campoSql LIKE '%" . mb_strtoupper($texto[$i]) . "%'";
				if ($campoSql == "DS_MARCA"){
					$descricaoCompleta .= "
						$tabelaSql.$campoSql LIKE '%' || UPPER('" . $texto[$i] . "') || '%'";
				} else if($campoSql == "SIGLA_MARCA") {
					$descricaoCompleta .= "
						OR $tabelaSql.$campoSql LIKE '%' || UPPER('" . $texto[$i] . "') || '%'";
				} else {
					$descricaoCompleta .= "
						AND $tabelaSql.$campoSql LIKE '%' || UPPER('" . $texto[$i] . "') || '%'";
				}
			}
		}
		$texto = $descricaoCompleta; // .")";
	// } else {
		// $texto = $texto[0];
		// if($texto == "") 	$texto = "($tabelaSql.$campoSql LIKE '%%' OR COALESCE($tabelaSql.$campoSql, '0') = '0')";
		// else 				$texto = " $tabelaSql.$campoSql LIKE '%" . mb_strtoupper($texto) . "%'";
	// }
	return $texto;
}




function sanitizeString($str) {
	header('Content-type: text/html; charset=ISO-8859-1');
	$str = preg_replace('/[áàãâä]/ui', 'a', $str);
	$str = preg_replace('/[éèêë]/ui', 'e', $str);
	$str = preg_replace('/[íìîï]/ui', 'i', $str);
	$str = preg_replace('/[óòõôö]/ui', 'o', $str);
	$str = preg_replace('/[úùûü]/ui', 'u', $str);
	$str = preg_replace('/[ç]/ui', 'c', $str);
	$str = preg_replace('/[ñ]/ui', 'n', $str);
	$str = preg_replace('/[ýÿ]/ui', 'y', $str);
	// $str = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
	$str = preg_replace('/[^a-z0-9]/i', ' ', $str);
	$str = preg_replace('/_+/', ' ', $str); 
	return $str;
}


function retirarAcento($texto){
	// header('Content-type: text/html; charset=ISO-8859-1');
	$texto = str_replace("À", "A", $texto);
	$texto = str_replace("Á", "A", $texto);
	$texto = str_replace("Â", "A", $texto);
	$texto = str_replace("Ã", "A", $texto);
	$texto = str_replace("Ä", "A", $texto);
	$texto = str_replace("È", "E", $texto);
	$texto = str_replace("É", "E", $texto);
	$texto = str_replace("Ê", "E", $texto);
	$texto = str_replace("Ë", "E", $texto);
	$texto = str_replace("Ì", "I", $texto);
	$texto = str_replace("Í", "I", $texto);
	$texto = str_replace("Î", "I", $texto);
	$texto = str_replace("Ï", "I", $texto);
	$texto = str_replace("Ò", "O", $texto);
	$texto = str_replace("Ó", "O", $texto);
	$texto = str_replace("Ô", "O", $texto);
	$texto = str_replace("Õ", "O", $texto);
	$texto = str_replace("Ö", "O", $texto);
	$texto = str_replace("Ù", "U", $texto);
	$texto = str_replace("Ú", "U", $texto);
	$texto = str_replace("Û", "U", $texto);
	$texto = str_replace("Ü", "U", $texto);

	$texto = str_replace("â", "a", $texto);
	$texto = str_replace("á", "a", $texto);
	$texto = str_replace("à", "a", $texto);
	$texto = str_replace("ã", "a", $texto);
	$texto = str_replace("ä", "a", $texto);
	$texto = str_replace("ê", "e", $texto);
	$texto = str_replace("é", "e", $texto);
	$texto = str_replace("è", "e", $texto);
	$texto = str_replace("ë", "e", $texto);
	$texto = str_replace("î", "i", $texto);
	$texto = str_replace("í", "i", $texto);
	$texto = str_replace("ì", "i", $texto);
	$texto = str_replace("ï", "i", $texto);
	$texto = str_replace("õ", "o", $texto);
	$texto = str_replace("ô", "o", $texto);
	$texto = str_replace("ó", "o", $texto);
	$texto = str_replace("ò", "o", $texto);
	$texto = str_replace("ö", "o", $texto);
	$texto = str_replace("û", "u", $texto);
	$texto = str_replace("ú", "u", $texto);
	$texto = str_replace("ù", "u", $texto);
	$texto = str_replace("ü", "u", $texto);


	$texto = str_replace("Ç", "C", $texto);
	$texto = str_replace("Ñ", "N", $texto);
	$texto = str_replace("Ý", "Y", $texto);

	$texto = str_replace("ç", "c", $texto);
	$texto = str_replace("ñ", "n", $texto);
	$texto = str_replace("ý", "y", $texto);
	$texto = str_replace("ÿ", "y", $texto);


	$texto = str_replace("nº", ",", $texto);
	$texto = str_replace("Nº", ",", $texto);
	$texto = str_replace("'", "", $texto);
	$texto = str_replace("ª", "", $texto);
	$texto = str_replace("º", "^0", $texto);
	$texto = str_replace("%", "", $texto);
	$texto = str_replace("&", "", $texto);

	$texto = str_replace("§", "", $texto);
	$texto = str_replace("°", "^0", $texto);
	$texto = str_replace("€", "", $texto);

	$texto = str_replace("•", "", $texto);
	$texto = str_replace("¤", "", $texto);
	$texto = str_replace("¶", "", $texto);
	$texto = str_replace("#", "", $texto);
	$texto = str_replace("$", "", $texto);
	// $texto = str_replace(":", "", $texto);
	$texto = str_replace("<", "", $texto);
	$texto = str_replace(">", "", $texto);
	$texto = str_replace("?", "", $texto);
	$texto = str_replace("^", "", $texto);
	$texto = str_replace("`", "", $texto);
	$texto = str_replace("{", "", $texto);
	$texto = str_replace("|", "", $texto);
	$texto = str_replace("}", "", $texto);
	$texto = str_replace("~", "", $texto);
	$texto = str_replace("æ", "", $texto);
	$texto = str_replace("Æ", "", $texto);
	$texto = str_replace("ø", "", $texto);
	$texto = str_replace("£", "", $texto);
	$texto = str_replace("Ø", " diametro ", $texto);
	$texto = str_replace("×", "", $texto);
	$texto = str_replace("ƒ", "", $texto);
	$texto = str_replace("¿", "", $texto);
	$texto = str_replace("®", "", $texto);
	$texto = str_replace("¬", "", $texto);
	$texto = str_replace("½", "", $texto);
	$texto = str_replace("¼", "", $texto);
	$texto = str_replace("¡", "", $texto);
	$texto = str_replace("«", "", $texto);
	$texto = str_replace("»", "", $texto);
	$texto = str_replace("©", "", $texto);
	$texto = str_replace("¢", "", $texto);
	$texto = str_replace("¥", "", $texto);
	$texto = str_replace("ð", "", $texto);
	$texto = str_replace("Ð", "", $texto);
	$texto = str_replace("¯", "", $texto);
	$texto = str_replace("ß", "", $texto);
	$texto = str_replace("µ", "", $texto);
	$texto = str_replace("Þ", "", $texto);
	$texto = str_replace("þ", "", $texto);
	$texto = str_replace("´", "", $texto);
	$texto = str_replace("±", "", $texto);
	$texto = str_replace("¾", "", $texto);
	$texto = str_replace("÷", "", $texto);
	$texto = str_replace("¸", "", $texto);
	$texto = str_replace("°", "", $texto);
	$texto = str_replace("¨", "", $texto);
	$texto = str_replace("¹", "^1", $texto);
	$texto = str_replace("²", "^2", $texto);
	$texto = str_replace("³", "^3", $texto);
	$texto = str_replace("¦", "", $texto);

	return $texto;
}





function decodificarUtf8($texto){
	$texto = str_replace("â‚¬", "€", $texto);
	$texto = str_replace("â€š", "‚", $texto);
	$texto = str_replace("â€ž", "„", $texto);
	$texto = str_replace("â€¦", "…", $texto);
	$texto = str_replace("â€¡", "‡", $texto);
	$texto = str_replace("â€°", "‰", $texto);
	$texto = str_replace("â€¹", "‹", $texto);
	$texto = str_replace("â€˜", "‘", $texto);
	$texto = str_replace("â€™", "’", $texto);
	$texto = str_replace("â€œ", "“", $texto);
	$texto = str_replace("â€¢", "•", $texto);
	$texto = str_replace("â€“", "–", $texto);
	$texto = str_replace("â€”", "—", $texto);
	$texto = str_replace("â„¢", "™", $texto);
	$texto = str_replace("â€º", "›", $texto);

	$texto = str_replace("Ã€", "À", $texto);
	$texto = str_replace("Ã‚", "Â", $texto);
	$texto = str_replace("Æ’", "ƒ", $texto);
	$texto = str_replace("Ãƒ", "Ã", $texto);
	$texto = str_replace("Ã„", "Ä", $texto);
	$texto = str_replace("Ã…", "Å", $texto);
	$texto = str_replace("â€", "†", $texto);
	$texto = str_replace("Ã†", "Æ", $texto);
	$texto = str_replace("Ã‡", "Ç", $texto);
	$texto = str_replace("Ë†", "ˆ", $texto);
	$texto = str_replace("Ãˆ", "È", $texto);
	$texto = str_replace("Ã‰", "É", $texto);
	$texto = str_replace("ÃŠ", "Ê", $texto);
	$texto = str_replace("Ã‹", "Ë", $texto);
	$texto = str_replace("Å’", "Œ", $texto);
	$texto = str_replace("ÃŒ", "Ì", $texto);
	$texto = str_replace("Å½", "Ž", $texto);
	$texto = str_replace("ÃŽ", "Î", $texto);
	$texto = str_replace("Ã‘", "Ñ", $texto);
	$texto = str_replace("Ã’", "Ò", $texto);
	$texto = str_replace("Ã“", "Ó", $texto);
	$texto = str_replace("â€", "”", $texto);
	$texto = str_replace("Ã”", "Ô", $texto);
	$texto = str_replace("Ã•", "Õ", $texto);
	$texto = str_replace("Ã–", "Ö", $texto);
	$texto = str_replace("Ã—", "×", $texto);
	$texto = str_replace("Ëœ", "˜", $texto);
	$texto = str_replace("Ã˜", "Ø", $texto);
	$texto = str_replace("Ã™", "Ù", $texto);
	$texto = str_replace("Å¡", "š", $texto);
	$texto = str_replace("Ãš", "Ú", $texto);
	$texto = str_replace("Ã›", "Û", $texto);
	$texto = str_replace("Å“", "œ", $texto);
	$texto = str_replace("Ãœ", "Ü", $texto);
	$texto = str_replace("Å¾", "ž", $texto);
	$texto = str_replace("Ãž", "Þ", $texto);
	$texto = str_replace("Å¸", "Ÿ", $texto);
	$texto = str_replace("ÃŸ", "ß", $texto);
	$texto = str_replace("Â¡", "¡", $texto);
	$texto = str_replace("Ã¡", "á", $texto);
	$texto = str_replace("Â¢", "¢", $texto);
	$texto = str_replace("Ã¢", "â", $texto);
	$texto = str_replace("Â£", "£", $texto);
	$texto = str_replace("Ã£", "ã", $texto);
	$texto = str_replace("Â¤", "¤", $texto);
	$texto = str_replace("Ã¤", "ä", $texto);
	$texto = str_replace("Â¥", "¥", $texto);
	$texto = str_replace("Ã¥", "å", $texto);
	$texto = str_replace("Â¦", "¦", $texto);
	$texto = str_replace("Ã¦", "æ", $texto);
	$texto = str_replace("Â§", "§", $texto);
	$texto = str_replace("Ã§", "ç", $texto);
	$texto = str_replace("Â¨", "¨", $texto);
	$texto = str_replace("Ã¨", "è", $texto);
	$texto = str_replace("Â©", "©", $texto);
	$texto = str_replace("Ã©", "é", $texto);
	$texto = str_replace("Âª", "ª", $texto);
	$texto = str_replace("Ãª", "ê", $texto);
	$texto = str_replace("Â«", "«", $texto);
	$texto = str_replace("Ã«", "ë", $texto);
	$texto = str_replace("Â¬", "¬", $texto);
	$texto = str_replace("Ã¬", "ì", $texto);
	$texto = str_replace("Â®", "®", $texto);
	$texto = str_replace("Ã®", "î", $texto);
	$texto = str_replace("Â¯", "¯", $texto);
	$texto = str_replace("Ã¯", "ï", $texto);
	$texto = str_replace("Â°", "°", $texto);
	$texto = str_replace("Ã°", "ð", $texto);
	$texto = str_replace("Â±", "±", $texto);
	$texto = str_replace("Ã±", "ñ", $texto);
	$texto = str_replace("Â²", "²", $texto);
	$texto = str_replace("Ã²", "ò", $texto);
	$texto = str_replace("Â³", "³", $texto);
	$texto = str_replace("Ã³", "ó", $texto);
	$texto = str_replace("Â´", "´", $texto);
	$texto = str_replace("Ã´", "ô", $texto);
	$texto = str_replace("Âµ", "µ", $texto);
	$texto = str_replace("Ãµ", "õ", $texto);
	$texto = str_replace("Â¶", "¶", $texto);
	$texto = str_replace("Ã¶", "ö", $texto);
	$texto = str_replace("Â·", "·", $texto);
	$texto = str_replace("Ã·", "÷", $texto);
	$texto = str_replace("Â¸", "¸", $texto);
	$texto = str_replace("Ã¸", "ø", $texto);
	$texto = str_replace("Â¹", "¹", $texto);
	$texto = str_replace("Ã¹", "ù", $texto);
	$texto = str_replace("Âº", "º", $texto);
	$texto = str_replace("Ãº", "ú", $texto);
	$texto = str_replace("Â»", "»", $texto);
	$texto = str_replace("Ã»", "û", $texto);
	$texto = str_replace("Â¼", "¼", $texto);
	$texto = str_replace("Ã¼", "ü", $texto);
	$texto = str_replace("Â½", "½", $texto);
	$texto = str_replace("Ã½", "ý", $texto);
	$texto = str_replace("Â¾", "¾", $texto);
	$texto = str_replace("Ã¾", "þ", $texto);
	$texto = str_replace("Â¿", "¿", $texto);
	$texto = str_replace("Ã¿", "ÿ", $texto);
	$texto = str_replace("Å",  "Š", $texto);

	$texto = str_replace("Ã­", "í", $texto);
	$texto = str_replace("Ã", "Á", $texto);
	$texto = str_replace("Ã", "à", $texto);
	$texto = str_replace("Ã", "Ý", $texto);
	$texto = str_replace("Ã", "Í", $texto);
	$texto = str_replace("Ã", "Ï", $texto);
	$texto = str_replace("Ã", "Ð", $texto);

	return $texto;
}
?>