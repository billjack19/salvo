<?php

/* movimentacaoController .php */

require_once "../class/entidade/Movimentacao.php";
require_once "../class/dao/movimentacaoDAO.php";	

$entidadeMovimentacao = new Movimentacao();
$movimentacaoDAO = new movimentacaoDAO();

$entidadeMovimentacao->set($_POST['cacamba_id'], 'cacamba_id');
$entidadeMovimentacao->set($_POST['local_entrega_id'], 'local_entrega_id');
$entidadeMovimentacao->set($_POST['situacao'], 'situacao');
$entidadeMovimentacao->set($_POST['titulo'], 'titulo');
$entidadeMovimentacao->set($_POST['valor_total'], 'valor_total');
$entidadeMovimentacao->set($_POST['emissao'], 'emissao');
$entidadeMovimentacao->set($_POST['entrega'], 'entrega');
$entidadeMovimentacao->set($_POST['retirada'], 'retirada');
$entidadeMovimentacao->set($_POST['periodo'], 'periodo');
$entidadeMovimentacao->set($_POST['confirma_carreto'], 'confirma_carreto');
$entidadeMovimentacao->set($_POST['observacao'], 'observacao');
$entidadeMovimentacao->set($_POST['flag_entrega'], 'flag_entrega');
$entidadeMovimentacao->set($_POST['flag_recolhe'], 'flag_recolhe');
$entidadeMovimentacao->set($_POST['flag_pagto'], 'flag_pagto');
$entidadeMovimentacao->set($_POST['cnpj_user'], 'cnpj_user');

echo $movimentacaoDAO->cadastraMovimentacao($entidadeMovimentacao);

?>