<?php
// Il est crucial de démarrer la session avant de la détruire
session_start();

// 1. Suppression des variables de session
// Meilleure pratique : supprime les données de session sans la détruire complètement (pour d'autres usages futurs)
$_SESSION = array();

// 2. Destruction de la session (supprime le cookie de session sur le navigateur)
session_destroy();

// 3. Redirection vers la page d'accueil ou de connexion
header('Location: index.php');
exit();
?>