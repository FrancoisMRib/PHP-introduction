<?php

class JetdEau implements Attaque {
    //Methodes
    public function attaquer() : int {
        return 8 ;
    }
    public function animer() : string {
        return "PLOUF !";
    }
}

?>