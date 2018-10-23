<?php

    /**
     * Fonction de teste des inputs retranscrie toute la 
     * chaine en texte non executable ou non interprétable
     */
    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>