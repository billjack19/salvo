<?php
// Parametro POST
$mensagem = $_POST['mensagem'];
$destino = $_POST['destino'];


// Variaveis de Configuração
// Buscar Parametros do banco de dados
include "conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();

$sql = "SELECT * FROM parametro_sms ORDER BY id_parametro_sms DESC LIMIT 1;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
    // NÚMERO DE ORIGEM
    $origem = $dados['num_origem_parametro_sms'];
    // CLIENT_ID que é fornecido pela DirectCall (Seu e-mail)
    $client_id = $dados['client_id_parametro_sms'];
    // CLIENT_SECRET que é fornecido pela DirectCall (Código recebido por SMS)
    $client_secret = $dados['senha_parametro_sms'];
}




// INICIO
// Faz a requisicao do access_token
$req = requisicaoApi(array('client_id'=>$client_id, 'client_secret'=>$client_secret), "request_token");
//Seta uma variavel com o access_token
$access_token = $req['access_token'];
// Enviadas via POST do nosso contato.html


// Monta a mensagem
$SMS = $mensagem;
// Array com os parametros para o envio
$data = array(
    'origem'=>$origem,   // colocado: "553531141177"    // Seu numero que Ã© origem
    'destino'=>$destino, // colocado: "5535991650804"   // E o numero de destino
    'tipo'=>"texto",
    'access_token'=>$access_token,
    'texto'=>$SMS
);
// realiza o envio
// $req_sms = requisicaoApi($data, "sms/send");
echo $data['origem']."\n";
echo $data['destino']."\n";
echo $data['tipo']."\n";
echo $data['access_token']."\n";
echo $data['texto']."\n";
echo "1";
// FIM


function requisicaoApi($params, $endpoint){
    $url = "http://api.directcallsoft.com/{$endpoint}";
    $data = http_build_query($params);
    $ch =   curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $return = curl_exec($ch);
    curl_close($ch);
    // Converte os dados de JSON para ARRAY
    $dados = json_decode($return, true);
    return $dados;
}
?>