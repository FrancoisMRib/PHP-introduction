<?php

//La première commande qui préviens qu'on active la supergloabl SESSION
session_start();

if(isset($_POST['submit'])){
    if(isset($_POST['pseudo']) and !empty($_POST['pseudo']) and
    isset($_POST['password']) and !empty($_POST['password'])){

        $login_user = htmlentities(strip_tags(stripcslashes(trim($_POST['pseudo']))));
        $mdp_user = htmlentities(strip_tags(stripcslashes(trim($_POST['password']))));

        //Validation de format de data
        // -> je n'attends que des strin non formatés, donc pas de vérification


        try{
            $bdd = new PDO('mysql:host=localhost;dbname=task','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            //C'était ici que j'avais écrite la vérification du mdp
            $req = $bdd->prepare('SELECT users.id_user, users.name_user, users.first_name_user, users.login_user, users.mdp_user FROM users WHERE login_user = ?');
            //On met aussi les infos qu'on a pas récupérées pour pouvoir être utilisées en base de données.
            //J'avais mis le fetch à la suite, ce qui est une erreur...

            $req->bindParam(1,$login_user,PDO::PARAM_STR);
            $req->bindParam(2,$mdp_user,PDO::PARAM_STR);

            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            //ETAPE QUE J'AI FAITE DIFFEREMENT, et AVANT
            //if($_POST['password'] === $_POST['password_verify']);
            if(!empty($data)){
                if(!empty($data) or (isset($data[0]['mdp_user']) and password_verify($password, $data[0]['mdp_user']))){

                    //IDEM PAS FAITE
                    //Enregistrement des datas en $_SESSION
                    $_SESSION['id']=$data[0]['id_user'];
                    $_SESSION['name']=$data[0]['name_user'];
                    $_SESSION['firstname']=$data[0]['first_name_user'];
                    $_SESSION['pseudo']=$data[0]['login_user'];
                    $_SESSION['password']=$data[0]['mdp_user'];

                    $message = "Vous êtes bien connecté";
                }else{
                    $message = "Mot de passe incorrect" ;
                }
            } else {
                $message = "Utilisateur non existant" ;
            }
            //Si mon mdp ou que le login ne sont pas bons, on peut pour plus de sécurité transmettre le même message d'erreur, comme ça on reste dans le flou

            $message = $login_user.' est bien ci ';

            ob_start();
            foreach($data as $user){
            
            
            }

            $profil = ob_get_clean();

        }catch (Exception $error){
            die('Erreur :'.$error->getMessage());
        }
    } else {
        $message = "Veuillez remplir tous les champs" ;
    }
}



/*session is started if you don't write this line can't use $_Session  global variable*/

//$_SESSION["pseudo"]=$login_user;
//$_SESSION["password"]=$mdp_user;
//ça il fallait le mettre dans le if aussi ...


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Connexion</h2>
    <form action="" method="post">
        <p><input type="text" name="pseudo" placeholder="Login"></p>
        <p><input type="password" name="password" placeholder="Mot de passe"></p>
    <?php /*Pour la ligne précédente j'avais mis un type="test" mais password est mieux pour la confidentialité*/?>
        <p><input type="password" name="password_verify" placeholder="Vérifier le mot de passe"></p>
        <p><input type="submit" name='submit' value="Se connecter"></p>
    </form>

    <p><?php $message ?></p>
</body>
</html>