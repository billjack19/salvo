<?php

// INICIO
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
 
// CLIENT_ID que é fornecido pela DirectCall (Seu e-mail)
$client_id = "thiago@cdiinfo.com.br";
// CLIENT_SECRET que é fornecido pela DirectCall (Código recebido por SMS)
$client_secret = "2899058";
// Faz a requisicao do access_token
$req = requisicaoApi(array('client_id'=>$client_id, 'client_secret'=>$client_secret), "request_token");
//Seta uma variavel com o access_token
$access_token = $req['access_token'];
// Enviadas via POST do nosso contato.html

// $nome = $_POST['nome'];
// $email = $_POST['email'];
$mensagem = $_POST['mensagem'];
// Monta a mensagem
// <{$email}>
$SMS = $mensagem;
// Array com os parametros para o envio
$data = array(
    'origem'=>"553531141177", // Seu numero que Ã© origem
    'destino'=>"5535991650804", // E o numero de destino
    'tipo'=>"texto",
    'access_token'=>$access_token,
    'texto'=>$SMS
);
// realiza o envio
$req_sms = requisicaoApi($data, "sms/send");

echo "Teste";
// FIM
?>