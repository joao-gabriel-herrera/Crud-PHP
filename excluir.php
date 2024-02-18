<?php
require('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $delete_stmt = null;  
    
    if (isset($_POST["delete"])){
        if (isset($_POST["delete_id"])) {
            $delete_id = $_POST["delete_id"];
            $delete_sql = "DELETE FROM clients WHERE id = ?";
            $delete_stmt = $mysqli->prepare($delete_sql);
  
            if ($delete_stmt) {
                $delete_stmt->bind_param("i", $delete_id);
  
                if ($delete_stmt->execute()) {
                    header("Location: ".$_SERVER['PHP_SELF']);
                    exit();
                } else {
                    die("ERRO ao excluir!" . $delete_stmt->error);
                }
            } else {
                die("ERRO ao preparar a declaração de exclusão!");
            };
        };
        
    };


};

$mysqli->close();
