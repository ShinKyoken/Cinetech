<?php 
    session_start();
    require("static/bdd/user.php");
    redirection("index.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Recherche - CinéTech</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="static/img/popcorn.png"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link rel="stylesheet" href="./static/css/materialize.css"/>
    <link rel="stylesheet" href="./static/css/accueil.css"/>
    <link rel="stylesheet" href="./static/css/listefilm.css"/>
    <link rel="stylesheet" href="./static/css/affiche_film.css"/>
    <link rel="stylesheet" href="./static/css/footer.css"/>
</head>
<body class="blue-grey darken-4">


    <?php
        require("static/includes/barre_navigation.php");
        require("static/bdd/connexion.php");
        require("static/bdd/recuperationFilm.php");
        require("static/includes/generateurFilm.php");
        require("static/form_traitement/function/clean.php");

        #$genre_film = clean_input(urldecode($_GET["genre"]));
        #$tab_affiche = recuperationFilmParGenre($bdd, $genre_film);
        $film=NUll;
        $tab_affiche=array();
        $passe=0;
        if(isset($_GET["genre"])){
            $genre_film = clean_input(urldecode($_GET["genre"]));
            foreach(recuperationFilmParGenre($bdd, $genre_film) as $film){
                array_push($tab_affiche, $film);
            }
        }
        else if(!empty($_GET["recherche"])){
            $recherche=clean_input($_GET["recherche"]);
            $tableauParGenre=recuperationFilmParGenre($bdd,$recherche);
            $tableauParTitre=recupererUnFilm($bdd,$recherche);
            $tableauParRealisateur=recuperationFilmParRealisateur($bdd,$recherche);
            if($tableauParGenre!=NULL){
                $passeGenre=1;
                foreach(recuperationFilmParGenre($bdd,$recherche) as $film){
                    array_push($tab_affiche, $film);
                }
                $passe=1;
            }
            if(!empty($tableauParTitre)){
                $passeTitre=1;
                foreach(recupererUnFilm($bdd,$recherche) as $film){
                    array_push($tab_affiche, $film);
                }
                $passe=1;
            }
            if(!empty($tableauParRealisateur)){
                $passeRealisateur=1;
                foreach(recuperationFilmParRealisateur($bdd,$recherche) as $film){
                    array_push($tab_affiche, $film);
                }
                $passe=1;
            }

            else if ($passe==0){
                $tab_affiche = array();
            }


        }
    ?>

    <article class="section">
        <h1>Recherche</h1>
        <?php echo "<h6>Mot clé : $recherche</h6>"; ?>
        <section class="list-films">
            <?php
                foreach($tab_affiche as $affiche){
                    $urlImage=$affiche["urlImage"];
                    $titre=$affiche["titre"];
                    $annee=$affiche["annee"];
                    $realisateur=$affiche["realisateur"];
                    $categorie=$affiche["categorie"];
                    generateur($urlImage, $titre, $annee, $realisateur, $categorie);
                }
            ?>
        </section>
        <?php 
            if(empty($tab_affiche)){
                echo"<p>Désolé nous ne pouvous pas accéder à votre requete. Veuillez vérifier l'orthographe du mot clé.</p>";
            }
        ?>
    </article>
    

    <!-- Chargement des scripts javaScript -->
    <script type="text/javascript" src="static/js/materialize.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <!-- Pied de page -->
    <?php require("static/includes/footer.php"); ?>
</body>
</html>