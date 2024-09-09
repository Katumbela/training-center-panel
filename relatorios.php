
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
            

?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Relatorios | SDQ</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper">


    <div class="header">

    
<div class="header-left">
    <a href="" class="logo">
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
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Relatorios dos centros</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=$_GET['centro'] == null ? "home" : "admin_dashboard?centro=".$_GET['centro']?>">Inicio</a></li>
                                <li class="breadcrumb-item active">Relatorios</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">

                                <div class="page-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="page-title">Relatorios dos Centros</h3>
                                        </div>
                                        <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a id="downloadLink" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Baixar</a>
                                            <a href="add-fees-collection.html" class="btn btn-primary"><i
                                                    class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                               <div class="row">
                               <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <input type="search" class="form-control" id="searchInput" placeholder="Pesquisar por centro ou secretaria ...">
                                    </div>
                                </div>

                               </div>
                                <div class="table-responsive" >
                                    <table id="myTable"
                                        class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                        <thead class="student-thread" >
                                            <tr>
                                            <?php
                                                        if($funcao =='Diretor Geral') {
                                                            ?>
                                                <th>#</th>
                                                <?php
                                                        }
                                                    ?>
                                                    <th></th>
                                                    <th>Secretario/a</th>
                                                    <th>Centro</th>
                                                    <th>Total Entradas</th>
                                                    <th>Entradas TPA</th>
                                                    <th>Entradas Cash</th>
                                                    <th>Entradas Dep.</th>
                                                    <th>Entradas Trans.</th>
                                                    <th>Total Saidas</th>
                                                    <th>Caixa</th>
                                                    <!-- <th>Quantia</th> -->
                                                    <th class="text-">Data</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                         <?php
                                            $devs = "SELECT * FROM relatorios  ";
                                              $dev = $conexao->query($devs);
                                            while ($dd = mysqli_fetch_array($dev)) {



                                                $timestampLogin = strtotime($dd['quando']);

                                                // Somar 5 horas ao timestamp do login (5 * 3600 segundos)
                                                $timestampSomaHoras = $timestampLogin + (5 * 3600);

                                                // Formatar a nova data e hora com a soma das 5 horas
                                                $dataFormatada = date('d \d\e M. Y, H:i', $timestampSomaHoras);

                                          ?>
                                                <tr>
                                                   
                                                    <td><a href="<?php if($_GET['centro'] == null) { echo "view-relatorio?rel=".base64_encode($dd['id']); } else { echo "view-relatorio?rel=".base64_encode($dd['id'])."&centro=".$_GET['centro']; }?>">Ver</a></td>
                                                    <td><?= $dd['secretaria'] ?></td>
                                                    <td>
                                                       
                                                            <a><?= $dd['centro']  ?></a>
                                                        
                                                    </td>
                                                    <td>
                                                       
                                                       <a><?php

                                                            $ttgg = $dd['geral'] ;
                                                                                                                
                                                            echo number_format($ttgg, 2, ',', '.')  . " Kz"  ?>

                                    </a>
                                                   
                                                    </td>  
                                                    <td>
                                                            
                                                            <a><?= number_format($dd['entrada_tpa'], 2, ',', '.')  . " Kz" ?></a>
                                                        
                                                    </td>
                                                    <td>
                                                       
                                                       <a><?= number_format($dd['entrada_cash'], 2, ',', '.') . " Kz" ?></a>
                                                   
                                                    </td>
                                                    <td>
                                                       
                                                       <a><?= number_format($dd['entrada_dep'], 2, ',', '.') . " Kz" ?></a>
                                                   
                                                    </td>
                                                    <td>
                                                       
                                                       <a><?= number_format($dd['entrada_transf'], 2, ',', '.') . " Kz" ?></a>
                                                   
                                                    </td>
                                                    <td>
                                                       
                                                       <a><?= number_format($dd['saida'], 2, ',', '.') . " Kz" ?></a>
                                                   
                                                     </td>
                                                     <td>
                                                       
                                                       <a><?php
                                                       $ttg = $dd['entrada_tpa'] + $dd['entrada_cash'] - $dd['saida'];
                                                       
                                                       echo number_format($ttg, 2, ',', '.')  . " Kz"  ?></a>
                                                   
                                                    </td>
                                                    <td><?= $dataFormatada ?></td>
                                                    
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

            <footer>
                <p>Copyright © 2023 Se Deus Quiser.</p>
            </footer>

        </div>

    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/plugins/datatables/datatables.min.js"></script>

    <script src="assets/js/script.js"></script>
<!-- Add the SheetJS library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>


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
  document.getElementById("downloadLink").addEventListener("click", function () {
    // Get the table reference
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
    downloadLink.download = "lista_relatorios_sdq.xlsx"; // Change the filename if needed
    downloadLink.click();

    // Clean up
    setTimeout(function () {
      URL.revokeObjectURL(url);
    }, 0);
  });





</script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
  $(document).ready(function () {
    // Captura o evento keyup do input
    $("#searchInput").on("keyup", function () {
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

</body>




</html>