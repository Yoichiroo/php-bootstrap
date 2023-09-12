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
    <main>
        <?php 
            if(empty($ref)) {
                echo "<p>Algo deu errado.</p>";
            } else {
                $nome_usu = $_REQUEST["nome_usu"] ?? '';
                $login_usu = $_REQUEST["login_usu"] ?? '';
                $senha_usu = $_REQUEST["senha_usu"] ?? '';
                $nivel_usu = $_REQUEST["nivel_usu"] ?? 0;
        
                $sql = "UPDATE usuarios SET nome_usu = '$nome_usu', login_usu = '$login_usu', pass_usu = '$senha_usu', nivel_usu = '$nivel_usu' WHERE id_usu = '$ref' LIMIT 1";
        
                $comando = $conexao -> prepare($sql);
                try {
                    $conexao -> beginTransaction();
                    $comando -> execute();
                    $conexao -> commit();
                    $afetados = $comando -> rowCount();
        
                    if($afetados <= 0) {
                        echo "<p>Algo deu errado e nada foi alterado.</p>";
                    } else {
                        echo "<p>Usuário $nome_usu foi alterado com sucesso.</p>";
                        echo "<a href='../index.php' class='btn'>Voltar</a>";  
                    }
                } catch (Exception $e) {
                    $conexao -> rollBack();
                    throw $e;
                }   
            }
        ?>
    </main>    
</body>
</html>