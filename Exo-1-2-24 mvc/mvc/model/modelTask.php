<?php 
function addtask($name_task, $content_task, $date_task){
    try{
        //Connexion à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=task','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Préparation de la requête
        $req = $bdd->prepare('INSERT INTO task(name_task, content_task, date_task) VALUES (?, ?, ?)');

        //Binding de Paramètre
        $req->bindParam(1,$name_task, PDO::PARAM_STR);
        $req->bindParam(2,$content_task, PDO::PARAM_STR);
        $req->bindParam(3,$date_task, PDO::PARAM_STR);

        //ETAPE 6 Du Diagramme de Sequence : exécution de la requête
        $req->execute();
        $message = 'Votre tâche a été ajoutée !';
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

function displayTask(){
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Préparation de la requête
        $req = $bdd->prepare('SELECT category.name_cat FROM category INNER JOIN task ON task.id_cat = category.id_cat INNER JOIN users ON task.id_user = users.id_user');
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
?>