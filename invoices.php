<?php
    session_start();
    include("php/header.php");

    if (isset($_SESSION['id'])) {

        $id =  $_SESSION['id'];
            
        $logg= "SELECT * FROM adm WHERE id = $id";
        $con_logg = $conexao->query($logg);
        $num_rll = mysqli_num_rows($con_logg);

                $log_datass = mysqli_fetch_array($con_logg);
                $nome = $log_datass['nome']; 
                $email = $log_datass['email'];
                $senha = $log_datass['senha'];
                $tel = $log_datass['telefone'];
                $centro =  $_GET['centro'] == null ? $log_datass['centro'] : $_GET['centro'];
                $estado= $log_datass['estado'];
                $empresa= $log_datass['empresa'];
                $lastl = $log_datass['ult_login'];
                $endereco = $log_datass['endereco'];
                $nasc = $log_datass['nascimento'];
                $funcao = $log_datass['funcao'];
        }

        else {
            header("location: /?ref=exp");
            #header("location: login?ref=exp");
        }

        // switch ($pac) {
        //     case 1:
        //         $pacote = "Plano Individual";
        //         $preco = 2.00;
        //         break;
            
        //     case 2:
        //         $pacote = "Plano Business";
        //         $preco = 5.00;
        //         break;
            
        //     case 3:
        //         $pacote = "Plano Kat";
        //         $preco = 10.00;
        //         break;
            
        //     default:
        //         # code...
        //         break;
        // }
            
          // Obter a data atual no formato 'Y-m-d'
          $dataAtual2 = date('Y-m-d');

          // Consulta SQL para somar os valores com a data de hoje
          $sql2 = "SELECT SUM(valor) AS total FROM operacoes WHERE DATE(data_operacao) = '{$dataAtual2}' AND codigo LIKE '%SDQ{$centro}@%' and modalidade = 'TPA' AND tipo_operacao ='entrada'";
          $resultado2 = $conexao->query($sql2);
          $totalTPA = 0;

          // Verificar se há resultados e obter o valor somado
          if ($resultado2 && $resultado2->num_rows > 0) {
              $row2 = $resultado2->fetch_assoc();
              $totalTPA = $row2['total'];
          }

          

        
        // Obter a data atual no formato 'Y-m-d'
        $dataAtual3 = date('Y-m-d');

        // Consulta SQL para somar os valores com a data de hoje
        $sql3 = "SELECT SUM(valor) AS total FROM operacoes WHERE DATE(data_operacao) = '{$dataAtual3}' AND codigo LIKE '%SDQ{$centro}@%' and modalidade = 'Cash' AND tipo_operacao ='entrada'";
        $resultado3 = $conexao->query($sql3);
        $total3 = 0;

        // Verificar se há resultados e obter o valor somado
        if ($resultado3 && $resultado3->num_rows > 0) {
            $row3 = $resultado3->fetch_assoc();
            $total3 = $row3['total'];
        }

        // Obter a data atual no formato 'Y-m-d'
        $dataAtual3 = date('Y-m-d');

        // Consulta SQL para somar os valores com a data de hoje
        $sql4 = "SELECT SUM(valor) AS total FROM operacoes WHERE DATE(data_operacao) = '{$dataAtual3}' AND codigo LIKE '%SDQ{$centro}@%' and tipo_operacao = 'saida'";
        $resultado4 = $conexao->query($sql4);
        $total4 = 0;

        // Verificar se há resultados e obter o valor somado
        if ($resultado4 && $resultado4->num_rows > 0) {
            $row4 = $resultado4->fetch_assoc();
            $total4 = $row4['total'];
        }

        // Consulta SQL para somar os valores com a data de hoje
        $sql5 = "SELECT SUM(valor) AS total FROM operacoes WHERE DATE(data_operacao) = '{$dataAtual3}' AND codigo LIKE '%SDQ{$centro}@%' and tipo_operacao = 'entrada' AND modalidade = 'Deposito'";
        $resultado5 = $conexao->query($sql5);
        $total5 = 0;

        // Verificar se há resultados e obter o valor somado
        if ($resultado5 && $resultado5->num_rows > 0) {
            $row5 = $resultado5->fetch_assoc();
            $total5 = $row5['total'];
        }
        
        // Consulta SQL para somar os valores com a data de hoje
        $sql6 = "SELECT SUM(valor) AS total FROM operacoes WHERE DATE(data_operacao) = '{$dataAtual3}' AND codigo LIKE '%SDQ{$centro}@%' and tipo_operacao = 'entrada' and modalidade = 'Transferencia'";
        $resultado6 = $conexao->query($sql6);
        $total6 = 0;

        // Verificar se há resultados e obter o valor somado
        if ($resultado6 && $resultado6->num_rows > 0) {
            $row6 = $resultado6->fetch_assoc();
            $total6 = $row6['total'];
        }


        // Consulta SQL para somar os valores com a data de hoje
        // $sql33 = "SELECT SUM(inscricao) AS total FROM estudantes WHERE DATE_FORMAT(quando, '%Y-%m-%d') = CURDATE() AND codigo LIKE '%SDQ{$centro}#%'";
        // $resultado33 = $conexao->query($sql33);
        $t = 0;

        // Verificar se há resultados e obter o valor somado
        // if ($resultado33 && $resultado33->num_rows > 0) {
        //     $row33 = $resultado33->fetch_assoc();
        //     $t = $row33['total'];
        // }

        $totalGeral = $t + $totalTPA + $total3 + $total5 + $total6 - $total4;



        function abreviarTexto($texto, $limite) {
            // Verifica se o texto é maior que o limite
            if (mb_strlen($texto) > $limite) {
                // Abrevia o texto e adiciona reticências
                $abreviado = mb_substr($texto, 0, $limite) . '...';
                return $abreviado;
            } else {
                // Retorna o texto original sem alterações
                return $texto;
            }
        }

?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Entradas  & Saídas | Centro de Formação Profissional Se Deus Quiser</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

    <link rel="stylesheet" href="assets/css/feather.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper">


        <div class="header">

            <div class="header-left">
                <a href="<?=$_GET['centro'] == null ? "home" : "admin_dashboard"?>" class="logo">
                    <img src="assets/img/logo.png" alt="Logo">
                </a>
                <a href="<?=$_GET['centro'] == null ? "home" : "admin_dashboard"?>" class="logo logo-small">
                    <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
                </a>
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Pesquisar">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

            <ul class="nav user-menu">
              

                <li class="nav-item zoom-screen me-2">
                    <a href="#" class="nav-link header-nav-list win-maximize">
                        <img src="assets/img/icons/header-icon-04.svg" alt="">
                    </a>
                </li>

                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="assets/img/profiles/avatar-02.png" width="31"
                                alt="<?=$nome?>">
                            <div class="user-text">
                                <h6><?=$nome?></h6>
                                <p class="text-muted mb-0"><?=$funcao?></p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="assets/img/profiles/avatar-02.png" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6><?=$nome?></h6>
                                <p class="text-muted mb-0"><?=$funcao?></p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile">Meu Perfil</a>

                        <a class="dropdown-item" href="php/logout">Sair</a>
                    </div>
                </li>

            </ul>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Menu Principal</span>
                        </li>
                        <li class="submenu ">
                            <a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="<?=$_GET['centro'] == null ? "home" : "admin_dashboard"?>" class="">Admin Dashboard</a></li>
                                <!-- <li><a href="teacher-dashboard.html">Teacher Dashboard</a></li> -->
                                <!-- <li><a href="student-dashboard.html">Student Dashboard</a></li> -->
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-graduation-cap"></i> <span> Formandos</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="<?=$_GET['centro'] == null ? "students" : "students?centro=".$_GET['centro']?>">Lista dos Formandos</a></li>
                                <!-- <li><a href="student-details.html">Student View</a></li> -->
                                <li><a href="<?=$_GET['centro'] == null ? "add-student" : "add-student?centro=".$_GET['centro']?>">Adicionar Formando </a></li>
                                <!-- <li><a href="edit-student.html">Student Edit</a></li> -->
                            </ul>
                        </li>
                       <li class="submenu active">
                            <a href="#"><i class="fas fa-clipboard"></i> <span> Operações</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="<?=$_GET['centro'] == null ? "invoices" : "invoices?centro=".$_GET['centro']?>" class="active">Movimentos</a></li>
                                  <li><a href="<?=$_GET['centro'] == null ? "add-saida" : "add-saida?centro=".$_GET['centro']?>">Saída</a></li>
                             </ul>
                        </li>
                        <li class="menu-title">
                            <span>Gerenciamento</span>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-file-invoice-dollar"></i> <span> Devedores</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="<?=$_GET['centro'] == null ? "fees-collections" : "fees-collections?centro=".$_GET['centro']?>">Propinas</a></li>
                                <li><a href="<?=$_GET['centro'] == null ? "fees-collections" : "fees-collections?centro=".$_GET['centro']?>">------</a></li>
                               </ul>
                        </li>
                     
                    </ul>
                </div>
            </div>
        </div>


        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Operações / Pagamentos</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=$_GET['centro'] == null ? "home" : "admin_dashboard"?>">Dashboard</a></li>
                                <li class="breadcrumb-item active">Operações</li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col"></div>
                        <div class="col-auto">
                            <a href="<?=$_GET['centro'] == null ? "invoices" : "invoices?centro=".$_GET['centro']?>" class="invoices-links active">
                                <i class="feather feather-list"></i>
                            </a>
                            
                        </div>
                    </div>
                </div>



                <div class="card invoices-tabs-card border-0">
                    <div class="card-body card-body pt-0 pb-0">
                        <div class="invoices-main-tabs">
                            <div class="row align-items-center">
                                <div class="col-lg-8 col-md-8">
                                    <div class="invoices-tabs">
                                        <ul>
                                            <li><a href="<?=$_GET['centro'] == null ? "invoices" : "invoices?centro=".$_GET['centro']?>" class="active">Todas Operações</a></li>
                                          </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="invoices-settings-btn">
                                        
                                        <a href="<?=$_GET['centro'] == null ? "add-saida" : "add-saida?centro=".$_GET['centro']?>" class="btn neww">
                                            <i class="feather  feather-plus-circle"></i> Nova operação
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card inovices-card">
                            <div class="card-body">
                                <div class="inovices-widget-header">
                                    <span class="inovices-widget-icon">
                                        <img src="assets/img/icons/invoices-icon1.svg" alt="">
                                    </span>
                                    <?php
                                  
                                  
                                            // Exibir o valor do total geral na div
                                            echo '<div class="inovices-dash-count">';
                                            echo '    <div class="inovices-amount">' . number_format($totalGeral, 2, ',', '.') . ' Kz</div>';
                                            echo '</div>';
                                    ?>

                                </div>
                                <p class="inovices-all">Total (Hoje) </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card inovices-card">
                            <div class="card-body">
                                <div class="inovices-widget-header">
                                    <span class="inovices-widget-icon">
                                        <img src="assets/img/icons/invoices-icon2.svg" alt="">
                                    </span>
                                   
                                    <?php
                                       
                                        // Exibir o valor somado na div
                                        echo '<div class="inovices-dash-count">';
                                        echo '    <div class="inovices-amount">' . number_format($totalTPA, 2, ',', '.') . ' Kz</div>';
                                        echo '</div>';
                                        ?>
                                </div>
                                <p class="inovices-all">Pagamentos Por TPA</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card inovices-card">
                            <div class="card-body">
                                <div class="inovices-widget-header">
                                    <span class="inovices-widget-icon">
                                        <img src="assets/img/icons/invoices-icon2.svg" alt="">
                                    </span>
                                   
                                    <?php
                                       
                                        // Exibir o valor somado na div
                                        echo '<div class="inovices-dash-count">';
                                        echo '    <div class="inovices-amount">' . number_format($total5, 2, ',', '.') . ' Kz</div>';
                                        echo '</div>';
                                        ?>
                                </div>
                                <p class="inovices-all">Pagamentos Por Depósito</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card inovices-card">
                            <div class="card-body">
                                <div class="inovices-widget-header">
                                    <span class="inovices-widget-icon">
                                        <img src="assets/img/icons/invoices-icon2.svg" alt="">
                                    </span>
                                   
                                    <?php
                                       
                                        // Exibir o valor somado na div
                                        echo '<div class="inovices-dash-count">';
                                        echo '    <div class="inovices-amount">' . number_format($total6, 2, ',', '.') . ' Kz</div>';
                                        echo '</div>';
                                        ?>
                                </div>
                                <p class="inovices-all">Pagamentos Por Transferência</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card inovices-card">
                            <div class="card-body">
                                <div class="inovices-widget-header">
                                    <span class="inovices-widget-icon">
                                        <img src="assets/img/icons/invoices-icon3.svg" alt="">
                                    </span>
                                    <?php
                              
                                        // Exibir o valor somado na div
                                        echo '<div class="inovices-dash-count">';
                                        echo '    <div class="inovices-amount">' . number_format($total3, 2, ',', '.') . ' Kz</div>';
                                        echo '</div>';
                                        ?>
                                </div>
                                <p class="inovices-all">Pagamentos em Cash </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card inovices-card">
                            <div class="card-body">
                                <div class="inovices-widget-header">
                                    <span class="inovices-widget-icon">
                                        <!-- <img src="assets/img/icons/invoices-icon3.svg" alt=""> -->
                                    </span>
                                      <?php
                                        

                                        // Exibir o valor somado na div
                                        echo '<div class="inovices-dash-count">';
                                        echo '    <div class="inovices-amount">' . number_format($total4, 2, ',', '.') . ' Kz</div>';
                                        echo '</div>';
                                        ?>
                                </div>
                                <p class="inovices-all">Saídas </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 my-4">
                        <div class="d-flex my-2 justify-content-between">
                        <h3 class="h2">Filtrar por data</h3>
                        <a  id="downloadLink" class="btn btn-sm my-auto btn-outline-primary me-2"><i
                                                    class="fas fa-download"></i> Baixar</a>
                        </div>
               
                        <input type="text" id="dataFiltro" class="form-control" placeholder="Selecionar data">
                        <br>
                        <h3 id="totalQuantia"></h3>
                    </div>
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table  id="myTable" class="table table-stripped table-hover datatable">
                                        <thead class="thead-light" >
                                            <tr>
                                                <!-- <th>ID</th> -->
                                                <th>Tipo</th>
                                                <th>Criado em</th>
                                                <th>Responsa.</th>
                                                <th>Finalidade</th>
                                                <th>Quantia</th>
                                                <th>Modalidade</th>

                                                <th>Status</th>
                                                <!-- <th class="text-end">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $devs = "SELECT * FROM operacoes WHERE  codigo LIKE '%SDQ{$centro}@%'";
                                            $dev = $conexao->query($devs);
                                            while ($dd = mysqli_fetch_array($dev)) {
                                                $dataObj = new DateTime($dd['data_operacao']);

                                                // Formata a data no formato desejado (por exemplo, "31 de Julho de 2023")
                                                $dataFormatada = $dataObj->format('d \d\e M, Y');
                                                
                                          ?>
                                                <tr>
                                                    <!-- <td><?= $dd['codigo'] ?></td> -->
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a><?php
                                                            if($dd['tipo_operacao'] == 'entrada') {
                                                                echo "<b class='text-success'>Entrada</b>";
                                                            }
                                                            else if ($dd['tipo_operacao'] == 'saida') {
                                                                echo "<b class='text-danger'>Saida</b>";
                                                            }
                                                             ?></a>
                                                        </h2>
                                                    </td>
                                                    <td> <span><?= $dd['data_operacao'] ?></span></td>
                                                    <td>
                                                        
                                                        <!-- // Verifica se o valor começa com "SDQ"
                                                            // Se o valor começa com "SDQ", mostra o resultado em um link -->
                                                            <a href="student-details?student=<?php if ($_GET['centro'] == null ) { echo $dd['numero_bi_id']; } else { echo $dd['numero_bi_id']."&centro=".$_GET['centro']; }?>"> <?=$dd['numero_bi_id']?> </a>
                                                        
                                                     
                                                    </td>
                                                    <td title="<?=$dd['finalidade']?>">
                                                    <?php
                                                        // Verifica se cada coluna (mes1, mes2, mes3, cartao) é igual a '-' e imprime o valor correspondente
                                                        if ($dd['finalidade'] == 'mes1') {
                                                            echo "1º Mês ";
                                                        } 
                                                        else if ($dd['finalidade'] == 'mes2') {
                                                            echo " 2º Mês ";
                                                        } 
                                                        else if ($dd['finalidade'] == 'mes3') {
                                                            echo " 3º Mês ";
                                                        } 
                                                        else if ($dd['finalidade'] == 'manual') {
                                                            echo " Manual ";
                                                        }
                                                        else if ($dd['finalidade'] == 'cartao') {
                                                            echo " Cartão";
                                                        } else {
                                                            echo  abreviarTexto($dd['finalidade'], 20);
                                                        }
                                                        ?>    
                                                    </td>
                                                    <td><?= number_format($dd['valor'], 2, ',', '.') ." Kz" ?></td>
                                                    <td><?= $dd['modalidade']." " ?></td>
                                                    
                                                    <td class="text-start">
                                                    <?php
                                                        // Verifica se cada coluna (mes1, mes2, mes3, cartao) é igual a '-' e imprime o valor correspondente
                                                        if ($dd['valor'] != '') {
                                                            ?>
                                                             <span class="badge badge-success">Sucesso</span>
                                                        
                                                      
                                                      <?php
                                                        }
                                                        ?>
                                                        
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                      
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/datatables.min.js"></script>

    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/js/script.js"></script>

    <style>

.foregroundd {
    background: rgba(0,0,0, 0.5);
    height: 100vh;
    width: 100vw;
    /* display: none; */
    position: fixed;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    z-index: 9999999999999999999999999!important;
}

.loader {
    height: 3rem;
    width: 3rem;
    border-radius: 100px;
    border: 5.5px solid white;
    border-left: 5.5px solid #f71d7f;
    border-right: 5.5px solid #f71d7f;
    border-bottom: 5.5px solid #ffffff;
    margin: auto!important;
    animation: .6s load ease-in-out infinite;
}

.div-load {
    background: #6E606BC8;
    padding: 3rem;
    margin: auto!important;
    margin-top: 36vh!important;
    border-radius: 16px;
    box-shadow: 1px 2px 10px #B6B6B6;
    height: 3.5rem;
    width: 5rem;
    display: grid!important;
    place-content: center!important;
    place-items: center!important;
}

@keyframes load {
    to {
        transform: rotate(360deg);
    }
}
</style>


<div class="foregroundd">
        <div class="div-load">
             <div class="loader"></div>
        </div>
    </div>
    <script>

        $(".foregroundd").hide();

        $("li ul li a, .neww , table a").click(function(){
            $(".foregroundd").show();
        });
       
    </script>


<script>
    $(document).ready(function () {
        // Captura o evento keyup do input
        $("#dataFiltro").on("keyup", function () {
        var value = $(this).val().toLowerCase(); // Obtém o valor digitado e transforma em minúsculo

        // Percorre cada linha da tabela e verifica se o valor digitado corresponde ao nome ou ID do estudante
        $("#myTable tbody tr").filter(function () {
            var nome = $(this).find("td:eq(1)").text().toLowerCase(); // Obtém o nome do Formando da segunda coluna
            var id = $(this).find("td:eq(0)").text().toLowerCase(); // Obtém o ID do Formando da primeira coluna
            
            // Compara o valor digitado com o nome ou ID do estudante
            var match = nome.indexOf(value) > -1 || id.indexOf(value) > -1;
            
            // Exibe ou oculta a linha com base no resultado da comparação
            $(this).toggle(match);
        });
        });
    });
</script>



<!-- Add the SheetJS library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>


<script>
  document.getElementById("downloadLink").addEventListener("click", function () {
    // Get the table reference
    
      var dataSelecionada = $("#dataFiltro").val(); // Obtém a data selecionada no formato "YYYY-MM-DD"
     
    var table = document.getElementById("myTable");

    // Get the table data as an array
    var data = [];
    var headers = [];
    for (var i = 0; i < table.rows[0].cells.length; i++) {
      headers[i] = table.rows[0].cells[i].textContent; // Use textContent instead of innerHTML
    }
    data.push(headers);
    for (var i = 1; i < table.rows.length; i++) {
      var tableRow = table.rows[i];
      var rowData = [];
      for (var j = 0; j < tableRow.cells.length; j++) {
        rowData.push(tableRow.cells[j].textContent); // Use textContent instead of innerHTML
      }
      data.push(rowData);
    }

    // Create a new workbook
    var workbook = XLSX.utils.book_new();

    // Convert the data to a worksheet
    var worksheet = XLSX.utils.aoa_to_sheet(data);

    // Add the worksheet to the workbook
    XLSX.utils.book_append_sheet(workbook, worksheet, "Sheet1");

    // Generate a blob from the workbook
    var wbout = XLSX.write(workbook, { bookType: "xlsx", type: "array" });
    var blob = new Blob([wbout], { type: "application/octet-stream" });

    // Create a temporary anchor element and trigger the download
    var downloadLink = document.createElement("a");
    var url = URL.createObjectURL(blob);
    downloadLink.href = url;
    downloadLink.download = dataSelecionada+"_operacoes_sdq.xlsx"; // Change the filename if needed
    downloadLink.click();

    // Clean up
    setTimeout(function () {
      URL.revokeObjectURL(url);
    }, 0);
  });
</script>


</body>

</html>