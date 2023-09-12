<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROJETOSIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    </head>
    <?php 
      require_once "../gerenciamento/abre_conexao.php";
    ?>
  <body>
      <main>
          <h1>Cadastrar novo usuário</h1>
          <form action="form_cadastro_salvar.php" class="row g-3" onsubmit="confirm('Confirma a inserção do novo usuário?')">
            <div class="col-md-6">
              <label for="nome_usu" class="form-label">Nome do usuário</label>
              <input type="text" class="form-control" id="nome_usu" name="nome_usu" required maxlength="100" placeholder="Digite seu nome completo..."> 
            </div>
            <div class="col-md-6">
              <label for="senha_usu" class="form-label">Senha</label>
              <input type="password" class="form-control" id="senha_usu" name="senha_usu" required placeholder="Digite sua senha...">
            </div>
            <div class="col-md-6">
              <label for="login_usu" class="form-label">Login</label>
              <input type="text" class="form-control" id="login_usu" name="login_usu" placeholder="Digite seu login aqui...">
            </div>
            <div class="col-md-6">
              <label for="nivel_usu" class="form-label">Nível</label>
              <input type="text" class="form-control" id="nivel_usu" name="nivel_usu" placeholder="Ex: 1, 2, 3" required maxlength="1" min="1" max="3">
            </div>
            <div class="col-12">
              <input type="submit" value="Enviar" class="btn btn-primary">
              <?php 
                echo "<a href='../index.php' class='btn'>Voltar</a>";  
              ?>
            </div>
          </form>
      </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>