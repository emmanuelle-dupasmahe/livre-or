<?php
session_start();

// --- VÉRIFICATION DE LA CONNEXION (CRUCIAL) ---
if (!isset($_SESSION['user_id'])) {
    // Si l'utilisateur n'est pas connecté, le rediriger vers la page de connexion
    // Assurez-vous que le chemin est correct selon votre structure
    header('Location: controller/connexion.php'); 
    exit();
}

// Inclure le Modèle de commentaires
require_once('model/comment-model.php'); 
$commentModel = new CommentModel();

$erreur = null;

// --- LOGIQUE D'INSERTION ---
if (isset($_POST['submit_commentaire'])) {
    
    $commentaire_text = trim($_POST['commentaire']);
    $id_utilisateur = $_SESSION['user_id']; // ID récupéré de la session
    
    if (empty($commentaire_text)) {
        $erreur = "Le champ commentaire ne peut pas être vide.";
    } else {
        
        // Appel du Modèle pour insérer le commentaire
        $insertion_ok = $commentModel->addComment($commentaire_text, $id_utilisateur);

        if ($insertion_ok) {
            // Redirection vers le Livre d'Or pour voir le nouveau commentaire
            header('Location: livre-or.php'); 
            exit();
        } else {
            $erreur = "Une erreur est survenue lors de l'enregistrement du commentaire.";
        }
    }
}

// Inclusion de la Vue
include('view/commentaire.php');
?>