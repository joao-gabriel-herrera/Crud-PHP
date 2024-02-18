<?php
require('conexao.php');

    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($GET)) {
        if (isset($_GET['buscar'])) {
        $pesquisa = $mysqli->real_escape_string($_GET['buscar']);
        $sql = "SELECT * FROM clients WHERE username LIKE '%$pesquisa%' COLLATE utf8mb4_general_ci";
        $sql_query = $mysqli->query($sql) or die("ERRO ao consultar!" . $mysqli->error);
        
        if ($sql_query->num_rows == 0) {
            echo "<tr><td colspan='5'>Nenhum resultado encontrado</td></tr>";
        } else {
            while ($row = $sql_query->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["email"]."</td><td>".$row["contact"]."</td><td class='text-end'><form method='post'><input type='hidden' name='delete_id' value='".$row["id"]."'><button type='submit' name='delete' class='btn btn-danger'>Excluir</button></form></td><td class='ms-2 text-start'><form><input type='hidden' name='id_editar' value='".$row["id"]."'><button type='button' data-bs-toggle='modal' data-bs-target='#editarCliente' class='btn btn-warning editarCliente'>Editar</button></form></td></tr>";
            };
        };
        };
    };

$mysqli->close();

    
