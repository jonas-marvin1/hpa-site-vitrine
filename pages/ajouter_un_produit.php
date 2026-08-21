<?php 
session_start();
if(!$_SESSION["user"]) {
  header("location: page_identification.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("../connexion.php");
    $titre = mysqli_real_escape_string($con, $_POST["titre"]);
    $description = mysqli_real_escape_string($con, $_POST["description"]);
    $prix_actuel = floatval($_POST["prix_actuel"]);
    $prix_barre = !empty($_POST["prix_barre"]) ? floatval($_POST["prix_barre"]) : 0;
    $categorie = mysqli_real_escape_string($con, $_POST["categorie"]);
    
    $image = $_FILES["image"]["name"];
    $file_extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];
    
    if (in_array($file_extension, $allowed_extensions)) {
        $unique_name = uniqid() . '.' . $file_extension;
        $repertoire = "images_formation/" . $unique_name;
        $tmp = $_FILES["image"]["tmp_name"];

        $req = "INSERT INTO store_produit (titre, description, prix_actuel, prix_barre, categorie, image_name, repertoire) VALUES ('$titre', '$description', $prix_actuel, $prix_barre, '$categorie', '$unique_name', '$repertoire')";
        
        if (mysqli_query($con, $req)) {
            if (move_uploaded_file($tmp, $repertoire)) {
                header("location:dashbord_store.php");
                exit();
            } else {
                echo "Erreur lors du téléchargement de l'image.";
            }
        } else {
            echo "Erreur lors de l'insertion en base de données.";
        }
    } else {
        echo "Format d'image non valide. Veuillez utiliser jpg, jpeg, png ou webp.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <title>Ajouter un Produit - HPA Store</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/form.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">HPA Store</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-6 col-lg-7 col-md-9 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h5 style="color: rgb(47,66,120);">Ajouter un produit (Formation, Pack, etc.)</h5>
              </div>
              <div class="card-body">
                <form role="form text-left" method="post" enctype="multipart/form-data">
                  
                  <div class="mb-3">
                    <label>Titre du produit</label>
                    <input type="text" name="titre" class="form-control" placeholder="Ex: Pack Entrepreneur 2024" required>
                  </div>

                  <div class="mb-3">
                    <label>Catégorie</label>
                    <input type="text" name="categorie" class="form-control" placeholder="Ex: Formation, Pack, Coaching..." required>
                  </div>

                  <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" cols="3" rows="5" class="form-control" placeholder="Description détaillée du produit..." required></textarea>
                  </div>

                  <div class="row">
                      <div class="col-md-6 mb-3">
                        <label>Prix Actuel (FCFA)</label>
                        <input type="number" name="prix_actuel" class="form-control" placeholder="Ex: 50000" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Prix Barré (Optionnel, FCFA)</label>
                        <input type="number" name="prix_barre" class="form-control" placeholder="Ex: 75000">
                      </div>
                  </div>

                  <div class="mb-3">
                    <label>Image du produit</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Ajouter à la boutique</button>
                    <a href="dashbord_store.php" class="btn bg-gradient-secondary w-100 mb-2">Annuler et Retour</a>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>
</html>
