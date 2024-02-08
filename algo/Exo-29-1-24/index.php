<?php

//0
include 'data.php';

//1
$tabData = [];

//2
array_push($tabData, $USERS_HUMAN, $USERS_PET, $USERS_XENO);
//ou alors une version où on les met tous les trois bout à bout
//$tabData[] = $USERS_HUMAN
//$tabData[] = $USERS_PET
//$tabData[] = $USERS_XENO

//3
function afficherHumain($tab) {
    //car $tab désigne un tableau, comme demandé dans l'énoncé
    //Puis on met notre code html dans une chaîne de caractères
    echo "<article style= 'border-bottom : 3px solid black '>
    <h2>nom : {$tab["name"]}</h2>
    <p>email : {$tab["email"]}</p>
    <p>age : {$tab["age"]}</p>
    </article>" ;
} ;

//4
function afficherAnimal($tab) {
    echo "<article style= 'border-bottom : 3px solid black '>
    <h2>nom : {$tab["name"]}</h2>
    <p>espece : {$tab["espece"]}</p>
    <p>age : {$tab["age"]} ans</p>
    <p>propriétaire : {$tab["propriétaire"]}</p>
    </article>";
} ;

//5
// Avec une écriture un peu différente
function afficherXeno($tab) {
    echo "<article style= 'border-bottom : 3px solid black '>
    <h2>nom : {$tab["name"]}</p>
    <p>espece : {$tab["espece"]}</p>
    <p>age : {$tab["age"]} ans</p>
    <p>niveau de menace: {$tab["menace"]}</p>
    </article>";
};

/*
afficherHumain($USERS_HUMAN[0]);
afficherHumain($USERS_HUMAN[1]);
afficherHumain($USERS_HUMAN[2]);

afficherAnimal($USERS_PET[0]);
afficherAnimal($USERS_PET[1]);

afficherXeno($USERS_XENO[0]);
afficherXeno($USERS_XENO[1]);
afficherXeno($USERS_XENO[2]);
*/

//Exercice 6, 7 et 8 : Création de profil, qui parcourt un tableau associatif. Définition de la fonction
function profil($tab) {
    foreach($tab as $int) {
        if($int["type"] == "humain"){
            afficherHumain($int);
        } else if ($int["type"] == "animal de compagnie"){
            afficherAnimal($int);
        } else if ($int["type"] == "Xeno"){
            afficherXeno($int);
        }
    }
} ;


//Exercice 9 : Application de la fonction profil

profil($USERS_HUMAN);
profil($USERS_PET);
profil($USERS_XENO);

//Exercice 10 : Création de la fonction profilAll

/*function profilAll($tab = [$pitiTab]) {
    foreach($pitiTab as $value) {
        profil($value);
    }
}*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>