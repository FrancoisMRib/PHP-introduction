<?php
//ROUTER
include './models/ManagerUser.php';
abstract class ModelUser {
    //Définition des attributs
    private ?int $id ;

    private ?string $nameUser ;

    private ?string $firstNameUser ;

    private ?string $loginUser ;

    private ?string $mdpUser ;

    private ?BddService $bdd;

    //Constructeur
    public function __construct(?string $nameUser, ?string $firstNameUser, ?string $loginUser, ?string $mdpUser, ){
        $this->nameUser = $nameUser ;
        $this->firstNameUser = $firstNameUser ;
        $this->loginUser = $loginUser ;
        $this->mdpUser = $mdpUser ;
    }
    //Getters
    public function getId(): ?int {
        return $this->id ;
    }
    public function getNameUser(): ?string {
        return $this->nameUser ;
    }
    public function getFirstNameUser(): ?string {
        return $this->firstNameUser ;
    }
    public function getLoginUser(): ?string {
        return $this->loginUser ;
    }
    public function getMdpUser(): ?string {
        return $this->mdpUser ;
    }
    public function getBdd(): ?BddService {
        return $this->bdd ;
    }

    //Setters
    public function setId($id): ?ModelUser {
        $this->id = $id ;
        return $this ;
    }
    public function setNameUser($nameUser): ?ModelUser {
        $this->nameUser = $nameUser ;
        return $this ;
    }
    public function setFirstNameUser($firstNameUser): ?ModelUser {
        $this->firstNameUser = $firstNameUser ;
        return $this ;
    }
    public function setLoginUser($loginUser): ?ModelUser {
        $this->loginUser = $loginUser ;
        return $this ;
    }
    public function setMdpUser($mdpUser): ?ModelUser {
        $this->mdpUser = $mdpUser ;
        return $this ;
    }
    public function setBdd($bdd): ?ModelUser {
        $this->bdd = $bdd ;
        return $this ;
    }

    //Methodes
    public abstract function login() : array | string ;

    public abstract function signIn(): ?string ; 
}

?>