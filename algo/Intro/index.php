<?php

/* Les commentaires s'écrivent comme sur HTML
LES VARIABLES
*/


$maVariable = 'Ma première variable';
/*On peut ensuite la redéfinir comme un int ou encore n tableau ce sera pas un problème*/
echo($maVariable);
/*Cool mais si on n'utilise pas le local host ça affiche le code*/
/*Il faut ouvrir le navigateur et on met "localhost" dedans*/


$maVariable = 2;

function affichage($string = 'Hello World !'){
    return $string;
    //La ligne suivante ne sert à rien car "echo", qui sert à afficher qq chose, est redéfini ensuite (je crois)
    //echo 'kikou';
}
//On appelle la variable dont on se sert après
$maVariable = affichage();

$varA = 1;
$varB = 2;

if($varA XOR $varB) {
    echo 'true';
} else {
    echo 'false';
}

switch($varA){
    case 1 : 
        echo '<br>Vrai';
        break ;
    case 2 : 
        echo '<br>Vrai aussi';
        break ;
    default :
        echo '<br>Valeur par défaut';
};

$varC = [1,2,3,4,5];
$varD = [
    'prénom' => 'Yoann',
    'nom' => 39
];

$varE = [[1,2,3],[4,5,6],[7,8,9]];

//Version classique
foreach($varD as $int) {
    echo '<br>'.$int;
    //echo ne peut pas afficher de tableaux
};

//Version avec la variable qui est un tableau dans un autre tableau
foreach($varE as $tab) {
    foreach($tab as $row){
        echo '<br>'.$row;
    }
}


?>

<?php
/*Déclaration Tableau Vide*/
$varA = [];

/*Déclaration tableau indexé*/
$varB = [1,2,3,4,5];

/*Déclaration tableau associatif*/
$varC = [
    'prénom' => 'Yoann',
    'age' => 39,
    'roster' => ['pikachu','salamèche','bulbizard']
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--<h1>
        Ma Première Page
    </h1>
    <?php
        //echo($maVariable);
    ?>
    <a href=<?php echo "https://www.google.fr" ?> >Mon lien</a>
    <p><?php //echo gettype($maVariable)?>    </p>

    <h2>CONCATENATION</h2>
    echo est une commande qui permet d'afficher-->
    <p><?php //echo "Ma concatenation 1 : $maVariable"?></p>
    <p><?php //echo 'Ma concatenation 2 : '.$maVariable?></p>
    <p><?php //echo "Ma concatenation 1 : {$maVariable}"?></p>*/

</body>
</html>