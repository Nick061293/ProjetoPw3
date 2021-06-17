<?php

    $hostname = "sql303.epizy.com";
    $dbname = "epiz_28840310_pw3tcc";
    $username = "epiz_28840310";
    $password = "WQKYJVwCaJe0Cpq";

    try {
        $pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo 'Conexão realizada com sucesso!';
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
    }