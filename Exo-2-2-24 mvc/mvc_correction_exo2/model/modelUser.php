<?php
//MODEL : Gérer les Datas et l'Accès à la BDD

function loginUser($login_user){
    //ETAPE 5 Du Diagramme de Sequence : demander à la BDD si l'utilisateur existe
    try{
        //Connexion à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=task','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Préparation de la requête
        $req = $bdd->prepare('SELECT users.id_user, users.name_user, users.first_name_user, users.login_user, users.mdp_user FROM users WHERE login_user = ?');

        //Binding de Paramètre
        $req->bindParam(1,$login_user,PDO::PARAM_STR);

        //ETAPE 6 Du Diagramme de Sequence : exécution de la requête
        $req->execute();

        //ETAPE 7 Du Diagramme de Sequence : récupérer la réponse de la BDD
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        return $data;

        
    }catch(Exception $error){
        return $error;
    }
}

function signInUser($name_user, $first_name_user, $login_user, $mdp_user){
    try{
        //Connexion à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=task','root','',array(
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ));

        //Prépare ma requête d'insertion
        $req=$bdd->prepare('INSERT INTO users (name_user, first_name_user, login_user, mdp_user) VALUES (?,?,?,?)');

        //Bindinng de Param
        $req->bindParam(1,$name_user, PDO::PARAM_STR);
        $req->bindParam(2,$first_name_user, PDO::PARAM_STR);
        $req->bindParam(3,$login_user, PDO::PARAM_STR);
        $req->bindParam(4,$mdp_user, PDO::PARAM_STR);

        //Executer la requête
        $req->execute();

        return "Inscription effectuée avec succès !";

    }catch(Exception $error){
        return $error->getMessage();
    }

}

function updateUser($name_user, $first_name_user, $id){
    try{
        //Connexion à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=task','root','', array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));

        //Préparer la requête
        $req = $bdd->prepare('UPDATE users SET name_user = ? WHERE id_user = ?') ;

        //Binding de Param
        $req->bindParam(1, $name_user, PDO::PARAM_STR);
        $req->bindParam(2, $first_name_user, PDO::PARAM_STR);
        $req->bindParam(3, $id, PDO::PARAM_INT);

        //Execution de la requete
        $req->execute();

        //Renvoyer un message de confirmation
        return ['Le profil a bien été modifié !', true];

    } catch(Exception $error) {
        return [$error->getMessage(), false];
    }
}

?>