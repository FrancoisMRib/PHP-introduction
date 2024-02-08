<?php
$name = $_POST['nom_article'];
$content = $_POST['contenu_article'];
//AJOUT CORRECTIF $message = "";
if(isset($_POST['submit'])){
    if(isset($_POST['nom_article']) and !empty($_POST['nom_article']) and isset($_POST['contenu_article']) and !empty($_POST['contenu_article'])){
        //2e mesure
        $sanitize = htmlentities(strip_tags(stripslashes(trim($name))));
        $sanitize2 = htmlentities(strip_tags(stripslashes(trim($content))));

        $bdd = new PDO('mysql:host=localhost;dbname=test30','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        //L'espace vide correspond à un mot de passe. Comme j'en ai pas, je mets rien.
        try{
            //Requête Préparée
            $req=$bdd->prepare("INSERT INTO articles (nom_article, contenu_article) VALUES(?,?)");
        
            //Binding de Paramètre
            $req->bindParam(1,$name,PDO::PARAM_STR);
            $req->bindParam(2,$content,PDO::PARAM_STR);
        
            //Exécution de la requête
            $req->execute();
        
            echo "$name est enregistré avec succès";
        
        }catch(Exception $error){
            die('Erreur :'.$error->getMessage());
        }
    } /* AJOUT CORRECTIF else {
        $message = "Veuillez remplir chaque champ du formulaire";
    }*/
};



/*INSPIRATION
1er Mesure : Vérifier que les champs reçus et obligatoires ne sont pas vide
    if(isset($_POST['list']) and !empty($_POST['list'])){

        /* 2nd Mesure de sécurité : nettoyer les données, enlever le code malveillant
        foreach($_POST['list'] as $pokemon){
            $sanitize = htmlentities(strip_tags(stripslashes(trim($pokemon))));
            $list = $list."<li>".$sanitize."</li>";
        }
    }

$message ="";
//TRAITEMENT DU FORMULAIRE
if(isset($_POST['submit'])){
    //Je veux enregistrer le remier pokemon coché
    $pokemon = $_POST['message'][0];

    //ETAPE 1 : CONNECTION A LA BDD
    $bdd = new PDO('mysql:host=localhost;dbname=pokemon','root','root',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    //ETAPE 2 : Envoie de la requête à la BDD
    try{
        //Requête Préparé
        $req=$bdd->prepare("INSERT INTO pokemon (nom) VALUES(?)");

        //Binding de Paramètre
        $req->bindParam(1,$pokemon,PDO::PARAM_STR);

        //Exécution de la requête
        $req->execute();

        echo "$pokemon est enregistré avec succès";

    }catch(Exception $error){
        die('Erreur :'.$error->getMessage());
    }
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo-30-1-24-aprem</title>
</head>
<body>
    <form action="index.php" method="post">
        <p><input type="text" name="nom_article" value="name"></p>
        <p><input type="text" name="contenu_article" value="content"></p>
        <p><input type="submit" name="submit" value="Ajouter"></p>
    </form>
    
</body>
</html>