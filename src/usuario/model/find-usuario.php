<?php

    //iniciar conexão com o banco de dados
    include('../../conexao/conn.php');

    $nome=$_REQUEST['NOME'];

    //variavel array que receberá toda a consulta
    $dados = array();

    //Query de consulta ao banco de dados
    $sql = "SELECT * FROM USUARIO WHERE NOME LIKE '%$nome%' ORDER BY NOME ASC";

    //executar query
    $resultado = $pdo->query($sql);

    //verificação do retorno da consulta
    if($resultado){
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array_map('utf8_encode', $row);
        }
    }

    echo json_encode($dados);