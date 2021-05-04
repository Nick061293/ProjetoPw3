<?php

    $hostname= "fdb30.awardspace.net";
    $dbname= "3807110_nickpw3";
    $username= "3807110_nickpw3";
    $password= "nickpw3123";

    try{
        $pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $username, $password);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'conectado'
    } catch(PDOException $e){
        echo 'Erro:'.$e-> getMessage();
    }