<?php
include('header.php');

// $conexao = mysqli_connect("localhost", "root", "", "sdq");

// Verifica se a requisição é do tipo POST
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recupera os dados enviados pelo formulário
    $primeiroNome = $_POST["primeiro_nome"];
    // $ultimoNome = $_POST["ultimo_nome"];
    $genero = $_POST["genero"];
    $nascimento = $_POST["nascimento"];
    $profissao = $_POST["profissao"];
    $cursoEscolhido = $_POST["curso_escolhido"];
    $periodo = $_POST["periodo"];
    $email = $_POST["email"];
    $ciclo = $_POST["ciclo"];
    $centro = $_POST["codigo"];
    $nivelEscolar = $_POST["nivel_escolar"];
    $bilheteIdentidade = $_POST["bilhete_identidade"];
    $telefonePrimario = $_POST["telefone_primario"];
    $inscricao = $_POST["inscricao"];
    $modal = $_POST["modalidade"];
    
    // Gere um código único para cada inserção
    $codigo = $centro."".$ciclo;

    $r = rand(100, 5000);

    // Monta o valor dos campos de mês, cartão, manual, ciclo e multas
    $mes1 = "-";
    $mes2 = "-";
    $mes3 = "-";
    $cartao = "-";
    $manual = "-";
    $certificado = "-";
    $multa_mes1 = "-";
    $multa_mes2 = "-";
    $multa_mes3 = "-";
    
    // Prepara a consulta SQL para inserir os dados na tabela "estudantes"
    $sql = "INSERT INTO estudantes (codigo, primeiro_nome, ultimo_nome, genero, nascimento, profissao, curso_escolhido, periodo, email, nivel_escolar, bilhete_identidade, telefone_primario, inscricao, mes1, mes2, mes3, cartao, manual, certificado, ciclo, multa_mes1, multa_mes2, multa_mes3) 
            VALUES ('$codigo', '$primeiroNome', '-', '$genero', '$nascimento', '$profissao', '$cursoEscolhido', '$periodo', '$email', '$nivelEscolar', '$bilheteIdentidade', '$telefonePrimario', '$inscricao', '$mes1', '$mes2', '$mes3', '$cartao', '$manual', '$certificado', '$ciclo', '$multa_mes1', '$multa_mes2', '$multa_mes3')";

    // Executa a consulta
    if (mysqli_query($conexao, $sql)) {

            $g = "SELECT * FROM estudantes where bilhete_identidade = '$bilheteIdentidade'";
            $gg = mysqli_query($conexao, $g);
            $dd = mysqli_fetch_array($gg);
            $coddd = $dd['codigo']."".$dd['id'];

            echo json_encode($coddd);
        
        // Recupera os dados enviados pela requisição AJAX
        $finalidade = "inscrição";
        $tipoOperacao = "entrada";

        // Adicione aqui a lógica para obter a data do respectivo dia (pode ser a data atual do servidor ou alguma data fornecida pelo usuário)
        $dataOperacao = date("Y-m-d"); // Usando a data atual do servidor, você pode alterar a lógica conforme necessário

        $codee = "SDQ".$centro."@".$r;

        // Prepara a consulta SQL para inserir os dados na tabela "operacoes"
        $sqll = "INSERT INTO operacoes (codigo, secretaria, finalidade, numero_bi_id, tipo_operacao, valor, modalidade, data_operacao) VALUES ('$codee', '$secretaria', '$finalidade', '$bilheteIdentidade', '$tipoOperacao', '$inscricao', '$modal', '$dataOperacao')";

        // Executa a consulta
        if (mysqli_query($conexao, $sqll)) {
            // Caso a inserção seja bem-sucedida, retorna uma resposta em formato JSON
            $responsee = array("success" => true);
            
        } else {
            // Caso ocorra algum erro na inserção, retorna uma resposta em formato JSON
            $response = array("success" => false);
            
        }
    } else {
        echo "Erro ao inserir os dados: " . mysqli_error($conexao);
    }

    // Fecha a conexão
    mysqli_close($conexao);
// } else {
//     // Caso não seja uma requisição POST, retorna um erro
//     http_response_code(405); // Método não permitido
//     echo "Método não permitido.";
// }

?>
