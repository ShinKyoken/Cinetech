<?php 
    session_start();
    require("static/bdd/user.php");
    redirection("index.php");
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <title>A l'affiche - CinéTech</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="static/img/popcorn.png"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link rel="stylesheet" href="./static/css/materialize.css"/>
    <link rel="stylesheet" href="./static/css/accueil.css"/>
    <link rel="stylesheet" href="./static/css/film.css"/>
    <link rel="stylesheet" href="./static/css/footer.css"/>
</head>
<body class="blue-grey darken-4">


    <?php
        /*
        Import des fichiers contenant des fonctionnalités importantes
        */
        require("static/includes/barre_navigation.php");
        require("static/bdd/connexion.php");
        require("static/bdd/recuperationFilm.php");
        require("static/form_traitement/function/clean.php");
        require("static/includes/liste_etoile.php");

        $titre_film = clean_input(urldecode($_GET["film"]));
        $info_film = recupererUnFilm($bdd, $titre_film)[0];
    ?>

    <div class="nav-wrapper chemin">
      <div class="col s12">
        <a href="accueil.php" class="breadcrumb">Accueil</a>
        <a href="nouveaute.php" class="breadcrumb">A l'affiche</a>
        <?php echo "<a href='film.php?film=$titre_film' class='breadcrumb'>$titre_film</a>"; ?>
      </div>
    </div>

    <article class="section">
        <header class="entete row">
            <section class="col s2">
                <!-- Affichage de l'image du film -->
                <img src="<?php echo $info_film["urlImage"]; ?>" alt="Affiche du film : <?php echo $info_film["titre"]; ?>" class="affiche"/>
                <!-- Affichage des étoiles -->
                <?php generateurEtoile($info_film["note"]); ?>
                <!-- Affichage du nombre de vues. Il est affiché "vue" et non "vues" si il n'y a pas plus de 1 vue -->
                <span><?php echo $info_film["vue"]; echo $info_film["vue"] <= 1 ? " vue" : " vues" ?></span>
            </section>
            <article class="descriptif col s10">
                <!-- Affichage du titre -->
                <h2 class="titre-film"><?php echo $info_film["titre"]; ?></h2>
                <!-- affichage de l'année -->
                <p><?php echo "Date de sortie : $info_film[annee]"; ?></p>
                <p class="description">
                    <!-- affichage du synopsis -->
                    <?php echo $info_film["synopsis"]; ?>
                </p>
            </article>
        </header>
        <section class="row  video-container">
            <section class="col s2">
                <p class="blue-grey darken-3 badge-info">
                    <span class="badge-label blue-grey-text text-darken-4">Réalisateur :</span></br>
                    <?php echo $info_film["realisateur"]; ?>
                </p>
                <p class="blue-grey darken-3 badge-info">
                    <span class="badge-label blue-grey-text text-darken-4">Catégorie :</span></br>
                    <?php echo $info_film["categorie"]; ?>
                </p>
            </section>
            <video class="col s10 responsive-video" controls>
                <!-- récupération de l'url du film pour la vidéo -->
                <source src="<?php echo $info_film["urlFilm"]; ?>">
            </video>
        </section>

    </article>


    <!-- Chargement des scripts javaScript -->
    <script type="text/javascript" src="static/js/materialize.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <!-- Pied de page -->
    <?php require("static/includes/footer.php"); ?>
</body>
</html>
