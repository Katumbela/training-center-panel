<?php
include('header.php');
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados enviados via POST
    $nome = $_POST['nome'];
    $cent = $_POST['centro'];
    $totalGeral = $_POST['totalGeral'];
    $totalCash = $_POST['totalCash'];
    $totalTPA = $_POST['totalTPA'];
    $totalSaida = $_POST['totalSaida'];
    $dep = $_POST['dep'];
    $trans = $_POST['trans'];
    $entrada = $_POST['entrada'];

    $centro = "Se Deus Quiser, Centro ".$cent;

    // Verifica e define os valores como zero caso estejam vazios
    $totalGeral = empty($totalGeral) ? 0 : $totalGeral;
    $totalCash = empty($totalCash) ? 0 : $totalCash;
    $totalTPA = empty($totalTPA) ? 0 : $totalTPA;
    $totalSaida = empty($totalSaida) ? 0 : $totalSaida;
    $dep = empty($dep) ? 0 : $dep;
    $trans = empty($trans) ? 0 : $trans;

    // Monta a consulta SQL para inserção dos dados
    $sql = "INSERT INTO relatorios (secretaria, entrada, centro, geral, entrada_tpa, entrada_cash, entrada_dep, entrada_transf, saida) VALUES ('$nome','$entrada', '$centro', '$totalGeral', '$totalTPA', '$totalCash','$dep','$trans', '$totalSaida')";

    // Executa a consulta SQL
    if ($conexao->query($sql) === TRUE) {
        echo "Fechamento Realizado com sucesso.";
    } else {
        echo "Erro ao inserir os dados";
        echo "Detalhes do erro: " . mysqli_error($conexao);
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
}
?>
