<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - The Livre d'Or</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <main>
        <h2>Formulaire d'Inscription</h2>

        <?php
        // Affichage des messages d'erreur si le contrôleur en a renvoyé
        if (isset($erreur)) {
            echo "<p style='color: red;'>$erreur</p>";
        }
        ?>

        <form action="inscription.php" method="POST">
            <div>
                <label for="login">Login :</label>
                <input type="text" id="login" name="login" required>
            </div>
            
            <div>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div>
                <label for="conf_password">Confirmer Mot de passe :</label>
                <input type="password" id="conf_password" name="conf_password" required>
            </div>
            
            <button type="submit" name="submit_inscription">S'inscrire</button>
        </form>

        <p>Déjà un compte ? <a href="connexion.php">Connectez-vous ici</a></p>
    </main>

    </body>
</html>