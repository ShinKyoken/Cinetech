<?php

/**
 * Recuperation de toutes les informations de tout les 
 * films présent dans la base de donnée.
 */
function recuperationToutFilm($bdd){
    // Récupération de tous les films de le BD
    $query = "SELECT idFilm, titre, annee, synopsis, duree, urlFilm, urlImage, note, vote, vue, realisateur, categorie FROM FILMS ORDER BY annee DESC, dateEnregistrement DESC";
    $smtp = $bdd -> prepare($query);
    $smtp -> execute();

    return creationTableauFilms($smtp);
}

function recuperationFilmParVue($bdd){
    $query = $query = "SELECT * FROM `FILMS` order by vue DESC LIMIT 5 ";
    $smtp = $bdd -> prepare($query);
    $smtp -> execute();

    return creationTableauFilms($smtp);
}

/**
 * Récupère toutes les information d'un film en fonction
 * de son titre.
 */
function recupererUnFilm($bdd, $titre){
    // Récupération de tous les films de le BD
    $titre=$titre."%";
    $query = "SELECT titre, annee, synopsis, duree, urlFilm, urlImage, note, vote, vue, realisateur, categorie FROM FILMS WHERE titre LIKE :titre";
    $smtp = $bdd -> prepare($query);
    $smtp -> bindParam(":titre", $titre);
    $smtp -> execute();

   return creationTableauFilms($smtp);
}



/**
 *Fonction permettant de créer un tableau avec les 
 *information des films. Cette fonction permet
 *donc d'exploiter les informations par les autres
 *fonctions. De plus, elle permet d'empecher la 
 *redondance de code. 
 */
function creationTableauFilms($smtp){
    $tab_films = array();
    while($film = $smtp -> fetch(PDO::FETCH_ASSOC)){
        array_push($tab_films, array(
            "id" => isset($film["idFilm"]) ? $film["idFilm"] : "",
            "titre" => $film["titre"],
            "annee" => $film["annee"],
            "synopsis" => $film["synopsis"],
            "duree" => $film["duree"],
            "urlFilm"=> $film["urlFilm"],
            "urlImage" => $film["urlImage"],
            "note" => intval($film["vote"]) != 0 ? intVal($film["note"]) / intval($film["vote"]) : 0,
            "vote" => intval($film["vote"]),
            "vue" => intval($film["vue"]),
            "categorie" => $film["categorie"],
            "realisateur" => $film["realisateur"]
        ));
    }
    return $tab_films;
}




/**
 *Fonction permettant de recuperer les informations
 *des films qui correspondent au type entré en 
 *paramètre.
 */
function recuperationFilmParGenre($bdd, $type){
    $type=$type."%";
    $query = "SELECT titre, annee, synopsis, duree, urlFilm, urlImage, note, vote, vue, realisateur, categorie FROM FILMS WHERE categorie like :t";
    $stmt = $bdd -> prepare($query);
    $stmt -> bindParam(':t', $type);
    $stmt -> execute();
    
    return creationTableauFilms($stmt);
}




/**
 * Récupère la liste des genres de films présent dans la base de données
 * qui sont associé à un film.
 */
function recuperationGenres($bdd){
    $query = "SELECT DISTINCT categorie from FILMS ORDER BY categorie";
    $stmt = $bdd -> prepare($query);
    $stmt -> execute();

    // Création d'un tableau
    $tab_genres = array();
    while ($genre = $stmt -> fetch(PDO::FETCH_ASSOC)){
        array_push($tab_genres, $genre["categorie"]);
    }
    return $tab_genres;

}

/**
 *Fonction permettant de récuperer les
 *titres des films présent dans la base 
 *de donnée. 
 */
function recuperationTitre($bdd){
    $query = "SELECT titre from FILMS ";
    $stmt = $bdd -> prepare($query);
    $stmt -> execute();

    // Création d'un tableau
    $tab_titre = array();
    while ($titre = $stmt -> fetch(PDO::FETCH_ASSOC)){
        array_push($tab_titre, $titre["titre"]);
    }
    return $tab_titre;
}

/**
 * Fonction permettant de récuperer les
 * réalisateur de film présent dans la 
 * base de donnée.
 */
function recuperationRealisateur($bdd){
    $query = "SELECT distinct realisateur from FILMS Order by realisateur ";
    $stmt = $bdd -> prepare($query);
    $stmt -> execute();

    // Création d'un tableau
    $tab_realisateur = array();
    while ($realisateur = $stmt -> fetch(PDO::FETCH_ASSOC)){
        array_push($tab_realisateur, $realisateur["realisateur"]);
    }
    return $tab_realisateur;
}

function recuperationFilmParRealisateur($bdd,$realisateur){
    $realisateur=$realisateur."%";
    $query = "SELECT titre, annee, synopsis, duree, urlFilm, urlImage, note, vote, vue, realisateur, categorie FROM FILMS WHERE realisateur like :t";
    $stmt = $bdd -> prepare($query);
    $stmt -> bindParam(':t', $realisateur);
    $stmt -> execute();

    return creationTableauFilms($stmt);
}

function recherche($bdd, $titre, $realisateur,$categorie,$annee){
    $realisateurLike=$realisateur."%";
    $titreLike=$titre."%";
    $categorieLike=$categorie."%";
    $anneeInt=intval($annee);
    $cpt=0;

    $query = "SELECT titre, annee, synopsis, duree, urlFilm, urlImage, note, vote, vue, realisateur, categorie FROM FILMS WHERE";
    
    if($titre!=""){
        $query=$query." titre like :titre";
        $cpt=1;
    }

    if ($realisateur!=""){
        if ($cpt==0){
            $query=$query." realisateur like :realisateur";  
        }
        else{
            $query=$query." && realisateur like :realisateur";
        }
        $cpt=1;
    }

    if($categorie!=""){
        if ($cpt==0){
            $query=$query." categorie like :categorie";
        }
        else{
            $query=$query." && categorie like :categorie";
        }
        $cpt=1;
    }

    if ($annee!=""){
        if ($cpt==0){
            $query=$query." annee=:anneeInt";
        }
        else{
            $query=$query." && annee=:anneeInt";
        }
    }



    $stmt = $bdd -> prepare($query);

    if($titre!=""){
        $stmt -> bindParam(':titre', $titreLike);
    }
    if($realisateur!=""){
        $stmt -> bindParam(':realisateur', $realisateurLike);
    }
    
    if($categorie!=""){
        $stmt -> bindParam(':categorie', $categorieLike);
    }
    
    if($annee!=""){
        $stmt -> bindParam(':anneeInt', $anneeInt);
    }

    $stmt -> execute();
    return creationTableauFilms($stmt);
}

?>