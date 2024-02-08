<?php
//ROUTER

//Analyse de l'URL avec parse_url() et renvoie ses composants
$url = parse_url($_SERVER['REQUEST_URI']);

//On créé $path afin de tester la possibilité de l'url avec isset (pour rappel, vérifie si la variable existe ou qu'elle est null)
//sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

/*--------------------------ROUTER -----------------------------*/
//test de la valeur $path dans l'URL et import de la ressource
switch($path){
    case "/ExoRouteur/Routeur/":
    case "/ExoRouteur/Routeur/accueil":
        include './controller/controllerAccueil.php';
        break ;
    case "/ExoRouteur/Routeur/compte":
        include './controller/controllerCompte.php';
        break ;
    case "/ExoRouteur/Routeur/deco":
        include './controller/deco.php';
        break ;
    case "/ExoRouteur/Routeur/page404":
        include './controller/page404.php';
        break ;
    case "/ExoRouteur/Routeur/category":
        include './controller/category.php';
        break ;
}
?>
