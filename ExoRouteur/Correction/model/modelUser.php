<?php
//MODEL : Gérer les Datas et l'Accès à la BDD

class ModelUser{
    //Attribut
    //1) Encapsulation
    //2) Typage de l'attribut : 
        //Sans ? -> l'attribut doit avoir une valeur au moment où on instancie l'objet
        //Avec ? -> l'attribut peut-être NULL au moment où on instanciie l'objet
    //3) Donne un nom de variable à l'attribut
    //4) Optionnel : on assigne une valeur par défaut
    private ?int $id;
    private ?string $name;
    private ?string $firstName;
    private ?string $login;
    private ?string $password;

    //Attribut Bdd -> va stocker un objet de type BddService pour gérer la connexion à ma BDD
    private ?BddService $bdd;

    //Constructeur : en php, ce dernier est optionnel
    //mais si on veut en faire un :
    public function __construct(?string $login){
        // $this -> va faire référence à l'objet concret en train d'être créer (et non pas la Classe qui sert de moule)
        // -> : indique qu'on utilise un attribut ou une méthode de l'objet
        // login : sans le $, permet d'accéder à l'attribut
        $this->login = $login;
    }

    //Getter et Setter
    //1) Encapsulation
    //2) Mot clé function
    //3) Nom de la méthode
    //4) Optionnel : Les paramètres et leur typage
    //5) Le typage de retour précédé de :
    //6) Définition de la méthode (ses instructions)
    public function getLogin():string{
        return $this->login;
    }

    public function setLogin(string $login):ModelUser{
        $this->login = $login;
        return $this; //-> retourne l'objet ModelUser
    }

    public function getBdd():BddService{
        return $this->bdd;
    }

    public function setBdd(BddService $bdd):ModelUser{
        $this->bdd = $bdd;
        return $this; //-> retourne l'objet ModelUser
    }

    //Methodes
    //en typage de retour, j'autorise soit les Tableaux, soit les objet Exception
    public function loginUser(/*$login*/):array|Exception{ //-> pas besoin de mon paramètre $login, car j'y ai accès dans les attributs de mon objet
        //ETAPE 5 Du Diagramme de Sequence : demander à la BDD si l'utilisateur existe
        try{
            //Connexion à la BDD
            $bdd = $this->getBdd()->connect();
    
            //Préparation de la requête
            $req = $bdd->prepare('SELECT users.id_user, users.name_user, users.first_name_user, users.login_user, users.mdp_user FROM users WHERE login_user = ?');

            //Recupération du login
            $login = $this->getLogin();
    
            //Binding de Paramètre
            $req->bindParam(1,$login,PDO::PARAM_STR);
    
            //ETAPE 6 Du Diagramme de Sequence : exécution de la requête
            $req->execute();
    
            //ETAPE 7 Du Diagramme de Sequence : récupérer la réponse de la BDD
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
    
            return $data;
    
            
        }catch(Exception $error){
            return $error;
        }
    }
}

?>