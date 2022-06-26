<?php

    include("../../conexao/conn.php");

    $requestData = $_REQUEST;

    //Obter as colunas que estão sendo requeridas
    $colunas = $requestData['columns'];

    //Preparar o comando SQL para obtenção dos registros existentes no BD
    $sql = "SELECT ID, NOME FROM TIPO WHERE 1=1 ";

    //Obter o total de registros existentes na tabela do BD
    $resultado = $pdo->query($sql);
    $qtdeLinhas = $resultado->rowcount();

    //Verificar se existe algum filtro determinado pelo usuário
    $filtro = $requestData['search']['value'];
    if( !empty( $filtro ) ){
        $sql .= " AND (ID LIKE '$filtro%' ";
        $sql .= " OR NOME LIKE '$filtro%') ";
    }

    //Obter o total de registros existentes na tabela do BD de acordo com o filtro
    $resultado = $pdo->query($sql);
    $totalFiltrados = $resultado->rowcount();

    //Obter valores para ordenação
    $colunaOrdem = $requestData['order'][0]['column'];
    $ordem = $colunas[$colunaOrdem]['data'];
    $direcao = $requestData['order'][0]['dir'];

    //Obter os valores para o LIMIT
    $inicio = $requestData['start'];
    $tamanho = $requestData['length'];

    //Gerando a nossa ordenação a consulta SQL
    $sql .= " ORDER BY $ordem $direcao LIMIT $inicio, $tamanho ";
    $resultado = $pdo->query($sql);
    $dados = array();
    while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
        $dados[] = array_map('utf8_encode', $row);
    }

    //Construir o nosso objeto JSON no padrão DataTables
    $json_data = array(
        "draw" => intval($requestData['draw']),
        "recordsTotal" => intval($qtdeLinhas),
        "recordsFiltered" => intval($totalFiltrados),
        "data" => $dados
    );

    echo json_encode($json_data);