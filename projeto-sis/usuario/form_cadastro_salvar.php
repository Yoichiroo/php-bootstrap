<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
    <?php 
        require_once "../gerenciamento/abre_conexao.php";

        $nome_usu = $_REQUEST["nome_usu"] ?? '';
        $senha_usu = $_REQUEST["senha_usu"] ?? '';
        $login_usu = $_REQUEST["login_usu"] ?? '';
        $nivel_usu = $_REQUEST["nivel_usu"] ?? 0;
    ?>
<body>
    <main>
        <?php
            $dados = [
                'nome_usu' => $nome_usu,
                'senha_usu' => $senha_usu,
                'login_usu' => $login_usu,
                'nivel_usu' => $nivel_usu
            ];
            $sql = "INSERT INTO $tabela(`nome_usu`, `pass_usu`, `login_usu`, `nivel_usu`) VALUES (:nome_usu, :senha_usu, :login_usu, :nivel_usu)";
            $comando = $conexao -> prepare($sql);
            try {
                $conexao -> beginTransaction();
                $comando -> execute($dados);
                $conexao -> commit();
                echo "<p>O cadastro de $nome_usu foi realizado com sucesso.</p>";
            } catch (Exception $e) {
                $conexao -> rollback();
                throw $e;
                echo "<p>Algo deu errado, tente novamente.</p>";
            }
        ?>
    </main>
</body>
</html>