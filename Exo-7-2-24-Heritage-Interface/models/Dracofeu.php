<?php

class Dracofeu extends Pokemon {

    public function parler() : string {
        return "Gare à mes flammes !";
        //return $this->getName ;
    }

    public function createAttaque(): ?Pokemon
    {
        return $this;
    }
}
?>