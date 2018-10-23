<?php
/**
 * Fonction permettant de générer l'affichage d'un caroussel.
 */
function generateurCaroussel($urlImg, $titre){
    $url = http_build_query(array("film" => $titre));
    echo 
    "<a class='carousel-item' href=\"film.php?$url\">
        <img src=$urlImg alt=''>
        <h1 class='carousel-titre'>$titre</h1>
    </a>";
}
?>