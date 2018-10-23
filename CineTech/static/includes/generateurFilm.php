<?php
/**
 * Fonction permettant de générer l'affichage d'un film.
 */
function generateur($urlImg, $titre, $annee, $realisateur, $type){
    $url = http_build_query(array("film" => $titre));
    echo "<li><a href=\"film.php?$url\" class='affiche-film'>";
    echo "<img src=$urlImg alt=\"" . "Affiche du film " . $titre . "\"/>";
    echo "<hgroup>";
    echo "<h5>$titre</h5>";
    echo "<h6>$annee</h6>";
    echo "<h7>$realisateur</h7>";
    echo "<h7>$type</h7>";
    echo "</hgroup>";
    echo "</a></li>";
}

?>