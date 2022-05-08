<?php
session_start();

//On supprime les variables globales de $_SESSION pour qu'elles ne soient plus accessibles
$_SESSION = array();
session_destroy();

//On redirige vers la page de connexion
header('Location: accueil.html');
?>
