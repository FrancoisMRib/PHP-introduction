<?php /*
session_start();

   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
</head>
<body>*/?>
    <main>
        <h1><?= $login ?></h1>
        <p>Prénom : <?= $first_name_user ?></p>
        <p>Nom : <?= $name_user ?></p>
        <?php //On peut utiliser aussi la nomenclature des autres pages vue, avec $name_user à la place de $nom... temps qu'on s'y retrouve?>

        <?php //CORRECTION DE LA PARTIE 2?>
        <form action="compte.php" method="post">
            <h2>Mise à jour du profil</h2>
            <input type="text" name="firstname" value="<?php $prenom ?>">
            <input type="text" name="name" value="<?php $nom ?>">
            <input type="submit" name="submit" value="Valider">
        </form>
    </main>
</body>
</html>