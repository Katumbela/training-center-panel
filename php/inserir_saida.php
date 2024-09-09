<?php

// Inclua o arquivo de conexão com o banco de dados
include('header.php');

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recupera os dados enviados pela requisição AJAX
    $finalidade = $_POST["finalidade"];
    $numeroBIID = $_POST["numero_bi_id"];
    $tipoOperacao = $_POST["tipo_operacao"];
    $valor = $_POST["valor"];
    $centro = $_POST["centro"];
    $secretaria = $_POST["secretaria"];
    $modalidade = $_POST["modalidade"];

    // Adicione aqui a lógica para obter a data do respectivo dia (pode ser a data atual do servidor ou alguma data fornecida pelo usuário)
    $dataOperacao = date("Y-m-d"); // Usando a data atual do servidor, você pode alterar a lógica conforme necessário

    $r = ceil(rand(500, 8000));
    $code = "SDQ".$centro."@".$r;

    // Prepara a consulta SQL para inserir os dados na tabela "operacoes"
    $sqlInserir = "INSERT INTO operacoes (codigo, secretaria, finalidade, numero_bi_id, tipo_operacao, valor, modalidade, data_operacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepara a instrução SQL
    $stmtInserir = $conexao->prepare($sqlInserir);

    // Verifica se a instrução foi preparada com sucesso
    if ($stmtInserir === false) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    // Faz o bind dos parâmetros e executa a consulta
    $stmtInserir->bind_param("ssssssss", $code, $secretaria, $finalidade, $numeroBIID, $tipoOperacao, $valor, $modalidade, $dataOperacao);

    // Executa a consulta
    if ($stmtInserir->execute() === true) {
        // Caso a inserção seja bem-sucedida, retorna uma resposta em formato JSON
        $response = array("success" => "Operação registrada com sucesso !");
        echo json_encode($response);
    } else {
        // Caso ocorra algum erro na inserção, retorna uma resposta em formato JSON
        $response = array("success" => false, "error" => "Erro ao inserir a operação no banco de dados: " . $stmtInserir->error);
        echo json_encode($response);
    }

    // Fecha a instrução
    $stmtInserir->close();

    // Fecha a conexão com o banco de dados
    $conexao->close();
} else {
    // Caso não seja uma requisição POST, retorna um erro
    http_response_code(405); // Método não permitido
    echo json_encode(array("error" => "Método não permitido."));
}

?>
