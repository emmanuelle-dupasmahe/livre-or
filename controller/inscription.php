<?php
// On démarre la session (obligatoire pour utiliser $_SESSION)
session_start(); 

// 1. Inclure le Modèle
// Le chemin d'accès au fichier doit être correct par rapport à l'emplacement de ce contrôleur
require_once('../model/user-model.php'); 
$userModel = new UserModel();

// Variable pour stocker les messages d'erreur à passer à la Vue
$erreur = null;

// 2. Vérifier si le formulaire a été soumis
if (isset($_POST['submit_inscription'])) {
    
    // Récupération et nettoyage des données du formulaire
    $login = trim($_POST['login']);
    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];

    // --- LOGIQUE DE VÉRIFICATION ET VALIDATION ---
    
    if (empty($login) || empty($password) || empty($conf_password)) {
        $erreur = "Veuillez remplir tous les champs.";
    } elseif ($password !== $conf_password) {
        $erreur = "Les mots de passe ne correspondent pas.";
    } elseif (strlen($password) < 6) { 
        $erreur = "Le mot de passe doit contenir au moins 6 caractères.";
    } else {
        
        // 3. Vérification de l'existence du login via le Modèle
        $user_exists = $userModel->getUserByLogin($login);

        if ($user_exists) {
            $erreur = "Ce login est déjà utilisé. Veuillez en choisir un autre.";
        } else {
            // 4. Hachage du mot de passe pour la sécurité
            // Utiliser toujours password_hash pour stocker les mots de passe !
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            
            // 5. Insertion dans la base de données via le Modèle
            $inscription_ok = $userModel->registerUser($login, $password_hashed);

            if ($inscription_ok) {
                // 6. Redirection vers la page de connexion
                header('Location: connexion.php');
                exit();
            } else {
                $erreur = "Une erreur est survenue lors de l'inscription.";
            }
        }
    }
}

// 7. Inclure la Vue pour l'affichage du formulaire (avec les erreurs si elles existent)
// Le chemin d'accès au fichier doit être correct par rapport à l'emplacement de ce contrôleur
include('../view/inscription.php'); 
?>