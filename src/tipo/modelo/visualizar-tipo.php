<?php

    include('../../conexao/conn.php');

    //Recepção do ID a ser buscado no BD
    $ID = $_REQUEST['ID'];

    //Gerar consulta SQL no BD
    $sql = "SELECT * FROM TIPO WHERE ID = $ID";

    //Executar a query de consulta ao BD
    $resultado = $pdo->query($sql);

    //Testar nossa consulta no BD
    if($resultado){
        $result = array();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $result = array_map('utf8_encode', $row);
        }
        $dados = array(
            'tipo' => 'success',
            'mensagem' => '',
            'dados' => $result 
        );
    }else{
        $dados = array(
            'tipo' => 'error',
            'mensagem' => 'Não foi possível obter o registro solicitado',
            'dados' => array() 
        );
    }

    echo json_encode($dados);