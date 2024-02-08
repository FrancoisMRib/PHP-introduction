<?php

class Pokemon {

    //Attributs
    private ?string $name;
    private ?int $age;
    private ?string $background; 
    private ?Element $element ;

    //Getters
    public function getName(): ?string {
        return $this->name;
    }

    public function getAge(): ?int {
        return $this->age;
    }

    public function getBackground(): ?string {
        return $this->background;
    }

    public function getElement(): ?Element {
        return $this->element;
    }

    //Setters
    //Le typage en ? dans la parenthèse n'est pas hyper utile en php, mais c'est une habitude qu'il vaut mieux prendre
    public function setName(?string $name): Pokemon {
        $this->name = $name ;
        return $this ;
    }

    public function setAge(?int $age): Pokemon {
        $this->age = $age ;
        return $this ;
    }

    public function setBackground(?string $background): Pokemon {
        $this->background = $background;
        return $this ;
    }

    public function setElement(?Element $element): Pokemon {
        $this->element = $element;
        return $this ;
    }

    
    public function parler():string {
        //setName();
        return $this->name ;
    }

    public function attaquerUneCible(Pokemon $cible): int {
        return 10 ;
    }
    
}

?>