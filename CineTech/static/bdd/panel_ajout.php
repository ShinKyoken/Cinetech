<?php

require("connexion.php");
require("../form_traitement/function/clean.php");
require("user.php");

$retour = "../../admin/panel.php";

setcookie("filmBienEnregistre", FALSE, time()+2, '/');
setcookie("vide", FALSE, time()+2, '/');
setcookie("filmExisteDeja", FALSE, time()+2, '/');

// Assenissement de la valeur saisie
$titre = clean_input($_POST["form_title"]);
$annee = clean_input($_POST["form_year"]);
$url_film = clean_input($_POST["form_urlFilm"]);
$url_image = clean_input($_POST["form_urlImage"]);
$synopsis = clean_input($_POST["form_syno"]);
$categorie = clean_input($_POST["form_genre"]);
$realisateur = clean_input($_POST["form_real"]);
$duree = "00:00:00";

if($titre=="" || $annee=="" || $url_film=="" || $url_image=="" || $synopsis=="" || $categorie=="" || $realisateur==""){
    pasValide();
}
// Vérification dans la BDD si il existe déjàs.
$sql = "SELECT count(*) as nb_occurence FROM FILMS WHERE titre LIKE :titre";
$stmt = $bdd -> prepare($sql);
$stmt -> bindParam(":titre", $titre);
$stmt -> execute();
if(!intVal($stmt -> fetch(PDO::FETCH_ASSOC)["nb_occurence"])){

    // Insertion du nouveau film dans la BDD
    $insertion = "INSERT INTO FILMS(titre, annee, synopsis, duree, urlFilm, urlImage, realisateur, categorie) VALUES(:titre, :annee, :synopsis, :duree, :film, :image, :realisateur, :categorie)";
    $stmt = $bdd -> prepare($insertion);
    $stmt -> bindParam(":titre", $titre);
    $stmt -> bindParam(":annee", $annee);
    $stmt -> bindParam(":synopsis", $synopsis);
    $stmt -> bindParam(":duree", $duree);
    $stmt -> bindParam(":film", $url_film);
    $stmt -> bindParam(":image", $url_image);
    $stmt -> bindParam(":realisateur", $realisateur);
    $stmt -> bindParam(":categorie", $categorie);
    $stmt -> execute();

    filmBienEnregistre();
    
}
else{
    filmExisteDeja(); 
}
header("Location: $retour");

?>