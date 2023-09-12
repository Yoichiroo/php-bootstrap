<?php 
    $server = 'localhost';
    $dbname = 'projetosis';
    $tabela = 'usuarios';
    $usuario = 'root';
    $senha = '';

    $conexao = new PDO("mysql:host=$server;dbname=$dbname", $usuario, $senha);
    $sql = $conexao -> prepare("SELECT * FROM $tabela ORDER BY id_usu ASC");
    $sql -> setFetchMode(PDO::FETCH_ASSOC);
    $sql -> execute();
?>