<?php
    session_start();
    // Suppresion des sessions
    session_destroy();


    // fermeture de la connexion avec la BDD
    $bdd = NULL;

    
    // Redirection vers la page de connexion
    $go_to = "../../index.php";
    header("Location: $go_to");

?>