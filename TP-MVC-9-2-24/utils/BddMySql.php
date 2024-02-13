<?php

class BddMySQL {
    private ?string $host ;
    private ?string $dbname ;
    private ?string $login ;
    private ?string $password ;

    public function getHost(): ?string {
        return $this->host ;
    }
    public function getDB(): ?string {
        return $this->dbname ;
    }
    public function getLogin(): ?string {
        return $this->login ;
    }
    public function getPassword(): ?string {
        return $this->password ;
    }

    public function setHost($host): BddMySQL {
        $this->host = $host ;
        return $this;
    }
    public function setDB($dbname): BddMySQL {
        $this->dbname = $dbname ;
        return $this;
    }
    public function setLogin($login): BddMySQL {
        $this->login = $login ;
        return $this;
    }
    public function setPassword($password): BddMySQL {
        $this->password = $password ;
        return $this;
    }
    public function connect(): PDO {
        $pdo = new PDO("mysql:host-localhost;dbname=task;charset_ut8", 'root', '');
        return $pdo ;
        }
}

?>