<?php
require('conexao.php');

session_start();

$erro_p = null;
$erro_e = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $mysqli->real_escape_string($_POST["email"]);
        $password = $mysqli->real_escape_string($_POST["password"]);

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
      
          if (password_verify($password, $row["senha"])) {
              $_SESSION['email'] = $row['email'];
              $_SESSION['nome'] = $row['nome'];
              header("Location: gerencial.php");
              exit();
          } else {
              unset($_SESSION["email"]);
              $erro_p = 'Senha incorreta';
          }
      } else {
          $erro_e = 'E-mail não encontrado';
      }
    }
}

$mysqli->close();