<?php
include('header.php');

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados enviados na requisição
    $userId = $_POST["id"];
    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];


    // Atualiza a senha do usuário na tabela "adm"
    $sql = "UPDATE adm SET senha = '$newPassword' WHERE id = '$userId' AND senha = '$oldPassword'";

    // Executa a consulta SQL
    if ($conexao->query($sql) === true) {
        // Se a atualização foi bem-sucedida, envia uma resposta de sucesso
        $response = array("message" => "Senha alterada com sucesso!");
    } else {
        // Se houver um erro na consulta SQL, envia uma mensagem de erro
        $response = array("message" => "Ocorreu um erro ao alterar a senha. Por favor, tente novamente mais tarde.");
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();

    // Converte o array em JSON e envia como resposta
    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    // Se a requisição não for do tipo POST, retorna um erro
    header("HTTP/1.1 405 Method Not Allowed");
    echo "Método não permitido.";
}
