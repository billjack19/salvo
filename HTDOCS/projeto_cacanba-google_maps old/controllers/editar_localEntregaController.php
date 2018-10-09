<?php
/* editar_localEntregaController .php */

require_once "../class/entidade/Local_Entrega.php";
require_once "../class/dao/local_EntregaDAO.php";

$entidadeLocal_Entrega = new Local_Entrega();
$local_EntregaDAO = new local_EntregaDAO();

$entidadeLocal_Entrega->set($_POST['endereco'], 'endereco');
$entidadeLocal_Entrega->set($_POST['numero'], 'numero');
$entidadeLocal_Entrega->set($_POST['complemento'], 'complemento');
$entidadeLocal_Entrega->set($_POST['bairro'], 'bairro');
$entidadeLocal_Entrega->set($_POST['cidade'], 'cidade');
$entidadeLocal_Entrega->set($_POST['uf'], 'uf');
$entidadeLocal_Entrega->set($_POST['cep'], 'cep');
$entidadeLocal_Entrega->set($_POST['cliente_id'], 'cliente_id');
$entidadeLocal_Entrega->set($_POST['latitude'], 'latitude');
$entidadeLocal_Entrega->set($_POST['longitude'], 'longitude');
$entidadeLocal_Entrega->set(1, 'bool_ativo');

$retorno = $local_EntregaDAO->atualizaLocalEntrega($entidadeLocal_Entrega, $_POST['id']);
echo $retorno;
?>