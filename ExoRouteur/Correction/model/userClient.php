<?php
//HERITAGE
//ma classe UserCLient hérite de ModelUser grâce à la propriété extends
// Du fait de l'héritage, un objet instancié par UserClient possède les typages suivant :
// - object
// - UserCLient
// - et ModelUser
//
//Par contre, un objet instancié à partir de ModelUser, n'est pas un UserClient

//Etape 1 : importer ma ressource ModelUser
include 'modelUser.php';

class UserClient extends ModelUser{
    public function deleteOwnUser():string{
        //instruction
    }
}

?>