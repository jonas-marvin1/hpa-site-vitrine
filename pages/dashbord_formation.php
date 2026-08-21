<?php 
session_start();
if(!$_SESSION["user"]){
  header("location: page_identification.php");
}

?>


<!DOCTYPE php>
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
  <title>
HPA-FORMATION
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

<body class="g-sidenav-show  bg-gray-100">
 <!-- DEBUT BARE DE NAVIGATION A GAUCHE -->
 <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="#" target="_blank">
      <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold"> Dashboard</span>
    </a>
  </div>
  <hr class="horizontal dark ">
  <div class="collapse navbar-collapse  w-auto mb-3 " id="sidenav-collapse-main" style="height: calc(100vh - 200px) !important;">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link  active" href="dashbord_formation.php">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"  > 
            <svg fill="#ffffff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 28.363 28.363" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M26.132,21.328l2.231-0.583L23.2,1.002L3.239,6.222H0v20.407h2.933l0.097,0.732l5.501-0.731h15.165v-2.019l2.824-0.377 L26.132,21.328z M23.695,12.801l1.008,7.568l-1.008,0.263V12.801z M22.279,2.576l0.412,1.582L9.534,5.909L22.279,2.576z M22.719,5.455l0.104,0.768h-5.868L22.719,5.455z M22.406,25.34H1.29V7.512h21.116V25.34z M23.695,23.311v-1.345l1.18-0.309 l0.195,1.469L23.695,23.311z M25.043,13.143l1.747,6.679l-0.829,0.217L25.043,13.143z"></path> <rect x="8.517" y="10.584" width="11.606" height="1.255"></rect> <rect x="8.517" y="13.244" width="11.606" height="1.254"></rect> <rect x="4.219" y="16.839" width="15.904" height="1.254"></rect> <rect x="4.219" y="19.586" width="15.904" height="1.255"></rect> <rect x="4.219" y="22.016" width="15.904" height="1.254"></rect> <path d="M4.152,11.832c0.386,0.038,0.751-0.084,1.032-0.309c-0.156,0.037-0.318,0.056-0.487,0.039 C3.879,11.483,3.28,10.757,3.36,9.939c0.032-0.33,0.173-0.623,0.381-0.852c-0.471,0.197-0.826,0.634-0.879,1.18 C2.787,11.055,3.363,11.755,4.152,11.832z"></path> <path d="M3.667,10.329c0.156,0.684,0.836,1.111,1.519,0.955c0.684-0.155,1.046-0.821,0.893-1.504 C5.923,9.097,5.308,8.655,4.624,8.81C3.939,8.965,3.512,9.645,3.667,10.329z"></path> </g> </g> </g></svg>
          </div>
          <span class="nav-link-text ms-1">Formations</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="dashbord_preinscrit.php">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="256px" height="256px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M17.5291 7.77C17.4591 7.76 17.3891 7.76 17.3191 7.77C15.7691 7.72 14.5391 6.45 14.5391 4.89C14.5391 3.3 15.8291 2 17.4291 2C19.0191 2 20.3191 3.29 20.3191 4.89C20.3091 6.45 19.0791 7.72 17.5291 7.77Z" fill="#4169e1"></path> <path d="M20.7916 14.7004C19.6716 15.4504 18.1016 15.7304 16.6516 15.5404C17.0316 14.7204 17.2316 13.8104 17.2416 12.8504C17.2416 11.8504 17.0216 10.9004 16.6016 10.0704C18.0816 9.8704 19.6516 10.1504 20.7816 10.9004C22.3616 11.9404 22.3616 13.6504 20.7916 14.7004Z" fill="#4169e1"></path> <path d="M6.44016 7.77C6.51016 7.76 6.58016 7.76 6.65016 7.77C8.20016 7.72 9.43016 6.45 9.43016 4.89C9.43016 3.29 8.14016 2 6.54016 2C4.95016 2 3.66016 3.29 3.66016 4.89C3.66016 6.45 4.89016 7.72 6.44016 7.77Z" fill="#4169e1"></path> <path d="M6.55109 12.8506C6.55109 13.8206 6.76109 14.7406 7.14109 15.5706C5.73109 15.7206 4.26109 15.4206 3.18109 14.7106C1.60109 13.6606 1.60109 11.9506 3.18109 10.9006C4.25109 10.1806 5.76109 9.89059 7.18109 10.0506C6.77109 10.8906 6.55109 11.8406 6.55109 12.8506Z" fill="#4169e1"></path> <path d="M12.1208 15.87C12.0408 15.86 11.9508 15.86 11.8608 15.87C10.0208 15.81 8.55078 14.3 8.55078 12.44C8.56078 10.54 10.0908 9 12.0008 9C13.9008 9 15.4408 10.54 15.4408 12.44C15.4308 14.3 13.9708 15.81 12.1208 15.87Z" fill="#4169e1"></path> <path d="M8.87078 17.9406C7.36078 18.9506 7.36078 20.6106 8.87078 21.6106C10.5908 22.7606 13.4108 22.7606 15.1308 21.6106C16.6408 20.6006 16.6408 18.9406 15.1308 17.9406C13.4208 16.7906 10.6008 16.7906 8.87078 17.9406Z" fill="#4169e1"></path> </g></svg>
          </div>
          <span class="nav-link-text ms-1">Préinscrits</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="dashbord_gallerie.php">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#4169e1" stroke="#4169e1"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M19 7h4v15H6v-4h1v3h15V8h-3zM1 17V2h17v15zm1-5.033l1.683-1.683a.409.409 0 0 1 .576-.002.4.4 0 0 0 .57.012L7.753 7.37a.408.408 0 0 1 .55-.025l2.932 2.443a.408.408 0 0 0 .507.013l1.769-1.327a.409.409 0 0 1 .534.038L17 11.467V3H2zM17 16v-3.119l-3.3-3.3-1.358 1.019a1.407 1.407 0 0 1-1.747-.044L8.078 8.459 5.536 11a1.376 1.376 0 0 1-.98.406 1.397 1.397 0 0 1-.492-.09L2 13.381V16zm-5.5-9.5a1 1 0 1 0-1-1 1 1 0 0 0 1 1z"></path><path fill="none" d="M0 0h24v24H0z"></path></g></svg>
          </div>
          <span class="nav-link-text ms-1">Gallerie</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="dashbord_utilisateur.php">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="256px" height="256px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="24" height="24" fill="white"></rect> <path fill-rule="evenodd" clip-rule="evenodd" d="M5 9.5C5 7.01472 7.01472 5 9.5 5C11.9853 5 14 7.01472 14 9.5C14 11.9853 11.9853 14 9.5 14C7.01472 14 5 11.9853 5 9.5Z" fill="#4169e1"></path> <path d="M14.3675 12.0632C14.322 12.1494 14.3413 12.2569 14.4196 12.3149C15.0012 12.7454 15.7209 13 16.5 13C18.433 13 20 11.433 20 9.5C20 7.567 18.433 6 16.5 6C15.7209 6 15.0012 6.2546 14.4196 6.68513C14.3413 6.74313 14.322 6.85058 14.3675 6.93679C14.7714 7.70219 15 8.5744 15 9.5C15 10.4256 14.7714 11.2978 14.3675 12.0632Z" fill="#4169e1"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M4.64115 15.6993C5.87351 15.1644 7.49045 15 9.49995 15C11.5112 15 13.1293 15.1647 14.3621 15.7008C15.705 16.2847 16.5212 17.2793 16.949 18.6836C17.1495 19.3418 16.6551 20 15.9738 20H3.02801C2.34589 20 1.85045 19.3408 2.05157 18.6814C2.47994 17.2769 3.29738 16.2826 4.64115 15.6993Z" fill="#4169e1"></path> <path d="M14.8185 14.0364C14.4045 14.0621 14.3802 14.6183 14.7606 14.7837V14.7837C15.803 15.237 16.5879 15.9043 17.1508 16.756C17.6127 17.4549 18.33 18 19.1677 18H20.9483C21.6555 18 22.1715 17.2973 21.9227 16.6108C21.9084 16.5713 21.8935 16.5321 21.8781 16.4932C21.5357 15.6286 20.9488 14.9921 20.0798 14.5864C19.2639 14.2055 18.2425 14.0483 17.0392 14.0008L17.0194 14H16.9997C16.2909 14 15.5506 13.9909 14.8185 14.0364Z" fill="#4169e1"></path> </g></svg>
          </div>
          <span class="nav-link-text ms-1">Utilisateurs</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="dashbord_infos.php">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="256px" height="256px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M18.4698 16.83L18.8598 19.99C18.9598 20.82 18.0698 21.4 17.3598 20.97L13.1698 18.48C12.7098 18.48 12.2599 18.45 11.8199 18.39C12.5599 17.52 12.9998 16.42 12.9998 15.23C12.9998 12.39 10.5398 10.09 7.49985 10.09C6.33985 10.09 5.26985 10.42 4.37985 11C4.34985 10.75 4.33984 10.5 4.33984 10.24C4.33984 5.68999 8.28985 2 13.1698 2C18.0498 2 21.9998 5.68999 21.9998 10.24C21.9998 12.94 20.6098 15.33 18.4698 16.83Z" fill="#4169e1"></path> <path d="M13 15.2298C13 16.4198 12.56 17.5198 11.82 18.3898C10.83 19.5898 9.26 20.3598 7.5 20.3598L4.89 21.9098C4.45 22.1798 3.89 21.8098 3.95 21.2998L4.2 19.3298C2.86 18.3998 2 16.9098 2 15.2298C2 13.4698 2.94 11.9198 4.38 10.9998C5.27 10.4198 6.34 10.0898 7.5 10.0898C10.54 10.0898 13 12.3898 13 15.2298Z" fill="#4169e1"></path> </g></svg>
          </div>
          <span class="nav-link-text ms-1">Infos</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="dashbord_news_letter.php">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="256px" height="256px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 6C22 7.65685 20.6569 9 19 9C17.3431 9 16 7.65685 16 6C16 4.34315 17.3431 3 19 3C20.6569 3 22 4.34315 22 6Z" fill="#4169e1"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M14 5H10C6.22876 5 4.34315 5 3.17157 6.17157C2 7.34315 2 9.22876 2 13C2 16.7712 2 18.6569 3.17157 19.8284C4.34315 21 6.22876 21 10 21H14C17.7712 21 19.6569 21 20.8284 19.8284C22 18.6569 22 16.7712 22 13C22 11.5466 22 10.3733 21.9329 9.413C21.1453 10.0905 20.1205 10.5 19 10.5C18.5213 10.5 18.0601 10.4253 17.6274 10.2868L16.2837 11.4066C15.3973 12.1452 14.6789 12.7439 14.0448 13.1517C13.3843 13.5765 12.7411 13.8449 12 13.8449C11.2589 13.8449 10.6157 13.5765 9.95518 13.1517C9.32112 12.7439 8.60271 12.1452 7.71636 11.4066L5.51986 9.57617C5.20165 9.31099 5.15866 8.83807 5.42383 8.51986C5.68901 8.20165 6.16193 8.15866 6.48014 8.42383L8.63903 10.2229C9.57199 11.0004 10.2197 11.5384 10.7666 11.8901C11.2959 12.2306 11.6549 12.3449 12 12.3449C12.3451 12.3449 12.7041 12.2306 13.2334 11.8901C13.7803 11.5384 14.428 11.0004 15.361 10.2229L16.2004 9.52335C15.1643 8.69893 14.5 7.42704 14.5 6C14.5 5.65638 14.5385 5.32175 14.6115 5.0002C14.4133 5 14.2096 5 14 5Z" fill="#4169e1"></path> </g></svg>
          </div>
          <span class="nav-link-text ms-1">News Letters</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="dashbord_nous_contacter.php">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="256px" height="256px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>contacts_fill</title> <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="User" transform="translate(-528.000000, -48.000000)" fill-rule="nonzero"> <g id="contacts_fill" transform="translate(528.000000, 48.000000)"> <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero"> </path> <path d="M15,14 C17.6887316,14 19.8818169,16.1223292 19.9953804,18.7831122 L20,19 L20,20 C20,21.0543909 19.18415,21.9181678 18.1492661,21.9945144 L18,22 L4,22 C2.94563773,22 2.08183483,21.18415 2.00548573,20.1492661 L2,20 L2,19 C2,16.3112684 4.12231026,14.1181831 6.78311066,14.0046196 L7,14 L15,14 Z M21,13 C21.5523,13 22,13.4477 22,14 C22,14.5523 21.5523,15 21,15 L20,15 C19.4477,15 19,14.5523 19,14 C19,13.4477 19.4477,13 20,13 L21,13 Z M11,2 C13.7614,2 16,4.23858 16,7 C16,9.76142 13.7614,12 11,12 C8.23858,12 6,9.76142 6,7 C6,4.23858 8.23858,2 11,2 Z M21,10 C21.5523,10 22,10.4477 22,11 C22,11.5523 21.5523,12 21,12 L19,12 C18.4477,12 18,11.5523 18,11 C18,10.4477 18.4477,10 19,10 L21,10 Z M21,7 C21.5523,7 22,7.44772 22,8 C22,8.51283143 21.613973,8.93550653 21.1166239,8.9932722 L21,9 L18,9 C17.4477,9 17,8.55228 17,8 C17,7.48716857 17.386027,7.06449347 17.8833761,7.0067278 L18,7 L21,7 Z" id="形状" fill="#4169e1"> </path> </g> </g> </g> </g></svg>
          </div>
          <span class="nav-link-text ms-1">Contacts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="dashbord_logo.php">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="256px" height="256px" viewBox="0 0 24 24" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" fill="#4169e1" stroke="#4169e1"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.cls-1{fill:none;stroke:rgb(47,66,120);stroke-miterlimit:10;stroke-width:1.91px;}</style></defs><circle class="cls-1" cx="12" cy="4.34" r="2.86"></circle><circle class="cls-1" cx="19.64" cy="16.75" r="2.86"></circle><circle class="cls-1" cx="4.36" cy="16.75" r="2.86"></circle><path class="cls-1" d="M6,19.09a8.59,8.59,0,0,0,12,0"></path><path class="cls-1" d="M14.82,4.82a8.57,8.57,0,0,1,5.77,8.11,6.71,6.71,0,0,1-.08,1.1"></path><path class="cls-1" d="M3.49,14a6.71,6.71,0,0,1-.08-1.1A8.57,8.57,0,0,1,9.18,4.82"></path></g></svg>
          </div>
          <span class="nav-link-text ms-1">Logos</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link  " href="dashbord_store.php">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="256px" height="256px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 6H20M4 6L5.3274 16.6191C5.45199 17.6157 6.2995 18.36 7.30397 18.36H16.696C17.7005 18.36 18.548 17.6157 18.6726 16.6191L20 6M4 6H3M20 6H21" stroke="#4169e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 10C9 10 9 13 12 13C15 13 15 10 15 10" stroke="#4169e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
          </div>
          <span class="nav-link-text ms-1">Boutique</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="dashbord_store_leads.php">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="256px" height="256px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" stroke="#4169e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 14C8.68629 14 6 16.6863 6 20H18C18 16.6863 15.3137 14 12 14Z" stroke="#4169e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
          </div>
          <span class="nav-link-text ms-1">Leads popup</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="../index.php">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="256px" height="256px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>globe</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-204.000000, -671.000000)" fill="#4169e1"> <path d="M231.596,694.829 C229.681,694.192 227.622,693.716 225.455,693.408 C225.75,691.675 225.907,689.859 225.957,688 L233.962,688 C233.783,690.521 232.936,692.854 231.596,694.829 L231.596,694.829 Z M223.434,700.559 C224.1,698.95 224.645,697.211 225.064,695.379 C226.862,695.645 228.586,696.038 230.219,696.554 C228.415,698.477 226.073,699.892 223.434,700.559 L223.434,700.559 Z M220.971,700.951 C220.649,700.974 220.328,701 220,701 C219.672,701 219.352,700.974 219.029,700.951 C218.178,699.179 217.489,697.207 216.979,695.114 C217.973,695.027 218.98,694.976 220,694.976 C221.02,694.976 222.027,695.027 223.022,695.114 C222.511,697.207 221.822,699.179 220.971,700.951 L220.971,700.951 Z M209.781,696.554 C211.414,696.038 213.138,695.645 214.936,695.379 C215.355,697.211 215.9,698.95 216.566,700.559 C213.927,699.892 211.586,698.477 209.781,696.554 L209.781,696.554 Z M208.404,694.829 C207.064,692.854 206.217,690.521 206.038,688 L214.043,688 C214.093,689.859 214.25,691.675 214.545,693.408 C212.378,693.716 210.319,694.192 208.404,694.829 L208.404,694.829 Z M208.404,679.171 C210.319,679.808 212.378,680.285 214.545,680.592 C214.25,682.325 214.093,684.141 214.043,686 L206.038,686 C206.217,683.479 207.064,681.146 208.404,679.171 L208.404,679.171 Z M216.566,673.441 C215.9,675.05 215.355,676.789 214.936,678.621 C213.138,678.356 211.414,677.962 209.781,677.446 C211.586,675.523 213.927,674.108 216.566,673.441 L216.566,673.441 Z M219.029,673.049 C219.352,673.027 219.672,673 220,673 C220.328,673 220.649,673.027 220.971,673.049 C221.822,674.821 222.511,676.794 223.022,678.886 C222.027,678.973 221.02,679.024 220,679.024 C218.98,679.024 217.973,678.973 216.979,678.886 C217.489,676.794 218.178,674.821 219.029,673.049 L219.029,673.049 Z M223.954,688 C223.9,689.761 223.74,691.493 223.439,693.156 C222.313,693.058 221.168,693 220,693 C218.832,693 217.687,693.058 216.562,693.156 C216.26,691.493 216.1,689.761 216.047,688 L223.954,688 L223.954,688 Z M216.047,686 C216.1,684.239 216.26,682.507 216.562,680.844 C217.687,680.942 218.832,681 220,681 C221.168,681 222.313,680.942 223.438,680.844 C223.74,682.507 223.9,684.239 223.954,686 L216.047,686 L216.047,686 Z M230.219,677.446 C228.586,677.962 226.862,678.356 225.064,678.621 C224.645,676.789 224.1,675.05 223.434,673.441 C226.073,674.108 228.415,675.523 230.219,677.446 L230.219,677.446 Z M231.596,679.171 C232.936,681.146 233.783,683.479 233.962,686 L225.957,686 C225.907,684.141 225.75,682.325 225.455,680.592 C227.622,680.285 229.681,679.808 231.596,679.171 L231.596,679.171 Z M220,671 C211.164,671 204,678.163 204,687 C204,695.837 211.164,703 220,703 C228.836,703 236,695.837 236,687 C236,678.163 228.836,671 220,671 L220,671 Z" id="globe" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>
          </div>
          <span class="nav-link-text ms-1">Site web</span>
        </a>
      </li>
    </ul>
  </div>
  <a href="deconnexion.php" class="deconnecter">  Se deconnecter</a></aside>
<!-- FIN BARE DE NAVIGATION A GAUCHE -->

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"> <fieldset>Formations</fieldset></li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a class="btn btn-outline-danger btn-sm mb-0 me-3" href="enregistrer_une_formation.php">Ajouter une formation</a>
            </li>
            
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
              <h6>
                  <a href="dashbord_formation.php" style="font-weight: bold; color:black; text-transform: uppercase; text-decoration:underline;">Nos Certificats</a>&nbsp;/&nbsp;
                  <a href="dashbord_cours_intensifs.php" >Nos Cours Intensifs</a>&nbsp;/&nbsp;
                  <a href="dashbord_testes.php" >Nos testes Internatinaux</a>
              </h6>
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
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">HPA_Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Libelle</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Objectif</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Module</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cible</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prerequis</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Duree</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="2">Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                          include("../connexion.php");
                          $req = "SELECT * FROM formation ";
                          // $req = "SELECT * FROM user limit 2"; pour afficher un certains nombreeee
                          $res = mysqli_query($con,$req);

                          while ($row = mysqli_fetch_assoc($res)) {
                  ?>
                                            
                      
                    <tr>

                      <td class="text-center" >
                        <div class="d-flex px-2 py-1">
                          <div>
                          <!-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1"> -->
                          <img src="<?php echo $row['repertoire']; ?>" class="avatar avatar-sm me-3" alt="user1">
                          
                          </div>
                        </div>
                      </td>

                      <td  class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $row['hpa']; ?></p>
                      </td>
                      
                      <td class="align-middle text-center ">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $row['libelle']; ?></span>
                      </td>
                       <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Objectifs...</span>
                      </td>
                       <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Modules...</span>
                      </td>
                       <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Cibles...</span>
                      </td>
                       <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Prerequis...</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $row['duree']; ?></span>
                      </td>
                      
                      
                       <td class="align-middle text-center">
                        <a href="modif_une_formation.php?id=<?php echo $row['id']; ?>" title="Modifier"> 
                          <!--debut logo edit-->
                          <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" clip-rule="evenodd" d="m3.99 16.854-1.314 3.504a.75.75 0 0 0 .966.965l3.503-1.314a3 3 0 0 0 1.068-.687L18.36 9.175s-.354-1.061-1.414-2.122c-1.06-1.06-2.122-1.414-2.122-1.414L4.677 15.786a3 3 0 0 0-.687 1.068zm12.249-12.63 1.383-1.383c.248-.248.579-.406.925-.348.487.08 1.232.322 1.934 1.025.703.703.945 1.447 1.025 1.934.058.346-.1.677-.348.925L19.774 7.76s-.353-1.06-1.414-2.12c-1.06-1.062-2.121-1.415-2.121-1.415z" fill="#4169e1"></path></g></svg>
                          <!--fin logo edit-->
                        </a>   
                      </td>
                      <td class="align-middle text-center">
                        <a href="delete_formation.php?id=<?php echo $row['id']; ?>" title="Supprimer">
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


<script src="wp_filters.js"></script>
</body>

</html>