<?php
//Ma Classe pour me connecter à ma BDD SQL. Elle doit implémenter l'interface BddService

//importer ma ressource interface
include '../interface/BddService.php';

//Créer ma class BddMysql qui implémente l'interface BddService, grâce à al propriété implements
class BddMySql implements BddService {
    private ?string $host;
    private ?string $dbname;
    private ?string $login;
    private ?string $mdp_user;

    //Constructeur
    public function __construct($host, $dbname, $login, $mdp_user) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->login = $login;
        $this->mdp_user = $mdp_user;
    }


    //Getter
    public function getHost(): string {
        return $this->host;
    }

    public function getDBName(): string {
        return $this->dbname;
    }

    public function getLogin(): string {
        return $this->login;
    }

    public function getPassword(): string {
        return $this->mdp_user;
    }
    //Methode
    public function connect():PDO{
        $host = $this->getHost();
        $dbname = $this->getLogin();
        $login = $this->getDBName();
        $password = $this->getPassword();

        return new PDO("mysql:host=$host;dbname=$dbname", "root","", array(
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ));
    }
}
?>