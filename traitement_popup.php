<?php
include("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = isset($_POST['nom']) ? mysqli_real_escape_string($con, $_POST['nom']) : '';
    $prenom = isset($_POST['prenom']) ? mysqli_real_escape_string($con, $_POST['prenom']) : '';
    $whatsapp = isset($_POST['whatsapp']) ? mysqli_real_escape_string($con, $_POST['whatsapp']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($con, $_POST['email']) : '';
    $pays = isset($_POST['pays']) ? mysqli_real_escape_string($con, $_POST['pays']) : '';

    if (!empty($nom) && !empty($whatsapp) && !empty($email)) {
        $req = "INSERT INTO store_contact (nom, prenom, whatsapp, email, pays) VALUES ('$nom', '$prenom', '$whatsapp', '$email', '$pays')";
        if (mysqli_query($con, $req)) {
            echo "success";
        } else {
            echo "error_db";
        }
    } else {
        echo "missing_data";
    }
} else {
    echo "invalid_request";
}
?>
