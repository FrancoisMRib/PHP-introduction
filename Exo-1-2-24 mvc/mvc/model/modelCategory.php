<?php

function addCategory($name_cat){
    try{
        //Connexion à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=task','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Préparation de la requête
        $req = $bdd->prepare('INSERT INTO category(name_cat) VALUES (?)');

        //Binding de Paramètre
        $req->bindParam(1,$name_cat, PDO::PARAM_STR);

        //ETAPE 6 Du Diagramme de Sequence : exécution de la requête
        $req->execute();
        $message = 'Votre catégorie a été ajoutée !';
        return $message ;

        //ETAPE 7 Du Diagramme de Sequence : récupérer la réponse de la BDD
        //$data = $req->fetchAll(PDO::FETCH_ASSOC);
        //Pas utile car on ne récupère pas de données

        //return $data;
        //Idem

        
    } catch(Exception $error){
        return $error->getMessage();
    }
}

//Variante de la 2e si on souhaite vérifier que la catégorie qu'on entre existe déjà
function verifyCategory() {
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Préparation de la requête
        //C'EST CETTE LIGNE QUI EST SURTOUT IMPORTANTE
        $req = $bdd->prepare('SELECT category.name_cat FROM category WHERE name_cat = ? LIMIT 1');
        //er que la catégorie qu'on entre existe déjà

        //Binding du paramètre
        //Pas besoin, puisque je récupère le contenu d'un tableau

        //Exécution de la requête
        $req->execute();
        
        //Fetch pour récupérer les infos de la data
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        return $data ;

    } catch(Exception $error) {
        return $error->getMessage() ;
    }
    
}

function displayCategory() {
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Préparation de la requête
        $req = $bdd->prepare('SELECT category.name_cat FROM category');
        //Psa besoin de WHERE à moins qu'on veuille vérifier que la catégorie qu'on entre existe déjà

        //Binding du paramètre
        //Pas besoin, puisque je récupère le contenu d'un tableau

        //Exécution de la requête
        $req->execute();
        
        //Fetch pour récupérer les infos de la data
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        return $data ;

    } catch(Exception $error) {
        return $error->getMessage() ;
    }
    
}




