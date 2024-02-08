<?php
//MODEL : Gérer les Datas et l'Accès à la BDD

class Maison{
    //Attribut
    //1) Encapsulation
    //2) Typage de l'attribut : 
        //Sans ? -> l'attribut doit avoir une valeur au moment où on instancie l'objet
        //Avec ? -> l'attribut peut-être NULL au moment où on instanciie l'objet
    //3) Donne un nom de variable à l'attribut
    //4) Optionnel : on assigne une valeur par défaut
    private ?string $name;
    private ?int $length;
    private ?int $width;
    private ?int $nbrEtage = 0;
    //Constructeur : en php, ce dernier est optionnel
    //mais si on veut en faire un :
    public function __construct(?string $name){
        // $this -> va faire référence à l'objet concret en train d'être créer (et non pas la Classe qui sert de moule)
        // -> : indique qu'on utilise un attribut ou une méthode de l'objet
        // login : sans le $, permet d'accéder à l'attribut
        $this->name = $name;

    }

    //Getter et Setter
    //1) Encapsulation
    //2) Mot clé function
    //3) Nom de la méthode
    //4) Optionnel : Les paramètres et leur typage
    //5) Le typage de retour précédé de :
    //6) Définition de la méthode (ses instructions)
    public function getName():string{
        return $this->name;
    }

    public function setName(string $name):Maison{
        $this->name = $name ;
        return $this; //-> retourne l'objet Maison
    }

    //Maintenant on refait pareil avec length et width
    public function getLength():string{
        return $this->length;
    }
    public function setLength(int $length):Maison{
        $this->length = $length ;
        return $this;
    }

    public function getWidth():string{
        return $this->width;
    }
    public function setWidth(int $width):Maison{
        $this->width = $width ;
        return $this;
    }

    public function getEtage():string{
        return $this->nbrEtage;
    }
    public function setEtage(int $nbrEtage):Maison{
        $this->nbrEtage = $nbrEtage ;
        return $this;
    }

    //Methodes
    public function surface(){
        return $this->getLength() * $this->getWidth() * ($this->getEtage() + 1) ;
    }
}

?>