<?php
include '../data.php';
    ob_start();
/*
$USERS_HUMAN = [[
    "type"=> "humain",
    "name"=> "John Doe",
    "email"=> "j.smith@gmail.com",
    "age"=> 25
],
[
    "type"=> "humain",
    "name"=> "Jane Smith",
    "email"=> "ja.doe@sfr.fr",
    "age"=> 5
],
[
    "type"=> "humain",
    "name"=> "Le Vénérable",
    "email"=> "levy@gmail.com",
    "age"=> 500
]
];
<article style="border-bottom:3px solid">
    <h2>nom : <?=$human["name"]?></h2>
    <p>mail : <?=$human["email"]?></p>
    <p>age : <?=$human["age"]?> ans</p>
</article>*/


foreach($USERS_HUMAN as $human) :
    ?>
    <article>
    <h2><?=$human["name"]?></h2>
    <img src="https://picsum.photos/200">
    <p>Email : <?= $humain['email'] ?></p>
    <p>Âge <?= $humain['age'] ?></p>
    <p>Type <?= $humain['type'] ?></p>
</article>
<?php

endforeach;
    $profil = ob_get_clean();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <?= $profil ?>
</body>
</html>