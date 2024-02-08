<?php

class Florizard extends Pokemon {

    public function parler() : string {
        return "Je vais te désintégrer lumineusement !" ;
    }

    public function createAttaque(): ?Pokemon
    {
        return $this;
    }
}
?>