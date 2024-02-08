<?php
//include './models/Pokemon.php';
include './models/abstractModelPokemon.php';
include './models/Element.php';

include './models/Florizard.php';
include './models/Tortank.php';
include './models/Dracofeu.php';

include './interface/Attaque.php';

include './utils/Jetdeau.php';
include './utils/RayondeLumiere.php';
include './utils/SouffleEnflamme.php';

//On utilise une nouvelle "version" de la classe Dracofeu qu'on instancie avec new. Puis avec les set, on lui donne des attributs. Ensuite, quand l'attribue fait appel à une classe, on se retrouve à faire la
//même manip à l'intérieur de la première, comme des poupées russes qui ont à chaque fois des attributs entre chaque couche. Le nom des attaques est une classe à laquelle on fait appel
//dans la classe Element.
//Plus bas, au html, on utilise des echo pour faire ressortir les valeurs qui nous intéressent
$dracaufeu = new Dracofeu() ;
$dracaufeu->setName('Dracofeu')->setAge(7)->setBackground('Il a appartenu à Sacha')->setElement(new Element('feu',['plante'], ['eau'], new SouffleEnflamme()));

$tortank = new Tortank() ;
$tortank->setName('Tortank')->setAge(12)->setBackground('Lui il a appartenu à Ondine')->setElement(new Element('eau',['feu'], ['plante'], new JetdEau()));

$florizarre = new Florizard() ;
$florizarre->setName('Florizarre')->setAge(7)->setBackground('Il a appartenu à Camille')->setElement(new Element('plante',['eau'], ['feu'], new RayondeLumiere()));


$souffleFeu = new SouffleEnflamme();
echo '<br>'.$souffleFeu->attaquer();

//Avec un constructeur
$dracofeu = new Dracofeu(/*null, null, null, new Element(null, null, null, (new SouffleEnflamme))*/);

//L'EXECUTION DU CODE
//on va donner à notre $dracofeu un souffle enflammé
$dracofeu->setElement(new Element(null, null, null, (new SouffleEnflamme)))->getElement()->setAttaque(new SouffleEnflamme());

//1) Créer un souffle enflammé
$souffle = new SouffleEnflamme();
//2) Créer un élément pour lui mettre le souffle
$element = new Element(null, null, null, (new SouffleEnflamme));
$element->setAttaque($souffle);
//3) Mettre l'élément à Dracofeu
$dracofeu->setElement($element);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Notre Pokemon s'appelle <?php
    echo $dracaufeu->getName();
    ?></p>
    <p>et son attaque vaut <?php
    echo $dracaufeu->getElement()->getAttaque()->attaquer();
    ?> et lui fait dire 
    <?= $dracaufeu->getElement()->getAttaque()->animer();
    ?></p>
    <p><?php
    echo $tortank->getName();
    ?></p>
    <p><?php
    echo $tortank->getElement()->getFaiblesse()[0];
    ?></p>
    <p>
        <?php
        echo $florizarre->getName();
        ?>
    </p>
    <p>
        <?php
        echo $florizarre->getElement()->getType();
        ?>
    </p>
</body>
</html>