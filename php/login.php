<?php
include('header.php');
$email_log = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha_log = mysqli_real_escape_string($conexao, $_POST['senha']);

$log = "SELECT * FROM adm WHERE email = '$email_log' AND senha = '$senha_log'";
$con_log = $conexao->query($log);
$num_rl = mysqli_num_rows($con_log);

if ($num_rl >= 1) {
    session_start();
    $log_datas = mysqli_fetch_array($con_log);
    $_SESSION['id'] = $log_datas['id'];

    // Obter nome e número do centro do usuário logado
    $nomeUsuario = $log_datas['nome'];
    $numeroCentro = $log_datas['centro'];

    // Verificar se o registro já existe na tabela ult_login para o usuário logado
    $sqlVerificarRegistro = "SELECT * FROM ult_login WHERE nome = '$nomeUsuario' AND centro = '$numeroCentro'";
    $resultadoVerificacao = $conexao->query($sqlVerificarRegistro);

    if ($resultadoVerificacao->num_rows > 0) {
        // Se o registro já existe, atualizar a data de último login
        $dataUltimoLogin = date('Y-m-d H:i:s');
        $sqlAtualizarLogin = "UPDATE ult_login SET data_ultimo_login = '$dataUltimoLogin' WHERE nome = '$nomeUsuario' AND centro = '$numeroCentro'";
        $conexao->query($sqlAtualizarLogin);
    } else {
        // Se o registro não existe, inserir novo registro na tabela ult_login
        $dataUltimoLogin = date('Y-m-d H:i:s');
        $sqlRegistroLogin = "INSERT INTO ult_login (nome, centro, data_ultimo_login) VALUES ('$nomeUsuario', '$numeroCentro', '$dataUltimoLogin')";
        $conexao->query($sqlRegistroLogin);
    }
    if($log_datas['funcao'] == "Diretor Geral" || $log_datas['funcao'] == "Programador" || $log_datas['Designer Media'] || $log_datas['funcao'] == "Supervisor" ) {

        header("location: ../admin_dashboard");
    }
    else{
        header("location: ../home");
    }
    
} else {
    header("location: ../?ref=err");
}

?>