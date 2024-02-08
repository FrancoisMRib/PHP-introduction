<?php
//ROUTER DE MON SITE

//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);

//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';


/*--------------------------ROUTER -----------------------------*/
//test de la valeur $path dans l'URL et import de la ressource
switch($path){
    case "/Demo/mvc_class/" :
    case "/Demo/mvc_class/accueil" :
        include './controller/controllerAccueil.php';
        break;
    case "/Demo/mvc_class/compte" :
        include './controller/controllerCompte.php';
        break;
    case "/Demo/mvc_class/deco" :
        include './controller/deco.php';
        break;
    default :
        include './controller/page404.php';
}

?>