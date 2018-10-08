<?php
$data = date('Y-m-d');
$timestamp = strtotime($data . "-1 days");
echo "Antes:".date('Y-m-d', $timestamp).'<br>';
$timestamp = strtotime($data . "+2 days");
echo "Depois:".date('Y-m-d', $timestamp);
?>