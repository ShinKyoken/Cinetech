

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion - CinéTech</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="static/img/popcorn.png"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link rel="stylesheet" href="./static/css/materialize.css"/>
    <link rel="stylesheet" href="./static/css/login.css"/>
</head>
<body class="blue-grey darken-4">

    <form action="static/form_traitement/login.php" method="POST" class="form-connexion card-panel z-depth-2">
        <img alt="Icon" src="static/img/popcorn.png" class="logo responsive-img"/>
        <h5>Connexion</h5>
        <div class="input-field col s6">
            <input id="form_login" name="form_login" type="text" class="validate">
            <label for="form_login">Identifiant</label>
        </div>
        <div class="input-field col s6">
            <input id="form_pass" name="form_pass" type="password" class="validate" minlength="8">
            <label for="form_pass">Mot de passe</label>
        </div>
        <p><a href="index.php" class="new-compte">Créer un compte</a></p>
        <input class="btn btn-large waves-effect waves-light bonbon submit" type="submit" value="Connexion"/>
    </form>


    <!-- Chargement des scripts javaScript -->
    <script type="text/javascript" src="static/js/materialize.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>


    <?php
        if(isset($_COOKIE["redirige"]) && $_COOKIE["redirige"]){
            ?>
                <script type="text/javascript">M.toast({html: 'Vous devez être connecté !', classes: 'bonbon white-text'})</script>
            <?php
        }
        setcookie("redirige", FALSE);
    ?>



</body>
</html>