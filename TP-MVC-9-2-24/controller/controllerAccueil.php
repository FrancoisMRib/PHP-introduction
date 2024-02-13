<?php

$formCo = "<h1>Accueil</h1>"; //-> Affiche Accueil à la place du Formulaire de Connexion si on est Connecté
$message = "";
$formSign = "";
$messageSign = "";


//-> Affiche le Formulaire de Connexion si on n'est pas Connecté
if(!isset($_SESSION['connected'])){
    $formCo = '<form action="" method="post">
    <h2>Connexion</h2>
    <input type="text" name="login" placeholder="Votre Login">
    <input type="password" name="password" placeholder="Votre Mot de Passe">
    <input type="submit" name="submit" value="Se Connecter">
    </form>';

    $formSign = '<form action="" method="post">
    <h2>Inscription</h2>
    <input type="text" name="nameSign" placeholder="Votre Nom">
    <input type="text" name="firstnameSign" placeholder="Votre Prénom">
    <input type="text" name="loginSign" placeholder="Votre Login">
    <input type="password" name="passwordSign" placeholder="Votre Mot de Passe">
    <input type="password" name="passwordSignVerify" placeholder="Retapper Votre Mot de Passe">
    <input type="submit" name="submitSign" value="S\'Inscrire">
    </form>';
}
class controllerAccueil {
    private ?controllerNav $navbar ;

    private ?ModelUser $user ;

    private ?string $message ;

//Getter
    public function getNavbar(): controllerNav {
        return $this->navbar ;
    }
    public function getUser(): ModelUser {
        return $this->user ;
    }
    public function getMessage(): string {
        return $this->message ;
    }

//Setters
    public function setNavbar(controllerNav $navbar): controllerAccueil{
        $this->navbar = $navbar ;
        return $this ;
    }
    public function setUser(controllerNav $navbar): controllerAccueil{
        $this->navbar = $navbar ;
        return $this ;
    }
    public function setMessage(controllerNav $navbar): controllerAccueil{
        $this->navbar = $navbar ;
        return $this ;
    }
    public function log(): string {
        if(isset($_POST['submit'])){
            //Vérification du remplissage des champs
            if(isset($_POST['login']) and !empty($_POST['login'])
            and isset($_POST['password']) and !empty($_POST['password'])
            ){
                    //Nettoyer les datas
                    $login = Functions::sanitize($_POST['login']);
                    $password = Functions::sanitize($_POST['password']);
        
                    //Validation de format de data
                    //-> je n'attends que des string non formatées, donc pas de vérification
        
                    //Instancier l'objet user
                    $user = new ManagerUser();
        
                    //Assigner mes données aux Attributs
                    $user->setLogin($login)->setPassword($password);
        
                    //J'appel le Model pour récupérer mon utilisateur
                    $data = $user->loginUser();
                    return $data ;
        
                //Test la réponse renvoyer par le Model
                if(gettype($data) == "object"){
                    $message = $data->getMessage();
                }else{
        
                    //ETAPE 8 Du Diagramme de Sequence : vérifier l'existence de l'utilidateur, et vérifier le mot de passe
                    if(!empty($data) and ($user->getPassword()==$data[0]['mdp_user'])){
                    
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
    }

    public function sign(): string {
        return $this->$submit();
    }

    public function render(): void {
        $path = $this->paths . DIRECTORY_SEPARATOR . $view . 'php';
        ob_start();
        require $path;
        return ;
    }

}

?>