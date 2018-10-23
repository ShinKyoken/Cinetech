<?php

/**
 * Génere un affichage de liste d'étoile en fonction de la note
 * moyenne attribué à un film.
 */
function generateurEtoile($nb_etoile){
    echo "<ul class='liste-vote'>";
    $i = 0;
    // Boucle pour etoile pleine
    while ($i < $nb_etoile){
        echo "<li class='etoile etoile-vote'><i class='material-icons'>star</i></li>";
        $i++;
    }

    // Boucle pour étoile vide
    while ($i < 5){
        echo "<li class='etoile blue-grey-text text-darken-3'><i class='material-icons'>star</i></li>";
        $i++;
    }
    echo "</ul>";
}

?>