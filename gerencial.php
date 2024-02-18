<?php
session_start();

if (!isset($_SESSION["email"])) {
    header('Location: index.php');
}else{
  $nome_usuario = $_SESSION["nome"];
  require_once('excluir.php');
  require_once('criar.php');
  require_once('editar.php');
  require_once('buscar.php');
  require_once('deslogar.php');
};

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
    <!-- CSS Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!--  JS projeto -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src="./scripts/scripts.js"></script>
    <title>Painel gerencial</title>
  </head>
  <body>

  <div class='painel'>
      <img src="./img/logo.png" alt="Bootstrap" width="160" height="67" href="#">
      <div class="usuario">
        <p>Usuário: <?php echo "$nome_usuario";?></p>
        <form action="deslogar.php">
         <button type='submit' name='deslogar' class='btn btn-danger'>Sair</button> 
        </form>     
      </div>

  </div>


    <div class="container col-11 col-md-9" id="form_container">
    <div class='d-flex justify-content-between align-items-center'>
    <h4 class='mb-4'>Clientes</h4>
    <form style="width:500px;">
    <div class="form-floating d-flex justify-content-between" >
              <input
                type="text"
                class="form me-2 w-100"
                id="buscar"
                name="buscar"
                placeholder="Procurar cliente"
                style="border: 1px solid #dee2e6;padding:7px;height:100%;border-radius:10px;"
              />
              <button type="submit" class="btn btn-success" style="border-radius:10px;">Buscar</button>
            </div>
    </form>
    </div>
  <table class="table">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col">Contato</th>
        <th scope="col" colspan="2" class='text-center'>Ações</th>
    </tr>
    <?php require_once('exibir.php');?>
</table>
<button type="button" data-bs-toggle="modal" data-bs-target="#adicionarCliente" class='btn btn-primary' ><i class="fa-solid fa-plus" style="color: #ffffff;"></i>
 Add cliente</button>

<!-- Adicionar cliente -->
<div class="modal fade" id="adicionarCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="adicionarClienteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style='border-bottom: none;'>
        <h1 class="modal-title fs-5" id="adicionarClienteLabel">Adicionar cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post">
            <!-- Nome -->
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control"
                id="nome"
                name="nome"
                placeholder="Nome do cliente"
                style="border-bottom: 1px solid #dee2e6;"

              />
              <label for="nome" class="form-label">Nome do cliente</label>
            </div>
            
            <!-- E-mail -->
            <div class="form-floating mb-3">
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="E-mail do cliente"
                style="border-bottom: 1px solid #dee2e6;"
              />
              <label for="email" class="form-label">E-mail do cliente</label>
            </div>
            <!-- Contato -->
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control jqueryMask"
                id="contato"
                name="contato"
                placeholder="Celular do cliente"
                style="border-bottom: 1px solid #dee2e6;"

              />
              <label for="senha" class="form-label">Celular do cliente</label>
            </div>
            <div class='mt-5 d-flex justify-content-end align-items-end'>
            <button type="submit" class="btn btn-success">Adicionar cliente</button>
            <button type="button" class="btn btn-danger ms-2" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>    

<!-- Editar cliente -->
<div class="modal fade" id="editarCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarClienteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style='border-bottom: none;'>
        <h1 class="modal-title fs-5" id="editarClienteLabel">Editar cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post">
            <!-- ID -->
              <input
                type="hidden"
                name="IdClient"
                id="IdS"
              />
            <!-- Nome -->
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control"
                id="nomeE"
                name="nomeEdit"
                placeholder="Nome do cliente"
                style="border-bottom: 1px solid #dee2e6;"

              />
              <label for="nome" class="form-label">Nome do cliente</label>
            </div>
            
            <!-- E-mail -->
            <div class="form-floating mb-3">
              <input
                type="email"
                class="form-control"
                id="emailE"
                name="emailEdit"
                placeholder="E-mail do cliente"
                style="border-bottom: 1px solid #dee2e6;"
              />
              <label for="email" class="form-label">E-mail do cliente</label>
            </div>
            <!-- Contato -->
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control jqueryMask"
                id="contatoE"
                name="contatoEdit"
                placeholder="Celular do cliente"
                style="border-bottom: 1px solid #dee2e6;"

              />
              <label for="senha" class="form-label">Celular do cliente</label>
            </div>
            <div class='mt-5 d-flex justify-content-end align-items-end'>
            <button type="submit" class="btn btn-success salvarCliente">Salvar alterações</button>
            <button type="button" class="btn btn-danger ms-2" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
</div>
  </body>
</html>