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
                $sql = "DELETE FROM usuarios WHERE id_usu = '$ref' LIMIT 1";
                $comando = $conexao -> prepare($sql);
                try {
                    $conexao -> beginTransaction();
                    $comando -> execute();
                    $conexao -> commit();
        
                    $afetados = $comando -> rowCount();
                    if ($afetados <= 0) {
                        echo "Algo deu errado.";
                    } else {
                        echo "Ao todo foram apagados $afetados usuários.";
                    }
                } catch (Exception $e) {
                    $conexao -> rollback();
                    throw $e;
                }
            }
        ?>
    </main>
</body>
</html>