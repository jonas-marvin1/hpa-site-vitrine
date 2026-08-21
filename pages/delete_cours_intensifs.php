<?php 
 
 include("../connexion.php");

 $user_id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
 $req = "DELETE FROM cours_intensifs where id = '$user_id' " ;
 $res = mysqli_query($con, $req);

if($res)
{
    header("location:dashbord_cours_intensifs.php");
}


?>