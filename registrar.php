<?php
require('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $verifica_email = "SELECT * FROM users WHERE email = ?";
    $stmt_verifica_email = $mysqli->prepare($verifica_email);
    $stmt_verifica_email->bind_param('s', $email);
    $stmt_verifica_email->execute();
    $stmt_verifica_email->store_result();

    if ($stmt_verifica_email->num_rows > 0) {
        echo "<script>alert('E-mail já cadastrado. Por favor, escolha outro e-mail.'); window.location.href='cadastrar.php';</script>";
        exit();
    }

    $stmt_verifica_email->close();

    $sql = "INSERT INTO users (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param('sss', $nome, $email, $senha);

    $stmt->execute();

    if ($stmt->errno) {
        echo 'Não foi possível cadastrar usuário: ' . $stmt->errno;
        exit();
    } else {
        echo "<script>alert('Cadastro efetuado com sucesso!'); window.location.href='index.php';</script>";
    }

    $stmt->close();
};
   
$mysqli->close();


