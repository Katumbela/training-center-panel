
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
                $quando = $log_datass['quando'];
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
            

        $st_code = Null;

        if(isset($_GET['student'])) {
            $cc = $_GET['student'];
            $st_code = $_GET['student'];

                    
                $loggg= "SELECT * FROM estudantes WHERE bilhete_identidade = '$st_code'";
                $con_loggg = $conexao->query($loggg);
                $num_rllg = mysqli_num_rows($con_loggg);

                $log_datasss = mysqli_fetch_array($con_loggg);
                $nome_st = $log_datasss['primeiro_nome']; 
                $email_st = $log_datasss['email'];
                $tele = $log_datasss['telefone_primario'];
                $centro_st = $log_datasss['centro'];
                $curso = $log_datasss['curso_escolhido'];
                $periodo= $log_datasss['periodo'];
                $data_c = $log_datasss['quando'];
                $endereco = $log_datasss['endereco'];
                $nasc_st = $log_datasss['nascimento'];
                $genero = $log_datasss['genero'];
                $nivel = $log_datasss['nivel_escolar'];
                $bi = $log_datasss['bilhete_identidade'];
                $inscricao = $log_datasss['inscricao'];
                $mes1 = $log_datasss['mes1'];
                $mes2 = $log_datasss['mes2'];
                $mes3 = $log_datasss['mes3'];
                $cartao = $log_datasss['cartao'];
                $manual = $log_datasss['manual'];
                $certificado = $log_datasss['certificado'];
                $m_m1 = $log_datasss['multa_mes2'];
                $m_m2 = $log_datasss['multa_mes2'];
                $m_m3 = $log_datasss['multa_mes3'];
                $profissao = $log_datasss['profissao'];
                $quando = $log_datasss['quando'];
        } 



?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Nova Operação | Se Deus Quiser </title>

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/icons/feather/feather.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/dist/sweetalert2.css">
    <script src="assets/dist/sweetalert2.js"></script>
  
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
                        <li class="submenu ">
                            <a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="<?=$_GET['centro'] == null ? "home" : "admin_dashboard?centro=".$_GET['centro']?>" class="">Admin Dashboard</a></li>
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
                        <li class="submenu active">
                            <a href="#"><i class="fas fa-clipboard"></i> <span> Operações</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="<?=$_GET['centro'] == null ? "invoices" : "invoices?centro=".$_GET['centro']?>">Movimentos</a></li>
                                <!-- <li><a href="invoice-grid.html">Invoices Grid</a></li> -->
                                <li><a href="add-invoice?student=<?=$_GET['student']."&centro=".$_GET['centro']?>" class="active">Entrada</a></li>
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

                <div class="page-header invoices-page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <ul class="breadcrumb invoices-breadcrumb">
                                <li class="breadcrumb-item invoices-breadcrumb-item">
                                    <a class='ver' href="<?=$_GET['centro'] == null ? "invoices" : "invoices?centro=".$_GET['centro']?>">
                                        <i class="fe fe-chevron-left"></i> Voltar
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-auto">
                            <div class="invoices-create-btn">
                                <a class="invoices-preview-link ver" href="student-details?student=<?php echo $cc; if($_GET['centro'] == null ) { echo ""; } else { echo "&centro=".$_GET['centro']; } ?>"><i class="fe fe-eye  me-1"></i> Ver ficha</a>

                                <a href="#" data-bs-toggle="modal" data-bs-target="#save_invocies_details"
                                    class="btn save-invoice-btn">
                                    Salvar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card invoices-add-card">
                            <div class="card-body">
                                <form action="#" class="invoices-form">
                                    <div class="invoices-main-form">
                                        <div class="row">
                                        <div class="col-xl-5 col-md-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <span>Nome do Formando:</span>
                                                <b><?=$nome_st?></b>
                                            </div>
                                            <div class="form-group">
                                                <span>Curso:</span>
                                                <b><?=$curso?></b>
                                            </div>
                                            <div class="form-group">
                                                <span>Data de inscrição:</span>
                                                <b><?=explode(" ", $quando)[0]?></b>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label>Tipo de operação</label>
                                                <select disabled id="tipo_operacao" class="form-control select">
                                                    <!-- <option value="">Selecione</option> -->
                                                    <option value="entrada">Entrada</option>
                                                    <option value="saida">Saída</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Modalidade da operação</label>
                                                <select id="modalidade" class="form-control select">
                                                    <option value="">Selecione</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="TPA">TPA</option>
                                                    <option value="Deposito">Deposito</option>
                                                    <option value="Transferencia">Transferência</option>
                                                </select>
                                            </div>
                                           <!-- Elemento <select> para selecionar a finalidade -->
                                           <div class="form-group">
                                                <label>Finalidade</label>
                                                <select id="finalidade" class="form-control select">
                                                    <option value="">Selecione</option>
                                                    <?php if($inscricao == "-") {?><option value="Inscricao">Inscrição</option><?php }?>
                                                    <?php if($mes1 == "-") {?><option value="mes1">1º Mês</option><?php }?>
                                                    <?php if($mes2 == "-") {?><option value="mes2">2º Mês</option><?php }?>
                                                    <?php if($mes3 == "-") {?><option value="mes3">3º Mês</option><?php }?>
                                                    <?php if($cartao == "-") {?><option value="cartao">Cartão</option><?php }?>
                                                    <?php if($manual == "-") {?><option value="manual">Manual</option><?php }?>
                                                    <?php if($certificado == "-") {?><option value="certificado">Certificado</option><?php }?>
                                                    <?php if($m_m1 == "-") {?><option value="multa_mes1">Multa Mês 1</option><?php }?>
                                                    <?php if($m_m2 == "-") {?><option value="multa_mes2">Multa Mês 2</option><?php }?>
                                                    <?php if($m_m3 == "-") {?><option value="multa_mes3">Multa Mês 3</option><?php }?>
                                                    <!-- <option value="outro">Outro</option> -->
                                                </select>
                                                <!-- <input type="text" id="inputOutroFinalidade" placeholder="Identifique a finalidade" class="form-control" style="display: none;"> -->
                                            </div>

                                                        
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                          
                                            <div class="form-group">
                                                <label>Valor (Kz)</label>
                                                <input class="form-control" type="text" id="valor" placeholder="Valores em kwanzas">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <?php
                                                        if($mes1 != "-" && $mes2 != "-" && $mes3 != "-" && $cartao != "-" && $manual != "-" && $certificado != '-' ){
                                                            echo "";
                                                        }
                                                        else {
                                                            echo "Multa:";
                                                        }

                                                    ?>
                                                 </label>
                                               <?php 
                                                $precos_cursos = Array(
                                                    'ESTÉTICA PROFISSIONAL (FACIAL, CORPORAL E DEPILAÇÃO)' =>  '5000',
                                                    'INFORMÁTICA NA ÓPTICA DO UTILIZADOR' =>  '5000',
                                                    'INFORMÁTICA COM INTERNET' =>  '8000',
                                                    'SECRETARIADO' => '8000',
                                                    'RECEPÇÃO' =>  '8000',
                                                    'ATENDIMENTO AO PÚBLICO' =>  '8000',
                                                    'CONTABILIDADE GERAL NÍVEL I & II' =>  '8000',
                                                    'CONTABILIDADE INFORMATIZADA' =>  '15000',
                                                    'GESTÃO DE EMPRESAS' =>  '5000',
                                                    'GESTÃO DE RECURSOS HUMANOS' =>  '5000',
                                                    'CULINÁRIA' =>  '5000',
                                                    'PASTELARIA' =>  '7000',
                                                    'DECORAÇÃO & ARTES' => '5000',
                                                    'CABELEIREIRO PROFISSIONAL' =>  '8000',
                                                    'HARDWARE & SOFTWARE - REPARAÇÃO DE COMPUTADORES & INSTALAÇÃO DE PROGRAMAS' =>  '8000',
                                                    'ELETRICIDADE DE CONSTRUÇÃO CIVIL' =>  '7000',
                                                    'FRIO & CLIMATIZAÇÃO' =>  '8000',
                                                    'CALIGRAFIA' =>  '7000',
                                                    'PEDAGOGIA & DIDÁCTICA' =>  '5000',
                                                    'EXCEL AVANÇADO' =>  '8000',
                                                    'INGLÊS AMERICANO E BRITÂNICO' =>  '2500',
                                                    'EDUCADORA DE INFÂNCIA' =>  '8000',
                                                    'REDES DE COMPUTADORES' =>  '10000',
                                                    'CCTV - MONTAGEM DE CÂMERAS DE VIGILÂNCIA' =>  '15000',
                                                );

                                                $data_multa_dia = explode("-",  explode(" ", $quando)[0])[2];
                                                $data_multa_mes = explode("-",  explode(" ", $quando)[0])[1];
                                                $data_multa_ano = explode("-",  explode(" ", $quando)[0])[0];
                                             
                                                if($data_multa_mes + 1 == date('m') && Date('d') > 10) {
                                                    echo  " Isento de multa no primeiro mês";
                                                } 
                                                else if ($data_multa_mes == date('m') && Date('d') > 10){
                                                echo  " Isento de multa no primeiro mês";
                                                } 
                                                else if ($data_multa_mes == date('m') && Date('d') < 10){
                                                echo  " Isento de multa no primeiro mês";
                                                } 
                                                else if($data_multa_mes + 1 == date('m') && Date('d') < 10) {
                                                    echo  " Isento de multa no primeiro mês, inscrito no dia $data_multa_dia do mês passado";
                                                } 
                                                else if($data_multa_mes >= date('m') + 1  && Date('d') < 10) {
                                                    echo  " Isento de multa até o dia 10";
                                                } 
                                                else if($data_multa_mes < date('m') - 1  && Date('d') < 10) {
                                                    echo  " Isento de multa até o dia 10";
                                                } 
                                                else if($data_multa_mes + 1 < date('m') - 1  && Date('d') < 10) {
                                                    echo  " Isento de multa até o dia 10";
                                                } 
                                               else if($mes1 != "-" && $mes2 != "-" && $mes3 != "-" && $cartao != "-" && $manual != "-" && $certificado != '-' ){
                                                   echo "Todos os emolumentos já foram pagos.";
                                                }
                                                else {
                                                    echo  $precos_cursos[$curso] * 0.15." Kwanzas";
                                                }
                                               
                                               ?>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary" id="btnSalvar">Salvar</button>
                                            </div>
                                        </div>

                                            <div class="col-xl-7 col-md-6 col-sm-12 col-12">
                                                <h4 class="invoice-details-title">Detalhes Centro</h4>
                                                <div class="invoice-details-box">
                                                    <div class="invoice-inner-head">
                                                        <span> <a href="#">Se Deus Quiser, Centro  <?=$centro?></a></span>
                                                    </div>
                                                    <div class="invoice-inner-footer">
                                                        <div class="row align-items-center">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="invoice-inner-date">
                                                                    <span>
                                                                        O/A Formando/a: <br><span class="text-primary"><?=$nome_st?></span>
                                                                    </span>
                                                                    <br>
                                                                    <span style="font-size: 12px">
                                                                        Inscrito em: <span class="text-primary"><?=$data_c?></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="invoice-inner-date invoice-inner-datepic">
                                                                    <span>
                                                                        Secretaria/o: <br><span class="text-primary"><?=$nome?></span>
                                                                        <input
                                                                            class="form-control "
                                                                            type="hidden" value="<?=$centro?>" id="centro" placeholder=""><input
                                                                            class="form-control "
                                                                            type="hidden" value="<?=$bi?>" id="bi_id" >
                                                                            <input
                                                                            class="form-control "
                                                                            type="hidden" value="<?=$nome?>" id="secretaria" placeholder="">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                     
                                                        <table class="table table-hovered table-striped">
                                                            <thead>
                                                            <tr>
                                                                    
                                                                    <th>1.º Mês</th>
                                                                    <th>2.º Mês</th>
                                                                    <th>3.º Mês</th>
                                                                    <th>Cartão</th>
                                                                    <th>Manual</th>
                                                                    <th>Certificado</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                
                                                                    <td>
                                                                        <?php
                                                                            if($mes1 != "-") {
                                                                                echo " <span class='badge text-white badge-success'>Pago</span>";
                                                                            } else  {
                                                                                echo " <span class='badge text-white badge-danger'>Não Pago</span>";
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                            if($mes2 != "-") {
                                                                                echo " <span class='badge text-white badge-success'>Pago</span>";
                                                                            } else  {
                                                                                echo " <span class='badge text-white badge-danger'>Não Pago</span>";
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                            if($mes3 != "-") {
                                                                                echo " <span class='badge text-white badge-success'>Pago</span>";
                                                                            } else  {
                                                                                echo " <span class='badge text-white badge-danger'>Não Pago</span>";
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                            if($cartao != "-") {
                                                                                echo " <span class='badge text-white badge-success'>Pago</span>";
                                                                            } else  {
                                                                                echo " <span class='badge text-white badge-danger'>Não Pago</span>";
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                            if($manual != "-") {
                                                                                echo " <span class='badge text-white badge-success'>Pago</span>";
                                                                            } else  {
                                                                                echo " <span class='badge text-white badge-danger'>Não Pago</span>";
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                            if($certificado != "-") {
                                                                                echo " <span class='badge text-white badge-success'>Pago</span>";
                                                                            } else  {
                                                                                echo " <span class='badge text-white badge-danger'>Não Pago</span>";
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                
                                                                    <td>
                                                                        <?php
                                                                            if($mes1 != "-") {
                                                                                echo number_format($mes1, 2, ',', '.')  . " Kz <hr>";
                                                                            } 
                                                                        ?>
                                                                         <?php
                                                                            if($m_m1 != "-") {
                                                                                echo "Multa: ". number_format($m_m1, 2, ',', '.')  . " Kz ";
                                                                            } 
                                                                            else {
                                                                                echo "Multa: Isento";
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                            if($mes2 != "-") {
                                                                                echo number_format($mes2, 2, ',', '.')  . " Kz <hr>";
                                                                            }
                                                                        ?>
                                                                        <?php
                                                                           if($m_m2 != "-") {
                                                                               echo  "Multa: ". number_format($m_m2, 2, ',', '.')  . " Kz ";
                                                                           } 
                                                                           else {
                                                                               echo "Multa: Isento";
                                                                           }
                                                                       ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                            if($mes3 != "-") {
                                                                                echo number_format($mes3, 2, ',', '.')  . " Kz <hr>";
                                                                            } 
                                                                        ?>
                                                                        <?php
                                                                           if($m_m3 != "-") {
                                                                               echo  "Multa: ". number_format($m_m3, 2, ',', '.')  . " Kz ";
                                                                           } 
                                                                           else {
                                                                               echo "Multa: Isento";
                                                                           }
                                                                       ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                            if($cartao != "-") {
                                                                                echo number_format($cartao, 2, ',', '.')  . " Kz";
                                                                            } 
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                            if($manual != "-") {
                                                                                echo number_format($manual, 2, ',', '.')  . " Kz";
                                                                            } 
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                            if($certificado != "-") {
                                                                                echo number_format($certificado, 2, ',', '.')  . " Kz";
                                                                            } 
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="invoice-item">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-6 col-md-6">
                                                <div class="invoice-info">
                                                  
                                                </div>
                                            </div>
                                            
                                           
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal custom-modal  fade invoices-preview" id="invoices_preview" role="dialog">
            <div class="modal-dialog w-50 mx-auto modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card invoice-info-card">
                                    <div class="card-body pb-0">
                                        <div class="invoice-item invoice-item-one">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="invoice-logo">
                                                        <img src="assets/img/logo.png" alt="logo">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="invoice-info">
                                                        <div class="invoice-head">
                                                            <h2 class="text-primary">Ficha SDQ</h2>
                                                            <p> CFP SE DEUS QUISER</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="invoice-item invoice-item-bg">
                                            <div class="invoice-circle-img">
                                                <img src="assets/img/invoice-circle1.png" alt=""
                                                    class="invoice-circle1">
                                                <img src="assets/img/invoice-circle2.png" alt=""
                                                    class="invoice-circle2">
                                            </div>
                                            <div class="row">
                                                <div class=" col-md-12">
                                                    <div class="invoice-info">
                                                        <strong class="customer-text-one">Centro <?=$centro?></strong>
                                                            <div class="resultadoEstudante2 text-white" id="resultadoEstudante2"></div>
                                                     
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="invoice-sign-box">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="invoice-terms">
                                                        <h6>Notas:</h6>
                                                        <p class="mb-0">Formando no centro de formação profissional Se
                                                            Deus Quiser</p>
                                                    </div>
                                                    <div class="invoice-terms mb-0">
                                                        <h6>O Diretor geral.</h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="invoice-sign text-end">
                                                        <!-- <img class="img-fluid d-inline-block"
                                                            src="assets/img/signature.png" alt="sign"> -->
                                                        <span class="d-block">António Massango</span>
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
            </div>
        </div>




        

    </div>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/js/script.js"></script>
<!-- Certifique-se de ter a biblioteca jQuery incluída antes do seu código -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




<div class="foregroundd">
        <div class="div-load">
             <div class="loader"></div>
        </div>
    </div>
    <script>

        $(".foregroundd").hide();

        $("li ul li a, .ver, table a").click(function(){
            $(".foregroundd").show();
        });
       
    </script>

<script>
    $(document).ready(function() {



        // Evento keyup no campo "Número do BI / ID"
      
        $("#numero_bi_id").on("blur", function() {
            var numeroBIID = $(this).val();

            // Faz a requisição AJAX para buscar os dados do estudante
            $.ajax({
                url: "php/buscar_estudante.php", // Arquivo PHP que irá realizar a consulta no banco de dados
                type: "POST",
                data: { numero_bi_id: numeroBIID },
                dataType: "json",
                success: function(data) {
                   
                    console.log(data);
                    
    // Função para criar a string com as informações do estudante
    function criarStringInformacoes(dados) {
        var informacoesHTML = "<h4 class='text-white'>Dados do Estudante</h4>";
        informacoesHTML += "<p>ID: " + dados.id + "</p>";
        informacoesHTML += "<p>Código: " + dados.codigo + "</p>";
        informacoesHTML += "<p>Primeiro Nome: " + dados.primeiro_nome + "</p>";
        informacoesHTML += "<p>Último Nome: " + dados.ultimo_nome + "</p>";
        informacoesHTML += "<p>Telefone: " + dados.telefone_primario+ "</p>";
        informacoesHTML += "<p>Gênero: " + dados.genero + "</p>";
        informacoesHTML += "<p>BI: " + dados.bilhete_identidade + "</p>";
        informacoesHTML += "<p>Inscricao: " + dados.inscricao + " Kz</p>";
        informacoesHTML += "<p>1º Mês: " + dados.mes1 + " Kz</p>";
        informacoesHTML += "<p>2º Mês: " + dados.mes2 + " Kz</p>";
        informacoesHTML += "<p>3º Mês: " + dados.mes3 + " Kz</p>";
        informacoesHTML += "<p>Cartão: " + dados.cartao + " Kz</p>";
        informacoesHTML += "<p>Manual: " + dados.manual + " Kz</p>";
        // Adicione o restante dos dados que você deseja exibir

        return informacoesHTML;
    }

    $("#resultadoEstudante2").html(criarStringInformacoes(data));
                    
                },
                error: function() {
                    // Caso ocorra algum erro na requisição AJAX
                    Swal.fire(
                        "Ups",
                        "Ocorreu um erro ao fazer o envio!",
                        "error"
                    )
                    console.log("Erro na requisição AJAX");
                }
            });
        });

// fjyjjy


$(document).ready(function() {

    // Evento de clique no botão "Salvar"
    $("#btnSalvar").on("click", function() {
        

        var finalidade = $("#finalidade").val();
        var numeroBIID = $("#bi_id").val();
        var tipoOperacao = $("#tipo_operacao").val();
        var valor = $("#valor").val();
        var code = $("#centro").val();
        var secre = $("#secretaria").val();
        var modalidade = $("#modalidade").val();

        // Verifica se algum campo está vazio
        if (numeroBIID === '' || modalidade === '' || tipoOperacao === '' || valor === '' || code === '' || secre === '') {
            // Se algum campo estiver vazio, exibe um alerta para o usuário

            Swal.fire(
                        "Ups !",
                        "Por favor, preencha todos os campos antes de salvar!",
                        "warning"
                    )
          
            return; // Interrompe o restante do código caso haja campos vazios
        }
        inserirOperacao();

        // Faz a primeira requisição AJAX para atualizar a tabela "Formandos" com a nova "Finalidade"
        // $.ajax({
        //     url: "php/atualizar_finalidade",
        //     type: "POST",
        //     data: {
        //         finalidade: finalidade,
        //         numero_bi_id: numeroBIID,
        //         valor: valor
        //     },
        //     dataType: "json",
        //     success: function(data) {
        //         if (data.success) {
        //             // Atualização bem-sucedida, faz a segunda requisição AJAX para inserir os dados na tabela "operacoes"
        //             inserirOperacao();
        //         } else {
        //             // Caso ocorra erro na atualização, continua com a segunda requisição AJAX para inserir os dados na tabela "operacoes"
        //             inserirOperacao();
        //         }
        //     },
        //     error: function() {
        //         // Caso ocorra erro na primeira requisição, continua com a segunda requisição AJAX para inserir os dados na tabela "operacoes"
        //         inserirOperacao();
        //     }
        // });
    });

    // Função para inserir os dados na tabela "operacoes"
    function inserirOperacao() {

        var finalidade = $("#finalidade").val();
        
        var numeroBIID = $("#bi_id").val();
        var tipoOperacao = $("#tipo_operacao").val();
        var valor = $("#valor").val();
        var modalidade = $("#modalidade").val();
        var code = $("#centro").val();
        var secre = $("#secretaria").val();



        $.ajax({
            url: "php/inserir_operacao.php",
            type: "POST",
            data: {
                finalidade: finalidade,
                numero_bi_id: numeroBIID,
                tipo_operacao: tipoOperacao,
                centro: code,
                secretaria: secre,
                valor: valor,
                modalidade: modalidade
            },
            dataType: "json",
            success: function(data) {
                if (data.success) {
                    // criarPDF()
                    Swal.fire(
                        "Uhaa !",
                        data,
                        "success"
                    )
                } else {
                    Swal.fire(
                        "Ups !",
                       data.error,
                        "error"
                    )
                }
            },
            error: function(dataa) {
                Swal.fire(
                        "Uhaa !",
                        "Operação realizada com sucesso"+secre+" !",
                        "success"
                    );
                    location.reload();
                    // Swal.fire(
                    //     "Uhaa !",
                    //     "Pagamento realizado com sucesso "+secre+"!",
                    //     "success"
                    // )
                
                console.log("Erro na requisição AJAX para inserir a operação.");
            }
        });
    }

    // // Função para criar o PDF da fatura e fazer o download
    // function criarPDF() {
    //     // Crie um elemento <div> temporário para conter as informações da fatura
    //     var faturaElement = document.createElement("div");

    //     // Adicione as informações da fatura ao elemento <div>
    //     // Substitua as propriedades abaixo pelas variáveis com as informações a serem exibidas
    //     faturaElement.innerHTML = `
    //         <h1>Fatura</h1>
    //         <p>Número BI: ${numeroBIID}</p>
    //         <p>Tipo de Operação: ${tipoOperacao}</p>
    //         <p>Valor: ${valor}</p>
    //         <p>Centro: ${code}</p>
    //         <p>Secretaria: ${secre}</p>
    //         <!-- Adicione mais informações da fatura conforme necessário -->
    //     `;

    //     // Configurações para a criação do PDF
    //     const options = {
    //         margin: [15, 15, 15, 15], // Margem do PDF em milímetros (esquerda, cima, direita, baixo)
    //         filename: 'fatura.pdf', // Nome do arquivo PDF
    //         image: { type: 'jpeg', quality: 0.98 }, // Configurações para imagens no PDF
    //         html2canvas: { scale: 2 }, // Aumenta a escala do HTML para melhor qualidade
    //         jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }, // Configurações do jsPDF
    //     };

    //     // Cria o PDF a partir do elemento HTML usando html2pdf.js e salva o arquivo
    //     html2pdf().from(faturaElement).set(options).outputPdf().then(function (pdf) {
    //         // Usa jsPDF para abrir o PDF em uma nova janela do navegador para o download
    //         const fileURL = URL.createObjectURL(pdf);
    //         const windowPopup = window.open(fileURL, '_blank');
    //         if (!windowPopup) {
    //             alert('Por favor, habilite pop-ups para baixar o PDF.');
    //         }
    //     });
    // }
});


});

</script>




</body>

</html>