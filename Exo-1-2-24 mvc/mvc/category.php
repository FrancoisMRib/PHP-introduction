<?php
    session_start();

    $response = '';
    $display = '';
   
    include './model/modelCategory.php';

    if(isset($_POST['submit'])){
        if(isset($_POST['name_cat']) and !empty($_POST['name_cat'])){
            //Nettoyage des données
            $name_cat = htmlentities(strip_tags(stripcslashes(trim($_POST['name_cat']))));
            //On pourrait faire la même avec la fonction sanitize()
            //On utilise la fonction
            $response = addCategory($name_cat);
        } else {
            $message = "Veuillez nommer votre catégorie" ;
        }

        
    }

//Il faudrait faire quelque chose pour $show qui permet d'empêcher la duplication des tableaux
//$show = verifyCategory();
$display = displayCategory();

ob_start();

foreach($display as $category){
    ?>
    <li><?= $category['name_cat'] ?></li>
    <?php
}

$var = ob_get_clean();

    include './controlerNav.php';

    include './vue/header.php';
    include './vue/nav.php'; //-> affiche la navbar
    include './vue/vueCategory.php';
?>