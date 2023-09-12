<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROJETOSIS CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <?php
    require_once "gerenciamento/abre_conexao.php";
  ?>
  <body>
    <main>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Usuários</span>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class='btn btn-primary' role='button' href="usuario/form_cadastro_usu.php">Novo Usuário</a>
                </div>
            </div>
        </nav>
        <table class="table table-striped">
          <tr class="table-row">
            <th>Código</th>
            <th>Nome</th>
            <th>Login</th>
            <th>Senha</th>
            <th>Nível</th>
            <th>Ativo</th>
            <th>Data de Criação</th>
            <th>Ações</th>
          </tr> 
          <?php 
            while($dados = $sql -> fetch()) {
              echo "<tr>";
              echo "<td>{$dados['id_usu']}</td>";
              echo "<td>{$dados['nome_usu']}</td>";
              echo "<td>{$dados['login_usu']}</td>";
              echo "<td>{$dados['pass_usu']}</td>";
              echo "<td>{$dados['nivel_usu']}</td>";
              echo "<td>{$dados['ativo_usu']}</td>";
              echo "<td>{$dados['dt_cri_usu']}</td>";
              echo "<td><a class='btn btn-info' href='usuario/editar_usu.php?ref={$dados['id_usu']}' role='button'>Editar</a>";
              echo "<a class='btn btn-danger' href='usuario/apagar_usu.php?ref={$dados['id_usu']}' onclick='confirm('Certeza que quer apagar este usuário?')' role='button'>Apagar</a>";
              echo "<a class='btn btn-dark' role='button'>Bloquear/Ativar</a></td>";
              echo "</tr>";
            }
          ?>
        </table>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
  <?php 
    require_once "gerenciamento/fecha_conexao.php";
  ?>
</html>