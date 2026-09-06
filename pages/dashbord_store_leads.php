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
  <title>HPA - Leads popup Admin</title>
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
        <li class="nav-item">
          <a class="nav-link" href="dashbord_formation.php">
            <span class="nav-link-text ms-1">Retour aux formations</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dashbord_store.php">
            <span class="nav-link-text ms-1">Boutique (Produits)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="dashbord_store_leads.php">
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Leads popup</li>
          </ol>
        </nav>
      </div>
    </nav>
    
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
              <h6>Gestion des Leads (Contacts Boutique)</h6>
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom & Prénom</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">WhatsApp</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pays</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include("../connexion.php");
                    $req = "SELECT * FROM store_contact ORDER BY created_at DESC";
                    $res = mysqli_query($con, $req);
                    while ($row = mysqli_fetch_assoc($res)) {
                  ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($row['nom'] . ' ' . $row['prenom']); ?></h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo htmlspecialchars($row['whatsapp']); ?></span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo htmlspecialchars($row['email']); ?></span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo htmlspecialchars($row['pays']); ?></span></td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo htmlspecialchars($row['created_at']); ?></span></td>
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
