<?php
//MODEL : Gérer les Datas et l'Accès à la BDD

class ModelUser{
    //Attributs
    //1) Encapsulation
    //2) Typage de l'attribut :
        //Sans ? -> l'attribut doit avoir une valeur au moment où on instancie l'objet
        //Avec ?-> l'attribut peut-être NULL au moment où on instancie l'objet
    //3) Donne un nom de variable à l'attribut
    //4) Optionnel: on assigne une valeur par défaut
    private ?int $id_user;
    private ?string $name_user;
    private ?string $first_name_user;
    private ?string $login_user;
    private ?string $mdp_user;

    private ?BddService $bdd ;

    //Constructeur : en php; ce dernier est optionnel
    //mais si on veut en faire un avec : 
    /*public function __construct(?string $login_user) {
        //$this -> va faire référence à 'objet concret en train d'être créé (et non pas la calsse qui sert de moule)
        // -> : indique qu'on utilise un attribut ou une méthode de l'objet
        //login : sans le $, permet d'accéder à l'attribut
        $this->login_user = $login_user;
        
    }*/
    

    //4) Optionnel ; les paramètrezs et leur typage
    //5) Le typage de eretour précédé de :*
    //6) Définition de la méthode (ses isntructions)
    //Getters et setters
    public function getLogin():?string{
        //Le pt d'interrogation sert à dire qu'il peut être nul si jamais on a rien à mettre dedans
        //On l'utilise aussi chez tous les autres getters
        return $this->login_user;
    }
    public function setLogin($login_user):ModelUser{
        $this->login_user = $login_user;
        return $this ;
    }

    public function getName():?string{
        return $this->name_user;
    }
    public function setName($name_user):ModelUser{
        $this->name_user = $name_user;
        return $this ;
    }

    public function getFirstName():?string{
        return $this->first_name_user;
    }
    public function setFirstName($first_name_user):ModelUser{
        $this->first_name_user = $first_name_user;
        return $this ;
    }

    public function getPassword():?string{
        return $this-> mdp_user;
    }
    public function setPassword($mdp_user):ModelUser{
        $this->mdp_user = $mdp_user;
        return $this ;
    }

    public function getId():?int{
        //Le pt d'interrogation sert à dire qu'il peut être nul si jamais on a rien à mettre dedans
        //On l'utilise aussi chez tous les autres getters
        return $this-> id_user;
    }
    public function setId($id_user):ModelUser{
        $this->id_user = $id_user;
        return $this ;
    }

    public function getBdd():BddService {
        return $this->bdd ;
    }

    public function setBdd($bdd):ModelUser {
        $this->bdd = $bdd ;
        return $this ;
    }

    //Methodes
    //En typage de retour, j'autorise soit les tableaux, soit les excpetions
    public function loginUser(/*$login_user*/):array | Exception {
        //pas besoin de mon paramètre login, car j'y ai accès dans les attributs de mon objet
        //ETAPE 5 Du Diagramme de Sequence : demander à la BDD si l'utilisateur existe
        try{
            //Connexion à la BDD
            $bdd = new PDO('mysql:host=localhost;dbname=task','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
            //Préparation de la requête
            $req = $bdd->prepare('SELECT users.id_user, users.name_user, users.first_name_user, users.login_user, users.mdp_user FROM users WHERE login_user = ?');
    
            //Récupération du login
            $login_user = $this->getLogin();
    
            //Binding de Paramètre
            $req->bindParam(1,$login_user,PDO::PARAM_STR);
    
            //ETAPE 6 Du Diagramme de Sequence : exécution de la requête
            $req->execute();
    
            //ETAPE 7 Du Diagramme de Sequence : récupérer la réponse de la BDD
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
    
            return $data; //retourne une seule valeur
    
            
        }catch(Exception $error){
            return $error;
        }
    }

    public function submitUser(/*$name_user, $first_name_user, $login_user, $mdp_user*/) {
        //ETAPE 5 Du Diagramme de Sequence : demander à la BDD si l'utilisateur existe
        try{
            //Connexion à la BDD
            $bdd = new PDO('mysql:host=localhost;dbname=task','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
            //Préparation de la requête
            $req = $bdd->prepare('INSERT INTO users(name_user, first_name_user, login_user, mdp_user) VALUES (?,?,?,?)');

            //Récupération des données soumises
            $name_user = $this-> getName() ;
            $first_name_user = $this-> getFirstName() ;
            $login_user = $this->getLogin();
            $mdp_user = $this->getPassword() ;
    
            //Binding de Paramètre
            $req->bindParam(1,$name_user, PDO::PARAM_STR);
            $req->bindParam(2,$first_name_user, PDO::PARAM_STR);
            $req->bindParam(3,$login_user, PDO::PARAM_STR);
            $req->bindParam(4,$mdp_user, PDO::PARAM_STR);
    
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
    
    public function updateUser(){
        try{
            //Connexion à la BDD
            $bdd = new PDO('mysql:host=localhost;dbname=task','root','', array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));
    
            //Préparer la requête
            $req = $bdd->prepare('UPDATE users SET name_user = ? WHERE id_user = ?') ;
            
            //Récupération des données soumises
            $name_user = $this-> getName() ;
            $first_name_user = $this-> getFirstName() ;
            $id_user = $this->getId() ;

            //Binding de Param
            $req->bindParam(1, $name_user, PDO::PARAM_STR);
            $req->bindParam(2, $first_name_user, PDO::PARAM_STR);
            $req->bindParam(3, $id_user, PDO::PARAM_INT);
    
            //Execution de la requete
            $req->execute();
    
            //Renvoyer un message de confirmation
            return ['Le profil a bien été modifié !', true];
    
        } catch(Exception $error) {
            return [$error->getMessage(), false];
        }
    }
}

/*function loginUser($login_user) {
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

function submitUser($name_user, $first_name_user, $login_user, $mdp_user){
    //ETAPE 5 Du Diagramme de Sequence : demander à la BDD si l'utilisateur existe
    try{
        //Connexion à la BDD
        $bdd = new PDO('mysql:host=localhost;dbname=task','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Préparation de la requête
        $req = $bdd->prepare('INSERT INTO users(name_user, first_name_user, login_user, mdp_user) VALUES (?,?,?,?)');

        //Binding de Paramètre
        $req->bindParam(1,$name_user, PDO::PARAM_STR);
        $req->bindParam(2,$first_name_user, PDO::PARAM_STR);
        $req->bindParam(3,$login_user, PDO::PARAM_STR);
        $req->bindParam(4,$mdp_user, PDO::PARAM_STR);

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
*/
?>