<?php 
session_start();
if(!$_SESSION["user"])
{
  header("location: page_identification.php");
  // header() ne stoppe pas l'execution : sans exit, le script continue et
  // modifie les donnees meme sans authentification valide
  exit;
}
?>



<?php
include("../connexion.php");
$user_id = isset($_GET["id"]) ? intval($_GET["id"]) : 0; 
  if(isset($_POST["envoyer"])){

	$nom=$_POST["nom"];
	$prenom=$_POST["prenom"];
	$user=$_POST["user"];
	$mdp=$_POST["mdp"];
	
	$hash = password_hash($mdp, PASSWORD_DEFAULT);

  $stmt = mysqli_prepare($con, "UPDATE user set nom = ?, prenom = ?, user = ?, mdp = ? where id = ?");
  mysqli_stmt_bind_param($stmt, "ssssi", $nom, $prenom, $user, $hash, $user_id);
  $resultat = mysqli_stmt_execute($stmt);

	if($resultat){ header("location:dashbord_utilisateur.php "); }else  echo "error";

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
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
MODIFIER UN UTILISATEUR  
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
                <h5 style="color: rgb(47,66,120);" >Modifier les infos d'un Utilisateur</h5>
              </div>
              <div class="card-body">

              <?php
                 include("../connexion.php");
               
                 $req = "SELECT * FROM user where id = '$user_id' ";
                 $res = mysqli_query($con, $req);
                 while ($row = mysqli_fetch_assoc($res)) {
               ?>

              <form role="form text-left" method="post" >
                  <div class="mb-3">
                       <input type="text" name="nom" value="<?php echo $row['nom']; ?>" class="form-control" placeholder="nom" aria-label="Email" aria-describedby="email-addon" required>
                  </div>
                  
                  
                  <div class="mb-3">
                    <input type="text" name="prenom" value="<?php echo $row['prenom']; ?>" class="form-control" placeholder="Prenom" aria-label="Email" aria-describedby="email-addon" required>
                  </div>
                  
                  
                  <div class="mb-3">
                    <input type="text" name="user" value="<?php echo $row['user']; ?>" class="form-control" placeholder="User" aria-label="Email" aria-describedby="email-addon" required>
                  </div>
                  
                  
                  <div class="mb-3">
                    <input type="text" name="mdp"  class="form-control" placeholder="Mot de passe..." aria-label="Password" aria-describedby="password-addon" required>
                  </div>
              
                  <div class="text-center">
                    <button type="submit" name="envoyer" class="btn bg-gradient-dark w-100 my-4 mb-2">Valider</button>
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

