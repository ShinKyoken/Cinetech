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
    <link rel="stylesheet" href="./static/css/affiche_film.css"/>
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
        <a href="nouveaute.php" class="breadcrumb">A l'affiche</a>
      </div>
    </div>

    <article class="section">
        <h1>A l'affiche</h1>
        <section class="list-films">
            <?php
                $cpt=0;
                foreach($tab_affiche as $affiche){
                    if($cpt<14){
                        $urlImage=$affiche["urlImage"];
                        $titre=$affiche["titre"];
                        $annee=$affiche["annee"];
                        $realisateur=$affiche["realisateur"];
                        $categorie=$affiche["categorie"];
                        generateur($urlImage, $titre, $annee, $realisateur, $categorie);
                        $cpt=$cpt+1;
                    }
                }
            ?>
        </section>
    </article>


    <!-- Chargement des scripts javaScript -->
    <script type="text/javascript" src="static/js/materialize.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <!-- Pied de page -->
    <?php require("static/includes/footer.php"); ?>
</body>
</html>
