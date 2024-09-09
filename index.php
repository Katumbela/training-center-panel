<?php
// Inicie a sessão
session_start();

// Verifique se a sessão está ativa e se existe a chave "id" na sessão
if (isset($_SESSION['id'])) {
    // Redirecione o usuário para a página /home.php
    header("Location: home");
    exit; // Certifique-se de sair do script após o redirecionamento
}
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
    <title>Entrar | Centro de Formação Profissional Se Deus Quiser</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <meta name="description" content="Painel Administrativo do Centro Profissional Se Deus Quiser. Desenvolvido por João Afonso Katombela.">
    <meta name="author" content="João Afonso Katombela. Gokside, Gokourses">
   <link rel="manifest" href="manifest.json">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

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

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="assets/img/loginnnnn.png" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <center>
                                <img src="./assets/img/logo.png" class="img-fluid" alt="">
                                <!-- <h1 class="mx-auto">Se Deus Quiser</h1> -->
                            </center>
                           <hr>
                           <br>
                            <!-- <p class="account-subtitle">Need an account? <a href="register.html">Sign Up</a></p> -->
                            <!-- <h2>Sign in</h2> -->

                            <form action="php/login" method="post">
                                <div class="form-group">
                                    <label>Usuario <span class="login-danger">*</span></label>
                                    <input name="usuario" class="form-control" type="text">
                                    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                </div>
                                <div class="form-group">
                                    <label>Palavra passe <span class="login-danger">*</span></label>
                                    <input name="senha" class="form-control pass-input" type="text">
                                    <span class="profile-views feather-eye toggle-password"></span>
                                </div>
                                <div class="forgotpass">
                                    <div class="remember-me">
                                        <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Lembrar de mim
                                            <input type="checkbox" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Entrar </button>
                                </div>

                                <?php
                                if(isset($_GET['ref']) == "err") {
                                    ?>

                                            <div class="alert alert-danger text-center">Usuario ou senha errada! <br> <span class="" style="font-size: 11px">Se persistir contacte a administração.</span></div>

                                    <?php


                                }
                                else if(isset($_GET['ref']) == "exp") {
                                    ?>

                                            <div class="alert alert-warning text-center">Sua sessão expirou, faça login novamente! <br> <span class="" style="font-size: 11px">Se persistir contacte a administração.</span></div>

                                    <?php


                                }

                                ?>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

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


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>