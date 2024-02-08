<?php
//J'active ma super global SESSION
session_start();

//echo "Vous êtes déconnecté !"

//Je détruis les données de ma super global => ça me déconnecte
session_destroy();

//Redirection vers la page index.php
header('Location: ./index.php');
exit;

?>