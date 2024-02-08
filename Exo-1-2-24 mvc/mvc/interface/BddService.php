<?php
//INTERFACE 
interface BddService {
    //Définie la signature de sméthoes que requiert l'Interface
    public function connect() : PDO ;
}
?>