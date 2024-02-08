<?php
//Ma CLasse utilitaire Function

class Functions{
    //Methode utilitaire qui seront en static
    //-> ça permert d'appeler les méthode sans avoir besoin d'instancier un objet Functions
    public static function sanitize(?string $data):?string{
        return htmlentities(strip_tags(stripslashes(trim($data))));
    }
}