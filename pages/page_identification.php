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
            
            $_SESSION["user"] = $user;
            $_SESSION["mdp"] = $mdp;
            
            header("location:dashbord_formation.php");
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
<html lang="en">

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
HPA-CONNEXION
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
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient" >Se connecter</h3>
                  <p class="mb-0">Entrer vos coordonnées svp !</p>
                </div>
                <div class="card-body">

                  <form role="form" method="post" >
                    <label>User</label>
                    <div class="mb-3">
                      <input type="text" name="user" class="form-control" placeholder="User" aria-label="Email" aria-describedby="email-addon">
                    </div>
                    <label>Mot de passe</label>
                    <div class="mb-3">
                      <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" aria-label="Password" aria-describedby="password-addon">
                    </div>
                   
                    <div class="text-center">
                      <button type="submit" name="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Valider</button>
                    </div>
                  </form>
                  
                  
                  
                  
                  
                  
                  <div id="error-message" class="error"><?php echo $errorMessage; ?></div>







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


<style>
    /* Style CSS pour les messages d'erreur */
.error {
  color: #ff0000; /* Couleur du texte en rouge */
  font-size: 14px; /* Taille de la police */
  font-weight: bold; /* Texte en gras */
  margin-top: 10px; /* Marge supérieure pour espacement */
text-align: center;
}
  
  
}


</style>
















