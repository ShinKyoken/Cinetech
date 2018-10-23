<?php
    $mail = "arnorlay@gmail.com"; // L'adresse de destination
    //========== Filtrer les seureurs qui rajouttent le "\r" afin de respecter la norme.
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)){
        $passage_ligne = "\r\n";
    }
    else{
        $passage_ligne = "\n";
    }
    //==========


    //=====Déclaration des messages au format texte et au format HTML.
    $message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";
    $message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>.</body></html>";
    //==========


    //=====Création de la boundary
    $boundary = "-----=".md5(rand()); // Création d'une chaine aléatoire pour séparer les éléments de l'email
    //==========


    //=====Définition du sujet.
    $sujet = "Hey mon ami !";
    //=========


    //========== Création de l'entete
    $header = "From: 'CinéTech' <arnorlay@outlook.fr>" . $passage_ligne; // Déclaration de l'expéditeur
    $header .= "Reply-to: 'Cinétech' <arnorlay@outlook.fr>".$passage_ligne; // Déclaration de l'adresse de retour
    $header .= "MIME-Version: 1.0".$passage_ligne; // Déclaration de la version de MIME
    $header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary='$boundary'".$passage_ligne; // Déclaration du type de contenu
    //==========



    //========== Création du message.
    $message = $passage_ligne."--".$boundary.$passage_ligne;
    //===== Ajout du message au format texte.
    $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_txt.$passage_ligne;
    //=====
    $message.= $passage_ligne."--".$boundary.$passage_ligne;
    //===== Ajout du message au format HTML
    $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    //=====
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    //==========
    
    //========== Envoi de l'e-mail.
    mail($mail, $sujet, $message, $header);
    //==========



?>