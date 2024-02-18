<?php
require_once('registrar.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <!-- JavaScript Bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
    <!-- CSS Projeto -->
    <link rel="stylesheet" href="./css/style.css" />
    <title>Cadastro</title>
  </head>
  <body>
    <div class="container col-11 col-md-9" id="form_container">
      <div class="row align-items-center gx-5">
        <div class="col-md-6 order-md-1">
          <h3>Faça o seu Cadastro</h3>
          <!-- Formulário -->
          <form method="post">
            <!-- Nome -->
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control"
                id="nome"
                name="nome"
                placeholder="Digite seu nome"
              />
              <label for="nome" class="form-label">Digite seu nome completo</label>
            </div>
            
            <!-- E-mail -->
            <div class="form-floating mb-3">
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Digite seu e-mail"
              />
              <label for="email" class="form-label">Digite seu e-mail</label>
            </div>
            <!-- Senha -->
            <div class="form-floating mb-3">
              <input
                type="password"
                class="form-control"
                id="senha"
                name="senha"
                placeholder="Digite sua senha"
              />
              <label for="senha" class="form-label">Digite sua senha</label>
            </div>
            <!-- Botão -->
            <div class="col-12" id="enviar">
              <input type="submit" class="btn btn-primary" value="Cadastrar" />
            </div>
          </form>
        </div>
        <!-- Imagem -->
        <div class="col-md-6 order-md-2">
          <div class="col-12">
            <div class="img-fluid img2"></div>
          </div>
          <!-- Redirecionamento -->
          <div class="col-12" id="link_container">
            <a href="index.php">Já possuo cadastro</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>