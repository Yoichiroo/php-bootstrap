<?php 
    $dbname = 'siscrud2';
    $tabela1 = 'aluno';
    $tabela2 = 'usuario';
    $server = 'localhost';
    $user = 'root';
    $pass = '';

    $conexao = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
?>