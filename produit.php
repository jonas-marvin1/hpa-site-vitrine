<?php
include("connexion.php");
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    header("Location: store.php");
    exit();
}

$id = intval($_GET['id']);
$req = "SELECT * FROM store_produit WHERE id = $id";
$res = mysqli_query($con, $req);
if(mysqli_num_rows($res) == 0){
    header("Location: store.php");
    exit();
}
$product = mysqli_fetch_assoc($res);

$title = htmlspecialchars($product['titre']);
$desc = nl2br(htmlspecialchars($product['description']));
$cat = htmlspecialchars($product['categorie']);
$prix_actuel = number_format($product['prix_actuel'], 0, ',', ' ') . ' FCFA';
$prix_barre = $product['prix_barre'] ? number_format($product['prix_barre'], 0, ',', ' ') . ' FCFA' : '';
$img = htmlspecialchars($product['repertoire']);
$whatsapp_msg = urlencode("Bonjour, je suis intéressé par le produit : " . $title . " de la boutique HPA.");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
    <title><?php echo $title; ?> - HPA Store</title>
    <style>
        .product-detail-img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .product-price-large {
            font-size: 2rem;
            font-weight: bold;
            color: var(--red, #e30613);
        }
        .product-price-barre-large {
            font-size: 1.2rem;
            text-decoration: line-through;
            color: #999;
            margin-left: 15px;
        }
        .btn-buy-large {
            background-color: var(--blue, #1c2331);
            color: white;
            padding: 15px 30px;
            font-size: 1.2rem;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            width: 100%;
            text-align: center;
        }
        .btn-buy-large:hover {
            background-color: var(--red, #e30613);
            color: white;
        }
        .section-title {
            color: var(--blue, #1c2331);
            font-weight: bold;
            margin-bottom: 20px;
            border-bottom: 3px solid var(--red, #e30613);
            display: inline-block;
            padding-bottom: 5px;
        }
        .desc-box {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            font-size: 1.1rem;
            line-height: 1.8;
            color: #333;
        }
        
        /* Styles pour les produits Voir Aussi */
        .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            transition: 0.3s;
            background: #fff;
        }
        .product-card:hover {
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
        .product-title {
            font-size: 1.1rem;
            font-weight: bold;
            margin-top: 15px;
            color: var(--blue, #1c2331);
        }
        .product-category {
            font-size: 0.85rem;
            color: #777;
            text-transform: uppercase;
        }
        .product-price {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--red, #e30613);
        }
        .product-price-barre {
            text-decoration: line-through;
            color: #999;
            font-size: 0.9rem;
            margin-left: 10px;
        }
    </style>
</head>
<body>

<div class="top-nav" id="home">
    <div class="container">
        <div class="row row1">
            <div class="col-auto col1">
                <a href="mailto:infos@hpacademya.com"><p><i class='bx bxs-envelope'></i> infos@hpacademya.com</p></a>
                <p><i class='bx bxs-phone-call'></i> (+225) 07 08 02 02 44</p>
            </div>
            <div class="col-auto social-icons col2">
                <a href="#" target="_self"><i class='bx bxl-facebook'></i></a>
                <a href="#" target="_self"><i class='bx bxl-linkedin'></i></a>
                <a href="#" target="_self"><i class='bx bxl-instagram'></i></a>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-xl navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img class="logo" src="img/logo.png" alt="logo-HPA"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-nowrap">Accueil</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-nowrap" data-bs-toggle="dropdown">A Propos</a>
                    <div class="dropdown-menu">
                        <a href="a-propos.php" class="dropdown-item"><i class="fa-solid fa-caret-right" style="color: var(--blue);"></i> Qui sommes nous ?</a>
                        <a href="galerie.php" class="dropdown-item"><i class="fa-solid fa-caret-right" style="color: var(--blue);"></i> Notre galerie</a>
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-nowrap" data-bs-toggle="dropdown">Certificats</a>
                    <div class="dropdown-menu">
                        <?php
                        $req_cert = "SELECT * FROM formation limit 5";
                        $res_cert = mysqli_query($con, $req_cert);
                        while ($row_cert = mysqli_fetch_assoc($res_cert)) {
                        ?>
                            <a href="certificat.php?id=<?php echo $row_cert['id']; ?>" class="dropdown-item"><i class="fa-solid fa-caret-right" style="color: var(--blue);"></i> <?php echo $row_cert['libelle']; ?></a>
                        <?php } ?>
                        <div style="width: 100%; display: flex; justify-content: center; margin-top:10px;">
                            <a href="formation.php"><button class="Preinscription">Tous Les Certificats</button></a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-nowrap" data-bs-toggle="dropdown">Cours Intensifs</a>
                    <div class="dropdown-menu">
                        <?php
                        $req_cours = "SELECT * FROM cours_intensifs";
                        $res_cours = mysqli_query($con, $req_cours);
                        while ($row_cours = mysqli_fetch_assoc($res_cours)) {
                        ?>
                            <a href="cours_intensifs.php?id=<?php echo $row_cours['id']; ?>" class="dropdown-item"><i class="fa-solid fa-caret-right" style="color: var(--blue);"></i> <?php echo $row_cours['libelle']; ?></a>
                        <?php } ?>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-nowrap" data-bs-toggle="dropdown">Tests Internationaux</a>
                    <div class="dropdown-menu">
                        <?php
                        $req_test = "SELECT * FROM testes";
                        $res_test = mysqli_query($con, $req_test);
                        while ($row_test = mysqli_fetch_assoc($res_test)) {
                        ?>
                            <a href="testes.php?id=<?php echo $row_test['id']; ?>" class="dropdown-item"><i class="fa-solid fa-caret-right" style="color: var(--blue);"></i> <?php echo $row_test['hpa_name']; ?></a>
                        <?php } ?>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="contacter.php" class="nav-link text-nowrap">Nous Contacter</a>
                </li>

                <li class="nav-item ms-xl-2 me-2 my-2 my-xl-0">
                    <a href="store.php" class="nav-link text-danger fw-bold position-relative d-inline-block text-nowrap">
                        <i class="fas fa-shopping-cart"></i> HPA Store
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark" style="font-size: 0.55rem; margin-top: 10px;">Nouveau</span>
                    </a>
                </li>

                <li class="nav-item ms-xl-2">
                    <a class="nav-link Preinscription text-center text-nowrap" href="preinscription.php">Preinscription</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- DETAIL PRODUIT -->
<div class="container my-5">
    <div class="row align-items-center">
        <!-- Image Produit -->
        <div class="col-md-5 mb-4">
            <img src="pages/<?php echo $img; ?>" class="product-detail-img" alt="<?php echo $title; ?>" onerror="this.src='img/logo.png'">
        </div>
        
        <!-- Informations Produit -->
        <div class="col-md-7">
            <div class="mb-2" style="font-size: 1.1rem; color: #777; text-transform: uppercase;">
                <a href="store.php" style="color:var(--red); text-decoration:none;"><i class="fas fa-arrow-left"></i> Retour au Store</a> | <?php echo $cat; ?>
            </div>
            <h1 style="color: var(--blue, #1c2331); font-weight: bold; font-size: 2.5rem;" class="mb-3"><?php echo $title; ?></h1>
            
            <p style="font-size: 1.2rem; color: #555;" class="mb-4">
                Découvrez notre produit "<?php echo $title; ?>" conçu pour vous apporter les meilleures connaissances et outils dans la thématique <?php echo strtolower($cat); ?>.
            </p>
            
            <div class="d-flex align-items-baseline mb-4">
                <span class="product-price-large"><?php echo $prix_actuel; ?></span>
                <?php if ($prix_barre): ?>
                    <span class="product-price-barre-large"><?php echo $prix_barre; ?></span>
                <?php endif; ?>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    <a href="https://wa.me/2250708020244?text=<?php echo $whatsapp_msg; ?>" target="_blank" class="btn-buy-large">
                        <i class="fas fa-shopping-cart me-2"></i> Acheter sur WhatsApp
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- DESCRIPTION COMPLETE -->
<div class="container mb-5">
    <h3 class="section-title">Détails du produit</h3>
    <div class="desc-box">
        <?php echo $desc; ?>
    </div>
</div>

<!-- VOIR AUSSI -->
<div class="container mb-5">
    <h3 class="section-title">Voir aussi</h3>
    <div class="row">
        <?php
        $req_aussi = "SELECT * FROM store_produit WHERE id != $id ORDER BY RAND() LIMIT 4";
        $res_aussi = mysqli_query($con, $req_aussi);
        while ($row_aussi = mysqli_fetch_assoc($res_aussi)) {
            $cat_aussi = htmlspecialchars($row_aussi['categorie']);
            $title_aussi = htmlspecialchars($row_aussi['titre']);
            $prix_aussi = number_format($row_aussi['prix_actuel'], 0, ',', ' ') . ' FCFA';
            $prix_barre_aussi = $row_aussi['prix_barre'] ? number_format($row_aussi['prix_barre'], 0, ',', ' ') . ' FCFA' : '';
            $img_aussi = htmlspecialchars($row_aussi['repertoire']);
            
            echo "
            <div class='col-md-3 col-sm-6 mb-4'>
                <a href='produit.php?id={$row_aussi['id']}' style='text-decoration:none; color:inherit;'>
                    <div class='product-card h-100'>
                        <img src='pages/$img_aussi' class='product-image' alt='$title_aussi' onerror=\"this.src='img/logo.png'\">
                        <div class='product-category mt-2'>$cat_aussi</div>
                        <div class='product-title'>$title_aussi</div>
                        <div class='mt-2'>
                            <span class='product-price'>$prix_aussi</span>";
                if ($prix_barre_aussi) {
                    echo "<span class='product-price-barre'>$prix_barre_aussi</span>";
                }
                echo "  </div>
                    </div>
                </a>
            </div>";
        }
        ?>
    </div>
</div>

<!-- FOOTER -->
<div style="width: 100%; overflow: hidden; ">
    <footer class="text-center text-lg-start text-white" style="background-color: #1c2331"><br>
        <section class="mb-4" style="display: flex; justify-content: center; ">
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/profile.php?id=100087231961176" target="_blank" style="border-radius: 50%;"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/company/high-perf-academy/" target="_blank" style="border-radius: 50%;"><i class="fab fa-linkedin"></i></a>
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/academyhighperformance/" target="_blank" style="border-radius: 50%;"><i class="fab fa-instagram"></i></a>
        </section>

        <section class="">
            <div>
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                        <img src="img/logo.png" alt="logo-HPA" style="width: 150px;">
                        <p style="margin-top: 20px; color:white">Chez <strong>HIGH PERFORMANCE ACADEMY</strong> , nos formations certifiantes débouchent sur des certificats professionnels et sont disponibles en ligne et en présentiel.</p>
                    </div>
                    
                    <div class="col-md-4 col-lg-3 col-xl-2 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold">Contact</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color:  var(--red); height: 4px"/>
                        <p style="color: white;"><i class="fas fa-home mr-3" style="color:  var(--red);"></i> &nbsp; Cocody, Angre 8ème tranche voie du lycée</p>
                        <p style="color: white;"><i class="fas fa-envelope mr-3" style="color:  var(--red);"></i>&nbsp; infos@hpacademya.com</p>
                        <p style="color: white;"><i class="fas fa-phone mr-3" style="color:  var(--red);"></i> &nbsp; (+225) 07 08 02 02 44</p>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold">Menu</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: var(--red); height: 4px"/>
                        <p><i class="fa-solid fa-caret-right" style="color:  var(--red);"></i> &nbsp;<a href="index.php" class="text-white">Accueil</a></p>
                        <p><i class="fa-solid fa-caret-right" style="color:  var(--red);"></i> &nbsp;<a href="formation.php" class="text-white">Nos Certificats</a></p>
                        <p><i class="fa-solid fa-caret-right" style="color:  var(--red);"></i> &nbsp;<a href="contacter.php" class="text-white">Nous Contacter</a></p>
                        <p><i class="fa-solid fa-caret-right" style="color:  var(--red);"></i>&nbsp; <a href="preinscription.php" class="text-white">Préinscription</a></p>
                    </div>

                    <div class="col-md-2 col-lg-4 col-xl-3 mx-auto mb-4 horaire">
                        <h6 class="text-uppercase fw-bold">Horaires d'ouvertures</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color:  var(--red); height: 4px"/>
                        <p><i class="fa-solid fa-caret-right" style="color:  var(--red);"></i> &nbsp; <a href="#!" class="text-white">Lundi - Vendredi: 08h00 - 21h00</a></p>
                        <p><i class="fa-solid fa-caret-right" style="color:  var(--red);"></i> &nbsp; <a href="#!" class="text-white">Samedi: 08h00 - 18h00</a></p>
                        <p><i class="fa-solid fa-caret-right" style="color:  var(--red);"></i> &nbsp; <a href="#!" class="text-white">Dimanche: <span style="color:var(--red); font-weight:bold">FERME</span></a></p>
                    </div>
                </div>
            </div>
        </section>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.4)">
            © 2026 Copyright: <a class="text-white" href="https://www.hpacademya.com/">www.hpacademya.com</a>
        </div>
    </footer>
</div>
<?php include('popup_store.php'); ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
