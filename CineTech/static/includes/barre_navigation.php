<nav class="bonbon nav">
    <div class="nav-wrapper navbar-fixed">
        <a href="accueil.php" class="brand-logo">
            <img src="static/img/popcorn.svg" alt="" class="nav-logo responsive-img"/>
        CinéTech</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="accueil.php">Accueil</a></li>
            <li><a href="nouveaute.php">A l'affiche</a></li>
            <li><a href="listefilm.php">Films</a></li>
            <li><form action="recherche.php" method="GET" title="Recherche"><div class="input-field" id="content-search"><input placeholder="Recherche" id="search" type="search" name="recherche" required><label class="label-icon" for="search"><i class="material-icons" id="icon-search">search</i></label></div></form></li>            
            
            
            <?php
            if($_SESSION["status"] == 1){
                echo "<li><a href='admin/panel.php' title='Pannel Admin'><i class='material-icons'>settings</i></a></li>";
            }
            ?>


            <li><a href='static/bdd/deconnexion.php' title="Déconnexion"><i class="material-icons">forward</i></a></li>
        </ul>
    </div>
    <script type="text/javascript" src="static/js/barre_recherche.js"></script>
</nav>