<?php
    session_start();
    require("../static/bdd/user.php");
    redirection("../index.php");
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Panel - CinéTech</title>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="static/img/popcorn.png"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
  <link rel="stylesheet" href="../static/css/materialize.css"/>
  <link rel="stylesheet" href="../static/css/accueil.css"/>
  <link rel="stylesheet" href="../static/css/panel.css"/>
  <base href="../"/>
</head>
<body class="blue-grey darken-4">


  <?php
    require("../static/includes/barre_navigation.php");
    require("../static/bdd/connexion.php");
    require("../static/bdd/recuperationFilm.php");
    require("../static/form_traitement/function/clean.php"); // Appel la fonction clean_input

    if(isset($_POST["titre"]) && isset($_POST["realisateur"]) && isset($_POST["categorie"]) && isset($_POST["annee"])){
      $tab_films = recherche($bdd, $_POST["titre"], $_POST["realisateur"], $_POST["categorie"], $_POST["annee"]);
    }
    if(empty($_POST["titre"]) && empty($_POST["realisateur"]) && empty($_POST["categorie"]) && empty($_POST["annee"])){
      $tab_films = recuperationToutFilm($bdd);
    }
  ?>

  <!-- Passage du tableau de film au JS -->
  <script type="text/javascript">
    var tab_donnee = (<?php echo json_encode($tab_films); ?>);
  </script>



  <article class="section">
    <h1>Panel admin</h1>
    <form action="" method="POST">
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
    <section class="row">

      <table class="col s12 responsive-table">
        <thead>
          <tr>
            <th>Titre</th>
            <th>Année</th>
            <th>Synopsis</th>
            <th>Genre</th>
            <th>Réalisateur</th>
          </tr>
        </thead>

        <tbody>
          <!--Génération du tableau des films-->
          <?php
              foreach ($tab_films as $film) {
                echo "
                <tr>
                  <td><button class='blue-grey darken-3 btn-titre waves-effect waves-light active-modal'>$film[titre]</button></td>
                  <td><p>$film[annee]</p></td>
                  <td><p class='synopsis'>$film[synopsis]</p></td>
                  <td><p>$film[categorie]</p></td>
                  <td><p>$film[realisateur]</p></td>
                </tr>
                ";
              }
          ?>
        </tbody>
      </table><br/>
    </section>
  </article>


  <!-- Pied de fenetre pour le bouton "ajouter" -->
  <section class="sticker-footer z-depth-2">
    <button id="btnSup" class="btn grey lighten-4 blue-grey-text">Supprimer</button>
    <button id="myBtnAdd" class="btn bonbon waves-effect waves-light active-modal">Ajouter</button>
  </section>




  <!-- Début du Modal ajouter-->

  <div id="myModalAdd" class="modal">
    <div class="modal-content">
      <div class="row">
        <i class="material-icons close">close</i>
      </div>

      <form action="static/bdd/panel_ajout.php" method="POST">
        <div class="row">
          <div class="input-field col s9">
            <label for="form_title">Titre</label>
            <input id="form_title" type="text" class="validate" name="form_title" required/>
          </div>
          <div class="input-field col s3">
            <label for="form_year">Année</label>
            <input id="form_year" type="text" class="validate" name="form_year" required/>
          </div>
        </div>

        <div class="input-field row">
          <label for="form_urlFilm" >URL Film</label>
          <input id="form_urlFilm" type="text" class="validate" name="form_urlFilm" required/>
        </div>

        <div class="input-field row">
          <label for="form_urlImage" >URL Image</label>
          <input id="form_urlImage" type="text" class="validate" name="form_urlImage" required/>
        </div>

        <div class="input-field row">
          <label for="form_syno">Synopsis</label>
          <input id="form_syno" type="text" class="validate" name="form_syno" required/>
        </div>

        <div class="row">
          <div class="input-field col s6">
            <label for="form_genre">Genres</label>
            <input id="form_genre" type="text" class="validate" name="form_genre" required/>
          </div>
          <div class="input-field col s6">
            <label for="form_real">Réalisateur</label>
            <input id="form_real" type="text" class="validate" name="form_real" required/>
          </div>
        </div>

        <div class="row">
          <input type=submit value="Valider" class="btn bonbon">
        </div>
      </form>

    </div>
  </div>

  <!-- Fin du modal ajouter-->

  <!-- Début du Modal modifier-->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <div class="row">
        <i class="material-icons close">close</i>
      </div>

      <form action="static/bdd/panel_modifier.php" method="POST">
        <input type="text" name="form_id_mod" id="form_id_mod" class="idFilm" required/>

        <div class="row">
          <div class="input-field col s9">
            <label for="form_title_mod" id="lab_form_title_mod">Titre</label>
            <input id="form_title_mod" type="text" class="validate" name="form_title_mod" required/>
          </div>
          <div class="input-field col s3">
            <label for="form_year_mod" id="lab_form_year_mod">Année</label>
            <input id="form_year_mod" type="text" class="validAddate" name="form_year_mod" required/>
          </div>
        </div>

        <div class="input-field row">
          <label for="form_urlFilm_mod" id="lab_form_urlFilm_mod">URL Film</label>
          <input id="form_urlFilm_mod" type="text" class="validate" name="form_urlFilm_mod" required/>
        </div>

        <div class="input-field row">
          <label for="form_urlImage_mod" id="lab_form_urlImage_mod">URL Image</label>
          <input id="form_urlImage_mod" type="text" class="validate" name="form_urlImage_mod" required/>
        </div>

        <div class="input-field row">
          <label for="form_syno_mod" id="lab_form_syno_mod">Synopsis</label>
          <input id="form_syno_mod" type="text" class="validate" name="form_syno_mod" required/>
        </div>

        <div class="row">
          <div class="input-field col s6">
            <label for="form_genre_mod" id="lab_form_genre_mod">Genres</label>
            <input id="form_genre_mod" type="text" class="validate" name="form_genre_mod" required>
          </div>
          <div class="input-field col s6">
            <label for="form_real_mod" id="lab_form_real_mod">Réalisateur</label>
            <input id="form_real_mod" type="text" class="validate" name="form_real_mod" required/>
          </div>
        </div>
        <input type=submit value="Valider" class="btn bonbon">
      </form>

    </div>
  </div>

  <!-- Fin du modal modifier-->


  <div id="modalSup" class="modal">
    <div class="modal-content">
      <div class="row">
        <i class="material-icons close">close</i>
      </div>
      <p class="alert red-text text-darken-2">
        Vous êtes sur le point de supprimer un film. Les films supprimés NE PEUVENT PAS être restaurés ! Êtes‐vous ABSOLUMENT sûr ?
      </p>
      <form action="static/bdd/panel_supprimer.php" method="POST">
        <div class="input-field col s9">
          <label for="form_title_supp">Titre</label>
          <input id="form_title_supp" type="text" class="validate" name="form_title_supp" required/>
        </div>
        <input type=submit value="Confirmer" class="btn red darken-2">
      </form>
    </div>
  </div>




  <!-- Chargement des scripts javaScript -->
  <script type="text/javascript" src="static/js/materialize.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="static/js/panel.js"></script>
<?php
  if(isset($_COOKIE["vide"]) && $_COOKIE["vide"]){
    ?>
        <script type="text/javascript">M.toast({html: "Veuillez remplir les champs !", classes: 'bonbon white-text'})</script>
    <?php
}
?>

<?php
  if(isset($_COOKIE["filmExisteDeja"]) && $_COOKIE["filmExisteDeja"]){
    ?>
        <script type="text/javascript">M.toast({html: "Ce film existe déjà !", classes: 'bonbon white-text'})</script>
    <?php
}
?>

<?php
  if(isset($_COOKIE["filmBienEnregistre"]) && $_COOKIE["filmBienEnregistre"]){
    ?>
        <script type="text/javascript">M.toast({html: "Ce film a bien été enregistré !", classes: 'bonbon white-text'})</script>
    <?php
}
?>

<?php
  if(isset($_COOKIE["pasDeFilm"]) && $_COOKIE["pasDeFilm"]){
    ?>
        <script type="text/javascript">M.toast({html: "Ce film n'existe pas !", classes: 'bonbon white-text'})</script>
    <?php
}
?>
  
</body>
</html>
