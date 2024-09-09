<?php
include('header.php');

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recupera os dados enviados pelo formulário
    $finalidade = $_POST["finalidade"];
    $numeroBIID = $_POST["numero_bi_id"];
    $valor = $_POST["valor"];

    // Verifica se a finalidade é válida para evitar possíveis ataques de injeção de SQL
    $finalidadesPermitidas = array("mes1", "mes2", "mes3", "cartao", "manual");
    if (!in_array($finalidade, $finalidadesPermitidas)) {
        // Finalidade inválida, retorna uma resposta de erro
        $response = array("error" => "Finalidade inválida");
        echo json_encode($response);
        exit();
    }

    // Faz a consulta para verificar o valor atual da finalidade
    $sqlSelect = "SELECT $finalidade FROM estudantes WHERE bilhete_identidade = ? OR codigo = ?";
    $stmtSelect = $conexao->prepare($sqlSelect);
    $stmtSelect->bind_param("ss", $numeroBIID, $numeroBIID);
    $stmtSelect->execute();
    $stmtSelect->bind_result($valorAtual);

    // Recupera o valor atual da finalidade
    $stmtSelect->fetch();

    // Verifica se o valor atual da finalidade é diferente de "-"
    if ($valorAtual !== "-") {
        // Finalidade já foi paga, retorna uma resposta de erro com a mensagem adequada
        $response = array("error" => "$finalidade já foi pago.");
        echo json_encode($response);
        exit();
    }

    // Prepara a consulta SQL utilizando uma declaração preparada para atualizar a finalidade
    $sqlUpdate = "UPDATE Formandos SET $finalidade = ? WHERE bilhete_identidade = ? OR codigo = ?";
    $stmtUpdate = $conexao->prepare($sqlUpdate);

    // Verifica se a instrução foi preparada com sucesso
    if ($stmtUpdate === false) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    // Faz o bind dos parâmetros e executa a consulta para atualizar a finalidade
    $stmtUpdate->bind_param("sss", $valor, $numeroBIID, $numeroBIID);

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

    // Fecha a instrução de seleção
    $stmtSelect->close();

    // Fecha a conexão com o banco de dados
    $conexao->close();
}

?>
