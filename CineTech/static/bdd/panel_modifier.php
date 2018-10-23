<?php

  require("connexion.php");
  require("../form_traitement/function/clean.php");
  require("user.php");

  $retour = "../../admin/panel.php";

  setcookie("filmBienEnregistre", FALSE, time()+2, '/');
  setcookie("vide", FALSE, time()+2, '/');
  setcookie("filmExisteDeja", FALSE, time()+2, '/');

  // Assenissement de la valeur saisie
  $id = clean_input($_POST["form_id_mod"]);
  $titre = clean_input($_POST["form_title_mod"]);
  $annee = clean_input($_POST["form_year_mod"]);
  $url_film = clean_input($_POST["form_urlFilm_mod"]);
  $url_image = clean_input($_POST["form_urlImage_mod"]);
  $synopsis = clean_input($_POST["form_syno_mod"]);
  $categorie = clean_input($_POST["form_genre_mod"]);
  $realisateur = clean_input($_POST["form_real_mod"]);

  if($titre=="" || $annee=="" || $url_film=="" || $url_image=="" || $synopsis=="" || $categorie=="" || $realisateur==""){
    pasValide();
  }

  // Modification du film dans la BDD
  $sql = "SELECT count(*) as nb_occurence FROM FILMS WHERE titre LIKE :titre";
  $stmt = $bdd -> prepare($sql);
  $stmt -> bindParam(":titre", $titre);
  $stmt -> execute();

  if(!intVal($stmt -> fetch(PDO::FETCH_ASSOC)["nb_occurence"])){
    $sql = "UPDATE FILMS SET titre=:titre, annee=:annee, synopsis=:synopsis, urlFilm=:film, urlImage=:image, realisateur=:realisateur, categorie=:categorie where idFilm=:id";
    $stmt = $bdd -> prepare($sql);
    $stmt -> bindParam(":id", $id);
    $stmt -> bindParam(":titre", $titre);
    $stmt -> bindParam(":annee", $annee);
    $stmt -> bindParam(":synopsis", $synopsis);
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
