<?php
include ("../connexion.php");

if(isset($_POST["submit"])){

  $nom_image = $_FILES["image"]["name"];
  $file_extension = strtolower(pathinfo($nom_image, PATHINFO_EXTENSION));
  $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
  
  if (in_array($file_extension, $allowed_extensions)) {
      $unique_name = uniqid() . '.' . $file_extension;
      $tmp = $_FILES["image"]["tmp_name"];
      $repertoire_image = "images/".$unique_name;

      if(move_uploaded_file($tmp, $repertoire_image)){
        $stmt = mysqli_prepare($con, "INSERT INTO gallerie (titre, repertoire) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $nom_image, $repertoire_image);
        $res = mysqli_stmt_execute($stmt);
        header("location:dashbord_gallerie.php");
      } else echo "error !";
  } else {
      echo "Type de fichier non autorisé.";
  }
}

?>