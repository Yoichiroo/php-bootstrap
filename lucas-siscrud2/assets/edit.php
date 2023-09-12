<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>.: SisCRUD :.</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<?php 
    include "nav.php";
    require_once "abre-banco.php";

    $ref = $_REQUEST['ref'] ?? '';
    $matricula = $_REQUEST['matricula'] ?? '';
    ?>
<body>
    <?php
    if (!empty($ref)) {
        $sql = "SELECT * FROM $tabela1 WHERE matricula = $ref LIMIT 1";
        $busca = $conexao -> prepare($sql);
        $busca -> setFetchMode(PDO::FETCH_ASSOC);
        $busca -> execute();
        $dados = $busca -> fetch();?>

    <div id="main" class="container-fluid">
        <br><h3 class="page-header">Editar registro do Aluno - <?php echo $ref;?></h3>
        <!-- Área de campos do formulário de edição-->

        <form action="update.php" method="post" onsubmit="confirm('Confirma as alterações abaixo?')">

        <!-- 1ª LINHA -->	
        <div class="row"> 
            <div class="form-group col-md-2">
                <label for="matricula">Matrícula</label>
                <input type="hidden" name="ref" value="<?=$ref?>">
                <input type="text" class="form-control" name="matricula" value="<?=$ref?>">
            </div>
            <div class="form-group col-md-5">
                <label for="nome">Nome Completo</label>
                <input type="text" class="form-control" name="nome_aluno" value="<?=$dados['nome_aluno']?>">
            </div>
            <div class="form-group col-md-3">
                <label for="dt_nasc">Data Nascimento</label>
                <input type="text" class="form-control" name="dt_nasc" value="<?php echo date('d/m/Y', strtotime($dados["dt_nasc"])); ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="sexo">Sexo</label>
                <select class="form-control" name="sexo_aluno">
                    <?php 
                    if($dados["sexo_aluno"]=="M") 
                        echo '<option selected="selected" value="M">Masculino</option><option value="F">Feminino</option>'; 
                    else 
                        echo '<option value="M">Masculino</option><option selected="selected" value="F">Feminino</option>'; 
                    ?>
                </select>
            </div>
        </div>
        <!-- 2ª LINHA -->
        <div class="row"> 
            <div class="form-group col-md-6">
                <label for="nome_pai">Nome do Pai</label>
                <input type="text" class="form-control" name="nome_pai" value="<?php echo $dados["nome_pai"]; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="nome_mae">Nome da Mãe</label>
                <input type="text" class="form-control" name="nome_mae" value="<?php echo $dados["nome_mae"]; ?>">
            </div>
        </div>
        <!-- 3ª LINHA -->
        <div class="row"> 
            <div class="form-group col-md-4">
                <label for="rg">RG</label>
                <input type="text" class="form-control" name="rg_aluno" value="<?php echo $dados["rg_aluno"]; ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf_aluno" value="<?php echo $dados["cpf_aluno"]; ?>">
            </div>
        </div>
        <hr/>
        <div id="actions" class="row">
            <div class="col-md-12">
                <a href="../index.php" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>
        </div>
    </div>
    <?php
        } else {
            echo "<p>Por favor, preencha todos os campos e tente novamente.</p>";
        }
        require_once "fecha-banco.php";
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>