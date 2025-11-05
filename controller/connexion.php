<?php
// Il est crucial de démarrer la session avant TOUT envoi de HTML
session_start(); 

// 1. Inclure le Modèle
require_once('../model/user-model.php'); 
$userModel = new UserModel();

$erreur = null;

// 2. Vérifier si le formulaire a été soumis
if (isset($_POST['submit_connexion'])) {
    
    // Récupération des données
    $login = trim($_POST['login']);
    $password_saisi = $_POST['password']; // Mot de passe non haché, tel que saisi

    // --- LOGIQUE D'AUTHENTIFICATION ---
    
    if (empty($login) || empty($password_saisi)) {
        $erreur = "Veuillez remplir tous les champs.";
    } else {
        
        // 3. Récupérer l'utilisateur par le login via le Modèle
        $utilisateur = $userModel->getUserByLogin($login);

        // 4. Vérifier si l'utilisateur existe ET si le mot de passe est correct
        if ($utilisateur && password_verify($password_saisi, $utilisateur['password'])) {
            
            // 5. Authentification réussie : Création de la session
            $_SESSION['user_id'] = $utilisateur['id'];
            $_SESSION['user_login'] = $utilisateur['login'];
            
            // 6. Redirection vers la page d'accueil ou le livre d'or
            header('Location: livre-or.php'); // Ou index.php
            exit();

        } else {
            // 7. Échec de la connexion
            $erreur = "Login ou mot de passe incorrect.";
        }
    }
}

// 8. Inclure la Vue pour l'affichage du formulaire (avec les erreurs si elles existent)
include('../view/connexion.php'); 
?>