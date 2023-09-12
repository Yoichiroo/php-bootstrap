<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROJETOSIS CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
  </head>
<?php 
    require_once "../gerenciamento/abre_conexao.php";
    $ref = $_REQUEST["ref"] ?? "";
?>
<body>
    <?php 
        if (empty($ref)) {
            echo "<p>Algo deu errado, tente novamente.</p>";
        } else {
            $sql = "SELECT * FROM $tabela WHERE id_usu = '$ref' LIMIT 1";
            $comando = $conexao -> prepare($sql);
            $comando -> setFetchMode(PDO::FETCH_ASSOC);
            $comando -> execute();

            $total = $comando -> rowCount();

            if ($total <= 0) {
                echo "<p>&#x274C; O usuário $ref não foi encontrado.</p>";
            } else {
                $dados = $comando -> fetch();
        }
    ?>
    <main>
        <h1>Editar usuário</h1>
        <form action="update.php" class="row g-3" onsubmit="confirm('Confirma a edição do usuário?')">
        <input type="hidden" name="ref" value="<?=$ref?>">
        
        <div class="col-md-6">
            <label for="nome_usu" class="form-label">Nome do usuário</label>
            <input type="text" class="form-control" id="nome_usu" name="nome_usu" required maxlength="100" placeholder="Digite seu nome completo..." value="<?=$dados['nome_usu']?>"> 
        </div>
        <div class="col-md-6">
            <label for="senha_usu" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha_usu" name="senha_usu" required placeholder="Digite sua senha..." value="<?=$dados['pass_usu']?>">
        </div>
        <div class="col-md-6">
            <label for="login_usu" class="form-label">Login</label>
            <input type="text" class="form-control" id="login_usu" name="login_usu" placeholder="Digite seu login aqui..." value="<?=$dados['login_usu']?>">
        </div>
        <div class="col-md-6">
            <label for="nivel_usu" class="form-label">Nível</label>
            <input type="text" class="form-control" id="nivel_usu" name="nivel_usu" placeholder="Ex: 1, 2, 3" required maxlength="1" min="1" max="3" value="<?=$dados['nivel_usu']?>">
        </div>
        <div class="col-12">
            <input type="submit" value="Editar" class="btn btn-warning">
            <?php 
                echo "<a href='../index.php' class='btn'>Voltar</a>";  
            ?>
        </div>
        </form>
    </main>
    <?php } ?>
</body>
</html>