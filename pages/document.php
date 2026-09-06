<?php
session_start();
if (!$_SESSION["user"]) {
    header("location: page_identification.php");
    // header() ne stoppe pas l'execution : sans exit, le fichier serait quand
    // meme renvoye plus bas a un client qui ne suit pas la redirection.
    exit;
}

$dossiers_autorises = ["cv", "diplome"];
$type = $_GET["type"] ?? "";
if (!in_array($type, $dossiers_autorises, true)) {
    http_response_code(404);
    exit;
}

// basename() retire tout ../ ou / du nom fourni par l'utilisateur.
$nom_fichier = basename($_GET["fichier"] ?? "");

$dossier = realpath(__DIR__ . "/../" . $type);
$chemin = $nom_fichier !== "" ? realpath($dossier . "/" . $nom_fichier) : false;

// realpath() resout aussi les liens symboliques : on verifie que le resultat
// final reste bien a l'interieur du dossier attendu avant de servir le fichier.
if ($dossier === false || $chemin === false || strpos($chemin, $dossier . DIRECTORY_SEPARATOR) !== 0) {
    http_response_code(404);
    exit;
}

$extension = strtolower(pathinfo($chemin, PATHINFO_EXTENSION));
$types_mime = [
    "pdf"  => "application/pdf",
    "jpg"  => "image/jpeg",
    "jpeg" => "image/jpeg",
    "png"  => "image/png",
    "doc"  => "application/msword",
    "docx" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
];
$type_mime = $types_mime[$extension] ?? "application/octet-stream";

header("Content-Type: " . $type_mime);
header("Content-Disposition: inline; filename=\"" . basename($chemin) . "\"");
header("X-Content-Type-Options: nosniff");
readfile($chemin);
