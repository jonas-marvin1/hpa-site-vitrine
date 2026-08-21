<!DOCTYPE html>
<html lang="fr">
<head>
    <!--fav icone-->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Required meta tagss -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- icone links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300&display=swap"
          rel="stylesheet">
    <script async src='https://stackwhats.com/pixel/afb896438c5f47200b8c6609761798'></script>

    <title>High Performance Academy</title>
</head>
<body>

<div class="cover">

    <!-- PRELOADER -->
    <div class="chargement">
        <img src="img/logo.png" alt="Logo HPA" width="100px">
        <div class="Contenu_chargement"></div>
    </div>

    <!------------------ TOP NAV ------------------------>
    <div class="top-nav" id="home">
        <div class="container">
            <div class="row row1">
                <div class="col-auto col1">
                    <a href="mailto:infos@hpacademya.com"><p><i class='bx bxs-envelope'></i> infos@hpacademya.com</p></a>
                    <p><i class='bx bxs-phone-call'></i> (+225) 07 08 02 02 44</p>
                </div>
                <div class="col-auto social-icons col2">
                    <a href="https://www.facebook.com/profile.php?id=100087231961176" target="_blank"><i class='bx bxl-facebook'></i></a>
                    <a href="https://www.linkedin.com/company/high-perf-academy/" target="_blank"><i class='bx bxl-linkedin'></i></a>
                    <a href="https://www.instagram.com/academyhighperformance/" target="_blank"><i class='bx bxl-instagram'></i></a>
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
                        <a href="index.php" class="nav-link active text-nowrap">Accueil</a>
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
                        <a href="store.php" target="_self" class="nav-link text-danger fw-bold position-relative d-inline-block text-nowrap">
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

    <!-- FALSH INFO -->
    <div class="flash">
        <div class="flash-left">
            Infos:
        </div>
        <div class="flash-right">
            <?php
            include("connexion.php");
            $req = "SELECT * FROM infos ";
            $res = mysqli_query($con,$req);
            while ($row = mysqli_fetch_assoc($res)) {
             ?>
            <marquee>  <?php  echo $row['infos'];  ?>  </marquee> 
            <?php
                 }
            ?>
        </div>
    </div>

    <!-- SLIDER -->
    <div class="owl-carousel owl-theme hero-slider">
        <div class="slide slide1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <div class="titre"><span>H</span>IGH <span>P</span>ERFORMANCE <span>A</span>CADEMY</div> <br>
                        <br>
                        <p>CERTIFIEZ votre niveau d’anglais par les Tests <span style="color:red; font-weight: bold;">TOEIC</span>, <span style="color:red; font-weight: bold;">TOEFL</span> et <span style="color:red; font-weight: bold;">IELTS</span>, et <span style="color:red; font-weight: bold;">BRIGHT.</span><br>
                        Dans un organisme accrédite ETS (Educational Testing Service USA), British Council (UK) et BrightLanguage (Canada) </p>
                        <button class="certificats"><a href="formation.php">Nos certificats</a></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide slide2">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1 text-white">
                        <h6 class="text-white text-uppercase">L'art de transmettre la formation</h6>
                        <h1 class="display-3 my-4">Devenir Competents et <br/>Performants !</h1>
                        <br>
                        <p> <span class="agree">Agréée <span style="color:red;">FDFP</span> </span> <br/> dans plusieurs domaines d’interventions en vue d’accompagner les entreprises dans leurs plans de formations et renforcer les capacités de leurs employés, agents de maîtrise et cadres.</p>
                        <button class="certificats"><a href="formation.php">Nos certificats</a></button>
                        <button class="contacter"><a href="contacter.php">Nous contacter</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- APERÇU HPA STORE -->
    <!-- <section id="hpa-store-preview" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <div class="titre"><span>H</span>PA <span>S</span>TORE</div>
                    <p>Découvrez nos dernières formations et produits exclusifs.</p>
                </div>
            </div>
            <div class="row">
                /*<?php
                include("connexion.php");
                $req_store = "SELECT * FROM store_produit ORDER BY id DESC LIMIT 4";
                $res_store = mysqli_query($con, $req_store);
                if($res_store && mysqli_num_rows($res_store) > 0) {
                    while ($row_store = mysqli_fetch_assoc($res_store)) {
                        $titre = htmlspecialchars($row_store['titre']);
                        $prix = number_format($row_store['prix_actuel'], 0, ',', ' ') . ' FCFA';
                        $img = htmlspecialchars($row_store['repertoire']);
                        echo "<div class='col-md-3 col-sm-6 mb-4'>
                            <div class='card h-100 shadow-sm' style='border-radius:10px; overflow:hidden;'>
                                <a href='produit.php?id={$row_store['id']}' style='text-decoration:none; color:inherit;'>
                                    <img src='pages/$img' class='card-img-top' alt='$titre' style='height:180px; object-fit:cover;' onerror=\"this.src='img/logo.png'\">
                                    <div class='card-body text-center'>
                                        <h6 class='card-title' style='color:var(--blue); font-weight:bold;'>$titre</h6>
                                </a>
                                        <p class='card-text' style='color:var(--red); font-weight:bold;'>$prix</p>
                                        <a href='produit.php?id={$row_store['id']}' class='btn btn-outline-dark btn-sm'>Voir les détails</a>
                                    </div>
                            </div>
                        </div>";
                    }
                } else {
                    echo "<div class='col-12 text-center'><p>La boutique ouvre très bientôt !</p></div>";
                }
                ?>*/
            </div>
            <div class="row">
                <div class="col-12 text-center mt-3">
                    <a href="store.php" class="btn" style="background-color: var(--blue); color: white; padding: 10px 20px; border-radius: 5px;">Visiter toute la boutique</a>
                </div>
            </div>
        </div>
    </section>
            -->

    <!-- A PROPOS -->
    <section id="apropos" class="apropos-section">
        <div class="apropos">
            <div class="apropos-right">
                <img src="img/apropos.png" alt="Image A Propos De Nous" class="image-a-propos">
            </div>
            <div class="apropos-left">
                <div class="titre"><span>A</span> Propos De Nous</div>
                <p>High performance Academy (HPA) est un Cabinet de formation, d'études et de conseils créé en 2022 par
                    des experts,
                    ingénieurs en Stratégie de développement, marketing et finances ayant fait leur preuve au niveau
                    national et international.</p>

                <p>High Performance Academy (HPA) s’est spécialisée dans les thématiques suivantes : les langues, l’entrepreneuriat, le management, le leadership, l’innovation et les Technologies de l’Information et de la Communication.</p>
                    
                <p>Nous concevons et implémentons des formations, séminaires et conférences de qualité pour les porteurs de projets, les entrepreneurs, 
                les dirigeants, les étudiants et les cadres des structures privées et publiques Africaines.</p>

                <p>HPA est reconnue par le Fonds de Développement de la Formation Professionnelle (FDFP), ETS Global, British Council, Bright Language…</p>
                
                <a class="nav-item nav-link voir-plus text-center" href="a-propos.php">Voir plus</a>
            </div>
        </div>
        
        <div class="pkw-nous">
            <div class="titre">pourquoi nous choisir ?</div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="info-box">
                                <img src="img/icon6.png" alt="">
                                <div class="ms-4">
                                    <h2>Notre Vision</h2>
                                    <h6>Etre le Leader de la Formation en Afrique. </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="info-box">
                                <img src="img/icon4.png" alt="">
                                <div class="ms-4">
                                    <h2>Notre Mission </h2>
                                    <h6>Rendre les cadres Africains compétents & performants pour les structures publiques et privées.</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="info-box">
                                <img src="img/icon5.png" alt="">
                                <div class="ms-4">
                                    <h2>Nos Valeurs</h2>
                                    <h6>Nos valeurs sont les éléments qui guident nos relations en tant qu’équipe et aussi nos relations avec nos clients et fournisseurs. <br>
                                        Notre engagement vis-à-vis du client, la confiance et La rigueur.
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img id="jonas" src="img/pkw-nous.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <!--------------------------- NOS CERTIFICATS ------------------------------------->
    <section class="formation" id="formations">
        <div class="titre-formation">
            <h1>Nos <span>C</span>ertificats</h1>
            <p>Nos formations certifiantes débouchent sur des certificats professionnels et sont disponibles en présentiel.</p>
        </div>

        <div class="mes-formations">
            <div class="contenu">
                             <?php
                            include("connexion.php");
                            $req = "SELECT * FROM formation limit 6";
                            $res = mysqli_query($con,$req);

                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                <div class="box">
                    <div class="imbox">
                        <img src="pages/<?php echo $row['repertoire']; ?>" alt="">
                    </div>
                    <div class="text">
                        <h4 style="font-weight: bold; line-height: 25px;">
                            <?php echo $row['hpa']; ?> (<?php echo $row['libelle']; ?>)</h4>
                            
                        <a href="certificat.php?id=<?php echo $row['id']; ?>">
                            <button>Voir plus</button>
                        </a>
                    </div>
                </div>
                            <?php
                            }
                            ?>
            </div>
        </div>
        <div class="espace text-center">
            <a href="formation.php">
                <button class="toutes-les-formations">Les Autres Formations</button>
            </a>
        </div>
    </section>
    <br> <br>

    <!-------------------------------- FORMATIONS DISPONIBLE --------------------------------->
    <section class="bg-light" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro text-center">
                        <br>
                        <p class="mx-auto">En prélude de plusieurs autres formations qui serons disponible, nous mettons
                            déja ces cours à votre portée.
                            Des formateurs de qualités tant au niveau de leurs expertises que de leurs capacités à
                            transmettent.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="projects-slider" class="owl-theme owl-carousel">
            <div class="project">
                <div class="overlay"></div>
                <img src="img/formation-anglais.png" alt="Anglais">
                <div class="content">
                    <h2>ANGLAIS</h2>
                    <h6>Learning</h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/formation-excel.png" alt="Excel">
                <div class="content">
                    <h2>EXCEL</h2>
                    <h6>Formation bureautique</h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/formation-assistanat de direction.png" alt="Assistanat">
                <div class="content">
                    <h2>ASSISTANAT DE DIRECTION</h2>
                    <h6>Formation bureautique</h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/formation-developpement web & mobile.png" alt="Dev">
                <div class="content">
                    <h2>DÉVELOPPEMENT WEB & MOBILE</h2>
                    <h6>Programmation</h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/formation-gestion de projet.png" alt="Gestion de projet">
                <div class="content">
                    <h2>GESTION DE PROJET</h2>
                    <h6>Formation administrative</h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/formation-infographie.png" alt="Infographie">
                <div class="content">
                    <h2>INFOGRAPHIE & MULTIMÉDIA</h2>
                    <h6>Conception visuelle</h6>
                </div>
            </div>
        </div>
    </section>

    <!-------------------------------------------- STATISTIQUE ----------------------------------------->
    <section id="milestone">
        <div class="container" style="text-shadow: 2px 1px 5px var(--red);">
            <div class="row text-center justify-content-center gy-4">
                <div class="col-lg-2 col-sm-6">
                    <h1 class="display-4 fw-bold">+1500 </h1>
                    <p class="mb-0 fs-3">(ex)Auditeurs</p>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <h1 class="display-4 fw-bold">02</h1>
                    <p class="mb-0 fs-3">Campus</p>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <h1 class="display-4 fw-bold">+100 </h1>
                    <p class="mb-0 fs-3">Experts formateurs</p>
                </div>
            </div>
        </div>
    </section>

    <!------------------------------------- NOS PARTENAIRES --------------------------------------->
    <div class="nospartenaires">
        <div class="left">
            <h1>Nos <span>P</span>artenaires </h1>
        </div>
        <div class="right owl-theme owl-carousel logos-slider">
            <?php
            include("connexion.php");
            $req = "SELECT * FROM logo ";
            $res = mysqli_query($con,$req);
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
            <img src="pages/<?php echo $row['repertoire_image']; ?>" alt="">
            <?php
            }
            ?>
            
            <?php
            #include("connexion.php");
            #$req = "SELECT * FROM formation ";
            #$res = mysqli_query($con,$req);
            #while ($row = mysqli_fetch_assoc($res)) {
            #?>
            <!------<img src="pages/<?php echo $row['repertoire_image']; ?>" alt="">----->
            <!------<?php
            #}
            #?>--->
        </div>
    </div>

    <!--------------------------------- TEMOIGNAGE --------------------------------------------------------------------------->
    <section class="bg-light" id="reviews" style="padding-top: 20px;">
        <div class=" d-flex justify-content-center ">
            <p style="color: white; font-weight: bold; font-size: 40px; text-transform: capitalize; text-shadow: 2px 2px 2px  black;">Témoignages</p>
        </div>
        <div class="owl-theme owl-carousel reviews-slider container">
            <div class="review">
                <div class="person">
                    <img src="img/team.png" alt="">
                    <h5>M.Soumahoro</h5>
                    <small>Responsable SAV</small>
                </div>
                <h3>J’ai apprécié ma formation en Anglais chez HPA. Elle m’a permis de réaliser des progrès sur mon listening et sur mon speaking. J’ai d’ailleurs pu mesurer les résultats de cette méthode lors d’un voyage au Nigéria. La méthode pédagogique de HPA est vraiment excellente et est très axée sur le développement de l'écoute et du parler. Aussi il y a un excellent service (du café & du thé à volonté) pour nous faire sentir à l'aise durant la formation</h3>
                <div class="stars">
                    <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class="bx bxs-star-half"></i>
                </div>
                <i class='bx bxs-quote-alt-left'></i>
            </div>
            
            <div class="review">
                <div class="person">
                    <img src="img/team.png" alt="">
                    <h5>Mme Yao</h5>
                    <small>Attachée des Finances</small>
                </div>
                <h3>Je suis très satisfaite de ma formation en excel chez HPA. J’ai pris plaisir à assister aux cours. J’ai senti que je progressais. Le principe de HPA est super : des cas pratiques administrés par des formateurs très compétents. Cette formation me permet aujourd'hui d'être performant et productif dans mon travail.</h3>
                <div class="stars">
                    <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class="bx bxs-star-half"></i>
                </div>
                <i class='bx bxs-quote-alt-left'></i>
            </div>

            <div class="review">
                <div class="person">
                    <img src="img/team.png" alt="">
                    <h5>M.Goba</h5>
                    <small>Informaticien</small>
                </div>
                <h3>Je recherchais une structure fiable pour ma formation en Infographie et je suis tombé sur l'annonce de HPA. J'ai postulé et participé à la fomation et aujourd'hui je peux dire que Photoshop, Ilustrator et autres n'ont point de secret pour moi. Informaticien à la base, je viens d'ajouter l'infographie à mon background. Grâce à HPA, je suis complet car je developpe mais je fais des affiches, des logos et je monte des vidéos. Merci HPA !</h3>
                <div class="stars">
                    <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class="bx bxs-star-half"></i>
                </div>
                <i class='bx bxs-quote-alt-left'></i>
            </div>
        </div>
    </section>

    <!----------------------------------------------------DEBUT etudes a l'etranger ---------------------------------------------->
    <div class="container-fluid " style="background: var(--blue);">
        <div class="row">
            <div class="col-md-8 p-2">
                <div class="container fw-bold text-white question " style=" text-shadow: 2px 2px 2px  black; ">
                    <p><h1>Études à l’étranger :</h1></p>
                    <p><h3>Si vous êtes nouveau bachelier, étudiant en première année ou étudiant diplômé de licence ou de master, vous avez la possibilité d’étudier à/en/au Dubaï, France, Canada, UK, Chypre, Chine, Russie, Inde, Luxembourg, Belgique… </h3></p>
                    <a href="contacter.html">
                        <button class="contacter">Nous Contacter</button>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="container mx-auto conteneur-image">
                    <img class="container-fluid rounded-circle image-question" src="img/dossier.webp" alt="">
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------------------FIN etudes a l'etranger ------------------------------------------------------>

    <!----------------------------------------------------- DEBUT BON A SAVOIR ---------------------------------------------------------------->
    <section id="blog" class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h1>Bon à savoir </h1>
                        <p class="mx-auto"><strong>HPA</strong> est agréée FDFP et vous octroie des certificats en anglais par les Tests TOEIC, TOEFL, IELTS et Bright dans un organisme accrédité ETS, (Educational Testing System, organisme américain fondateur de ces tests, basé à Princeton, New Jersey, Etats-Unis).</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <!-- Carte TOEIC -->
                <div class="col-md-4">
                    <article class="blog-post">
                        <img src="img/bon a savoir 1.png" alt="" width="100%" style="height: 200px; object-fit: cover;">
                        <a href="testes.php?id=0" class="tag">TOEIC</a>
                        <div class="content">
                            <small>TEST TOEIC</small>
                            <h4>Test of English for international communication</h4>
                            <p>Le programme TOEIC ® est le leader mondial de l'évaluation des compétences de communication en anglais pour le travail et la vie quotidienne.</p>
                        </div>
                    </article>
                </div>

                <!-- Carte TOEFL -->
                <div class="col-md-4">
                    <article class="blog-post">
                        <img src="img/bon a savoir 2.png" alt="" width="100%" style="height: 200px; object-fit: cover;">
                        <a href="#" class="tag">TOEFL</a>
                        <div class="content">
                            <small>TEST TOEFL</small>
                            <h4>Test of English as a foreign language</h4>
                            <p>Les tests TOEFL ® préparent les étudiants aux études universitaires, à l'immigration et plus encore dans les pays anglophones.</p>
                        </div>
                    </article>
                </div>

                <!-- Carte IELTS -->
                <div class="col-md-4">
                    <article class="blog-post">
                        <img src="img/formation-anglais.png" alt="" width="100%" style="height: 200px; object-fit: cover;">
                        <a href="#" class="tag" style="background-color: var(--blue);">IELTS</a>
                        <div class="content">
                            <small>TEST IELTS</small>
                            <h4>International English Language Testing System</h4>
                            <p>Reconnu par plus de 11 000 organisations, l'IELTS est le test d'anglais le plus prisé pour étudier, travailler et migrer.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!---------------------------------------------------------------- FIN BON A SAVOIR --------------------------------------------------------->

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

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/app.js"></script>
<?php include('popup_store.php'); ?>
</body>
</html>

<style>
    .agree {
        font-size: 70px;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
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
    }

    /* AFFICHAGE MOBILE */
    @media only screen and (max-width:768px) { 
        .agree { font-size: 40px; }
        .slide p { font-size: 15px; }
        .whatsapp-float { width: 50px; height: 50px; bottom: 20px; right: 20px; font-size: 30px; }
    }
</style>