<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>The Livre d'Or</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <main>
        <h2>Livre d'Or - Tous les Commentaires</h2>

        <?php if ($est_connecte): ?>
            <p><a href="commentaire.php" class="button-action">Ajouter un commentaire</a></p>
        <?php else: ?>
            <p>Connectez-vous pour laisser un message ! <a href="controller/connexion.php">Connexion</a></p>
        <?php endif; ?>

        <?php if (empty($commentaires)): ?>
            <p>Soyez le premier à laisser un message !</p>
        <?php else: ?>
            <section class="commentaires-list">
                <?php foreach ($commentaires as $com): ?>
                    <article class="commentaire-entry">
                        <p class="meta">
                            Posté le <?= date('d/m/Y', strtotime($com['date'])) ?> par <?= htmlspecialchars($com['auteur_login']) ?>
                        </p>
                        <blockquote class="message-text">
                            <?= nl2br(htmlspecialchars($com['commentaire'])) ?>
                        </blockquote>
                        <hr>
                    </article>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>
        
        <p><a href="index.php">Retour à l'accueil</a></p>
    </main>

</body>
</html>