
<?php
include('header.php');

// Consulta para obter o total de cadastros para cada mês
$query = "SELECT MONTH(quando) AS mes, COUNT(*) AS total_cadastros FROM estudantes GROUP BY MONTH(quando)";
$result = $mysqli->query($query);

// Inicializa o array de dados
$dataFromDatabase = array_fill(0, 12, 0);

// Popula o array de dados com o total de cadastros para cada mês
while ($row = $result->fetch_assoc()) {
  $mes = (int) $row['mes'];
  $totalCadastros = (int) $row['total_cadastros'];
  $dataFromDatabase[$mes - 1] = $totalCadastros;
}

// Libera o resultado e fecha a conexão
$result->free();
$mysqli->close();

// Retorna os dados como JSON (para serem usados em JavaScript)
echo json_encode($dataFromDatabase);
?>
