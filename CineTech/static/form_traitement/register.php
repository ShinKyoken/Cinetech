<?php

    //========== Imports
    require("../bdd/connexion.php"); // Connexion avec la Base de données
    require("function/clean.php"); // Appel la fonction clean_input  
    //==========


    //========== Récupération des informations saisies dans le formulaire de connexion
    $lastname = clean_input($_POST["form_lastname"]);
    $name = clean_input($_POST["form_name"]);
    $email = clean_input($_POST["form_email"]);
    $user = clean_input($_POST["form_login"]);
    $pass = clean_input($_POST["form_pass"]);
    $passconf = clean_input($_POST["form_passconf"]);
    //==========


    //========= Vérification sur chaques information saisie avant redirection
    $go_to = "../../index.php";
    $same_page = "../../inscription.php";
    if(!empty($lastname) && !empty($name) && !empty($email) && !empty($user) && !empty($pass) && !empty($passconf)){
        preg_match("/[A-Z][a-zàçéèêëîïôöûüù\s-]{1,49}/i", $lastname, $preg_lastname);
        preg_match("/[A-Z][a-zàçéèêëîïôöûüù\s-]{1,49}/i", $name, $preg_name);
        preg_match("/[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}/i", $email, $preg_email);
        preg_match("/[0-9A-Za-zàçéèêëîïôöûüù._-]{1,50}/i", $user, $preg_user);
        preg_match("/$pass/", $passconf, $preg_pass);
        $form = [
            [$lastname, $preg_lastname],
            [$name, $preg_name],
            [$email, $preg_email],
            [$user, $preg_user],
            [$passconf, $preg_pass]
        ];
        foreach($form as $_ => $tab){
            if(sizeof($tab[1]) != 1 || $tab[0] != $tab[1][0]){
                $go_to = $same_page;
                break;
            }
        }
    }
    else {
        $go_to = $same_page;
    }
    // Si le formulaire est correcte, alors on peut l'enregistrer dans la Base de Données
    if($go_to != $same_page){
        try{
            $hash = sha1($pass);
            $requete = "INSERT INTO USER(lastname, name, login, password, email) VALUES(:lastname, :name, :login, :hash, :email)";
            $smtp = $bdd -> prepare($requete);
            $smtp -> bindParam(":lastname", $lastname);
            $smtp -> bindParam(":name", $name);
            $smtp -> bindParam(":login", $user);
            $smtp -> bindParam(":hash", $hash);
            $smtp -> bindParam(":email", $email);   
            $smtp -> execute();
        }
        catch(Exception $e){
            die("Erreur : Inscription du client dans la BDD\n" . $e -> getMessage());
        }
    }
    header("Location: $go_to");
    //==========


    


?>