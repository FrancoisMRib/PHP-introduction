<?php

    session_start();

    include './model/modelUser.php';
    include './utils/functions.php';

    $login = "";
    $first_name_user = "";
    $name_user = "";
    $id = "";

    //-> Si on est connecté, permet l'affichage des informations du comptes (stoké en $_SESSION)
    if(isset($_SESSION['connected'])){
        $login = $_SESSION['login'];
        $first_name_user = $_SESSION['firstname'];
        $name_user = $_SESSION['name'];
    }

    //Duplicata des deux autres fonctions à faire ?
    //MODIFICATION DU PROFIL
    //Vérifier que le formulaire est soumis
    /*if(isset($_POST['connected'])){
        $login = $_SESSION['login'];
        $prenom = $_SESSION['firstname'];
        $nom = $_SESSION['name'];
    }*/

    //MODIFICATION DU PROFIL
    //Vérification que le formulaire est soumis
    if(isset($_POST['submit'])){
        //Vérifie que les champs sont vides
        if(isset($_POST['name']) and !empty($_POST['name']) and isset($_POST['firstname']) and !empty($_POST['firstname'])) {

            //Nettoie les données
            $name_user = sanitize($_POST['name']);
            $first_name_user = sanitize($_POST['firstname']);

            //J'appelle la fonction du modle qui permet l'UPDATE
            //ANCIENNE VERSION : $response = updateUser($nom, $prenom, $_SESSION['id']);
            //Assignation des données aux Attributs
            $modelUser = new ModelUser();
            //Le changement est réalisé
            $modelUser->setName($name_user)->setFirstName($first_name_user)->setId($_SESSION['id']);
            $response = $modelUser->updateUser();

            //Je vérifie la réponse
            if($response[1]){


                //Mettre à jour ma session
                $_SESSION['firstname'] = $first_name_user ;
                $_SESSION['name'] = $name_user ;
            }
            //J'affiche le message de confirmation
            $message = $response[0];
        } else {
            $message = "Veuillez remplir tous les champs" ;
        }
    }
    
    include './controlerNav.php';

    include './vue/header.php';
    include './vue/nav.php'; //-> affiche la navbar
    include './vue/vueCompte.php';
?>