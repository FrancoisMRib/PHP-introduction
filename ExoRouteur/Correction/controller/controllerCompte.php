<?php
    session_start();
    $login = "";
    $prenom = "";
    $nom = "";

    //-> Si on est connecté, permet l'affichage des informations du comptes (stoké en $_SESSION)
    if(isset($_SESSION['connected'])){
        $login = $_SESSION['login'];
        $prenom = $_SESSION['firstname'];
        $nom = $_SESSION['name'];
    }
    
    include './controller/controllerNav.php';

    include './vue/header.php';
    include './vue/nav.php'; //-> affiche la navbar
    include './vue/vueCompte.php';
?>