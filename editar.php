<?php
require('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    if (isset($_POST["contatoEdit"]) && isset($_POST['nomeEdit']) && isset($_POST['emailEdit'])&& isset($_POST['IdClient'])){
        $contato = $_POST["contatoEdit"];
        $email = $_POST["emailEdit"];
        $nome = $_POST["nomeEdit"];
        $IdClient = $_POST["IdClient"];
       
        if (!empty($contato) && !empty($email) && !empty($nome)) {
            $sql = "UPDATE clients SET username = ?, contact = 
            ?, email = ? WHERE id = $IdClient";
            
            $stmt = $mysqli->prepare($sql);

            $stmt->bind_param("sss" , $nome, $contato, $email);

            if ($stmt->execute()) {
                header("Location: ".$_SERVER['PHP_SELF']);
                exit();
            } else {
                die("ERRO ao inserir!" . $stmt->error);
            }

        } else {
            echo "<script>alert('Por favor, preencha todos os campos obrigatórios.')</script>";
        };
    };
};

$mysqli->close();


