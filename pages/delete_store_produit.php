<?php 
 session_start();
 if(!$_SESSION["user"]) {
   header("location: page_identification.php");
   // header() ne stoppe pas l'execution : sans exit, le script continue et
   // supprime le produit meme sans authentification valide
   exit;
 }

 include("../connexion.php");

 $produit_id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
 $req = "DELETE FROM store_produit WHERE id = '$produit_id' " ;
 $res = mysqli_query($con, $req);

if($res)
{
    header("location:dashbord_store.php");
}
?>
