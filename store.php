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
    <title>HPA Store - Boutique</title>
    <style>
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
        .btn-buy {
            background-color: #28a745;
            color: white;
            width: 100%;
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
            text-transform: uppercase;
        }
        .btn-buy:hover {
            background-color: #218838;
            color: white;
        }
        .btn-voir-plus {
            background-color: transparent;
            color: var(--blue, #1c2331);
            border: 1px solid var(--blue, #1c2331);
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-voir-plus:hover {
            background-color: var(--blue, #1c2331);
            color: white;
        }
        .filter-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
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
                <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                <a href="#" target="_blank"><i class='bx bxl-linkedin'></i></a>
                <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
            </div>
        </div>
    </div>
</div>

<!-- ========================================================================================================================================= -->
<!-- DEBUT BOTTOM NAV BAR -->
<!-- ========================================================================================================================================= -->

    <nav class="navbar navbar-expand-xl navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img class="logo" src="img/logo.png" alt="logo-HPA"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-nowrap">Accueil</a>
                    </li>
                        
                    <!-----------a propos ---------------->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-nowrap" data-bs-toggle="dropdown">A Propos</a>
                        <div class="dropdown-menu " style="max-width: max-content;">
                            <a href="a-propos.php" class="dropdown-item"><i class="fa-solid fa-caret-right" style="color:  var(--blue);"></i> &nbsp; Qui sommes nous ?</a>
                            <a href="galerie.php" class="dropdown-item"><i class="fa-solid fa-caret-right" style="color:  var(--blue);"></i> &nbsp; Notre galerie </a>
                        </div>
                    </li>
                        
                    <!-------------- certificats  --------------->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-nowrap" data-bs-toggle="dropdown">Certificats</a>
                        <div class="dropdown-menu" style="max-width: max-content;">
                        <?php
                        include("connexion.php");
                        $req = "SELECT * FROM formation limit 5";
                        $res = mysqli_query($con,$req);

                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <a href="certificat.php?id=<?php echo $row['id']; ?>" class="dropdown-item"><i class="fa-solid fa-caret-right" style="color:  var(--blue);"></i>
                                &nbsp;  <?php echo $row['libelle']; ?>
                            </a>
                        <?php } ?>
                            <br>
                            <div style="width: 100%; display: flex; justify-content: center;">
                                <a href="formation.php">
                                    <button class="Preinscription"> Tous Les Certificats </button>
                                </a>
                            </div>
                        </div>
                    </li>

                    <!--------- Cours intensifs ------------------>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-nowrap" data-bs-toggle="dropdown">Cours Intensifs</a>
                        <div class="dropdown-menu " style="max-width: max-content;">
                        <?php
                        include("connexion.php");
                        $req = "SELECT * FROM cours_intensifs ";
                        $res = mysqli_query($con,$req);

                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <a href="cours_intensifs.php?id=<?php echo $row['id']; ?>" class="dropdown-item"><i class="fa-solid fa-caret-right" style="color:  var(--blue);"></i>
                                &nbsp;  <?php echo $row['libelle']; ?>
                            </a>
                        <?php } ?>
                        </div>
                    </li>

                    <!-- tests internationaux  --------------->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-nowrap" data-bs-toggle="dropdown">Tests Internationaux</a>
                        <div class="dropdown-menu " style="max-width: max-content;">
                        <?php   
                        include("connexion.php");
                        $req = "SELECT * FROM testes ";
                        $res = mysqli_query($con,$req);

                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <a href="testes.php?id=<?php echo $row['id']; ?>" class="dropdown-item">
                            <i class="fa-solid fa-caret-right" style="color:  var(--blue);"></i>
                                &nbsp; <?php echo $row['hpa_name']; ?> (<?php echo $row['libelle']; ?>)
                            </a>
                        <?php } ?>
                        </div>
                    </li>

                    <!-- Nous contacter -------------------->
                    <li class="nav-item">
                        <a href="contacter.php" class="nav-link text-nowrap">Nous Contacter</a>
                    </li>

                    <!-- HPA Store (Boutique) avant Préinscription -------------------->
                    <li class="nav-item ms-xl-2 me-2 my-2 my-xl-0">
                        <a href="store.php" class="nav-link text-danger fw-bold position-relative d-inline-block text-nowrap">
                            <i class="fas fa-shopping-cart"></i> HPA Store
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark" style="font-size: 0.55rem; margin-top: 10px;">Nouveau</span>
                        </a>
                    </li>

                    <!-- preinscription  --------->
                    <li class="nav-item ms-xl-2">
                        <a class="nav-link Preinscription text-center text-nowrap" href="preinscription.php">Preinscription</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!-- ========================================================================================================================================= -->
<!-- FIN DEBUT BOTTOM NAV BAR -->
<!-- ========================================================================================================================================= -->

<style>
    .store-hero {
        background: linear-gradient(135deg, var(--blue, #1c2331) 0%, #3a4a69 100%);
        color: white;
        padding: 60px 20px;
        border-radius: 15px;
        margin-bottom: 40px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .sidebar-filter {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }
    .filter-group-title {
        font-weight: 700;
        margin-bottom: 15px;
        color: #333;
        font-size: 1.1rem;
        border-bottom: 2px solid #eaeaea;
        padding-bottom: 8px;
    }
    .filter-item {
        margin-bottom: 10px;
    }
    .filter-item label {
        cursor: pointer;
        font-weight: 500;
        color: #555;
    }
    .filter-item input[type="radio"] {
        margin-right: 8px;
        accent-color: var(--blue, #1c2331);
    }
    .product-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        border-radius: 12px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }
    .product-image-container {
        height: 200px;
        overflow: hidden;
        background: #f1f1f1;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .product-image {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
    .product-info {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    .product-category {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #888;
        margin-bottom: 8px;
    }
    .product-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #222;
        margin-bottom: 15px;
        flex-grow: 1;
    }
    .product-price-section {
        display: flex;
        align-items: baseline;
        margin-bottom: 15px;
    }
    .product-price {
        font-size: 1.3rem;
        font-weight: bold;
        color: #d9534f;
    }
    .product-price-barre {
        font-size: 0.9rem;
        text-decoration: line-through;
        color: #aaa;
        margin-left: 10px;
    }
    .btn-buy {
        width: 100%;
        border-radius: 8px;
        font-weight: 600;
        text-transform: uppercase;
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        transition: background 0.3s ease;
    }
    .btn-buy:hover {
        background-color: #218838;
        color: white;
    }

    /* WHATSAPP FLOATING BUTTON */
    .whatsapp-float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 35px;
        box-shadow: 2px 2px 3px #999;
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
    }

    .whatsapp-float:hover {
        transform: scale(1.1);
        color: #fff;
    }

    /* AFFICHAGE MOBILE */
    @media only screen and (max-width:768px) { 
        .whatsapp-float { width: 50px; height: 50px; bottom: 20px; right: 20px; font-size: 30px; }
    }
</style>

<!-- TITRE HPA STORE -->
<div class="all-affichage">
    <div class="info">
        <p>HPA STORE</p>
    </div>
</div>

<div class="container-fluid my-5 px-xl-5">

    <div class="row">
        <!-- Sidebar Filtres (Left) -->
        <div class="col-lg-3 col-md-4 mb-4">
            <div class="sidebar-filter">
                <h4 class="mb-4"><i class="fas fa-filter"></i> Filtres</h4>
                
                <!-- Recherche -->
                <div class="mb-4">
                    <div class="filter-group-title">Recherche</div>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" id="searchFilter" class="form-control border-start-0 ps-0" placeholder="Mot-clé..." onkeyup="filterProducts()">
                    </div>
                </div>

                <!-- Catégories -->
                <div class="mb-4">
                    <div class="filter-group-title">Catégories</div>
                    <div class="filter-item">
                        <label>
                            <input type="radio" name="categoryFilter" value="all" checked onchange="filterProducts()">
                            Toutes les catégories
                        </label>
                    </div>
                    <?php
                    include("connexion.php");
                    $cat_req = "SELECT DISTINCT categorie FROM store_produit";
                    $cat_res = mysqli_query($con, $cat_req);
                    while ($cat = mysqli_fetch_assoc($cat_res)) {
                        $cat_name = htmlspecialchars($cat['categorie']);
                        echo '
                        <div class="filter-item">
                            <label>
                                <input type="radio" name="categoryFilter" value="'.$cat_name.'" onchange="filterProducts()">
                                '.$cat_name.'
                            </label>
                        </div>';
                    }
                    ?>
                </div>

                <!-- Prix -->
                <div class="mb-4">
                    <div class="filter-group-title">Prix Maximum</div>
                    <div class="filter-item"><label><input type="radio" name="priceFilter" value="all" checked onchange="filterProducts()"> Tous les prix</label></div>
                    <div class="filter-item"><label><input type="radio" name="priceFilter" value="10000" onchange="filterProducts()"> Moins de 10 000 FCFA</label></div>
                    <div class="filter-item"><label><input type="radio" name="priceFilter" value="20000" onchange="filterProducts()"> Moins de 20 000 FCFA</label></div>
                    <div class="filter-item"><label><input type="radio" name="priceFilter" value="50000" onchange="filterProducts()"> Moins de 50 000 FCFA</label></div>
                    <div class="filter-item"><label><input type="radio" name="priceFilter" value="100000" onchange="filterProducts()"> Moins de 100 000 FCFA</label></div>
                    <div class="filter-item"><label><input type="radio" name="priceFilter" value="500000" onchange="filterProducts()"> Moins de 500 000 FCFA</label></div>
                </div>
            </div>
        </div>

        <!-- Main Content (Products Grid) -->
        <div class="col-lg-9 col-md-8">
            <div class="row" id="productContainer">
                <?php
                $req = "SELECT * FROM store_produit ORDER BY id DESC";
                $res = mysqli_query($con, $req);
                if(mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $cat = htmlspecialchars($row['categorie']);
                        $title = htmlspecialchars($row['titre']);
                        $desc = htmlspecialchars($row['description']);
                        $excerpt = strlen($desc) > 80 ? substr($desc, 0, 80) . '...' : $desc;
                        $prix = number_format($row['prix_actuel'], 0, ',', ' ') . ' FCFA';
                        $prix_barre = $row['prix_barre'] ? number_format($row['prix_barre'], 0, ',', ' ') . ' FCFA' : '';
                        $img = htmlspecialchars($row['repertoire']);
                        $whatsapp_msg = urlencode("Bonjour, je suis intéressé par le produit : " . $title . " de la boutique HPA.");
                        
                        echo "
                        <div class='col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-4 product-item' data-category='".strtolower($cat)."' data-title='".strtolower($title)."' data-price='{$row['prix_actuel']}'>
                            <div class='product-card h-100 d-flex flex-column'>
                                <a href='produit.php?id={$row['id']}' style='text-decoration:none; color:inherit;'>
                                    <div class='product-image-container'>
                                        <img src='pages/$img' class='product-image' alt='$title' onerror=\"this.src='img/logo.png'\">
                                    </div>
                                    <div class='product-info flex-grow-1'>
                                        <div class='product-category'>$cat</div>
                                        <div class='product-title'>$title</div>
                                        <p class='product-excerpt mt-2' style='font-size: 0.9rem; color: #555;'>$excerpt</p>
                                        <div class='product-price-section mt-2'>
                                            <span class='product-price'>$prix</span>";
                        if ($prix_barre) {
                            echo "<span class='product-price-barre'>$prix_barre</span>";
                        }
                        echo "          </div>
                                    </div>
                                </a>
                                <div class='px-3 pb-3 mt-auto d-flex flex-column gap-2'>
                                    <a href='produit.php?id={$row['id']}' class='btn btn-voir-plus text-center'>Voir plus</a>
                                    <a href='https://wa.me/2250708020244?text=$whatsapp_msg' target='_blank' class='btn btn-buy text-center'>
                                        <i class='fab fa-whatsapp me-2'></i>Acheter
                                    </a>
                                </div>
                            </div>
                        </div>";
                    }
                } else {
                    echo "<div class='col-12 text-center py-5'>
                            <i class='fas fa-box-open fa-4x text-muted mb-3'></i>
                            <h4 class='text-muted'>Aucun produit disponible pour le moment.</h4>
                          </div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
function filterProducts() {
    // Récupère la catégorie sélectionnée (bouton radio coché)
    let categoryRadio = document.querySelector('input[name="categoryFilter"]:checked');
    let category = categoryRadio ? categoryRadio.value.toLowerCase() : 'all';
    
    // Récupère la recherche textuelle
    let search = document.getElementById('searchFilter').value.toLowerCase();
    
    // Récupère le prix maximum (bouton radio coché)
    let priceRadio = document.querySelector('input[name="priceFilter"]:checked');
    let maxPrice = priceRadio ? priceRadio.value : 'all';
    
    let items = document.querySelectorAll('.product-item');

    items.forEach(function(item) {
        let itemCat = item.getAttribute('data-category'); // déjà mis en minuscules dans le HTML
        let itemTitle = item.getAttribute('data-title');
        let itemPrice = parseInt(item.getAttribute('data-price')) || 0;
        let show = true;

        if (category !== 'all' && itemCat !== category) {
            show = false;
        }
        if (search !== '' && !itemTitle.includes(search)) {
            show = false;
        }
        if (maxPrice !== 'all' && itemPrice > parseInt(maxPrice)) {
            show = false;
        }

        item.style.display = show ? 'block' : 'none';
    });
}
</script>

    <!-- FOOTER -->
    <div style="width: 100%; overflow: hidden; ">
        <footer class="text-center text-lg-start text-white" style="background-color: #1c2331"><br>
            <section class="mb-4" style="display: flex; justify-content: center; ">
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/profile.php?id=100087231961176" role="button" style="border-radius: 50%;"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/company/high-perf-academy/" role="button" style="border-radius: 50%;"><i class="fab fa-linkedin"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/academyhighperformance/" role="button" style="border-radius: 50%;"><i class="fab fa-instagram"></i></a>
            </section>

            <section class="">
                <form method="post" action="traitement.php">
                    <div class="row d-flex justify-content-center">
                        <div class="col-auto">
                            <p class="pt-2"><strong>Inscrivez vous à notre newsletter</strong></p>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="form-outline form-white mb-4">
                                <input name="news" type="email" class="form-control" placeholder="Ici votre mail..." required>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" name="submit" class="btn btn-outline-light mb-4">S'Abonner</button>
                        </div>
                    </div>
                </form>
            </section>
            <hr>

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
                            <p style="color: white;"><i class='bx bxl-whatsapp' style="color:  var(--red); font-size: 20px; font-weight: bold;"></i> &nbsp;(+225) 07 08 02 02 44</p>
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
                            <p><i class="fa-solid fa-caret-right" style="color:  var(--red);"></i> &nbsp;<a href="#!" class="text-white">Cocody, Angre 8ème tranche voie du lycée</a></p>
                        </div>
                    </div>
                </div>
            </section>

            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.4)">
                <a href="admin.php" style="color: inherit; text-decoration: none; cursor: default;" title="Accès système">©</a> 2026 Copyright:
                <a class="text-white" href="https://www.hpacademya.com/">www.hpacademya.com</a>
            </div>
        </footer>
    </div>
    <!-- BOUTON WHATSAPP FLOTTANT -->
    <a href="https://wa.link/mlum2a" class="whatsapp-float" target="_blank" title="Échanger avec nous sur WhatsApp">
        <i class="bx bxl-whatsapp"></i>
    </a>

<?php include('popup_store.php'); ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
