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
    <title>Lista de Formandos | Se Deus Quiser</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    </script>
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
                <!-- <form>
                    <input type="search" id="searchInput" class="form-control" placeholder="Pesquisar Formando ">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form> -->
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
                                <!-- <li><a href="student-dashboard.html">Formando Dashboard</a></li> -->
                            </ul>
                        </li>
                        <li class="submenu active">
                            <a href="#"><i class="fas fa-graduation-cap"></i> <span> Formandos</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="<?=$_GET['centro'] == null ? "students" : "students?centro=".$_GET['centro']?>" class="active">Lista dos Formandos</a></li>
                                <!-- <li><a href="student-details.html">Formando View</a></li> -->
                                <li><a href="<?=$_GET['centro'] == null ? "add-student" : "add-student?centro=".$_GET['centro']?>">Adicionar Formando </a></li>
                                <!-- <li><a href="edit-student.html">Formando Edit</a></li> -->
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
                                <h3 class="page-title">Formandos</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?=$_GET['centro'] == null ? "students" : "students?centro=".$_GET['centro']?>">Formandos</a></li>
                                    <li class="breadcrumb-item active">Todos Formandos</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="student-group-form">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="search" class="form-control" id="searchInput" placeholder="Pesquisar Formando ...">
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table comman-shadow">
                            <div class="card-body">

                                <div class="page-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="page-title">Formandos</h3>
                                        </div>
                                        <div class="col-auto text-end float-end ms-auto download-grp">
                                            <a href="<?=$_GET['centro'] == null ? "students" : "students?centro=".$_GET['centro']?>" class="btn btn-outline-gray me-2 active"><i
                                                    class="feather-list"></i></a>
                                            <a  id="downloadLink" class="btn btn-outline-primary me-2"><i
                                                    class="fas fa-download"></i> Baixar</a>
                                            <a href="<?=$_GET['centro'] == null ? "add-student" : "add-student?centro=".$_GET['centro']?>" class="btn linkk btn-primary"><i
                                                    class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="myTable"
                                        class="table border-0 star-Formando table-hover table-center mb-0 datatable table-striped">
                                        <thead class="student-thread">
                                            <tr>
                                                
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Curso </th>
                                                <th><?=abreviarTexto("Data de Inscrição", 15)?></th>
                                                <th>Telefone</th>
                                                <th>Inscrição</th>
                                                <th>Primeiro Mês</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $centro_codi = $centro .'%';
                                            $devs = "SELECT * FROM estudantes WHERE inscricao != '' and codigo LIKE '$centro_codi'";
                                            $dev = $conexao->query($devs);
                                            while ($dd = mysqli_fetch_array($dev)) {
                                                $dataFormatada = date("H:i, d \d\e M, Y", strtotime($dd['quando']));

                                          ?>
                                                <tr>
                                                    <td><a href="add-invoice?student=<?php echo $dd['bilhete_identidade'];  if($_GET['centro'] == null ) { echo ""; } else { echo "&centro=".$_GET['centro']; } ?>"><?= $dd['codigo']."".$dd['id'] ?></a></td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a><?= $dd['primeiro_nome']  ?></a>
                                                        </h2>
                                                    </td>
                                                    <td title="<?=$dd['curso_escolhido']?>"><?= abreviarTexto($dd['curso_escolhido'], 25) ?></td>
                                                    <td><?= $dataFormatada ?></td>
                                                    <td><?= $dd['telefone_primario'] ?></td>
                                                    <td>
                                                        <?php
                                                        // Verifica se cada coluna (mes1, mes2, mes3, cartao) é igual a '-' e imprime o valor correspondente
                                                        if ($dd['inscricao'] != '') {
                                                            echo  number_format($dd['inscricao'], 2, ',', '.') . ' Kz ';
                                                        } else {
                                                            echo `<span class="badge badge-danger">Devedor</span>`;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-start">
                                                    <?php
                                                        // Verifica se cada coluna (mes1, mes2, mes3, cartao) é igual a '-' e imprime o valor correspondente
                                                        if ($dd['mes1'] != '-') {
                                                            ?>
                                                             <span class="badge badge-success">Pago</span>
                                                        
                                                       <?php
                                                        } else {
                                                            ?>
                                                            <span class="badge badge-danger">Devedor</span>
                                                       
                                                      <?php
                                                        }
                                                        ?>
                                                        
                                                    </td>
                                                    <td title="Ver Ficha de <?= $dd['primeiro_nome']  ?>"><a href="student-details?student=<?php echo $dd['bilhete_identidade']; if($_GET['centro'] == null ) { echo ""; } else { echo "&centro=".$_GET['centro']; }?>"><i class="fas fa-eye"></i></a></td>
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

        $("li ul li a, .linkk , table a").click(function(){
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
    downloadLink.download = "lista_Formandos_sdq.xlsx"; // Change the filename if needed
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
            var nome = $(this).find("td:eq(1) h2 a").text().toLowerCase(); // Obtém o nome do Formando da segunda coluna
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