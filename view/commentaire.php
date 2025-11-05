<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un commentaire</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <main>
        <h2>Poster votre commentaire</h2>

        <?php
        // Affichage des messages d'erreur ou de succès
        if (isset($erreur)) {
            echo "<p style='color: red;'>$erreur</p>";
        }
        ?>

        <form action="commentaire.php" method="POST">
            <div>
                <label for="commentaire">Votre message :</label>
                <textarea id="commentaire" name="commentaire" rows="10" required></textarea>
            </div>
            
            <button type="submit" name="submit_commentaire">Poster le commentaire</button>
        </form>

        <p><a href="livre-or.php">Retour au Livre d'Or</a></p>
    </main>

</body>
</html>