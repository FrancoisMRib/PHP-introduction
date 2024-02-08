<?php 
/*
b) Côté code, en reprenant la suite de l'exercice, créer une VUE (vueCategory.php) :
Permettre d'afficher une nouvelle page qui affichera toutes les catégories
Permettre sur cette même page d'afficher un formulaire d'ajout de catégorie

NOTE : n'oublier pas de modifier la navbar pour accéder au fichier category.php (le controler) uniquement lorsque l'on est connecté

c) Créer un fichier modelCategory.php :
Créer la fonction permettant d'enregistrer une nouvelle catégorie
Créer la fonction permettant de récupérer toutes les catégorie

e) Créer le controler (category.php) qui va gérer l'affichage et l'ajout des catégories.

f) M'envoyer votre code et votre diagramme une fois fini
*/
?>

<main>
        <?php //Les lignes suivantes cherchent à afficher les identifiants de l'utilisateur sur la page category ?>
        <?php //<h1><?= $login ?></h1>
        <?php //<p>Prénom : <?= $prenom ?></p>
        <?php //<p>Nom : <?= $nom ?></p>
        <h2>Mes catégories</h2>
        <?php //On peut utiliser aussi la nomenclature des autres pages vue, avec $name_user à la place de $nom... temps qu'on s'y retrouve?>

        <?php //CORRECTION DE LA PARTIE 2?>
        <form action="category.php" method="post">
            <h3>Ajouter une catégorie</h3>
            <!--Il suffit ensuite de remplacer les inputs ci-dessous, à la base des copies d'ajout de compte par ceux d'ajout de category-->
            <input type="text" name="name_cat" value="<?php $name_cat ?>">
            <input type="submit" name="submit" value="Ajouter">
        </form>
        <p><?= $response?></p>
        <ul><?= $var?></ul>
    </main>
</body>
</html>