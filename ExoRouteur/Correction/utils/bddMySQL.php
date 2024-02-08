<?php
//Ma Classe pour me connecter à ma BDD MySQL. Elle doit implémenter l'interface BddService


//créer ma class BddMySQL qui implémente l'interface BddService, grâce à lap propriété implements
class BddMySQL implements BddService {
    private ?string $host;
    private ?string $dbname;
    private ?string $login;
    private ?string $password;

    //Constructeur
    public function __construct($host, $dbname, $login, $password){
        $this->host = $host;
        $this->dbname = $dbname;
        $this->login = $login;
        $this->password = $password;
    }

    //Getter
    public function getHost():string{
        return $this->host;
    }

    public function getDbName():string{
        return $this->dbname;
    }

    public function getLogin():string{
        return $this->login;
    }

    public function getPassword():string{
        return $this->password;
    }


    //Methode
    public function connect():PDO{
        $host = $this->getHost();
        $dbname = $this->getDbName();
        $login = $this->getLogin();
        $password = $this->getPassword();

        return new PDO("mysql:host=$host;dbname=$dbname","$login","$password",array(
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ));
    }
}

?>