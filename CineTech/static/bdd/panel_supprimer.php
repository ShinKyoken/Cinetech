<?php

  require("connexion.php");
  require("../form_traitement/function/clean.php");
  require("user.php");

  $retour = "../../admin/panel.php";

  setcookie("filmBienEnregistre", FALSE, time()+2, '/');
  setcookie("vide", FALSE, time()+2, '/');
  setcookie("filmExisteDeja", FALSE, time()+2, '/');
  setcookie("filmExistePas", FALSE, time()+2, '/');

  // Assenissement de la valeur saisie
  $titre = clean_input($_POST["form_title_supp"]);
  
  $sql = "SELECT count(*) as nb_occurence FROM FILMS WHERE titre LIKE :titre";
  $stmt = $bdd -> prepare($sql);
  $stmt -> bindParam(":titre", $titre);
  $stmt -> execute();

  if(intVal($stmt -> fetch(PDO::FETCH_ASSOC)["nb_occurence"])){
    $sql2 = "DELETE FROM FILMS where titre=:titre";
    $stmt = $bdd -> prepare($sql2);
    $stmt -> bindParam(":titre", $titre);
    $stmt -> execute();
  }

  else{
    filmExistePas();
  }

  header("Location: $retour");
?>
