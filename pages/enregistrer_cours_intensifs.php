<?php 
session_start();
if(!$_SESSION["user"])
{
  header("location: page_identification.php");
} 
?>







<?php
include("../connexion.php");

if (isset($_POST["add"])) {
    $hpa_name = $_POST["hpa_name"];
    $libelle = $_POST["libelle"];
    $objectif = $_POST["objectif"];
    $module = $_POST["module"];
    $cible = $_POST["cible"];
    $prerequis = $_POST["prerequis"];
    $duree = $_POST["duree"];
    $image = $_FILES["image"]["name"];
    $file_extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx'];
    
    if (in_array($file_extension, $allowed_extensions)) {
        $unique_name = uniqid() . '.' . $file_extension;
        $repertoire = "images_cours_intensifs/" . $unique_name;
        $tmp = $_FILES["image"]["tmp_name"];

        if (move_uploaded_file($tmp, $repertoire)) {
            $stmt = mysqli_prepare($con, "INSERT INTO `cours_intensifs` (`hpa_name`, `libelle`, `objectif`, `module`, `cible`, `prerequis`, `duree`, `repertoire`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "ssssssss", $hpa_name, $libelle, $objectif, $module, $cible, $prerequis, $duree, $repertoire);
            
            if (mysqli_stmt_execute($stmt)) {
                header("location:dashbord_cours_intensifs.php");
            } else {
                echo "Erreur lors de l'insertion des données : " . mysqli_error($con);
            }
        } else {
            echo "Erreur lors du téléchargement de l'image.";
        }
    } else {
        echo "Type de fichier non autorisé.";
    }
}
?>












<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <!--fav icone-->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">  <title>
HPA-ADD-COURS  </title>
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
                <h5 style="color: rgb(47,66,120);" >Ajouter un cours</h5>
              </div>
              <div class="card-body">
                <form role="form text-left" method="post" enctype="multipart/form-data">

                  <div class="mb-3">
                    <label for="Exemple: Level 1">HPA_Name</label>
                    <input type="text" name="hpa_name" class="form-control" placeholder="Level 1" aria-label="Name" aria-describedby="email-addon">
                  </div>

                  <div class="mb-3">
                    <label for="Libelle cours">Libellé cours</label>
                    <textarea name="libelle" id="commentaire" cols="3" rows="2" placeholder="Niveau basic"class="form-control" required></textarea> <br>
                  </div>

                  <div class="mb-3">
                    <label for="Objectifs">Objectifs</label>
                    <textarea name="objectif" id="commentaire" cols="3" rows="15" placeholder="Objectifs..."class="form-control" required></textarea> <br>
                  </div>

                  <div class="mb-3">
                    <label for="Modules">Modules</label>
                    <textarea name="module" id="commentaire" cols="3" rows="15" placeholder="Modules..."class="form-control" required></textarea> <br>
                  </div>
               
                  <div class="mb-3">
                    <label for="Cibles">Cibles</label>
                    <textarea name="cible" id="commentaire" cols="3" rows="5"  placeholder="Cibles..." class="form-control" required></textarea> <br>
                  </div>

                  <div class="mb-3">
                    <label for="Prerequis">Prerequis</label>
                    <input type="text" name="prerequis" class="form-control" placeholder="Prerequis... " aria-label="Password" aria-describedby="password-addon" required>
                  </div>

                  <div class="mb-3">
                    <label for="Duree">Durée</label>
                    <textarea name="duree" id="commentaire" cols="3" rows="2" placeholder="3 mois (Tous les Lundi & Jeudi de 18h00 à 20h00)" class="form-control" required></textarea> <br>
                  </div>

                  <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" placeholder="image" aria-label="Password" aria-describedby="password-addon" required>
                  </div>
                
                  <div class="text-center">
                    <button type="submit"  name="add" class="btn bg-gradient-dark w-100 my-4 mb-2">Valider</button>
                  </div>
                </form>
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