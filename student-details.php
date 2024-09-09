
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
            

        $st_code = Null;

        if(isset($_GET['student'])) {
            $st_code =  $_GET['student'];

                    
        $loggg= "SELECT * FROM estudantes WHERE bilhete_identidade = '$st_code'";
        $con_loggg = $conexao->query($loggg);
        $num_rllg = mysqli_num_rows($con_loggg);

                $log_datasss = mysqli_fetch_array($con_loggg);
                $nome_st = $log_datasss['primeiro_nome']; 
                $email_st = $log_datasss['email']; 
                $id_st = $log_datasss['id'];
                $tele = $log_datasss['telefone_primario'];
                $centro_st = $log_datasss['centro'];
                $curso = $log_datasss['curso_escolhido'];
                $ciclo = $log_datasss['ciclo'];
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
        } 

        $editable = true;

?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Ficha de Formando | SDQ </title>

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/dist/sweetalert2.css">
    <script src="assets/dist/sweetalert2.js"></script>
   
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

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
            <li class="submenu active">
                <a href="#"><i class="fas fa-graduation-cap"></i> <span> Formandos</span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="<?=$_GET['centro'] == null ? "students" : "students?centro=".$_GET['centro']?>" class="active">Lista dos Formandos</a></li>
                    <!-- <li><a href="student-details.html">Student View</a></li> -->
                    <li><a href="<?=$_GET['centro'] == null ? "add-student" : "add-student?centro=".$_GET['centro']?>">Adicionar Formando </a></li>
                    <!-- <li><a href="edit-student.html">Student Edit</a></li> -->
                </ul>
            </li>
          
            <li class="submenu ">
                <a href="#"><i class="fas fa-clipboard"></i> <span> Operações</span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="<?=$_GET['centro'] == null ? "invoices" : "invoices?centro=".$_GET['centro']?>">Movimentos</a></li>
                    <!-- <li><a href="invoice-grid.html">Invoices Grid</a></li> -->
                    <!-- <li><a href="add-invoice" class="">Entrada</a></li> -->
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Ficha de Estudante</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Estudante</a></li>
                                    <li class="breadcrumb-item active">Ficha de Formando </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ficha" class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="about-info">
                                    <!-- <h4>Ficha <?=$st_code?> <span><a href="javascript:;"><i
                                                    class="feather-more-vertical"></i></a></span></h4> -->
                                </div>
                                <div class="student-profile-head">
                                    <div class="profile-bg-img text-center" style="background: #f71d7f98; border-top-left-radius: 10px; border-top-right-radius: 10px">
                                        <img src="assets/img/logo.png"  class="img-fluid w-50 m-5" style="opacity: .2; " alt="Profile">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-6">
                                            <div class="profile-user-box">
                                                <div class="profile-user-img">
                                                    <img src="assets/img/profile-user.png" alt="Profile">
                                                   
                                                </div>
                                                <div class="names-profiles">
                                                    <h4><?=$nome_st." - <span class='text-info'>Ficha Nº".$log_datasss['codigo']."".$log_datasss['id']."</span>"?></h4>
                                                    <h5><?=$curso?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-6 d-flex align-items-center">
                                            <div class="follow-btn-group">
                                                <a href="add-invoice?student=<?php echo $st_code; if($_GET['centro'] == null ) { echo ""; } else { echo "&centro=".$_GET['centro']; }?>" class="btn pagar  btn-info follow-btns">Efectuar Pagamento</a>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-4">
                                <div class="student-personals-grp">
                                    <div class="card">
                                            <div class="heading-detail mx-4 mt-4">
                                                <h4>Detalhes Pessoais:</h4>
                                            </div>
                                        <div class="card-body d-flex flex-wrap gap-2">
                                            
                                            <div class="personal-activity mx-3 m-2">
                                                <div class="personal-icons">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div class="views-personal">
                                                    <h4>Nome</h4>
                                                    <h5><?=$nome_st?></h5>
                                                </div>
                                            </div>
                                            <div class="personal-activity mx-3 m-2">
                                                <div class="personal-icons">
                                                    <i class="fas fa-id-card"></i>
                                                </div>
                                                <div class="views-personal">
                                                    <h4>Identificação</h4>
                                                    <h5><?=$bi?></h5>
                                                </div>
                                            </div>
                                            <div class="personal-activity mx-3 m-2">
                                                <div class="personal-icons">
                                                    <i class="fas fa-school"></i>
                                                </div>
                                                <div class="views-personal">
                                                    <h4>Curso </h4>
                                                    <h5><?=$curso?></h5>
                                                </div>
                                            </div>
                                            <div class="personal-activity mx-3 m-2">
                                                <div class="personal-icons">
                                                    <i class="fas fa-school"></i>
                                                </div>
                                                <div class="views-personal">
                                                    <h4>Ciclo </h4>
                                                    <h5><?=$ciclo?></h5>
                                                </div>
                                            </div>
                                            <div class="personal-activity mx-3 m-2">
                                                <div class="personal-icons">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                                <div class="views-personal">
                                                    <h4>Telefone</h4>
                                                    <h5>+244 <?=$tele?></h5>
                                                </div>
                                            </div>
                                            <div class="personal-activity mx-3 m-2">
                                                <div class="personal-icons">
                                                    <i class="fas fa-envelope-open"></i>
                                                </div>
                                                <div class="views-personal">
                                                    <h4>Email</h4>
                                                    <h5><a href="mailto:<?=$email_st?>" class="__cf_email__"><?=$email_st?></a>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="personal-activity mx-3 m-2">
                                                <div class="personal-icons">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div class="views-personal">
                                                    <h4>Genero</h4>
                                                    <h5><?=$genero?></h5>
                                                </div>
                                            </div>
                                            <div class="personal-activity mx-3 m-2">
                                                <div class="personal-icons">
                                                    <i class="fas fa-calendar"></i>
                                                </div>
                                                <div class="views-personal">
                                                    <h4>Nascimento</h4>
                                                    <h5><?=$nasc_st?></h5>
                                                </div>
                                            </div>
                                            <div class="personal-activity mx-3 m-2">
                                                <div class="personal-icons">
                                                    <i class="fas fa-user-tie-"></i>
                                                </div>
                                                <div class="views-personal">
                                                    <h4>Profissão</h4>
                                                    <h5><?=$profissao?></h5>
                                                </div>
                                            </div>
                                            <div class="personal-activity mx-3 m-2 mb-0">
                                                <div class="personal-icons">
                                                    <i class="feather-map-pin"></i>
                                                </div>
                                                <div class="views-personal">
                                                    <h4>Nivel Escolar</h4>
                                                    <h5><?=$nivel?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-xxl-8 pb-5">
                                <h3>Emolumentos</h3>
                                <table class="table table-hovered table-striped">
                                    <thead>
                                        <tr>
                                            <input type="hidden" value="<?=$id_st?>" id="idd">
                                            <th>1.º Mês</th>
                                            <th>2.º Mês</th>
                                            <th>3.º Mês</th>
                                            <th>Cartão</th>
                                            <th>Manual</th>
                                            <th>Certificado</th>
                                            <th>Ações</th>
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

            <footer>
                <p>Copyright © 2023 Se Deus Quiser.</p>
            </footer>

        </div>

    </div>


    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>



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

        $("li ul li a, .pagar, table a").click(function(){
            $(".foregroundd").show();
        });
       
    </script>


    <script>

        $(".savee").click(function() {
            const id = $(this).closest('tr').find('[data-id]').data('id');
            const mes1 = $(this).closest('tr').find('#mes1').val();
            const mes2 = $(this).closest('tr').find('#mes2').val();
            const mes3 = $(this).closest('tr').find('#mes3').val();
            const cartao = $(this).closest('tr').find('#cartao').val();
            const manual = $(this).closest('tr').find('#manual').val();
            const cert = $(this).closest('tr').find('#certificado').val();

            $.ajax({
                url: "php/update-data.php",
                type: "POST",
                data: {
                    id: id,
                    mes1: mes1,
                    mes2: mes2,
                    mes3: mes3,
                    cartao: cartao,
                    manual: manual,
                    cert: cert
                },
                dataType: "json",
                success: function(data) {
                    if (data.success) {
                        Swal.fire("Dados atualizados com sucesso!", "", "success");
                        location.reload();
                    } else {
                        Swal.fire("Erro ao atualizar os dados.", "", "error");
                    }
                },
                error: function() {
                    Swal.fire("Erro na requisição AJAX para atualizar os dados.", "", "error");
                }
            });
        });

    </script>
</body>

</html>