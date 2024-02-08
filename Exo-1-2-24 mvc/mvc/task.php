<?php
    session_start();

    $response = '';
    $display = '';
   
    include './model/modelTask.php';

    if(isset($_POST['submit'])){
        if(isset($_POST['name_task']) and !empty($_POST['name_task']) and
        isset($_POST['content_task']) and !empty($_POST['content_task']) and
        isset($_POST['date_task']) and !empty($_POST['date_task'])){
            //Nettoyage des données
            $name_task = htmlentities(strip_tags(stripcslashes(trim($_POST['name_task']))));
            $content_task = htmlentities(strip_tags(stripcslashes(trim($_POST['content_task']))));
            $date_task = htmlentities(strip_tags(stripcslashes(trim($_POST['date_task']))));
            //On pourrait faire la même avec la fonction sanitize()
            //On utilise la fonction
            $response = addTask($name_task, $content_task, $date_task);
        } else {
            $message = "Veuillez entrer votre tâche" ;
        }

        
    }

//Il faudrait faire quelque chose pour $show qui permet d'empêcher la duplication des tableaux
//$show = verifyCategory();
$display = displayTask();

ob_start();

foreach($display as $task){
    ?>
    <li><?= $task['name_task'] ?> qui consiste à <?= $task['content_task'] ?> est prévue pour le <?= $task['date_task'] ?></li>
    <?php
}

$var = ob_get_clean();

    include './controlerNav.php';

    include './vue/header.php';
    include './vue/nav.php'; //-> affiche la navbar
    include './vue/vueTask.php';
?>