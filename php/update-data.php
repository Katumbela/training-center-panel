<?php
// Conexão com o banco de dados
include("header");

$id = $_POST["id"];
$mes1 = $_POST["mes1"];
$mes2 = $_POST["mes2"];
$mes3 = $_POST["mes3"];
$cartao = $_POST["cartao"];
$manual = $_POST["manual"];
$cert = $_POST["cert"];

// Monta a query de atualização
$query = "UPDATE estudantes SET ";

if ($mes1 !== '-') {
    $query .= "mes1 = '$mes1', ";
}
if ($mes2 !== '-') {
    $query .= "mes2 = '$mes2', ";
}
if ($mes3 !== '-') {
    $query .= "mes3 = '$mes3', ";
}
if ($cartao !== '-') {
    $query .= "cartao = '$cartao', ";
}
if ($manual !== '-') {
    $query .= "manual = '$manual', ";
}
if ($cert !== '-') {
    $query .= "certificado = '$cert', ";
}

// Remove a vírgula extra no final da string, se houver
$query = rtrim($query, ", ");

$query .= " WHERE id = '$id'";

// Execute a query de atualização
$result = mysqli_query($conexao, $query);

if ($result) {
    $response = array("success" => true);
} else {
    $response = array("success" => false);
}

// Retorna a resposta como JSON
echo json_encode($response);

?>
