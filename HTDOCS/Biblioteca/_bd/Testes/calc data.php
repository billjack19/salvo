<?php

// Declara a data! :P
$data_hj = date('Y-m-d');
echo "Data de hoje: ".$data_hj."<br><br><br><br>";
$data = '2017-02-04';

// Separa em dia, mês e ano
list($ano, $mes, $dia) = explode('-', $data);

// Descobre que dia é hoje e retorna a unix timestamp
$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
// Descobre a unix timestamp da data de nascimento do fulano
$nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

print $nascimento."<br>";
$teste = $nascimento/24;
print "nacimento /24 :" . $teste."<br>";
$teste = ($nascimento/24)/60;
print "nacimento /24/60 :" . $teste."<br><br>";
$teste = (($nascimento/24)/60)/60;
print "nacimento /24/60/60 :" . $teste."<br><br>";

// Depois apenas fazemos o cálculo já citado :)
$idade = floor(((($hoje - $nascimento) / 60) / 60) / 24);



print "Idade: ".$idade."<br><br>";
print "Data de hoje: ".$hoje."<br>";
print "Data de Hoje tbm: ".$data_hj."<br><br>";

echo date("Y-m-d", $nascimento) . "<br>";
$nascimento = strtotime("+3 days",$nascimento);
echo date("Y-m-d", $nascimento) . "<br><br><br>";

// echo date("Y-m-d h:i:sa", $nascimento) . "<br><br>";

// $nascimento = strtotime("+3 days",$nascimento);
// echo date("Y-m-d h:i:sa", $nascimento) . "<br>";




?>
