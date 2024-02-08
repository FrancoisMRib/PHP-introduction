<?php
session_start();
//CONTROLLER DE LA PAGE ACCUEIL : faire l'intermédiaire entre le MODEL et la VUE. Prendre les Décision if... else. Dire à la Vue comment afficher les infos.


//J'importe les ressources dont j'ai besoin
include './model/modelUser.php';
include './interface/BddService.php';
include './utils/bddMySQL.php';
include './utils/functions.php';


$formCo = "<h1>Accueil</h1>"; //-> Affiche Accueil à la place du Formulaire de Connexion si on est Connecté
$message = "";



//-> Affiche le Formulaire de Connexion si on n'est pas Connecté
if(!isset($_SESSION['connected'])){
    $formCo = '<form action="" method="post">
    <h2>Connexion</h2>
    <input type="text" name="login" placeholder="Votre Login">
    <input type="password" name="password" placeholder="Votre Mot de Passe">
    <input type="submit" name="submit" value="Se Connecter">
    </form>';

}

//ETAPE 4 Du Diagramme de Sequence : Vérification des infos envoyées par le formulaire
if(isset($_POST['submit'])){
    //Vérification du remplissage des champs
    if(isset($_POST['login']) and !empty($_POST['login'])
        and isset($_POST['password']) and !empty($_POST['password'])){
    
            //Nettoyer les datas grâce à la méthode static sanitize qui appartient à la classe Functions
            $login = Functions::sanitize($_POST['login']);
            $password = Functions::sanitize($_POST['password']);

            //Validation de format de data
            //-> je n'attends que des string non formatées, donc pas de vérification

            //J'appel le Model pour récupérer mon utilisateur :
            //1) Comme je suis en Orienté Objet, je dois instancier ma class ModelUser
            $user = new ModelUser($login);

            //Attribut à user la connection à la BDD
            $user->setBdd(new BddMySQL('localhost','task3','root','root'));
            
            //2) Puis j'utilise l'objet instancié pour utiliser la méthode loginUser()
            $data = $user->loginUser();

        //Test la réponse renvoyer par le Model
        if(gettype($data) == "object"){
            $message = $data->getMessage();
        }else{

            //ETAPE 8 Du Diagramme de Sequence : vérifier l'existence de l'utilidateur, et vérifier le mot de passe
            if(!empty($data) and password_verify($password,$data[0]['mdp_user'])){
            
                //ETAPE 9 Du Diagramme de Sequence : enregistrer les datas en $_SESSION
                $_SESSION['id']=$data[0]['id_user'];
                $_SESSION['name']=$data[0]['name_user'];
                $_SESSION['firstname']=$data[0]['first_name_user'];
                $_SESSION['login']=$data[0]['login_user'];
                $_SESSION['connected']=true;

                //ETAPE 10 Du Diagramme de Sequence : message de confirmation
                $message = 'Vous êtes bien connecté.';

                //Redirection vers index.php pour rafraîchir la page
                header('refresh:0');

            }else{
                $message = "Utilisateur ou Mot de Passe incorrecte.";
            }
        }

    }else{
        $message = "Veuillez remplir tous les champs.";
    }
}

include './controller/controllerNav.php';

include './vue/header.php'; //-> affiche la header
include './vue/nav.php'; //-> affiche la navbar
include './vue/vueAccueil.php'
?>
