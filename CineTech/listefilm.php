<?php 
    session_start();
    require("static/bdd/user.php");
    redirection("index.php");
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Films - CinéTech</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="static/img/popcorn.png"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link rel="stylesheet" href="./static/css/materialize.css"/>
    <link rel="stylesheet" href="./static/css/accueil.css"/>
    <link rel="stylesheet" href="./static/css/affiche_film.css"/>
    <link rel="stylesheet" href="./static/css/listefilm.css"/>
    <link rel="stylesheet" href="./static/css/footer.css"/>
</head>
<body class="blue-grey darken-4">


    <?php
        require("static/includes/barre_navigation.php");
        require("static/bdd/connexion.php");
        require("static/bdd/recuperationFilm.php");
        require("static/includes/generateurFilm.php");
        $tab_affiche = recuperationToutFilm($bdd);
    ?>

    <div class="nav-wrapper chemin">
      <div class="col s12">
        <a href="accueil.php" class="breadcrumb">Accueil</a>
        <a href="categorie.php" class="breadcrumb">Films</a>
      </div>
    </div>


    <article class="section">
        <h1>Films</h1>
        <form action="formulaire.php" method="GET">
            <ul class="row">
                <li class="col s3">
                    <label for="form_titre">Titre du film</label>
                    <input type="text" id="form_titre" name="titre" >
                </li>
                <li class="col s3">
                    <label for="form_realisateur">Réalisateur</label>
                    <input type="text" id="form_realisateur" name="realisateur">
                </li>
                <li class="col s3">
                    <label for="form_annee">Année</label>
                    <input type="text" id="form_annee" name="annee" >
                </li>
                <li class="col s3">
                    <label for="form_categorie">Catégorie</label>
                    <input type="text" id="form_categorie" name="categorie" >
                </li>
                <li class="col s1">
                    <input type="submit" value="Recherche" class="waves-effect waves-light btn blue-grey darken-3" id="recherche" onclick="parcoursFilms()">
                </li>
            </ul>
        </form>
        <ul class="list-films" id="listeFilms">
            <?php
                $cpt=0;
                foreach($tab_affiche as $affiche){
                    $urlImage=$affiche["urlImage"];
                    $titre=$affiche["titre"];
                    $annee=$affiche["annee"];
                    $realisateur=$affiche["realisateur"];
                    $categorie=$affiche["categorie"];
                    generateur($urlImage, $titre, $annee, $realisateur, $categorie);
                }
            ?>
        </ul>
    </article>




    <!-- Chargement des scripts javaScript -->
    <script type="text/javascript" src="static/js/materialize.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <!-- Pied de page -->
    <?php require("static/includes/footer.php"); ?>
</body>
</html>
