<?php


class ManagerUser extends ModelUser {
    public function login(): array | string {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=task','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
            //Préparation de la requête
            $req = $bdd->prepare('SELECT users.id_user, users.name_user, users.first_name_user, users.login_user, users.mdp_user FROM users WHERE login_user = ?');
    
            //Récupération du login
            $loginUser = $this->getLoginUser();
    
            //Binding de Paramètre
            $req->bindParam(1,$loginUser,PDO::PARAM_STR);
    
            //ETAPE 6 Du Diagramme de Sequence : exécution de la requête
            $req->execute();
    
            //ETAPE 7 Du Diagramme de Sequence : récupérer la réponse de la BDD
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
    
            return $data; //retourne une seule valeur
    
           
        } catch (Exception $error){
            return $error;
        }
    }

    public function signIn(): ?string {
        try{
            //Connexion à la BDD
            $bdd = new PDO('mysql:host=localhost;dbname=task','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
            //Préparation de la requête
            $req = $bdd->prepare('INSERT INTO users(name_user, first_name_user, login_user, mdp_user) VALUES (?,?,?,?)');

            //Récupération des données soumises
            $nameUser = $this-> getNameUser() ;
            $firstNameUser = $this-> getFirstNameUser() ;
            $loginUser = $this->getLoginUser();
            $mdpUser = $this->getMdpUser() ;
    
            //Binding de Paramètre
            $req->bindParam(1,$nameUser, PDO::PARAM_STR);
            $req->bindParam(2,$firstNameUser, PDO::PARAM_STR);
            $req->bindParam(3,$loginUser, PDO::PARAM_STR);
            $req->bindParam(4,$mdpUser, PDO::PARAM_STR);
    
            //ETAPE 6 Du Diagramme de Sequence : exécution de la requête
            $req->execute();
    
            //ETAPE 7 Du Diagramme de Sequence : récupérer la réponse de la BDD
            //$data = $req->fetchAll(PDO::FETCH_ASSOC);
            //Pas utile car on ne récupère pas de données
    
            //return $data;
            //Idem
    
            
        }catch(Exception $error){
            return $error;
        }
    }
}

?>