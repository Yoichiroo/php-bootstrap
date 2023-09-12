<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>.: SisCRUD :.</title>
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>
    <?php
      require_once 'assets/abre-banco.php';
      include 'assets/nav.php';

      $sql_aluno = $conexao -> prepare("SELECT * FROM $tabela1 ORDER BY nome_aluno ASC");
      $sql_usuario = $conexao -> prepare("SELECT * FROM $tabela2 ORDER BY nome ASC");
      
      $sql_aluno -> setFetchMode(PDO::FETCH_ASSOC);
      $sql_usuario -> setFetchMode(PDO::FETCH_ASSOC);

      $sql_aluno -> execute();
      $sql_usuario -> execute();

      $total_aluno = $sql_aluno -> rowCount();
      $total_usuario = $sql_usuario -> rowCount();
    ?>
    <main class="container-fluid">
      <table class="table table-striped">
        <thead>
          <th>Matrícula</th>
          <th>Nome</th>
          <th>Nome do Pai</th>
          <th>Nome da Mãe</th>
          <th>Data de Nascimento</th>
          <th>Sexo</th>
          <th>RG</th>
          <th>CPF</th>
          <th colspan="3" class="text-center">Ações</th>
        </thead>
        <tbody>
      <?php 
      while ($dados = $sql_aluno -> fetch()) { ?>
        <tr class="table-active">
          <td class='d-none d-md-table-cell'><?=$dados['matricula']?></td>
          <td class='d-none d-md-table-cell'><?=$dados['nome_aluno']?></td>
          <td class='d-none d-md-table-cell'><?=$dados['nome_pai']?></td>
          <td class='d-none d-md-table-cell'><?=$dados['nome_mae']?></td>
          <td class='d-none d-md-table-cell'><?=$dados['dt_nasc']?></td>
          <td class='d-none d-md-table-cell'><?=$dados['sexo_aluno']?></td>
          <td class='d-none d-md-table-cell'><?=$dados['rg_aluno']?></td>
          <td class='d-none d-md-table-cell'><?=$dados['cpf_aluno']?></td>
          <td class='d-none d-md-table-cell'><a href="assets/edit.php?ref=<?=$dados['matricula']?>" type="button"class='btn btn-success btn-xs'>Editar</></a></td>
          <td class='d-none d-md-table-cell'><a href=""><button type="button" class="btn btn-info btn-xs">Visualizar</button></a></td>
          <td class='d-none d-md-table-cell'><a href=""><button type="button" class="btn btn-danger btn-xs">Deletar</button></a></td>
        </tr>
        <?php } ?>
        </tbody>
      </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php 
      require_once 'assets/fecha-banco.php';
    ?>
  </body>
</html>