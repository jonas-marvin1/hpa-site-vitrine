<?php
/**
 * Traitement des fichiers deposes par les formulaires de preinscription
 * (preinscription.php et certificat.php).
 *
 * Regles appliquees :
 *  - extension dans une liste blanche ;
 *  - type MIME reel verifie via finfo (l'extension seule se falsifie) ;
 *  - nom de fichier entierement regenere, le nom d'origine du client n'est
 *    jamais reutilise : cela neutralise les doubles extensions "cv.pdf.php" ;
 *  - chaque fichier est traite independamment des autres.
 *
 * Les dossiers de destination portent en plus un .htaccess qui coupe
 * l'interpreteur PHP : un fichier depose ne peut pas devenir un webshell.
 */

const UPLOAD_EXTENSIONS_AUTORISEES = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png'];

const UPLOAD_MIMES_AUTORISES = [
    'application/pdf',
    'application/msword',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'image/jpeg',
    'image/png',
];

/**
 * Valide puis deplace le fichier recu dans $champ vers $dossier.
 *
 * @param string      $champ   Cle dans $_FILES (ex. "cv").
 * @param string      $dossier Dossier de destination, sans slash final.
 * @param string      $prefixe Prefixe du nom genere (ex. "cv_").
 * @param string|null $erreur  Rempli avec le message d'erreur le cas echeant.
 *
 * @return string Le nom du fichier enregistre, ou "" si aucun fichier ou echec.
 */
function traiter_upload($champ, $dossier, $prefixe, &$erreur)
{
    if (!isset($_FILES[$champ]) || $_FILES[$champ]["error"] === UPLOAD_ERR_NO_FILE) {
        return "";
    }

    if ($_FILES[$champ]["error"] !== UPLOAD_ERR_OK) {
        $erreur = "Le fichier « $champ » n'a pas pu être reçu (code " . $_FILES[$champ]["error"] . ").";
        return "";
    }

    $tmp_path = $_FILES[$champ]["tmp_name"];

    // Garde-fou : le fichier doit bien provenir d'un upload HTTP.
    if (!is_uploaded_file($tmp_path)) {
        $erreur = "Fichier « $champ » invalide.";
        return "";
    }

    $ext = strtolower(pathinfo($_FILES[$champ]["name"], PATHINFO_EXTENSION));

    if (!in_array($ext, UPLOAD_EXTENSIONS_AUTORISEES, true)) {
        $erreur = "Extension de fichier non autorisée. (pdf, doc, docx, jpg, png uniquement)";
        return "";
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime  = finfo_file($finfo, $tmp_path);
    finfo_close($finfo);

    if (!in_array($mime, UPLOAD_MIMES_AUTORISES, true)) {
        $erreur = "Le contenu du fichier « $champ » ne correspond pas à son extension.";
        return "";
    }

    $nouveau_nom = uniqid($prefixe) . '.' . $ext;

    if (!move_uploaded_file($tmp_path, $dossier . "/" . $nouveau_nom)) {
        $erreur = "Échec de l'enregistrement du fichier « $champ ».";
        return "";
    }

    return $nouveau_nom;
}
