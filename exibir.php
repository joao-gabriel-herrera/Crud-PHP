<?php
require('conexao.php');

    if (!isset($_GET['buscar'])) {
      $sql = "SELECT * FROM clients";
      $result = $mysqli->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["email"]."</td><td>".$row["contact"]."</td><td class='text-end'><form method='post'><input type='hidden' name='delete_id' value='".$row["id"]."'><button type='submit' name='delete' class='btn btn-danger'>Excluir</button></form></td><td class='ms-2 text-start'><form><input type='hidden' name='id_editar' value='".$row["id"]."'><button type='button' data-bs-toggle='modal' data-bs-target='#editarCliente' class='btn btn-warning editarCliente'>Editar</button></form></td></tr>";
        }
      } else {
        echo "<td colspan='5'>Nenhum cliente cadastrado!</td>";
      };
    };

$mysqli->close();
