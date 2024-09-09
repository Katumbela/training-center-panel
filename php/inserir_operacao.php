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

    // Prepara a consulta SQL para verificar se a finalidade já foi paga
    $sqlVerificar = "SELECT $finalidade FROM estudantes WHERE bilhete_identidade = ?";

    // Prepara a instrução SQL
    $stmtVerificar = $conexao->prepare($sqlVerificar);

    // Verifica se a instrução foi preparada com sucesso
    if ($stmtVerificar === false) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    // Faz o bind dos parâmetros e executa a consulta
    $stmtVerificar->bind_param("s", $numeroBIID);

    // Executa a consulta
    if ($stmtVerificar->execute() === true) {
        // Armazena o resultado da consulta
        $stmtVerificar->store_result();

        // Verifica se a finalidade já foi paga (valor diferente de "-")
        $stmtVerificar->bind_result($valorFinalidade);
        $stmtVerificar->fetch();

        if ($valorFinalidade != "-") {
            // Finalidade já foi paga, retorna uma resposta de erro em formato JSON
            $response = array("success" => false, "error" => "O emolumento já foi pago.". $conexao->error);
            echo json_encode($response);
            exit();
        }
        else{


    // Prepara a consulta SQL utilizando uma declaração preparada para atualizar a finalidade
    $sqlUpdate = "UPDATE estudantes SET $finalidade = ? WHERE bilhete_identidade = ? ";
    $stmtUpdate = $conexao->prepare($sqlUpdate);

    // Verifica se a instrução foi preparada com sucesso
    if ($stmtUpdate === false) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    // Faz o bind dos parâmetros e executa a consulta para atualizar a finalidade
    $stmtUpdate->bind_param("ss", $valor, $numeroBIID);

    // Executa a consulta para atualizar a finalidade
    if ($stmtUpdate->execute() === true) {
        // Retorna uma resposta de sucesso em formato JSON
        $response = array("success" => true);
        echo json_encode($response);
    } else {
        // Caso ocorra algum erro na consulta, retorna uma resposta de erro em formato JSON
        $response = array("error" => "Erro ao atualizar a finalidade no banco de dados: " . $stmtUpdate->error);
        echo json_encode($response);
    }

    // Fecha a instrução de atualização
    $stmtUpdate->close();

        }

        // Fecha o resultado da consulta
        $stmtVerificar->free_result();
    } else {
        // Caso ocorra algum erro na consulta, retorna uma resposta de erro em formato JSON
        $response = array("success" => false, "error" => "Erro ao verificar a finalidade no banco de dados: " . $stmtVerificar->error);
        echo json_encode($response);
        exit();
    }

    // Fecha a instrução
    $stmtVerificar->close();

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
        $response = array("success" => true);
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
