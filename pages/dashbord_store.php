<?php 
session_start();
if(!$_SESSION["user"]){
  header("location: page_identification.php");
  // header() ne stoppe pas l'execution : sans exit, le script continue,
  // interroge la base et renvoie son contenu meme sans redirection suivie
  exit;
}
?>
<!DOCTYPE php>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <title>HPA - Boutique Admin</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold"> Dashboard</span>
      </a>
    </div>
    <hr class="horizontal dark ">
    <div class="collapse navbar-collapse w-auto mb-3" id="sidenav-collapse-main" style="height: calc(100vh - 200px) !important;">
      <ul class="navbar-nav">
        <!-- Raccourci pour l'instant, on ajoutera le vrai menu plus tard avec un script -->
        <li class="nav-item">
          <a class="nav-link" href="dashbord_formation.php">
            <span class="nav-link-text ms-1">Retour aux formations</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="dashbord_store.php">
            <span class="nav-link-text ms-1">Boutique (Produits)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dashbord_store_leads.php">
            <span class="nav-link-text ms-1">Leads popup</span>
          </a>
        </li>
      </ul>
    </div>
    <a href="deconnexion.php" class="deconnecter">Se deconnecter</a>
  </aside>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Boutique</li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a class="btn btn-outline-danger btn-sm mb-0 me-3" href="ajouter_un_produit.php">Ajouter un produit</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
              <h6>Gestion des Produits Boutique</h6>
              <div class="input-group" style="max-width: 300px;">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                  <input type="text" class="form-control" id="searchInput" placeholder="Rechercher..." onkeyup="filterTable()">
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titre</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catégorie</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prix Actuel</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prix Barré</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include("../connexion.php");
                    $req = "SELECT * FROM store_produit ORDER BY created_at DESC";
                    $res = mysqli_query($con, $req);
                    while ($row = mysqli_fetch_assoc($res)) {
                  ?>
                    <tr data-id="<?php echo $row['id']; ?>" data-edit-url="edit_produit.php?id=" data-delete-url="delete_store_produit.php?id=">
                      <td class="text-center">
                        <div class="d-flex px-2 py-1">
                          <div><img src="<?php echo $row['repertoire']; ?>" class="avatar avatar-sm me-3" alt="prod"></div>
                        </div>
                      </td>
                      <td class="align-middle text-center"><p class="text-xs font-weight-bold mb-0"><?php echo $row['titre']; ?></p></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['categorie']; ?></span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['prix_actuel']; ?></span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['prix_barre']; ?></span></td>
                      <td class="align-middle text-center">
                        <a href="edit_produit.php?id=<?php echo $row['id']; ?>" title="Modifier"> 
                          <!--debut logo edit-->
                          <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" clip-rule="evenodd" d="m3.99 16.854-1.314 3.504a.75.75 0 0 0 .966.965l3.503-1.314a3 3 0 0 0 1.068-.687L18.36 9.175s-.354-1.061-1.414-2.122c-1.06-1.06-2.122-1.414-2.122-1.414L4.677 15.786a3 3 0 0 0-.687 1.068zm12.249-12.63 1.383-1.383c.248-.248.579-.406.925-.348.487.08 1.232.322 1.934 1.025.703.703.945 1.447 1.025 1.934.058.346-.1.677-.348.925L19.774 7.76s-.353-1.06-1.414-2.12c-1.06-1.062-2.121-1.415-2.121-1.415z" fill="#4169e1"></path></g></svg>
                          <!--fin logo edit-->
                        </a>   
                      </td>
                      <td class="align-middle text-center">
                        <a href="delete_store_produit.php?id=<?php echo $row['id']; ?>" title="Supprimer">
                             <!--debut logo suppression -->
                          <svg width="24" height="24" viewBox="0 0 1024 1024" fill="#e30613" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#e30613"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#e30613" stroke-width="59.391999999999996"><path d="M512 897.6c-108 0-209.6-42.4-285.6-118.4-76-76-118.4-177.6-118.4-285.6 0-108 42.4-209.6 118.4-285.6 76-76 177.6-118.4 285.6-118.4 108 0 209.6 42.4 285.6 118.4 157.6 157.6 157.6 413.6 0 571.2-76 76-177.6 118.4-285.6 118.4z m0-760c-95.2 0-184.8 36.8-252 104-67.2 67.2-104 156.8-104 252s36.8 184.8 104 252c67.2 67.2 156.8 104 252 104 95.2 0 184.8-36.8 252-104 139.2-139.2 139.2-364.8 0-504-67.2-67.2-156.8-104-252-104z" fill=""></path><path d="M707.872 329.392L348.096 689.16l-31.68-31.68 359.776-359.768z" fill=""></path><path d="M328 340.8l32-31.2 348 348-32 32z" fill=""></path></g><g id="SVGRepo_iconCarrier"><path d="M512 897.6c-108 0-209.6-42.4-285.6-118.4-76-76-118.4-177.6-118.4-285.6 0-108 42.4-209.6 118.4-285.6 76-76 177.6-118.4 285.6-118.4 108 0 209.6 42.4 285.6 118.4 157.6 157.6 157.6 413.6 0 571.2-76 76-177.6 118.4-285.6 118.4z m0-760c-95.2 0-184.8 36.8-252 104-67.2 67.2-104 156.8-104 252s36.8 184.8 104 252c67.2 67.2 156.8 104 252 104 95.2 0 184.8-36.8 252-104 139.2-139.2 139.2-364.8 0-504-67.2-67.2-156.8-104-252-104z" fill=""></path><path d="M707.872 329.392L348.096 689.16l-31.68-31.68 359.776-359.768z" fill=""></path><path d="M328 340.8l32-31.2 348 348-32 32z" fill=""></path></g></svg>
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


<script src="wp_filters.js"></script>
</body>
</html>
