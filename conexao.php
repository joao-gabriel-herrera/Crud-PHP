<?php

$hostname="localhost";
$bancodedados="smartregistry";
$usuario="root";
$senha= "";

$mysqli=new mysqli($hostname, $usuario, $senha, $bancodedados);
if($mysqli->connect_errno){
    echo "Falha ao conectar: 
    (". $mysqli->connect_error . ") " . $mysqli ->connect_error;
};