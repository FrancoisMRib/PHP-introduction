<?php

class SouffleEnflamme implements Attaque {
    public function attaquer() : ?int {
        //echo $this->attaquer();
        return 17 ;
    }
    public function animer() : ?string {
        //echo $this->animer();
        return "VOUF !";
    }
}

?>