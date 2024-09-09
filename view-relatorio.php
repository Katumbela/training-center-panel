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
                $centro = $log_datass['centro'];
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

        if(isset($_GET['rel'])) {
          $rel_code = base64_decode($_GET['rel']);

          $rels = "SELECT * FROM relatorios WHERE id = '$rel_code' ";
          $rel = $conexao->query($rels);
          $dd = mysqli_fetch_array($rel);

          $secretario = $dd['secretaria'];

          $entrad = strtotime($dd['entrada']);

          $centro_rel = $dd['centro'];


          $e_tpa = $dd['entrada_tpa'];

          $e_cash = $dd['entrada_cash'];

          $e_dep = $dd['entrada_dep'];

          $e_transf = $dd['entrada_transf'];

          $saida = $dd['saida'];

          $timestampLogin = strtotime($dd['quando']);

            // Somar 5 horas ao timestamp do login (5 * 3600 segundos)
            $timestampSomaHoras = $timestampLogin + (5 * 3600);

            // Formatar a nova data e hora com a soma das 5 horas
           $dataFormatada = date('d \d\e M. Y, H:i', $timestampSomaHoras);

           // Somar 5 horas ao timestamp do login (5 * 3600 segundos)
         $entradaa = $entrad + (5 * 3600);

           // Formatar a nova data e hora com a soma das 5 horas
          $entrada = date('d \d\e M. Y, H:i', $entradaa);


          $geral = $e_cash + $e_dep + $e_tpa + $e_transf - $saida;


        $loggll = "SELECT * FROM adm WHERE nome = '$secretario'";
        $con_loggll = $conexao->query($loggll);
        $num_rllll = mysqli_num_rows($con_loggll);

                $log_datassll = mysqli_fetch_array($con_loggll);
                $funcao_s = $log_datassll['funcao']; 
                $email_s = $log_datassll['email'];
                $telefone_s = $log_datassll['telefone'];
                $endereco_s = $log_datassll['endereco'];


        }
        else {
          header('location: /relatorios');
        }
        
?>


<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0"
    />
    <title>Relatorio de <?=$secretario?> | Centro de Formação Profissional Se Deus Quiser</title>

    <link rel="shortcut icon" href="assets/img/favicon.png" />

    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="assets/plugins/bootstrap/css/bootstrap.min.css"
    />

    <link rel="stylesheet" href="assets/plugins/feather/feather.css" />

    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css" />

    <link
      rel="stylesheet"
      href="assets/plugins/fontawesome/css/fontawesome.min.css"
    />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
  </head>

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
  <body>
    <div class="main-wrapper">
    <div class="header">

    <div class="header-left">
        <a href="<?=$_GET['centro'] == null ? "home" : "admin_dashboard?centro=".$_GET['centro']?>" class="logo">
            <img src="assets/img/logo.png" alt="Logo">
        </a>
        <a href="<?=$_GET['centro'] == null ? "home" : "admin_dashboard?centro=".$_GET['centro']?>" class="logo logo-small">
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
            <li class="submenu active">
                <a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="<?=$_GET['centro'] == null ? "home" : "admin_dashboard?centro=".$_GET['centro']?>" class="active">Admin Dashboard</a></li>
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
            <li class="submenu">
                <a href="#"><i class="fas fa-clipboard"></i> <span> Operações</span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="<?=$_GET['centro'] == null ? "invoices" : "invoices?centro=".$_GET['centro']?>">Movimentos</a></li>
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
          <div class="row justify-content-center">
            <div class="col-xl-10">
              <div class="card invoice-info-card">
                <div class="card-body">
                  <div class="invoice-item invoice-item-one">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="invoice-logo">
                          <img src="assets/img/logo.png" alt="logo" />
                        </div>
                        <div class="invoice-head">
                          <h2>RELATÓRIO</h2>
                          <p>Código do Relatório: <?=base64_encode($_GET['rel'])?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="invoice-info">
                          <strong class="customer-text-one"
                            ><?=$secretario?></strong
                          >
                          <h6 class="invoice-name"> <?=$centro_rel?></h6>
                          <p class="invoice-details">
                            +244 <?=$telefone_s?> <br />
                           <?=$endereco_s?><br />
                            00244, Luanda - Angola
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>

            

                  <div class="invoice-issues-box">
                    <div class="row">
                      <div class="col-lg-4 col-md-4">
                        <div class="invoice-issues-date">
                          <p>Abertura do sistema :  <?=$entrada?></p>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4">
                        <div class="invoice-issues-date">
                          <p>Fechamento do sistema : <?=$dataFormatada?></p>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4">
                        <div class="invoice-issues-date">
                          <p>Facturado : AOA <?=number_format($geral, 2, ',', '.')?></p>
                        </div>
                      </div>
                    </div>
                  </div>

                 <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-6">
                      <div class="invoice-terms">
                        <h6>Termos & Condições / Notas:</h6>
                        <p class="mb-0">
                          Este relatorio foi submetido pela/o referida/o funcionário em questão, este documento é inalterável, ninguém dentro ou fora do sistema pode fazer alguma alteração sem prévia permição 
                        </p>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                      <div class="invoice-total-card">
                        <div class="invoice-total-box">
                          <div class="invoice-total-inner">
                            <p>Entradas Cash <span><i style="font-size: 12px">AOA</i> <?=number_format($e_cash, 2, ',', '.')?></span></p>
                            <p>Entradas TPA <span><i style="font-size: 12px">AOA</i> <?=number_format($e_tpa, 2, ',', '.')?></span></p>
                            <p>Entradas Transferência <span><i style="font-size: 12px">AOA</i> <?=number_format($e_transf, 2, ',', '.')?></span></p>
                            <p>Entradas Depósito <span><i style="font-size: 12px">AOA</i> <?=number_format($e_dep, 2, ',', '.')?></span></p>
                            <p>Saídas <span><i style="font-size: 12px">AOA</i> <?=number_format($saida, 2, ',', '.')?></span></p>
                          </div>
                          <div class="invoice-total-footer">
                            <h4>Total Caixa <span><?=number_format($geral, 2, ',', '.')?></span></h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="invoice-sign text-end">
                  
                    <span class="d-block"><?=$secretario?></span>
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

    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/js/script.js"></script>
  </body>
</html>
