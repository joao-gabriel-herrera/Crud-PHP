<?php
require('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
  if (isset($_POST["contato"]) && isset($_POST['email']) && isset($_POST['nome'])){
      $contato = $_POST["contato"];
      $email = $_POST["email"];
      $nome = $_POST["nome"];

     
      if (!empty($contato) && !empty($email) && !empty($nome)) {
          $sql = "INSERT INTO clients (username, email, contact) VALUES (?, ?, ?)";
          $stmt = $mysqli->prepare($sql);

          $stmt->bind_param("sss", $nome, $email, $contato);

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
