<?php
//INTERFACE
interface BddService {
    //Définir la signature des méthodes que requiert l'Interface
    public function connect():PDO;
}
?>