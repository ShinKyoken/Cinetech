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

    <form action="static/form_traitement/register.php" method="POST" class="form-inscription card-panel z-depth-2">
        <img alt="Icon" src="static/img/popcorn.png" class="logo responsive-img"/>
        <h5>Inscription</h5>
        <article class="row">
            <section class="col s6">
            <div class="input-field col s12">
                <input id="form_lastname" type="text" class="validate" name="form_lastname" required pattern="^[A-Z][a-zàçéèêëîïôöûüù\s-]+$" maxlength="50"/>
                <label for="form_lastname" class="">Nom</label>
            </div>
            <div class="input-field col s12">
                <input id="form_name" type="text" class="validate" name="form_name" required pattern="^[A-Z][a-zàçéèêëîïôöûüù\s-]+$" maxlength="50"/>
                <label for="form_name" class="">Prénom</label>
            </div>
            <div class="input-field col s12">
                <input id="form_email" type="email" class="validate" name="form_email" required pattern="^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$" maxlength="100"/>
                <label for="form_email" class="">Email</label>
            </div>
            </section>
            <section class="col s6">
                <div class="input-field col s12">
                    <input id="form_login" type="text" class="validate" name="form_login" required pattern="^[0-9A-Za-zàçéèêëîïôöûüù._-]+$" maxlength="50"/>
                    <label for="form_login" class="">Identifiant</label>
                </div>
                <div class="input-field col s12">
                    <input id="form_pass" type="password" class="validate" name="form_pass" required maxlength="50" minlength="8"/>
                    <label for="form_pass" class="">Mot de passe</label>
                </div>
                <div class="input-field col s12">
                    <input id="form_pass_conf" type="password" class="validate" name="form_passconf" required maxlength="50" minlength="8"/>
                    <label for="form_passconf" class="">Confirmer</label>
                </div>
                </section>
            </article>
        <input class="btn btn-large waves-effect waves-light bonbon submit" type="submit" value="Enregistrer"/>
    </form>


    <!-- Chargement des scripts javaScript -->
    <script type="text/javascript" src="static/js/materialize.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
</body>
</html>