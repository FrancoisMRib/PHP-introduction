<?php
include './data.php';

//Question 1 : créer $tabData
//$tabData = [];
$tabData = array();

//Question 2 : 
//avec array_push()
//array_push($tabData, $USERS_HUMAN, $USERS_PET, $USERS_XENO);

//sans array_push()
$tabData[] = $USERS_HUMAN;
$tabData[] = $USERS_PET;
$tabData[] = $USERS_XENO;


//Question 3 : AfficherHumain()
function afficherHumain($human){
    ?>
    <article style="border-bottom:3px solid">
    <h2>nom : <?=$human["name"]?></h2>
    <p>mail : <?=$human["email"]?></p>
    <p>age : <?=$human["age"]?> ans</p>
    </article>
    <?php
}

//afficherHumain($USERS_HUMAN[0]);

//Question 4 : AfficherPet()
function afficherPet($pet) {
    ?>
    <article style="border-bottom:3px solid">
    <h2>nom : <?=$pet["name"]?></h2>
    <p>espèce : <?=$pet["espece"]?></p>
    <p>age : <?=$pet["age"]?> ans</p>
    <p>propriétaire : <?=$pet["propriétaire"]?></p>
    </article>
    <?php
}

//afficherPet($USERS_PET[0]);

//Question 5 : AfficherXeno()
function afficherXeno($xeno){
    ?>
    <article style="border-bottom:3px solid">
    <h2>nom : <?=$xeno["name"]?></h2>
    <p>espèce : <?=$xeno["espece"]?></p>
    <p>age : <?=$xeno["age"]?> ans</p>
    <p>niveau de menace : <?=$xeno["menace"]?></p>
    </article>
    <?php
}

//afficherXeno($USERS_XENO[0]);


//Question 6 : Profil()
function profil($tabUsers) {
    foreach($tabUsers as $user) :
        if($user["type"] == "humain") : 
            afficherHumain($user);
        elseif($user["type"] == "animal de compagnie"):
            afficherPet($user);
        elseif($user["type"] == "Xeno"):
            afficherXeno($user);
        else :?>
            <p>Profil non connu !</p>
        <?php endif ; 
    endforeach ; 
}

//profil($USERS_XENO);

//Question 10 : ProfilAll()

function profilAll($bigTab){
    foreach($bigTab as $tabUsers) :
        profil($tabUsers);
    endforeach ;
}

profilAll($tabData);
?>