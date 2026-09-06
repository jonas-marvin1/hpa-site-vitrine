<?php 
session_start();
if(!$_SESSION["user"])
{
  header("location: page_identification.php");
  // header() ne stoppe pas l'execution : sans exit, le script continue,
  // interroge la base et renvoie son contenu meme sans redirection suivie
  exit;
}
?>





<?php

include("../connexion.php");
$errorMessage = "";

if (isset($_POST["submit"])) {
    $infos = $_POST["infos"];

    // Utilisation d'une requête préparée pour éviter les injections SQL
    $req = "UPDATE infos SET infos = ?";
    $stmt = mysqli_prepare($con, $req);

    if ($stmt) {
        // Liaison de la valeur
        mysqli_stmt_bind_param($stmt, "s", $infos);

        // Exécution de la requête
        if (mysqli_stmt_execute($stmt)) {
            header("location:dashbord_infos.php");
            exit(); // Assurez-vous de quitter le script après la redirection.
        } else {
            $errorMessage = "Erreur lors de la mise à jour.";
        }
        mysqli_stmt_close($stmt);
    } else {
        $errorMessage = "Erreur lors de la préparation de la requête.";
    }
}






// include("../connexion.php");

//   $errorMessage = "";

//   if(isset($_POST["submit"])){

// 	    $infos=$_POST["infos"];

//          $req = "UPDATE infos set infos =$infos";
//          $resultat = mysqli_query($con, $req);
         

// 	if($resultat){ header("location:dashbord_infos.php "); }else    
// 	$errorMessage = "Vider le champ et saisie à nouveau le texte manuellement !";

//   }

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
  <title>
HPA-INFOS
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
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/form.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">High Performance Academy</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h5 style="color: rgb(47,66,120);" >Modifier l'infos</h5>
              </div>
              <div class="card-body">


              <?php
              include("../connexion.php");
              $req = "SELECT * FROM infos ";
              $res = mysqli_query($con,$req);
              while ($row = mysqli_fetch_assoc($res)) {
               ?>


                <div id="error-message" class="error"><?php echo $errorMessage; ?></div>


                <form role="form text-left" method="post" >
                  <div class="mb-3">
                <textarea type="text" name="infos" id="infos" cols="5" rows="10" placeholder="HPA_Information" class="form-control"  required><?php echo $row['infos']; ?></textarea>
                  
              </div>
                  <div class="text-center">
                    <input type="submit" name="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" value="enregistrer" >
                  </div>
                </form>
                
                <?php } ?>


              </div>
            </div>
          </div>
        </div>
      </div>
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
    .error {
  color: #ff0000; /* Couleur du texte en rouge */
  font-size: 14px; /* Taille de la police */
  font-weight: bold; /* Texte en gras */
  margin-top: -50px; /* Marge supérieure pour espacement */
}
</style>