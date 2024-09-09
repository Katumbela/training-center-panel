<?php
// Inclua o arquivo de conexão com o banco de dados
include('header.php');

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recupera o número do BI / ID enviado pela requisição AJAX
    $numeroBIID = $_POST["numero_bi_id"];

    // Prepara a consulta SQL para buscar os dados do Formando na tabela "Formandos" com base no número do BI / ID
    $sql = "SELECT * FROM estudantes WHERE bilhete_identidade = ?";

    // Prepara a instrução SQL
    $stmt = $conexao->prepare($sql);

    // Verifica se a instrução foi preparada com sucesso
    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    // Faz o bind do parâmetro e executa a consulta
    $stmt->bind_param("s", $numeroBIID);

    // Executa a consulta
    if ($stmt->execute() === true) {
        // Obtém o resultado da consulta
        $result = $stmt->get_result();

        // Verifica se encontrou algum Formando com o número do BI / ID fornecido
        if ($result->num_rows > 0) {
            // Retorna os dados do Formando em formato JSON
            $Formando = $result->fetch_assoc();
            echo json_encode($estudante);
        } else {
            // Caso não encontre nenhum Formando com o número do BI / ID fornecido, faz uma segunda busca pelo "codigo"
            $sql = "SELECT * FROM estudantes WHERE codigo = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("s", $numeroBIID);

            if ($stmt->execute() === true) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    // Retorna os dados do Formando em formato JSON
                    $Formando = $result->fetch_assoc();
                    echo json_encode($estudante);
                } else {
                    // Caso não encontre nenhum Formando com o número do BI / ID ou "codigo" fornecido, retorna uma resposta em formato JSON com uma mensagem de erro
                    $response = array("error" => "Formando não encontrado");
                    echo json_encode($response);
                }
            } else {
                // Caso ocorra algum erro na segunda consulta, retorna uma resposta em formato JSON com uma mensagem de erro
                $response = array("error" => "Erro na consulta ao banco de dados");
                echo json_encode($response);
            }
        }
    } else {
        // Caso ocorra algum erro na primeira consulta, retorna uma resposta em formato JSON com uma mensagem de erro
        $response = array("error" => "Erro na consulta ao banco de dados");
        echo json_encode($response);
    }

    // Fecha a instrução
    $stmt->close();

    // Fecha a conexão com o banco de dados
    $conexao->close();
} else {
    // Caso não seja uma requisição POST, retorna um erro
    http_response_code(405); // Método não permitido
    echo json_encode(array("error" => "Método não permitido."));
}
?>
