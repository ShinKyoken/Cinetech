<?php
    // Connexion à la Base de Données
    /* require("connexion.php"); */


    /**
     * Regarde si l'utilisateur est déjas connecté
     * au site ou non.
     */
    function getConnexion($login){
        $sql = "SELECT connected from USER where login=:login";
        $stmt = $bdd -> prepare($sql);
        $stmt -> bindParam(":login", $login);
        $stmt -> execute();
        
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }


    /**
     * Modifie l'état de connexion de l'utilisateur.
     */
    function setConnexion($login, $connected){
        $sql = "Update USER SET connected=:connected where login=:login";
        $stmt = $bdd -> prepare($sql);
        $stmt -> bindParam(":connected", $connected);
        $stmt -> bindParam(":login", $login);
        $stmt -> execute();
    }


    /**
     * Crée une session avec les informations
     * de la BD pour l'utilisateur.
     */
    function setSession($bdd, $login){
        $sql = "SELECT idUser, admin, connected FROM USER where login=:login";
        $stmt = $bdd -> prepare($sql);
        $stmt -> bindParam(":login", $login);
        $stmt -> execute();

        $tab_info = array();
        if($res = $stmt -> fetch(PDO::FETCH_ASSOC)){
            $_SESSION["id"] = $res["idUser"];
            $_SESSION["status"] = $res["admin"];
            $_SESSION["connected"] = $res["connected"]; 
        }
    }

    function redirection($url){
        if(!isset($_SESSION["id"]) || !isset($_SESSION["status"]) || !isset($_SESSION["connected"])){
            setcookie("redirige", TRUE, time()+2);
            header("Location: $url");
        }
    }

    function filmExistePas(){
        setcookie("pasDeFilm", TRUE, time()+2,'/');
    }

    function pasValide(){
        setcookie("vide", TRUE, time()+2,'/');
    }

    function filmExisteDeja(){
        setcookie("filmExisteDeja", TRUE, time()+2,'/');
    }

    function filmBienEnregistre(){
        setcookie("filmBienEnregistre", TRUE, time()+2,'/');
    }


?>