<?php 
session_start();
if(!$_SESSION["user"])
{
  header("location: page_identification.php");
} 
?>











<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=u120571238_bd_hpa_2023", "u120571238_new_base", "1HPA_Success");

    // Configuration pour obtenir des erreurs PDO
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Données à insérer
    $hpa = $_POST["hpa"];
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
        $repertoire = "images_formation/" . $unique_name;
        $tmp = $_FILES["image"]["tmp_name"];

        // Démarre une transaction
        $db->beginTransaction();

        // Requête d'insertion préparée
        $sql = "INSERT INTO formation (hpa, libelle, objectif, module, cible, prerequis, duree, image_name, repertoire) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(1, $hpa);
        $stmt->bindParam(2, $libelle);
        $stmt->bindParam(3, $objectif);
        $stmt->bindParam(4, $module);
        $stmt->bindParam(5, $cible);
        $stmt->bindParam(6, $prerequis);
        $stmt->bindParam(7, $duree);
        $stmt->bindParam(8, $image);
        $stmt->bindParam(9, $repertoire);

        // Exécution de la requête préparée
        if ($stmt->execute()) {
            // Déplace le fichier téléchargé
            if (move_uploaded_file($tmp, $repertoire)) {
                // Valide la transaction
                $db->commit();
                header("location:dashbord_formation.php");
            } else {
                // Annule la transaction en cas d'erreur
                $db->rollback();
                echo "Erreur lors du téléchargement du fichier.";
            }
        } else {
            // Annule la transaction en cas d'erreur
            $db->rollback();
            // echo "Erreur lors de l'exécution de la requête d'insertion.";
        }
    } else {
        echo "Type de fichier non autorisé.";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>

























<?php

// include("../connexion.php");

// if (isset($_POST["add"])) {
//     $hpa = $_POST["hpa"];
//     $libelle = $_POST["libelle"];
//     $objectif = $_POST["objectif"];
//     $module = $_POST["module"];
//     $cible = $_POST["cible"];
//     $prerequis = $_POST["prerequis"];
//     $duree = $_POST["duree"];

//     $image = $_FILES["image"]["name"];
//     $repertoire = "images_formation/" . $image;
//     $tmp = $_FILES["image"]["tmp_name"];

//     if (move_uploaded_file($tmp, $repertoire)) {
//         // Requête préparée
//         $req = "INSERT INTO formation (hpa, libelle, objectif, module, cible, prerequis, duree, image, repertoire) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
//         // Création de la requête préparée
//         $stmt = mysqli_prepare($con, $req);

//         if ($stmt) {
//             // Liaison des paramètres avec les valeurs
//             mysqli_stmt_bind_param($stmt, "sssssssss", $hpa, $libelle, $objectif, $module, $cible, $prerequis, $duree, $image, $repertoire);

//             // Exécution de la requête préparée
//             if (mysqli_stmt_execute($stmt)) {
//                 header("location:dashbord_formation.php");
//             } else {
//                 echo "Erreur lors de l'exécution de la requête d'insertion.";
//             }

//             // Fermeture de la requête préparée
//             mysqli_stmt_close($stmt);
//         } else {
//             echo "Erreur lors de la création de la requête préparée.";
//         }
//     } else {
//         echo "Erreur lors du téléchargement du fichier.";
//     }
// }
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
HPA-ADD-FORMATION  </title>
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
                <h5 style="color: rgb(47,66,120);" >Ajouter une formation</h5>
              </div>
              <div class="card-body">
                <form role="form text-left" method="post" enctype="multipart/form-data">

                  <div class="mb-3">
                    <label for="HPA_Name ( Exemple: CPAND)">HPA_Name</label>
                    <input type="text" name="hpa" class="form-control" placeholder="CPAND" aria-label="Name" aria-describedby="email-addon">
                  </div>

                  <div class="mb-3">
                    <label for="Libelle formation">Libellé formation</label>
                    <textarea name="libelle" id="commentaire" cols="3" rows="2" placeholder="Certificat Profesionnel en Anglais Niveau Debutant"class="form-control" required></textarea> <br>
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