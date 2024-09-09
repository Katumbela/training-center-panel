
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
            

        $hora = date("H") + 5;

// Função para obter a saudação com base nas horas do dia
function getSaudacao($hora) {
    if ($hora >= 5 && $hora < 12) {
        return "Bom dia";
    } else if ($hora >= 12 && $hora < 18) {
        return "Boa tarde";
    } else {
        return "Boa noite";
    }
}
// Obter a saudação apropriada
$saudacao = getSaudacao($hora);



// Verifique se a sessão está ativa e se existe a chave "id" na sessão
if (isset($_SESSION['id'])) {
   
    
} else {
    // Redirecione o usuário de volta para o index.php
    header("Location: /index");
    exit; // Certifique-se de sair do script após o redirecionamento
}


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



        $loggff= "SELECT * FROM ult_login WHERE nome = '$nome'";
        $con_loggff = $conexao->query($loggff);
        $num_rllff = mysqli_num_rows($con_loggff);

        $log_datassff = mysqli_fetch_array($con_loggff);
        $entrada_hora = $log_datassff['data_ultimo_login']; 

?>

<!DOCTYPE html>
<html lang="pt">

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
    <meta name="description" content="Painel Administrativo do Centro Profissional Se Deus Quiser. Desenvolvido por João Afonso Katombela.">
    <meta name="author" content="João Afonso Katombela. Gokside, Gokourses">
   
    <title>Admin SDQ | Centro de Formaçao Profissional Se Deus Quiser </title>
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/dist/sweetalert2.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="assets/dist/sweetalert2.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   <link rel="manifest" href="manifest.json">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
                                <!-- <li><a href="expenses.html">Expenses</a></li> -->
                                <!-- <li><a href="salary.html">Salary</a></li> -->
                                <!-- <li><a href="add-fees-collection.html">Add Fees</a></li> -->
                                <!-- <li><a href="add-expenses.html">Add Expenses</a></li> -->
                                <!-- <li><a href="add-salary.html">Add Salary</a></li> -->
                            </ul>
                        </li>
                        <!-- <li>
                            <a href="holiday.html"><i class="fas fa-holly-berry"></i> <span>Holiday</span></a>
                        </li>
                        <li>
                            <a href="fees.html"><i class="fas fa-comment-dollar"></i> <span>Fees</span></a>
                        </li>
                        <li>
                            <a href="exam.html"><i class="fas fa-clipboard-list"></i> <span>Exam list</span></a>
                        </li>
                        <li>
                            <a href="event.html"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
                        </li>
                        <li>
                            <a href="time-table.html"><i class="fas fa-table"></i> <span>Time Table</span></a>
                        </li>
                        <li>
                            <a href="library.html"><i class="fas fa-book"></i> <span>Library</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-newspaper"></i> <span> Blogs</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="blog.html">All Blogs</a></li>
                                <li><a href="add-blog.html">Add Blog</a></li>
                                <li><a href="edit-blog.html">Edit Blog</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="settings.html"><i class="fas fa-cog"></i> <span>Settings</span></a>
                        </li>
                        <li class="menu-title">
                            <span>Pages</span>
                        </li> -->
                        <!-- <li class="submenu">
                            <a href="#"><i class="fas fa-shield-alt"></i> <span> Authentication </span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="register.html">Register</a></li>
                                <li><a href="forgot-password.html">Forgot Password</a></li>
                                <li><a href="error-404.html">Error Page</a></li>
                            </ul>
                        </li> -->
                        <!-- <li>
                            <a href="blank-page.html"><i class="fas fa-file"></i> <span>Blank Page</span></a>
                        </li>
                        <li class="menu-title">
                            <span>Others</span>
                        </li>
                        <li>
                            <a href="sports.html"><i class="fas fa-baseball-ball"></i> <span>Sports</span></a>
                        </li>
                        <li>
                            <a href="hostel.html"><i class="fas fa-hotel"></i> <span>Hostel</span></a>
                        </li>
                        <li>
                            <a href="transport.html"><i class="fas fa-bus"></i> <span>Transport</span></a>
                        </li>
                        <li class="menu-title">
                            <span>UI Interface</span>
                        </li> -->
                        <!-- <li class="submenu">
                            <a href="#"><i class="fab fa-get-pocket"></i> <span>Base UI </span> <span
                                    class="menu-arrow"></span></a>
                             <ul>
                                <li><a href="alerts.html">Alerts</a></li>
                                <li><a href="accordions.html">Accordions</a></li>
                                <li><a href="avatar.html">Avatar</a></li>
                                <li><a href="badges.html">Badges</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="buttongroup.html">Button Group</a></li>
                                <li><a href="breadcrumbs.html">Breadcrumb</a></li>
                                <li><a href="cards.html">Cards</a></li>
                                <li><a href="carousel.html">Carousel</a></li>
                                <li><a href="dropdowns.html">Dropdowns</a></li>
                                <li><a href="grid.html">Grid</a></li>
                                <li><a href="images.html">Images</a></li>
                                <li><a href="lightbox.html">Lightbox</a></li>
                                <li><a href="media.html">Media</a></li>
                                <li><a href="modal.html">Modals</a></li>
                                <li><a href="offcanvas.html">Offcanvas</a></li>
                                <li><a href="pagination.html">Pagination</a></li>
                                <li><a href="popover.html">Popover</a></li>
                                <li><a href="progress.html">Progress Bars</a></li>
                                <li><a href="placeholders.html">Placeholders</a></li>
                                <li><a href="rangeslider.html">Range Slider</a></li>
                                <li><a href="spinners.html">Spinner</a></li>
                                <li><a href="sweetalerts.htbml">Sweet Alerts</a></li>
                                <li><a href="tab.html">Tabs</a></li>
                                <li><a href="toastr.html">Toasts</a></li>
                                <li><a href="tooltip.html">Tooltip</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="video.html">Video</a></li>
                            </ul> 
                        </li> -->
                        <!-- <li class="submenu">
                            <a href="#"><i data-feather="box"></i> <span>Elements </span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="ribbon.html">Ribbon</a></li>
                                <li><a href="clipboard.html">Clipboard</a></li>
                                <li><a href="drag-drop.html">Drag & Drop</a></li>
                                <li><a href="rating.html">Rating</a></li>
                                <li><a href="text-editor.html">Text Editor</a></li>
                                <li><a href="counter.html">Counter</a></li>
                                <li><a href="scrollbar.html">Scrollbar</a></li>
                                <li><a href="notification.html">Notification</a></li>
                                <li><a href="stickynote.html">Sticky Note</a></li>
                                <li><a href="timeline.html">Timeline</a></li>
                                <li><a href="horizontal-timeline.html">Horizontal Timeline</a></li>
                                <li><a href="form-wizard.html">Form Wizard</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i data-feather="bar-chart-2"></i> <span> Charts </span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="chart-apex.html">Apex Charts</a></li>
                                <li><a href="chart-js.html">Chart Js</a></li>
                                <li><a href="chart-morris.html">Morris Charts</a></li>
                                <li><a href="chart-flot.html">Flot Charts</a></li>
                                <li><a href="chart-peity.html">Peity Charts</a></li>
                                <li><a href="chart-c3.html">C3 Charts</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i data-feather="award"></i> <span> Icons </span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                                <li><a href="icon-feather.html">Feather Icons</a></li>
                                <li><a href="icon-ionic.html">Ionic Icons</a></li>
                                <li><a href="icon-material.html">Material Icons</a></li>
                                <li><a href="icon-pe7.html">Pe7 Icons</a></li>
                                <li><a href="icon-simpleline.html">Simpleline Icons</a></li>
                                <li><a href="icon-themify.html">Themify Icons</a></li>
                                <li><a href="icon-weather.html">Weather Icons</a></li>
                                <li><a href="icon-typicon.html">Typicon Icons</a></li>
                                <li><a href="icon-flag.html">Flag Icons</a></li>
                            </ul>
                        </li> -->
                        <!-- <li class="submenu">
                            <a href="#"><i class="fas fa-columns"></i> <span> Forms </span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="form-basic-inputs.html">Basic Inputs </a></li>
                                <li><a href="form-input-groups.html">Input Groups </a></li>
                                <li><a href="form-horizontal.html">Horizontal Form </a></li>
                                <li><a href="form-vertical.html"> Vertical Form </a></li>
                                <li><a href="form-mask.html"> Form Mask </a></li>
                                <li><a href="form-validation.html"> Form Validation </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-table"></i> <span> Tables </span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="tables-basic.html">Basic Tables </a></li>
                                <li><a href="data-tables.html">Data Table </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="fas fa-code"></i> <span>Multi Level</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span>Level 1</span> <span
                                            class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);"> <span> Level 2</span> <span
                                                    class="menu-arrow"></span></a>
                                            <ul>
                                                <li><a href="javascript:void(0);">Level 3</a></li>
                                                <li><a href="javascript:void(0);">Level 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"> <span>Level 1</span></a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>


        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title"> <?=$saudacao.",  ".explode(" ", $nome)[0]." !"?><br>
                                <span class="text-secondary fs-6">Seja Benvindo ao painel SDQ <?=$nome?></span></h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?=$_GET['centro'] == null ? "home" : "admin_dashboard?centro=".$_GET['centro']?>">Inicio</a></li>
                                    <li class="breadcrumb-item active">Painel</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 relatorios">
                        <input type="hidden" value="<?=$nome?>" id="who">
                        <input type="hidden" value="<?=$centro?>" id="center">
                        <input type="hidden" value="<?=$entrada_hora?>" id="entradaa">
                        <input type="hidden" value="<?=$totalGeral?>" id="geral">
                        <input type="hidden" value="<?=$totalCash?>" id="t_cash">
                        <input type="hidden" value="<?=$totalTPA?>" id="t_tpa">
                        <input type="hidden" value="<?=$totalSaida?>" id="t_saida">
                        <input type="hidden" value="<?=$total5?>" id="t_dep">
                        <input type="hidden" value="<?=$total6?>" id="t_trans">
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <?php


                                        // Consulta para obter o total de Formandos com o critério específico
                                        $sql = "SELECT COUNT(*) AS total_Formandos FROM estudantes WHERE codigo LIKE '{$centro}%'";
                                        $result = $conexao->query($sql);

                                        // Verifica se há resultados e exibe o total de Formandos
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $totalFormandos = $row['total_Formandos'];
                                            echo '<div class="db-info">
                                                    <h6>Formandos</h6>
                                                    <h3>' . $totalFormandos . '</h3>
                                                </div>';
                                        } else {
                                            echo "Nenhum Formando encontrado com o critério especificado.";
                                        }

                                        ?>
                                    <div class="db-icon">
                                        <img src="assets/img/icons/dash-icon-01.svg" alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Centro </h6>
                                        <h3>SDQ <?=$centro?></h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assets/img/icons/dash-icon-03.svg" alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Rendimento de hoje </h6>
                                        <h3><?=number_format($totalGeral, 2, ',', '.') . ' Kz'?></h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assets/img/icons/dash-icon-04.svg" alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets align-items-center">
                                    <div class="db-info">
                                        <h6>Ações secretariais</h6>
                                        <div class="d-flex justify-content-between  w-100 justify-content-center ">
                                        
                                        
                                                <button id="fechar" class="btn w-100 ms-auto ml-auto  btn-primary"
                                                    >Encerrar Turno</button>
                                           

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-6">

                        <div class="card card-chart">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title"> Institucional</h5>
                                    </div>
                                    <div class="col-12">
                                    <?php

                                                if($funcao == "Diretor Geral" || $funcao == "Desenvolvedor de Sistemas" || $funcao == "Designer e Media" || $funcao == "Programador" || $funcao == "Supervisor") {

                                                ?>
                                                        <br>


                                                        <a class="btn btn-primary my-3" href="relatorios">Ver Relatorios <div class="fas fa-arrow-right"></div></a>
                                                    
                                                    
                                                    <br>
                                                        <hr>
                                                    <span class="text-primary">Logins recentes</span>
                                                    <br>
                                                    <br>
                                                        <table class="table table-striped">
                                                            <thead>
                                                            
                                                            </thead>
                                                            <tbody id="tabelaUltimoLogin" style="font-size: 13px">
                                                        
                                                                <?php
                                                                    // Realiza a consulta SQL para obter os dados da tabela ult_login
                                                                    $sqlConsultaUltimoLogin = "SELECT nome, centro, data_ultimo_login FROM ult_login ORDER BY data_ultimo_login DESC ";
                                                                    $resultadoConsulta = $conexao->query($sqlConsultaUltimoLogin);

                                                                    // Verifica se há resultados na consulta
                                                                    if ($resultadoConsulta && $resultadoConsulta->num_rows > 0) {
                                                                        while ($row = $resultadoConsulta->fetch_assoc()) {
                                                                            $nome = $row['nome'];
                                                                            $nomeCentro = $row['centro'];
                                                                            $dataHoraLogin = $row['data_ultimo_login'];

                                                                            // Formata a data e hora de login no formato desejado (por exemplo, "30 de Jul. 2023, 14:30")
                                                                            
                                                                            // Converter a data e hora do login para um timestamp
                                                                            $timestampLogin = strtotime($dataHoraLogin);

                                                                            // Somar 5 horas ao timestamp do login (5 * 3600 segundos)
                                                                            $timestampSomaHoras = $timestampLogin + (5 * 3600);

                                                                            // Formatar a nova data e hora com a soma das 5 horas
                                                                            $dataHoraFormatada = date('d \d\e M. Y, H:i', $timestampSomaHoras);

                                                                            // Preenche a tabela HTML com os dados obtidos
                                                                            echo "<tr>";
                                                                            echo "    <td> {$nome}</td>";
                                                                            echo "    <td>Centro {$nomeCentro}</td>";
                                                                            echo "    <td>{$dataHoraFormatada}</td>";
                                                                            echo "</tr>";
                                                                        }
                                                                    } else {
                                                                        // Caso não haja registros na tabela ult_login, exibe uma mensagem de que não há dados disponíveis
                                                                        echo "<tr><td colspan='2'>Nenhum dado disponível.</td></tr>";
                                                                    }
                                                                    ?>

                                                        
                                                            </tbody>
                                                        </table>
                                                    
                                                <?php

                                                }
                                                else {
                                                    echo "<div class='alert alert-warning'>Não tem permissão à estes recursos</div>";
                                                }
                                                ?>

                                             

                                    </div>
                                    <div class="col-6">
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="apexcharts-area"></div>
                            </div>
                        </div>

                    </div>

                    <br><br><br>
                    <div class="col-12 row">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card flex-fill fb sm-box">
                            <div class="social-likes">
                                <p>Pagina do facebook</p>
                                <h6>----------</h6>
                            </div>
                            <div class="social-boxs">
                                <img src="assets/img/icons/social-icon-01.svg" alt="Social Icon">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card flex-fill twitter sm-box">
                            <div class="social-likes">
                                <p>Perfil no Twitter</p>
                                <h6>----------</h6>
                            </div>
                            <div class="social-boxs">
                                <img src="assets/img/icons/social-icon-02.svg" alt="Social Icon">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card flex-fill insta sm-box">
                            <div class="social-likes">
                                <p>Perfil no instagram</p>
                                <h6>------------</h6>
                            </div>
                            <div class="social-boxs">
                                <img src="assets/img/icons/social-icon-03.svg" alt="Social Icon">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card flex-fill linkedin sm-box">
                            <div class="social-likes">
                                <p>Pagina no Linkedin</p>
                                <h6>-----------</h6>
                            </div>
                            <div class="social-boxs">
                                <img src="assets/img/icons/social-icon-04.svg" alt="Social Icon">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                    
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
                    <div class="col-xl-3 col-sm-6 col-12">
                    
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
                    </div>
                   
                </div>
            </div>
            <footer>
                <p>Copyright © 2023 Se Deus Quiser.</p>
            </footer>
        </div>
    </div>



    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <!-- <script src="assets/plugins/apexchart/chart-data.js"></script> -->
    <script src="assets/js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.28.0/dist/apexcharts.min.js"></script>



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
      $(document).ready(function () {

        
    if ($('#apexcharts-area').length > 0) {
      // Busca os dados no script PHP
      $.ajax({
        url: 'php/cart', // Substitua pelo caminho real para o seu script PHP
        type: 'GET',
        dataType: 'json',
        success: function (dataFromDatabase) {
          // Dados recebidos, cria o gráfico
          var options = {
            chart: {
              height: 350,
              type: "line",
              toolbar: {
                show: false,
              },
            },
            dataLabels: {
              enabled: false,
            },
            stroke: {
              curve: "smooth",
            },
            series: [
              {
                name: "Total de Cadastros",
                color: '#3D5EE1',
                data: dataFromDatabase, // Usa os dados do script PHP aqui
              },
            ],
            xaxis: {
              // Você pode atualizar este array com os nomes reais dos meses com base nos seus dados
              categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            },
          };

          var chart = new ApexCharts(
            document.querySelector("#apexcharts-area"),
            options
          );
          chart.render();
        },
        error: function (xhr, status, error) {
          console.log("Erro ao buscar os dados:", error);
        }
      });
    }
  });
</script>



<script>
  $(document).ready(function() {
    // Captura o clique do botão ou evento que irá acionar o envio dos dados
    $("#fechar").on("click", function() {
      // Obtém os valores dos inputs e armazena em variáveis
      var nome = $("#who").val();
      var centro = $("#center").val();
      var entradaa = $("#entradaa").val();
      var dep = $("#t_dep").val();
      var trans = $("#t_trans").val();
      var totalGeral = $("#geral").val();
      var totalCash = $("#t_cash").val();
      var totalTPA = $("#t_tpa").val();
      var totalSaida = $("#t_saida").val();

    
      // Monta um objeto com os dados a serem enviados
      var dados = {
        nome: nome,
        centro: centro,
        dep: dep,
        entrada: entradaa,
        trans: trans,
        totalGeral: totalGeral,
        totalCash: totalCash,
        totalTPA: totalTPA,
        totalSaida: totalSaida
      };
      

      // Faz a requisição POST para o arquivo enviar_dados.php
      $.post("php/relatorios", dados, function(data) {
        Swal.fire(
            "Uhaa!!!",
            data,
            "success"
        )
        // Callback opcional para tratar a resposta do servidor
        console.log(data); // Exemplo: Imprime a resposta do servidor no console
      });
    });
  });

</script>

</body>

</html>