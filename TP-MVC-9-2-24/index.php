<?php
//ROUTER
session_start();

include "./controller/controllerAccueil.php";
include "./controller/controllerCompte.php";
include "./controller/controllerNav.php";

include "./interface/BddService.php";

include "./models/ManagerUser.php";
include "./models/ModelUser.php";

include "./utils/BddMySql.php";
include "./utils/functions.php";

//Analyse de l'URL avec parse_url et retour des composants
$url = parse_url($_SERVER['REQUEST_URI']);

//Puis on créé path afin de pouvoir switcher 
//de page ou alors de renvoyer à la racine
$path = isset($url['$path']) ? $url['path'] : '/' ;

/*-------------------ROUTER---------------------*/
//test de la valeur $path dans l'URL et imports des ressources
switch($path){
    case "/TP-MVC-9-2-24/":
    case "/TP-MVC-9-2-24/accueil":
        $accueil = new controllerAccueil;
        $accueil->render() ;
        include "/TP-MVC-9-2-24/controllerAccueil.php" ;
        break ;
    case "/TP-MVC-9-2-24/compte" :
        include "/TP-MVC-9-2-24/controllerCompte.php" ;
        break ;
    case "/TP-MVC-9-2-24/page404" :
        include "/TP-MVC-9-2-24/page404.php" ;
        break ;
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenue sur la page !!</h1>
</body>
</html>