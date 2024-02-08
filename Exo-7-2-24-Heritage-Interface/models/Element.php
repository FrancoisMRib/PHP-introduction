<?php

class Element {
    //return "Mirlababi Surlababo" ;
    private ?string $type;
    private ?array $force;
    private ?array $faiblesse;
    private ?Attaque $attaque ;

    public function __construct($type, $force, $faiblesse, $attaque) {
        $this->type = $type;
        $this->force = $force;
        $this->faiblesse = $faiblesse ;
        $this->attaque = $attaque ;
    }
    //Getters
    public function getType() : ?string {
        return $this->type ;
    }

    public function getForce() : ?array {
        return $this->force ;
    }

    public function getFaiblesse() : ?array {
        return $this->faiblesse ;
    }

    public function getAttaque() : ?Attaque {
        return $this->attaque ;
    }
    //Setters
    public function setType($type) : ?Element {
        $this->type = $type ;
        return $this ;
    }

    public function setForce($force) : ?Element {
        $this->force = $force ;
        return $this ;
    }

    public function setFaiblesse($faiblesse) : ?Element {
        $this->faiblesse = $faiblesse ;
        return $this ;
    }

    public function setAttaque($attaque) : ?Element {
        $this->attaque = $attaque ;
        return $this ;
    }

}

?>