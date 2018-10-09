<?php

require_once "../class/entidade/Cacamba.php";
require_once "../class/dao/cacambaDAO.php";

$entidadeCacamba = new Cacamba();
$cacambaDAO = new cacambaDAO();

$entidadeCacamba->set($_POST['latidude'], 'latidude');
$entidadeCacamba->set($_POST['logitude'], 'logitude');
$entidadeCacamba->set(1, 'situacao');
$entidadeCacamba->set($_POST['titulo'], 'titulo');
$entidadeCacamba->set('c', 'tipo');
$entidadeCacamba->set($_POST['id_consumidor'], 'id_consumidor');
$entidadeCacamba->set(0, 'confirma_carreto');
$entidadeCacamba->set(0, 'flag_entrega');
$entidadeCacamba->set(0, 'flag_recolhe');
$entidadeCacamba->set(0, 'flag_pagto');

$retorno = $cacambaDAO->cadastraCacamba($entidadeCacamba);
echo $retorno;

?>