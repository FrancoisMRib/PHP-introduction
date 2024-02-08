<?php
/*
    if(isset($_POST['submit'])){
        if(isset($_POST['box']) and !empty($_POST['box'])){

            //2e mesure de séurité pour enelver le code malveillant
            // -> activation du buffer
            ob_start();
            foreach($_POST['box'] as $value){ 
            //echo "TEST Isset et Empty"; 
    ?>
            <li><?= htmlentities(strip_tags(stripslashes(trim($value)))) ?></li>

    <?php
            }
        //-> récupératon de toutes les données d'un coup
        $box = ob_get_clean();
        }
        //boucle pour parcourir chaque case cochés ($value équivaut à value en HTML)
        
        }
        else{
        echo "<p>Veuillez cocher une ou plusieurs checkbox</p>"; 
        } ;


*/
//Version sans buffer
?>

<?php
$box = "";

//Je vérifie que Submit a été cliqué (c.à.d formulaire soumis)
if(isset($_POST['submit'])){
    /*PETIT POINT SECURITE : La Sainte Trinité
    1er Mesure : Vérifier que les champs reçus et obligatoires ne sont pas vide*/
    if(isset($_POST['box']) and !empty($_POST['box'])){

        /* 2nd Mesure de sécurité : nettoyer les données, enlever le code malveillant*/
        foreach($_POST['box'] as $value){
            $sanitize = htmlentities(strip_tags(stripslashes(trim($value))));
            $box = $box."<li>".$sanitize."</li>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo-30-1-24-matin</title>
</head>
<body>

<form action="" method="post">
    <h4>Cocher un ou plusieurs films préférés :</h4>
    <p><input type="checkbox" name="box[]" value="Les aventuriers de l'arche perdue"/>Les aventuriers de l'arche perdue</p>
    <p><input type="checkbox" name="box[]" value="Casablanca"/>Casablanca</p>
    <p><input type="checkbox" name="box[]" value="Avengers : Infinity War"/>Avengers : Infinity War</p>
    <p><input type="checkbox" name="box[]" value="La revanche des Sith"/>La revanche des Sith</p>
    <p><input type="checkbox" name="box[]" value="Le gendarme contre les Visiteurs"/>Le gendarme contre les Visiteurs</p>
    <p><input type="submit" name='submit' value="Récupérer"></p>
</form>

<ul> <?= $box ?> </ul>
    
</body>
</html>