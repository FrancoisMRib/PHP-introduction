<?php
    session_start();
    //import des ressources
    include './utils/functions.php';
    include './model/modelUser.php';


    $login = "";
    $prenom = "";
    $nom = "";
    $message = "";

    //-> Si on est connecté, permet l'affichage des informations du comptes (stoké en $_SESSION)
    if(isset($_SESSION['connected'])){
        $login = $_SESSION['login'];
        $prenom = $_SESSION['firstname'];
        $nom = $_SESSION['name'];
    }

    //MODIFICATION DU PROFIL
    //ETAPE 6 Du Diagramme de Sequence : Vérifie que le formulaire est soumis
    if(isset($_POST['submit'])){
        //ETAPE 7 Du Diagramme de Sequence : Vérifie les champs vide
        if(isset($_POST['name']) and !empty($_POST['name']) and isset($_POST['firstname']) and !empty($_POST['firstname'])){

            //ETAPE 7 Du Diagramme de Sequence : nettoie les données
            $name = sanitize($_POST['name']);
            $firstname = sanitize($_POST['firstname']);

            //ETAPE 8 Du Diagramme de Sequence : J'appelle la fonction du model qui permet l'UPDATE et ETAPE 13 Du Diagramme de Sequence : Reception de la réponse
            $response = updateUser($name, $firstname, $_SESSION['id']);

            //ETAPE 14 Du Diagramme de Sequence : Je vérifie la réponse
            if($response[1]){
                //ETAPE 15 Du Diagramme de Sequence : Mettre à jour ma Session
                $_SESSION['firstname'] = $firstname;
                $_SESSION['name'] = $name;

                //ETAPE 15 Du Diagramme de Sequence : Mettre à jour la vue
                $prenom = $firstname;
                $nom = $name;
            }

            //ETAPE 16 Du Diagramme de Sequence : J'affiche le message de confirmation
            $message = $response[0];
        }else{
            $message = "Veuillez remplir tous les champs.";
        }
    }
    
    include './controlerNav.php';

    include './vue/header.php';
    include './vue/nav.php'; //-> affiche la navbar
    include './vue/vueCompte.php';
?>