<?php

    //conexão com o bd
    include('../../conexao/conn.php');
    //pegar dados do form pelo request
    $requestData = $_REQUEST;

    if(empty($requestData['nome'])){
        //caso tenha campos faltando
        $dados = array(
            'tipo' => 'error',
            'mensagem' => 'Existe(m) campo(s) obrigatórios não preenchidos.'
        );
    } else {
        //caso n tenha campo vazio
        $ideixo = isset($requestData['ideixo']) ? $requestData['ideixo'] : '';
        $op = isser($requestData['operacao']) ? $requestData['operacao'] : '';
        //verificar possibilidade de novo registro
        if($op == 'insert'){
            //prepara comando INSERT para ser executado
            try{
                $stmt = $pdo->prepare('INSERT INTO EIXO(nome) VALUES (:nome)');
                $stmt = execute(array(
                    'nome' => utf8_decode($requestData['nome'])
                ));
                $dados = array(
                    "tipo" => 'success',
                    "mensagem" => 'Eixo cadastrado com sucesso.'
                );
            } catch(PEDOException $e){
                $dados = array(
                    "tipo" => 'Error',
                    "mensagem" => 'Falha no cadastro do eixo.'
                );
            }
        } els{
            //se $op estiver vazia, gerar script de update
            try{
                $stmt = $pdo -> prepare('UPDATE eixo SET nome = :nome WHERE ideixo = :id');
                $stmt -> execute(array(
                    ':id' => $ideixo, 
                    ':nome' => utf8_decode($requestData['nome'])
                ));
                $dados = array(
                    "tipo" => 'success',
                    "mensagem" => 'Eixo atualizado!'
                );
            } catch(PEDOException $e){
                $dados = array(
                    "tipo" => 'Error',
                    "mensagem" => 'Falha na atualização do eixo.'
                )
            }
        }
    }