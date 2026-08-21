<?php
	include("connexion.php");


	if (isset($_POST["submit"])) 
	{
			$nom=$_POST["nom"];
			$email=$_POST["email"];
			$contact=$_POST["contact"];
			$message=$_POST["message"];
			
			$req="INSERT INTO contact VALUES(NULL, ?, ?, ?, CURRENT_TIMESTAMP, ?)";
			$stmt = mysqli_prepare($con, $req);
			mysqli_stmt_bind_param($stmt, "ssss", $nom, $email, $contact, $message);
			$success = mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);

			 if ($success) 
			 {
			 header("location:modal.html");
			 exit();
			 }
			 else{echo "error2.0";}

	}

?>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" xintegrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300&display=swap" rel="stylesheet">
    <script async src='https://stackwhats.com/pixel/afb896438c5f47200b8c6609761798'></script>


    <title>High Performance Academy - Contact</title>
</head>
<body>

  <!-- PRELOADER     -->
<div class="chargement">
  <img src="img/logo.png" alt="" width="100px">
  <div class="Contenu_chargement"></div>
</div>



 <!------------------ TOP NAV ------------------------>
    <div class="top-nav" id="home">
        <div class="container">
            <div class="row row1">
                <div class="col-auto col1">
                    <a href="mailto: infos@hpacademya.com"><p><i class='bx bxs-envelope'></i> infos@hpacademya.com</p></a>
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
                            $req = "SELECT * FROM formation LIMIT 5";
                            $res = mysqli_query($con,$req);

                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                                <a href="certificat.php?id=<?php echo $row['id']; ?>" class="dropdown-item"><i class="fa-solid fa-caret-right"
                                                                                                                style="color:  var(--blue);"></i>
                                    &nbsp;  <?php echo $row['libelle']; ?>
                                </a>


                        <?php } ?>
    
                            
                                <br>
                                <div style="width: 100%;
                            display: flex;
                            justify-content: center;">
                                    <a href="formation.php">
                                        <button class="Preinscription"> Tous Les Certificats </button></a>
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
                                <a href="cours_intensifs.php?id=<?php echo $row['id']; ?>" class="dropdown-item"><i class="fa-solid fa-caret-right"
                                                                                                                style="color:  var(--blue);"></i>
                                    &nbsp;  <?php echo $row['libelle']; ?>
                                </a>

                        <?php } ?>
                                
                            </div>
                        </li>




        <!-- tests internationaux   --------------->
                     <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-nowrap" data-bs-toggle="dropdown">Tests Internationaux</a>
                            <div class="dropdown-menu " style="max-width: max-content;">


                            <?php   
                            include("connexion.php");
                            $req = "SELECT * FROM testes ";
                            $res = mysqli_query($con,$req);

                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                                <a href="testes.php?id=<?php echo $row['id']; ?>" class="dropdown-item"><i class="fa-solid fa-caret-right"
                                                                                                                style="color:  var(--blue);"></i>
                                    &nbsp;  <?php echo $row['hpa_name']; ?> (<?php echo $row['libelle']; ?>)
                                </a>
                        <?php } ?>
    
                            </div>
                        </li>

         <!-- Nous contacter -------------------->
                        <li class="nav-item">
                            <a href="contacter.php" class="nav-link active text-nowrap">Nous Contacter</a>
                        </li>

         <!-- HPA Store (Boutique) -------------------->
                        <li class="nav-item ms-xl-3 me-2 my-2 my-xl-0">
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







<!-- TITRE Contact -->
<div class="all-affichage">
    <div class="info">
        <p>nous contacter</p>
    </div>
</div>


 <!-- NoUS CONtACTER -->
 <section class="contact" >
        <div class="info">
            <div class="titre-contact">
                <h1>Nous <span>C</span>ontacter</h1>
                <p class="mx-4 text-center">Vous avez des suggestions, des questions, des préocutions, n'hésitez plus à nous les laisser. </p>
            </div>

            <div class="left">
                 <p>   <i class="fa-solid fa-map-pin"></i>  &nbsp;<span>Cocody, Angré 8ème tranche Voie du Lycée</span></p> 
                 <p>   <i class="fa-solid fa-envelope"></i>  &nbsp;<span> infos@hpacademya.com</span> </p>
                 <p>   <i class="fa-solid fa-phone"></i>  &nbsp;<span> (+225) 07 08 02 02 44</span> </p>
            </div>
        
            <div class="right">
                <form method="post" >
                    <input type="text" placeholder="Ici votre nom et prénom..." class="px-4" name="nom" id="nom" required>
        
                    <input type="email" placeholder="Ici votre email..." class="px-4" name="email" id="email"> <br>
        
                    <input type="text" placeholder="Ici votre contact..." class="px-4" name="contact" id="contact" required> <br>
        
                    <textarea cols="30" rows="5" placeholder="Ici votre message..." class="px-4" name="message" id="message" required></textarea> <br>
                
                    <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-top: 15px; justify-content: center;">
                        <button type="submit" name="submit" class="soumettre" style="padding: 10px 20px; min-width: 200px;">SOUMETTRE VIA LE SITE</button>
                        
                        <!-- Bouton WhatsApp Lead Gen -->
                        <button type="button" class="btn btn-success d-flex align-items-center justify-content-center" style="border-radius: 5px; padding: 10px 20px; font-weight: bold; min-width: 200px;" onclick="sendToWhatsapp()">
                            <i class='bx bxl-whatsapp fs-4 me-2'></i> Envoyer par WhatsApp
                        </button>
                    </div>
                 </form>
            </div>
        </div>

        <div class="container-fluid carte ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.3679827948267!2d-3.967841159901776!3d5.360698763583405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1ed1da671fab9%3A0x61eacd36acea051e!2sCOCODY%20ANGRE%20TERMINUS%2081%2082!5e0!3m2!1sfr!2sci!4v1664966997950!5m2!1sfr!2sci" width="600" height="450" style="border:0;"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
</section>



    <!-- FOOTER -->
    <div style="width: 100%; overflow: hidden; ">

        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: #1c2331"><br>
            <!-- Section: Social media -->
            <section class="mb-4" style="display: flex; justify-content: center; ">

                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1"
                   href="https://www.facebook.com/profile.php?id=100087231961176" target="_blank" role="button"
                   style="border-radius: 50%;"><i class="fab fa-facebook-f"></i></a>

                <!-- linkedin -->
                <a class="btn btn-outline-light btn-floating m-1"
                   href="https://www.linkedin.com/company/high-perf-academy/" target="_blank" role="button"
                   style="border-radius: 50%;"><i class="fab fa-linkedin"></i></a>

                <!-- instagram -->
                <a class="btn btn-outline-light btn-floating m-1"
                   href="https://www.instagram.com/academyhighperformance/" target="_blank" role="button"
                   style="border-radius: 50%;"><i class="fab fa-instagram"></i></a>


            </section>
            <!-- Section: Social media -->


            <!-- Section: Form -->
            <section class="">
                <form method="post" action="traitement.php">
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center">
                        <!--Grid column-->
                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>Inscrivez vous à notre newsletter</strong>
                            </p>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-5 col-12">
                            <!-- Email input -->
                            <div class="form-outline form-white mb-4">


                                <input name="news" type="email" class="form-control" placeholder="Ici votre mail..." required>

                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-auto">
                            <!-- Submit button -->
                            <button type="submit" name="submit" class="btn btn-outline-light mb-4">
                                S'Abonner
                            </button>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </form>
            </section>
            <hr>

            <!-- Section: Links  -->
            <section class="">
                <div>
                    <!-- Grid row -->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <img src="img/logo.png" alt="logo-HPA" style="width: 150px;">

                            <p style="margin-top: 20px; color:white">
                                Chez <strong>HIGH PERFORMANCE ACADEMY</strong> , nos formations certifiantes débouchent
                                sur des certificats professionnels et sont disponibles en ligne et en présentiel.


                            </p>
                        </div>
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-2 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Contact</h6>
                            <hr
                                    class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 60px; background-color:  var(--red); height: 4px"
                            />
                            <p style="color: white;"><i class="fas fa-home mr-3" style="color:  var(--red);"></i> &nbsp;
                                Cocody, Angre 8ème tranche voie du lycée</p>
                            <p style="color: white;"><i class="fas fa-envelope mr-3" style="color:  var(--red);"></i>&nbsp;
                                infos@hpacademya.com</p>
                            <p style="color: white;"><i class="fas fa-phone mr-3" style="color:  var(--red);"></i>
                                &nbsp; (+225) 07 08 02 02 44</p>
                            <p style="color: white;"><i class='bx bxl-whatsapp'
                                                        style="color:  var(--red); font-size: 20px; font-weight: bold;"></i>
                                &nbsp;(+225) 07 08 02 02 44</p>
                        </div>
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Menu</h6>
                            <hr
                                    class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 60px; background-color: var(--red); height: 4px"
                            />
                            <p>
                                <i class="fa-solid fa-caret-right" style="color:  var(--red);"></i> &nbsp;<a
                                    href="index.php" class="text-white">Accueil</a>
                            </p>
                            <p>
                                <i class="fa-solid fa-caret-right" style="color:  var(--red);"></i> &nbsp;<a
                                    href="formation.php" class="text-white">Nos Certificats</a>
                            </p>
                            <p>
                                <i class="fa-solid fa-caret-right" style="color:  var(--red);"></i> &nbsp;<a
                                    href="contacter.php" class="text-white">Nous Contacter</a>
                            </p>
                            <p>
                                <i class="fa-solid fa-caret-right" style="color:  var(--red);"></i>&nbsp; <a
                                    href="preinscription.php" class="text-white">Préinscription</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-4 col-xl-3 mx-auto mb-4 horaire">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Horaires d'ouvertures</h6>
                            <hr
                                    class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 60px; background-color:  var(--red); height: 4px"
                            />
                            <p>
                                <i class="fa-solid fa-caret-right" style="color:  var(--red);"></i> &nbsp; <a href="#!"
                                                                                                              class="text-white">Lundi
                                - Vendredi: 08h00 - 21h00</a>
                            </p>
                            <p>
                                <i class="fa-solid fa-caret-right" style="color:  var(--red);"></i> &nbsp; <a href="#!"
                                                                                                              class="text-white">Samedi:
                                08h00 - 18h00</a>
                            </p>
                            <p>
                                <i class="fa-solid fa-caret-right" style="color:  var(--red);"></i> &nbsp; <a href="#!"
                                                                                                              class="text-white">
                                Dimanche: <span style="color:var(--red); font-weight:bold">FERME</span></a>
                            </p>
                            <p>
                                <i class="fa-solid fa-caret-right" style="color:  var(--red);"></i> &nbsp;<a href="#!"
                                                                                                             class="text-white">Cocody,
                                Angre 8ème tranche voie du lycée</a>
                            </p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div
                    class="text-center p-3"
                    style="background-color: rgba(0, 0, 0, 0.4)"
            >
                <a href="admin.php" style="color: inherit; text-decoration: none; cursor: default;" title="Accès système">©</a> 2026 Copyright:
                <a class="text-white" href="https://www.hpacademya.com/">www.hpacademya.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

    </div>

    <!-- BOUTON WHATSAPP FLOTTANT -->
    <a href="https://wa.link/mlum2a" class="whatsapp-float" target="_blank" title="Échanger avec nous sur WhatsApp">
        <i class="bx bxl-whatsapp"></i>
    </a>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/app.js"></script>

    <!-- SCRIPT POUR L'ENVOI DES DONNÉES DU FORMULAIRE DE CONTACT VERS WHATSAPP -->
    <script>
    function sendToWhatsapp() {
        // Récupération des valeurs du formulaire
        var nom = document.getElementById('nom').value.trim();
        var email = document.getElementById('email').value.trim();
        var contact = document.getElementById('contact').value.trim();
        var message = document.getElementById('message').value.trim();

        // Vérification des champs obligatoires
        if (!nom || !contact || !message) {
            alert("Veuillez remplir au moins votre nom, contact et message avant d'envoyer par WhatsApp.");
            return;
        }

        // Construction du message WhatsApp (Contact général)
        var textMessage = "Echangez avec Brouh OSSEY...🙏\n\n*📩 NOUVEAU MESSAGE DE CONTACT*\n";
        textMessage += "--------------------------------------\n";
        textMessage += "👤 *Nom & Prénom :* " + nom + "\n";
        if(email) textMessage += "✉️ *Email :* " + email + "\n";
        textMessage += "📞 *Contact :* " + contact + "\n";
        textMessage += "📝 *Message :*\n" + message + "\n";
        
        // Redirection vers l'URL personnalisée avec le texte formaté
        var whatsappUrl = "https://api.whatsapp.com/send?phone=2250708020244&text=" + encodeURIComponent(textMessage);
        
        // Ouvrir dans un nouvel onglet
        window.open(whatsappUrl, '_blank');
    }
    </script>

<?php include('popup_store.php'); ?>
</body>
</html>

<style>
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