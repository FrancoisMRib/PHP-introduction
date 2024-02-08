<?php
//ma lasse UserClient hérite de Modeluser grâce à la propriété extends
// Du fait de l'héritage, un objet instancié par UserClient possède les typages suivants :
// - Objet
// - UserClient
// - et ModelUser

//Par contre, un objet instancié à partir de ModelUser n'est pas un UserClient

//Etape 1 : Importe ra ressource
include 'modelUser.php';
Class USerClient extends ModelUser{
    public function deleteOwnUser(): string {
        //instruction
        return "J'ai été effacé";
    }
}
?>