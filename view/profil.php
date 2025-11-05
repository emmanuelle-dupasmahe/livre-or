<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <main>
        <h2>Mon Profil</h2>
        <p>Connecté en tant que : <strong><?= htmlspecialchars($utilisateur['login']) ?></strong></p>

        <?php
        // Affichage des messages de succès et d'erreur
        if (isset($success)) {
            echo "<p style='color: green;'>$success</p>";
        }
        if (isset($erreur)) {
            echo "<p style='color: red;'>$erreur</p>";
        }
        ?>

        <form action="profil.php" method="POST">
            <h3>Modifier le Login</h3>
            <div>
                <label for="new_login">Nouveau Login :</label>
                <input type="text" id="new_login" name="new_login" 
                       value="<?= htmlspecialchars($utilisateur['login']) ?>" required>
            </div>
            
            <h3>Modifier le Mot de Passe (Laissez vide si vous ne voulez pas le changer)</h3>
            <div>
                <label for="new_password">Nouveau Mot de passe :</label>
                <input type="password" id="new_password" name="new_password">
            </div>
            
            <div>
                <label for="conf_password">Confirmer Mot de passe :</label>
                <input type="password" id="conf_password" name="conf_password">
            </div>
            
            <button type="submit" name="submit_profil">Mettre à jour le Profil</button>
        </form>

        <p><a href="index.php">Retour à l'accueil</a></p>
    </main>

</body>
</html>