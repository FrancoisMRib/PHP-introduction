<?php
/*function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}*/

class functions {
    //Méthode utilitaire qui sera en statique
    //-> ça permet d'appeler la méthode sans avoir besoin d'instancier 
    public static function sanitize(?string $data): ?string {
        //Il faut préciser le typage, tout en supposant un null caractérisé par le ?
        return htmlentities(strip_tags(stripslashes(trim($data))));
    }
}

?>