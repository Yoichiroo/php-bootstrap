<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: SisCRUD :.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <?php 
        require_once 'abre-banco.php';

        $ref = $_REQUEST["ref"] ?? '';
        
        if (empty($ref)) {
            echo "<p>Erro na chamada.</p>";
        } else {
            $nome_aluno = $_REQUEST['nome_aluno'] ?? '';
            $dt_nasc = $_REQUEST["dt_nasc"] ?? '';
            $sexo_aluno = $_REQUEST["sexo_aluno"] ?? '';
            $nome_pai = $_REQUEST["nome_pai"] ?? '';
            $nome_mae = $_REQUEST["nome_mae"] ?? '';
            $rg = $_REQUEST["rg_aluno"] ?? '';
            $cpf = $_REQUEST["cpf_aluno"] ?? '';

            $sql = "UPDATE aluno SET nome_aluno = '$nome_aluno', dt_nasc = '$dt_nasc', sexo_aluno = '$sexo_aluno', nome_pai = '$nome_pai', nome_mae = '$nome_mae', rg_aluno = '$rg', cpf_aluno = '$cpf' WHERE matricula = '$ref' LIMIT 1";
    
            $comando = $conexao -> prepare($sql);
            try {
                $conexao -> beginTransaction();
                $comando -> execute();
                $conexao -> commit();
                $total_editado = $comando -> rowCount();
    
                if ($total_editado <= 0) {
                    echo "<p>Nada foi alterado, por favor, tente novamente.</p>";
                } else {
                    echo "<p>O aluno $nome_aluno foi alterado com sucesso.</p>";
                }
            } catch (Exception $e) {
                $conexao -> rollBack();
                throw $e;
            }
        }

    ?>
    <div class="col-md-12">
        <a href="../index.php" class="btn btn-secondary">Voltar</a>
    </div>
    <?php 
        require_once 'fecha-banco.php';
    ?>
</body>
</html>