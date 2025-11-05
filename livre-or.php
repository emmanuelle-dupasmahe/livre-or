<?php
session_start();

// Vérifier si l'utilisateur est connecté pour l'affichage du lien d'ajout
$est_connecte = isset($_SESSION['user_id']);

// Inclure le Modèle de commentaires
require_once('model/comment-model.php'); 
$commentModel = new CommentModel();

// Récupérer tous les commentaires via la méthode de jointure
$commentaires = $commentModel->getAllCommentsWithUser();

// Inclure la Vue pour l'affichage
include('view/livre-or.php');
?>