<?php

include "./maison.php";

$maison1 = new Maison("La Bourbonnaise");

$maison1->setLength(40);
$maison1->setWidth(50);

$surface = $maison1->surface();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<main>
    <p>La surface de la maison <?= $maison1->getName() ?> est égale à : <?= $surface ?> m2</p>
</main>

</body>
</html>