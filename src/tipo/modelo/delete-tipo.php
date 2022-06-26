<?php

    include('../../conexao/conn.php');

    $ID = $_REQUEST['ID'];

    $SQL = " DELETE FROM TIPO WHERE ID = $ID";

    $resultado = $pdo->query($sql);

    if($resultado){
        $dados = array(
            'tipo' => 'success',
            'mensagem' => 'Registro excluído com sucesso.'
        );
    }else {
        $dados = array(
            'tipo' => 'error',
            'mensagem' => 'Não foi possível excluir o registro selecionado.'
        );
    }

    json_encode($dados);