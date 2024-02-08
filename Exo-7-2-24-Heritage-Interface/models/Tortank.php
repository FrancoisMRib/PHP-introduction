<?php

class Tortank extends Pokemon {

    public function parler() : string {
        return "Tu vas être trempé !" ;
    }

    public function createAttaque(): ?Pokemon
    {
        return $this;
    }
}
?>