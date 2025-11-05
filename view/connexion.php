<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Livre d'Or</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <main>
        <h2>Connexion</h2>

        <?php
        // Affichage des messages d'erreur si le contrôleur en a renvoyé
        if (isset($erreur)) {
            echo "<p style='color: red;'>$erreur</p>";
        }
        ?>

        <form action="connexion.php" method="POST">
            <div>
                <label for="login">Login :</label>
                <input type="text" id="login" name="login" required>
            </div>
            
            <div>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" name="submit_connexion">Se connecter</button>
        </form>

        <p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous ici</a>.</p>
    </main>

</body>
</html>