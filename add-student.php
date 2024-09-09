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
            
        $st_code = Null;

        if(isset($_GET['student'])) {
            $st_code = $_GET['student'];
        }

?>


<!DOCTYPE html>
<html lang="pt-pt">

<head>


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FHBP9WB24G"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-FHBP9WB24G');
    </script>


	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1921695646246423" crossorigin="anonymous">
	</script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Adicionar Formandos | Se Deus Quiser</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <script src="pdf/html2pdf.bundle.min.js"></script>

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/dist/sweetalert2.css">
    <script src="assets/dist/sweetalert2.js"></script>
  
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

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
            <input type="hidden" name="" id="data" value="<?php echo "Matriculou-se no dia ".date('d')." de ".date('m')." de ".date('Y');?>">
                           
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
                                <li><a href="<?=$_GET['centro'] == null ? "home" : "admin_dashboard?centro=".$_GET['centro']?>" class="">Admin Dashboard</a></li>
                                <!-- <li><a href="teacher-dashboard.html">Teacher Dashboard</a></li> -->
                                <!-- <li><a href="student-dashboard.html">EstudanteDashboard</a></li> -->
                            </ul>
                        </li>
                        <li class="submenu active">
                            <a href="#"><i class="fas fa-graduation-cap"></i> <span> Formandos</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="<?=$_GET['centro'] == null ? "students" : "students?centro=".$_GET['centro']?>">Lista dos Formandos</a></li>
                                <!-- <li><a href="student-details.html">EstudanteView</a></li> -->
                                <li><a href="<?=$_GET['centro'] == null ? "add-student" : "add-student?centro=".$_GET['centro']?>" class="active">Adicionar Formando </a></li>
                                <!-- <li><a href="edit-student.html">EstudanteEdit</a></li> -->
                            </ul>
                        </li>
                        <!-- <li class="submenu">
                            <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Formadores</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="teachers.html">Lista dos Formadores</a></li>
                                <li><a href="teacher-details.html">Ver Formador</a></li>
                                <li><a href="add-teacher.html">Adicionar Formador</a></li>
                                <li><a href="edit-teacher.html">Editar Formador</a></li>
                            </ul>
                        </li> -->
                        <!-- <li class="submenu">
                            <a href="#"><i class="fas fa-building"></i> <span> Centro s</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="Centro s.html">Centro  List</a></li>
                                <li><a href="add-Centro .html">Centro  Add</a></li>
                                <li><a href="edit-Centro .html">Centro  Edit</a></li>
                            </ul>
                        </li> -->
                        <!-- <li class="submenu">
                            <a href="#"><i class="fas fa-book-reader"></i> <span> Subjects</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="subjects.html">Subject List</a></li>
                                <li><a href="add-subject.html">Subject Add</a></li>
                                <li><a href="edit-subject.html">Subject Edit</a></li>
                            </ul>
                        </li> -->
                        <li class="submenu">
                            <a href="#"><i class="fas fa-clipboard"></i> <span> Operações</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="<?=$_GET['centro'] == null ? "invoices" : "invoices?centro=".$_GET['centro']?>">Movimentos</a></li>
                                <!-- <li><a href="invoice-grid.html">Invoices Grid</a></li> -->
                                <!--<li><a href="add-invoice">Entrada</a></li>-->
                                 <li><a href="<?=$_GET['centro'] == null ? "add-saida" : "add-saida?centro=".$_GET['centro']?>">Saída</a></li>
                                <!-- <li><a href="view-invoice.html">Invoices Details</a></li> -->
                                <!-- <li><a href="invoices-settings.html">Invoices Settings</a></li> -->
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
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Adicionar Formandos</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?=$_GET['centro'] == null ? "students" : "students?centro=".$_GET['centro']?>">Formandos</a></li>
                                    <li class="breadcrumb-item active">Adicionar Formandos</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card comman-shadow">
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <input type="hidden" name="secre" value="<?=$nome?>">
                                                <label> Nome Completo<span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="primeiro_nome" placeholder="Insira o nome completo">
                                            </div>
                                        </div>
                                        <!-- <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Ultimo Nome <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="ultimo_nome" placeholder="Insira o ultimo">
                                            </div>
                                        </div> -->
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Genero <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="genero">
                                                    <option value="">Selecione o Genero</option>
                                                    <option value="Feminino">Feminino</option>
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Outro">Outro</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms ">
                                                <label>Nascimento <span class="login-danger">*</span></label>
                                                <input class="form-control " type="date" name="nascimento" placeholder="DD-MM-YYYY">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Profissão </label>
                                                <input class="form-control" type="text" name="profissao" placeholder="Insira a profissão">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Curso Escolhido <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="curso_escolhido" id="cursoEscolhido">
                                                    <option value="">Selecione o curso </option>
                                                    <option value="ESTÉTICA PROFISSIONAL (FACIAL, CORPORAL E DEPILAÇÃO)">ESTÉTICA PROFISSIONAL (FACIAL, CORPORAL E DEPILAÇÃO)</option>
                                                    <option value="INFORMÁTICA NA ÓPTICA DO UTILIZADOR">INFORMÁTICA NA ÓPTICA DO UTILIZADOR</option>
                                                    <option value="INFORMÁTICA COM INTERNET">INFORMÁTICA COM INTERNET</option>
                                                    <option value="SECRETARIADO">SECRETARIADO</option>
                                                    <option value="RECEPÇÃO">RECEPÇÃO</option>
                                                    <option value="ATENDIMENTO AO PÚBLICO">ATENDIMENTO AO PÚBLICO</option>
                                                    <option value="CONTABILIDADE GERAL NÍVEL I & II">CONTABILIDADE GERAL NÍVEL I & II</option>
                                                    <option value="CONTABILIDADE INFORMATIZADA">CONTABILIDADE INFORMATIZADA</option>
                                                    <option value="GESTÃO DE EMPRESAS">GESTÃO DE EMPRESAS</option>
                                                    <option value="GESTÃO DE RECURSOS HUMANOS">GESTÃO DE RECURSOS HUMANOS</option>
                                                    <option value="CULINÁRIA">CULINÁRIA</option>
                                                    <option value="PASTELARIA">PASTELARIA</option>
                                                    <option value="DECORAÇÃO & ARTES">DECORAÇÃO & ARTES</option>
                                                    <option value="CABELEIREIRO PROFISSIONAL">CABELEIREIRO PROFISSIONAL</option>
                                                    <option value="HARDWARE & SOFTWARE - REPARAÇÃO DE COMPUTADORES & INSTALAÇÃO DE PROGRAMAS">HARDWARE & SOFTWARE - REPARAÇÃO DE COMPUTADORES & INSTALAÇÃO DE PROGRAMAS</option>
                                                    <option value="ELETRICIDADE DE CONSTRUÇÃO CIVIL">ELETRICIDADE DE CONSTRUÇÃO CIVIL</option>
                                                    <option value="FRIO & CLIMATIZAÇÃO">FRIO & CLIMATIZAÇÃO</option>
                                                    <option value="CALIGRAFIA">CALIGRAFIA</option>
                                                    <option value="PEDAGOGIA & DIDÁCTICA">PEDAGOGIA & DIDÁCTICA</option>
                                                    <option value="EXCEL AVANÇADO">EXCEL AVANÇADO</option>
                                                    <option value="INGLÊS AMERICANO E BRITÂNICO">INGLÊS AMERICANO E BRITÂNICO</option>
                                                    <option value="EDUCADORA DE INFÂNCIA">EDUCADORA DE INFÂNCIA</option>
                                                    <option value="REDES DE COMPUTADORES">REDES DE COMPUTADORES</option>
                                                    <option value="CCTV - MONTAGEM DE CÂMERAS DE VIGILÂNCIA">CCTV - MONTAGEM DE CÂMERAS DE VIGILÂNCIA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Periodo <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="periodo" id="periodoSelecionado">
                                                <option value="08h:00 - 09h:30">Selecione o Periodo </option>
                                                <!-- Opções de período aqui -->
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>E-Mail <span class="login-danger"></span></label>
                                                <input class="form-control" type="text" name="email" placeholder="Insira email">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Nivel Escolar <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="nivel_escolar">
                                                    <option value="">Selecione o nivel </option>
                                                    <option value="Ensino Primário">Ensino Primário</option>
                                                    <option value="1 Ciclo">1 Ciclo</option>
                                                    <option value="2 Ciclo">2 Ciclo</option>
                                                    <option value="Ensino Medio">Ensino Medio</option>
                                                    <option value="Ensino Superior">Ensino Superior</option>
                                                    <option value="Mestrado">Mestrado</option>
                                                    <option value="Outro">Outro</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label> Ciclo  <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="ciclo">
                                                    <option value="">Selecione o ciclo </option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Bilhete de Identidade </label>
                                                <input class="form-control" type="text" name="bilhete_identidade" placeholder="Insira o numero">
                                                <input class="form-control" type="hidden" name="codigo" value="<?=$centro?>" >
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-2">
                                            <div class="form-group local-forms">
                                                <label>Telefone <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="telefone_primario" placeholder="900 000 000">
                                            </div>
                                        </div>
                                        <div class="col-12 row col-sm-6">
                                           <div class="col-12 col-sm-6">
                                                <div class="form-group local-forms">
                                                    <label>Inscrição (Kz) </label>
                                                    <input class="form-control" disabled type="text" name="inscricao" placeholder="Valores">
                                                </div>
                                           </div>
                                           <div class="col-12 col-sm-6">
                                                <div class="form-group local-forms">
                                                        <label>Modalidade </label>
                                                        <select name="modalidade" id="modalidade" class="form-control select">
                                                            <option value="">Selecione</option>
                                                            <option value="Cash">Cash</option>
                                                            <option value="TPA">TPA</option>
                                                            <option value="Deposito">Deposito</option>
                                                            <option value="Transferencia">Transferência</option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <button id="cadastr" class="btn btn-primary">Cadastrar</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container">
   
<ins class="adsbygoogle"
style="display:block; text-align:center;"
data-ad-layout="in-article"
data-ad-format="fluid"
data-ad-client="ca-pub-1921695646246423"
data-ad-slot="9879533170"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<!-- an2 -->
<ins class="adsbygoogle"
style="display:block"
data-ad-client="ca-pub-1921695646246423"
data-ad-slot="2132108937"
data-ad-format="auto"
data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
    </div>

    <!-- Adicione a biblioteca do jQuery ao seu HTML -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Inclua a biblioteca jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.es.js" integrity="sha512-VTufZOUx+Gc0N4JkluA0ZkVs2x4wfDI3p60gRWpHT761kMQ+hiNlYI+8MGXbLO48ymPKAeRa1wsEm3BIaxSEvw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script>
<!-- jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>

<!-- jsPDF-AutoTable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.7.4/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.0.0/jspdf.umd.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<script src="assets/js/script.js"></script>
<!-- Certifique-se de ter a biblioteca jQuery incluída antes do seu código -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



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

        $("li ul li a, table a").click(function(){
            $(".foregroundd").show();
        });
       
    </script>

<script>


    // Captura o evento de envio do formulário
    $("#cadastr").click(function() {
        // event.preventDefault();  // Impede o comportamento padrão de envio do formulário
        $(".foregroundd").fadeIn("fast");
        // Obtém os valores dos campos do formulário
        var primeiroNome = $("input[name='primeiro_nome']").val();
        var ultimoNome = " ";
        var genero = $("select[name='genero']").val();
        var ciclo = $("select[name='ciclo']").val();
        var codigo = $("input[name='codigo']").val();
        var nascimento = $("input[name='nascimento']").val();
        var secretaria = $("input[name='secre']").val();
        var profissao = $("input[name='profissao']").val();
        var cursoEscolhido = $("select[name='curso_escolhido']").val();
        var modalidade = $("select[name='modalidade']").val();
        var periodo = $("select[name='periodo']").val();
        var email = $("input[name='email']").val();
        var nivelEscolar = $("select[name='nivel_escolar']").val();
        var bilheteIdentidade = $("input[name='bilhete_identidade']").val();
        var telefonePrimario = $("input[name='telefone_primario']").val();
        var inscricao = $("input[name='inscricao']").val();
        var datas = $('#data').val();

        function generateRandomID() {
  const min = 100000;
  const max = 999999;
  return String(Math.floor(Math.random() * (max - min + 1)) + min);
}

// Exemplo de uso:
const randomID = generateRandomID();

const dataAtual = new Date().toLocaleDateString("pt-PT");



        // Verificar se algum campo está vazio
let campoVazio = "";

if (!primeiroNome) campoVazio = "Primeiro Nome";
// else if (!ultimoNome) campoVazio = "Último Nome";
else if (!genero) campoVazio = "Gênero";
else if (!nascimento) campoVazio = "Nascimento";
else if (!profissao) campoVazio = "Profissão";
else if (!cursoEscolhido) campoVazio = "Curso Escolhido";
else if (!periodo) campoVazio = "Período";
else if (!email) campoVazio = "E-mail";
else if (!nivelEscolar) campoVazio = "Nível Escolar";
else if (!bilheteIdentidade) campoVazio = "Bilhete de Identidade";
else if (!telefonePrimario) campoVazio = "Telefone Primário";
else if (!inscricao) campoVazio = "Valor da Inscrição (Kz)";
else if (!modalidade) campoVazio = "Modalidade de pagamento (Kz)";

if (campoVazio) {
  // Mostrar aviso de campo vazio usando Swal
  $(".foregroundd").fadeOut("fast");
  Swal.fire(
    'Atenção!',
    `O campo ${campoVazio} está vazio. Por favor, preencha todos os campos obrigatórios.`,
    'warning'
  );
} else {

        // Cria um objeto com os dados a serem enviados
        var dados = {
            "primeiro_nome": primeiroNome,
            // "ultimo_nome": ultimoNome,
            "genero": genero,
            "ciclo": ciclo,
            "codigo": codigo,
            "nascimento": nascimento,
            "profissao": profissao,
            "curso_escolhido": cursoEscolhido,
            "periodo": periodo,
            "email": email,
            "secre": secretaria,
            "modalidade": modalidade,
            "nivel_escolar": nivelEscolar,
            "bilhete_identidade": bilheteIdentidade,
            "telefone_primario": telefonePrimario,
            "inscricao": inscricao
        };

        // Faz a requisição POST para o arquivo PHP
        $.ajax({
            type: "POST",
            url: "php/add-student.php",
            data: dados,
            success: function(response) {
                // Aqui você pode tratar a resposta do servidor, se necessário
                $(".foregroundd").fadeOut("fast");
                Swal.fire(
                    'Uhaa!!',
                    "Cadastro realizado com sucesso!",
                    "success"
                )
                $('input').val('');
                $('select').val('');
                var cont = "<center><img src='assets/img/logo.png' height='45em'><br><h6>FICHA DE INSCRIÇÃO Nº <span style='text-decoration: underline'> "+ response +" </span></h6></center><br><div><p>Nome do Formando: <span style='text-decoration: underline;  padding: 0 .2em width: 100%'><b>  "+ primeiroNome +" </b></span><br>Tel: <span style='text-decoration: none'> "+ telefonePrimario +"/_____________________</span>   <span style='margin-left: .9rem'></span>    Tel. Alternativo(Família): <span style='text-decoration: none'>__________________________</span>   <br>Nome: <span style='text-decoration: none'> ______________________________________ </span>, <span style='margin-left: .9rem'></span>Profissão: <span style='text-decoration: underline'>  "+ profissao +" </span> , <span style='margin-left: 1.5rem'></span>   Habilitações literárias: <span style='text-decoration: underline'>   "+ nivelEscolar +"  </span>,   <span style='margin-left: .9rem'></span>  Matriculou-se no curso de:    <span style='text-decoration: underline'>  "+ cursoEscolhido +"  </span> ,   <span style='margin-left: 1rem'></span>    Periodo: <span style='text-decoration: underline'>   "+ periodo +"  </span>,<span style='margin-left: .8rem'></span>Duração:<span>  ______ Mês(es)</span></p>Data de Matricula: <span style='text-decoration: underline'>   "+ dataAtual +" </span>, <span style='margin-left: 1.5rem'></span>  Início: <span style='text-decoration: none'> ____/ ____/ _____</span>,     <span style='margin-left: 1.5rem'></span>Termina: <span style='text-decoration: none'>  ____/ ____/ _____</span>.<br>Ciclo: <span style='text-decoration: underline;  padding: 0 .2em'>    "+ ciclo +"  </span><br><br><div style='display:flex; flex-direction: row; justify-content: space-evenly;'><div><center> <b>O(A) Secretário(a)</b><br> <hr style='width: 240px!important; font-size: 13px'>  "+secretaria+" </center></div><center> <b>O(A) Formando(a)</b><br> <hr style='width: 240px!important: font-size: 13px'> "+primeiroNome+" </center><div></div></div><br><center><b style='font-size: 12px'>Este formulário deve acompanhar-se com as respectivas documentações. </b><br><p style='font-size: 12px'>"+ datas +"</p>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -<br><br><center><b>FICHA DE INSCRIÇÃO Nº  <span style='text-decoration: underline'>"+response+"</span></b></center> <br><div style='text-align: start'>Nome do Formando: <span style='text-decoration: underline;  padding: 0 .2em width: 100%'> <b>"+ primeiroNome +"</b></span> <br> Matriculou-se no Curso de: <span style='text-decoration: underline;  padding: 0 .2em width: 60%'> "+ cursoEscolhido +"</span>, <span style='margin-left: .9rem'></span> Horário: <span style='text-decoration: underline;  padding: 0 .2em'> "+ periodo +"</span>, <span style='margin-left: .9rem'></span><br>Duração: <span style='text-decoration: none; width: 100%'> ____ Mês(es)</span> <br> Data de matricula: <span style='text-decoration: underline;  padding: 0 .2em'> "+ dataAtual +"</span>     <span style='margin-left: 1.5rem'></span>    Início: <span style='text-decoration: none;'>____/ _____/ _____</span>,      <span style='margin-left: 1.5rem'></span>      Termina: <span style='text-decoration: none;'> ____/ ____/_____</span> <br> Ciclo: <span style='text-decoration: underline;  padding: 0 .2em width: 100%'> "+ ciclo +"</span> </div> <br><div style='display:flex; flex-direction: row; justify-content: space-evenly;'><div><center> <b>O(A) Secretário(a)</b><br> <hr style='width: 240px!important; font-size: 13px'>"+secretaria+" </center></div><center> <b>O(A) Formando(a)</b><br> <hr style='width: 240px!important; font-size: 13px'> "+primeiroNome+" </center><div></div></div><br><center><b><h5 style='font-size: 12px'>NÃO ACEITAMOS DEVOLUÇÃO</h5></b><p style='font-size: 12px'>Processado pelo sistema do centro "+codigo+" </p></center></div>";
                var opt = {
                    margin: 1,
                    filename: 'inscricao_'+ primeiroNome+"_"+response,
                    image: {type: 'jpeg', quality: 0.98},
                    html2canvas: {scale: 2},
                    jsPDF: {unit: 'in', format: 'letter', orientation: 'portrait'}
                }

                html2pdf().set(opt).from(cont).save();

            },
            error: function(xhr, status, error) {
                // Tratamento de erro, caso a requisição falhe
                $(".foregroundd").fadeOut("fast");
                Swal.fire(
                    'Ups',
                    error + " erro" + xhr + status,
                    "error"
                )
            }
        });

    }
    });
</script>




<script>
    
        // Defina um objeto com as durações dos cursos
        const precoDosCursos = {
            'ESTÉTICA PROFISSIONAL (FACIAL, CORPORAL E DEPILAÇÃO)': '5000',
            'INFORMÁTICA NA ÓPTICA DO UTILIZADOR': '5000',
            'INFORMÁTICA COM INTERNET': '8000',
            'SECRETARIADO': '8000',
            'RECEPÇÃO': '8000',
            'ATENDIMENTO AO PÚBLICO': '8000',
            'CONTABILIDADE GERAL NÍVEL I & II': '8000',
            'CONTABILIDADE INFORMATIZADA': '15000',
            'GESTÃO DE EMPRESAS': '5000',
            'GESTÃO DE RECURSOS HUMANOS': '5000',
            'CULINÁRIA': '5000',
            'PASTELARIA': '7000',
            'DECORAÇÃO & ARTES': '5000',
            'CABELEIREIRO PROFISSIONAL': '8000',
            'HARDWARE & SOFTWARE - REPARAÇÃO DE COMPUTADORES & INSTALAÇÃO DE PROGRAMAS': '8000',
            'ELETRICIDADE DE CONSTRUÇÃO CIVIL': '7000',
            'FRIO & CLIMATIZAÇÃO': '8000',
            'CALIGRAFIA': '7000',
            'PEDAGOGIA & DIDÁCTICA': '5000',
            'EXCEL AVANÇADO': '8000',
            'INGLÊS AMERICANO E BRITÂNICO': '2500',
            'EDUCADORA DE INFÂNCIA': '8000',
            'REDES DE COMPUTADORES': '10000',
            'CCTV - MONTAGEM DE CÂMERAS DE VIGILÂNCIA': '15000',
        };

        const duracoesDosCursos = {
            'ESTÉTICA PROFISSIONAL (FACIAL, CORPORAL E DEPILAÇÃO)': '2h',
            'INFORMÁTICA NA ÓPTICA DO UTILIZADOR': '1h30',
            'INFORMÁTICA COM INTERNET': '2h',
            'SECRETARIADO': '1h30',
            'RECEPÇÃO': '1h30',
            'ATENDIMENTO AO PÚBLICO': '1h30',
            'CONTABILIDADE GERAL NÍVEL I & II': '2h',
            'CONTABILIDADE INFORMATIZADA': '2h',
            'GESTÃO DE EMPRESAS': '2h',
            'GESTÃO DE RECURSOS HUMANOS': '2h',
            'CULINÁRIA': '1h30',
            'PASTELARIA': '1h30',
            'DECORAÇÃO & ARTES': '1h30',
            'CABELEIREIRO PROFISSIONAL': '2h',
            'HARDWARE & SOFTWARE - REPARAÇÃO DE COMPUTADORES & INSTALAÇÃO DE PROGRAMAS': '2h',
            'ELETRICIDADE DE CONSTRUÇÃO CIVIL': '2h',
            'FRIO & CLIMATIZAÇÃO': '2h',
            'CALIGRAFIA': '1h30',
            'PEDAGOGIA & DIDÁCTICA': '1h30',
            'EXCEL AVANÇADO': '1h30',
            'INGLÊS AMERICANO E BRITÂNICO': '2h',
            'EDUCADORA DE INFÂNCIA': '2h',
            'REDES DE COMPUTADORES': '2h',
            'CCTV - MONTAGEM DE CÂMERAS DE VIGILÂNCIA': '2h',
        };


        // Quando o curso for selecionado, atualize as opções do período
        $('#cursoEscolhido').on('change', function() {
            $(".foregroundd").fadeIn("fast");
            const cursoSelecionado = $(this).val();

            $("input[name='inscricao']").val(precoDosCursos[cursoSelecionado]);


            const periodoSelecionado = $('#periodoSelecionado');

            setTimeout(() => {
                $(".foregroundd").fadeOut("fast");
            }, 600);
            periodoSelecionado.empty(); // Limpa as opções existentes

            if (duracoesDosCursos[cursoSelecionado] === '2h') {
                periodoSelecionado.append($('<option>', { value: '07:00 - 09:00', text: '07:00 - 09:00' }));
                periodoSelecionado.append($('<option>', { value: '10:00 - 12:00', text: '10:00 - 12:00' }));
                periodoSelecionado.append($('<option>', { value: '13:00 - 15:00', text: '13:00 - 15:00' }));
                periodoSelecionado.append($('<option>', { value: '16:00 - 18:00', text: '16:00 - 18:00' }));
                periodoSelecionado.append($('<option>', { value: '19:00 - 21:00', text: '19:00 - 21:00' }));
            } else if (duracoesDosCursos[cursoSelecionado] === '1h30') {
                periodoSelecionado.append($('<option>', { value: '07:00 - 08:30', text: '07:00 - 08:30' }));
                periodoSelecionado.append($('<option>', { value: '09:00 - 10:30', text: '09:00 - 10:30' }));
                periodoSelecionado.append($('<option>', { value: '11:00 - 12:30', text: '11:00 - 12:30' }));
                periodoSelecionado.append($('<option>', { value: '13:00 - 14:30', text: '13:00 - 14:30' }));
                periodoSelecionado.append($('<option>', { value: '15:00 - 16:30', text: '15:00 - 16:30' }));
                periodoSelecionado.append($('<option>', { value: '17:00 - 18:30', text: '17:00 - 18:30' }));
                periodoSelecionado.append($('<option>', { value: '19:00 - 20:30', text: '19:00 - 20:30' }));
            }
        });
   
</script>


    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>

    <!-- <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <!-- <script src="assets/plugins/moment/moment.min.js"></script> -->
    <!-- <script src="assets/js/bootstrap-datetimepicker.min.js"></script> -->

    <!-- <script src="assets/js/script.js"></script> -->
</body>

</html>