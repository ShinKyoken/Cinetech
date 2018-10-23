<?php
    session_start();

    //========== Imports
    require("../bdd/connexion.php"); // Connexion avec la Base de données
    require("../bdd/user.php"); // Connexion avec la Base de données
    require("function/clean.php"); // Appel la fonction clean_input  
    //==========


    //========== Récupération des informations saisies dans le formulaire de connexion
    $user = clean_input($_POST["form_login"]);
    $pass = clean_input($_POST["form_pass"]);
    $hash = sha1($pass);
    //==========


    //========== Vérification dans la Base de données
    $go_to = "../../accueil.php";
    $same_page = "../../index.php";

    $requete = "SELECT login, password FROM USER where login=:login and password=:hash";
    $smtp = $bdd -> prepare($requete);
    $smtp -> bindParam(":login", $user);
    $smtp -> bindParam(":hash", $hash);
    $smtp -> execute();

    if($res = $smtp -> fetch(PDO::FETCH_ASSOC)){
        if($res["login"] === $user && $res["password"] === $hash){
            setSession($bdd, $user); // Réalise une session pour le client
        }
    }
    else {
        $go_to = $same_page;
    }

    header("Location: $go_to"); // Redirection vers la bonne page.

?>