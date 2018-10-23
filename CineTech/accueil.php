<?php 
    session_start();
    require("static/bdd/user.php");
    redirection("index.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Home - CinéTech</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="static/img/popcorn.png"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link rel="stylesheet" href="./static/css/materialize.css"/>
    <link rel="stylesheet" href="./static/css/accueil.css"/>
    <link rel="stylesheet" href="./static/css/footer.css"/>
    <link rel="stylesheet" href="./static/css/carousel.css"/>
    <link rel="stylesheet" href="./static/css/affiche_film.css"/>

</head>
<body class="blue-grey darken-4">


    <?php require("static/includes/barre_navigation.php");
          require("static/bdd/connexion.php");
          require("static/bdd/recuperationFilm.php");
          require("static/includes/generateurCaroussel.php");

          $tab_affiche = recuperationFilmParVue($bdd);
    ?> 
      
    <article class="section">
        <h1>Accueil</h1>

        <div id="slider">
        <figure>
            <?php
            $cpt=0;
                foreach($tab_affiche as $affiche){
                    generateurCaroussel($affiche["urlImage"],$affiche["titre"]);
                }
            ?>
        </figure>
    </div>





        <p class="description">
            Sed (saepe enim redeo ad Scipionem, cuius omnis sermo erat de amicitia) querebatur, quod omnibus in rebus homines diligentiores 
            essent; capras et oves quot quisque haberet, dicere posse, amicos quot haberet, non posse dicere et in illis quidem parandis 
            adhibere curam, in amicis eligendis neglegentis esse nec habere quasi signa quaedam et notas, quibus eos qui ad amicitias essent 
            idonei, iudicarent. Sunt igitur firmi et stabiles et constantes eligendi; cuius generis est magna penuria. Et iudicare difficile 
            est sane nisi expertum; experiendum autem est in ipsa amicitia. Ita praecurrit amicitia iudicium tollitque experiendi potestatem. 
            Quod cum ita sit, paucae domus studiorum seriis cultibus antea celebratae nunc ludibriis ignaviae torpentis exundant, vocali sonu, 
            perflabili tinnitu fidium resultantes. denique pro philosopho cantor et in locum oratoris doctor artium ludicrarum accitur et 
            bybliothecis sepulcrorum ritu in perpetuum clausis organa fabricantur hydraulica, et lyrae ad speciem carpentorum ingentes 
            tibiaeque et histrionici gestus instrumenta non levia. Quare talis improborum consensio non modo excusatione amicitiae tegenda non 
            est sed potius supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, 
            ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est, qualis res publica post mortem meam futura, 
            quam qualis hodie sit.
        </p>
    </article>
    

    <!-- Chargement des scripts javaScript -->
    <script type="text/javascript" src="static/js/materialize.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="static/js/caroussel.js"></script>

    <!-- Pied de page -->
    <?php require("static/includes/footer.php"); ?>

</body>
</html>