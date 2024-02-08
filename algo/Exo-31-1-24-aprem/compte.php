<?php

//J'active ma super global SESSION
session_start();

//echo "Bienvenue !"

//En-dessous la partie qui sert pour stabiliser la connexion
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
        <h1><?= $_SESSION['login'] ?></h1>
        <p>PrÃ©nom : <?= $_SESSION['firstname'] ?></p>
        <p>Nome : <?= $_SESSION['name'] ?></p>
    </main>
</body>
</html>