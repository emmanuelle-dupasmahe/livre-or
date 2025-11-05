<?php
// Le Modèle pour interagir avec la table 'utilisateurs'

class UserModel {
    private $bdd; // La connexion à la base de données

    public function __construct() {
        // --- CONNEXION À LA BASE DE DONNÉES ---
        try {
            // Remplacez les valeurs (host, dbname, user, password) par les vôtres
            $this->bdd = new PDO('mysql:host=localhost;dbname=livreor;charset=utf8', 'votre_utilisateur', 'votre_mot_de_passe');
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    /**
     * Vérifie si un login existe déjà dans la base de données.
     */
    public function getUserByLogin($login) {
        $requete = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $requete->execute([$login]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Insère un nouvel utilisateur dans la base de données.
     */
    public function registerUser($login, $password_hashed) {
        $requete = $this->bdd->prepare(
            "INSERT INTO utilisateurs (login, password) VALUES (?, ?)"
        );
        // Exécution de la requête avec les données
        return $requete->execute([$login, $password_hashed]);
    }

/**
     * Met à jour le login d'un utilisateur.
     */
    public function updateLogin($id, $new_login) {
        $requete = $this->bdd->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
        return $requete->execute([$new_login, $id]);
    }

    /**
     * Met à jour le mot de passe d'un utilisateur.
     */
    public function updatePassword($id, $new_password_hashed) {
        $requete = $this->bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
        return $requete->execute([$new_password_hashed, $id]);
    }

    /**
     * Récupère un utilisateur par son ID.
     * Utile pour pré-remplir le formulaire ou vérifier l'identité.
     */
    public function getUserById($id) {
        $requete = $this->bdd->prepare("SELECT id, login FROM utilisateurs WHERE id = ?");
        $requete->execute([$id]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
}