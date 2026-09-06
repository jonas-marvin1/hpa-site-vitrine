<?php
session_start();
include("../connexion.php");

$errorMessage = "";


	if (isset($_POST["submit"])) {		
    $user = $_POST["user"];
    $mdp = $_POST["mdp"];
    
    $stmt = mysqli_prepare($con, "SELECT * FROM user WHERE user = ?");
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $re = mysqli_stmt_get_result($stmt);
    
    if ($re && mysqli_num_rows($re) > 0) {

        $row = mysqli_fetch_assoc($re);
        $hashFromDatabase = $row["mdp"];
        
        if (password_verify($mdp, $hashFromDatabase)) {

            session_regenerate_id(true);
            $_SESSION["user"] = $user;
            // On ne stocke pas le mot de passe en session : il n'est lu nulle part dans le site.

            header("location:dashbord_formation.php");
            exit;
        } else {
             $errorMessage = "MOT DE PASSE INCORRECT";
            // echo "MOT DE PASSE INCORRECT";
        }
    } else {
        // echo "UTILISATEUR NON TROUVÉ";
        $errorMessage = "UTILISATEUR NON TROUVÉ";

    }
    
        // echo '<script>document.getElementById("error-message").innerHTML = "'. $errorMessage .'";</script>';

}

	

?>





<!DOCTYPE html>
<html lang="fr">

<head>

     <!--fav icone-->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">



  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <!--<link rel="icon" type="image/png" href="../assets/img/favicon.png">-->
  <title>
Connexion — Administration du site HPA
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <style>
    /* Identité "administration du site public", distincte du LMS (qui utilise l'orange comme accent principal) */
    .admin-top-bar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background-color: #1b365d;
      z-index: 1050;
    }

    .admin-logo {
      max-width: 140px;
    }

    .admin-badge {
      display: inline-block;
      background-color: #e8edf5;
      color: #1b365d;
      font-size: 0.7rem;
      font-weight: 700;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      padding: 0.35rem 0.9rem;
      border-radius: 50px;
    }

    .admin-title {
      color: #1b365d;
    }

    .admin-domain {
      color: #adb5bd;
      font-size: 0.8rem;
    }

    .admin-card {
      max-width: 450px;
      width: 100%;
      border-radius: 1rem;
      box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.1);
    }

    .btn-admin-connexion {
      background-color: #f15b24;
      border-color: #f15b24;
      color: #fff;
    }

    .btn-admin-connexion:hover,
    .btn-admin-connexion:focus {
      background-color: #d94e1c;
      border-color: #d94e1c;
      color: #fff;
    }
  </style>
</head>

<body class="">
  <div class="admin-top-bar"></div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">

              <div class="text-center mb-4">
                <img src="../assets/img/logo.png" alt="Logo HPA" class="admin-logo">
              </div>

              <?php if (!empty($errorMessage)): ?>
              <div class="alert alert-danger text-center" role="alert">
                <?php echo $errorMessage; ?>
              </div>
              <?php endif; ?>

              <div class="card card-plain admin-card mx-auto">
                <div class="card-header pb-0 text-center bg-transparent">
                  <span class="admin-badge mb-3">Administration du site</span>
                  <h3 class="font-weight-bolder admin-title mt-3">Connexion</h3>
                  <p class="mb-0 text-secondary">Contenus du site public, préinscriptions et candidatures</p>
                  <p class="admin-domain mb-0">hpacademya.com</p>
                </div>
                <div class="card-body">

                  <form role="form" method="post" >
                    <label>Identifiant</label>
                    <div class="mb-3">
                      <input type="text" name="user" class="form-control" placeholder="Identifiant" aria-label="Identifiant" autocomplete="username" autofocus>
                    </div>
                    <label>Mot de passe</label>
                    <div class="mb-3">
                      <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" aria-label="Password" autocomplete="current-password">
                    </div>

                    <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-admin-connexion w-100 mt-4 mb-0">Se connecter</button>
                    </div>
                  </form>







                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Vous n'avez pas de compte ?
                    <a href="../index.php" class="text-info text-gradient font-weight-bold">Retour au site web</a>
                  </p>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </section>
  </main>
  

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
