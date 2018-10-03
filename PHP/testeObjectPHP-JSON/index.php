<?php


class Pedido{
	var $codigo;
	var $total;
	var $cliente;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}



class Cliente{
	var $codigo = 0;
	var $nome;
	var $sexo;
	var $teste = "Texte Valor Padrão";

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}


$cliente = new Cliente();
$cliente->set(1, "codigo");
$cliente->set("Jack", "nome");
$cliente->set("M", "sexo");
$cliente->set("Teste Valor", "teste");


$pedido = new Pedido();
$pedido->set(true, "codigo");
$pedido->set(150.5, "total");
$pedido->set($cliente, "cliente");


$pedidos = [];
array_push($pedidos, $pedido);


$cliente = new Cliente();
$cliente->set(null, "codigo");
$cliente->set("Joao", "nome");
$cliente->set('M', "sexo");
$cliente->set('c', "teste");


$pedido = new Pedido();
$pedido->set(151, "codigo");
$pedido->set(1500.54, "total");
$pedido->set($cliente, "cliente");



array_push($pedidos, $pedido);

echo arrayEmJson($pedidos);

/*echo gettype($cliente->get("codigo"))."<br>";


$class_vars = get_class_vars(get_class($cliente));

foreach ($class_vars as $name => $value) {
    echo "$name : $value\n";
}*/



// echo $cliente;

$cliente = array('codigo' => 1, 'nome' => 'Jack', 'sexo' => 'M');

/* echo gettype($cliente); */

$clienteJson = json_encode($cliente);

echo "<br><br>".$clienteJson;


function objectEmJson($objeto){
	$class_vars = get_class_vars(get_class($objeto));
	$arrayObjeto = [];//new array();

	foreach ($class_vars as $name => $value) {
		array_push($arrayObjeto, $name , $objeto->get($name));
	}

	$verifica = true;
	$primeiro = true;
	$stringArray = "";
	foreach ($arrayObjeto as $key => $value) {
		if ($verifica) {
			$stringArray .= $primeiro ? "{\"".$value."\":" : ",\"".$value."\":";
			$verifica = false;
		} else {
			echo gettype($value)."<br>";
			switch (gettype($value)) {
				case 'string':
					$stringArray .= "\"".$value."\"";
					break;
				case 'integer':
					$stringArray .= $value;
					break;
				case 'double':
					$stringArray .= $value;
					break; 
				case 'floute':
					$stringArray .= $value;
					break;
				case 'boolean':
					$stringArray .= $value;
					break;
				case 'object':
					$stringArray .= objectEmJson($value);
					break;
				case 'array':
					$stringArray .= arrayEmJson($value);
					break;
				default:
					$stringArray .= "\"".$value."\"";
					break;
			}

			$verifica = true;
		}
		$primeiro = false;
	}
	return $stringArray."}";
}


function arrayEmJson($array){
	$stringArray = "[";
	$primeiro = true;

	foreach ($array as $key => $value) {
		switch (gettype($value)) {
			case 'string':
				$stringArray .= $primeiro ? "{\"".$key."\": \"".$value."\"}" : ",{\"".$key."\": \"".$value."\"}";
				break;
			case 'interger':
				$stringArray .= $primeiro ? "{".$key.": ".$value."}" : ",{".$key.": ".$value."}";
				break;
			case 'double':
				$stringArray .= $primeiro ? "{".$key.": ".$value."}" : ",{".$key.": ".$value."}";
				break; 
			case 'floute':
				$stringArray .= $primeiro ? "{".$key.": ".$value."}" : ",{".$key.": ".$value."}";
				break;
			case 'boolean':
				$stringArray .= $primeiro ? "{".$key.": ".$value."}" : ",{".$key.": ".$value."}";
				break;
			case 'object':
				$stringArray .= $primeiro ? objectEmJson($value) : ",".objectEmJson($value);
				break;
			case 'array':
				$stringArray .= $primeiro ? arrayEmJson($value) : ",".arrayEmJson($value);
				break;
			default:
				$stringArray .= "\"".$value."\"";
				break;
		}
		$primeiro = false;
	}
	return $stringArray."]";
}

?>