<?php

    //========== Connexion à la Base de Données de l'IUT
    try{
        $hostname = "servinfo-mariadb";
        $dbname = "DBorlay";
        $charset = "utf8";
        $user = "orlay";
        $password = "orlay";
        $bdd = new PDO("mysql:host=$hostname; dbname=$dbname; charset=$charset", $user, $password, array(PDO::ATTR_PERSISTENT => true));
    }
    catch(Exception $e){
       die("Erreur : " . $e -> getMessage());
    }
    //*==========



    //========== Connexion à la Base de Données sur le PC d'arno
    // Ne pas oublier de commenter pour pusher sur le git.
    /**try{
        $hostname = "localhost";
        $dbname = "cinetech";
        $charset = "utf8";
        $user = "root";
        $password = "";
        $bdd = new PDO("mysql:host=$hostname; dbname=$dbname; charset=$charset", $user, $password, array(PDO::ATTR_PERSISTENT => true));
    }
    catch(Exception $e){
        die("Erreur : " . $e -> getMessage());
    }*/

    /*//==========
    // connexion à la base de données sur le PC de bastien
    function connect(){
      try{
        $hostname = "localhost";
        $dbname = "cinetech";
        $charset = "utf8";
        $user = "root";
        $password = "";
        $bdd = new PDO("mysql:host=$hostname; dbname=$dbname; charset=$charset", $user, $password, array(PDO::ATTR_PERSISTENT => true));
        return $bdd;
      }
      catch(Exception $e){
        die("Erreur : " . $e -> getMessage());
      }
    }
    //==========*/

?>
