<?php
require('conexao.php');

$idCliente = $mysqli->real_escape_string($_GET['id']);
$sql = "SELECT * FROM clients WHERE id = '$idCliente'";
$result = $mysqli->query($sql) or die("ERRO ao consultar!" . $mysqli->error);

if ($result) {
    if ($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
        
        echo json_encode($cliente);
    };
};
$mysqli->close();
