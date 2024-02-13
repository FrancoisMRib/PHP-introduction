<?php

class controllerNav {
    public function logout(): void {
        
    }
}

//Contrôleur de la Navbar

$linkProfil = "";
if(isset($_SESSION['connected'])){
    $linkProfil= '<a href="compte">Mon Compte</a><button><a href="deco">Deconnexion</a></button>' ;
}

?>