<?php
// on inclut le Modèle de commentaires
require_once('model/comment-model.php'); 
$commentModel = new CommentModel();

// on récupére les commentaires
$commentaires = $commentModel->getAllCommentsWithUser();

// On inclut le Header (qui démarre la session, affiche la navigation et ouvre <main>)
include('includes/header.php'); 
?>

<div class="hero">
    <h1>Bienvenue sur The Livre d'Or !</h1>
    <p>Bonjour, <?= htmlspecialchars($login_utilisateur) ?></p>
</div>

<h2>Les Derniers Messages du Livre d'Or</h2>

<p>Ceci est la page d'accueil. Consultez les messages ou connectez-vous pour laisser le vôtre.</p>

<?php if (empty($commentaires)): ?>
    <p>Aucun commentaire pour le moment. Soyez le premier !</p>
<?php else: ?>
    <section class="commentaires-list">
        <?php foreach ($commentaires as $com): ?>
            <article class="commentaire-entry">
                <p class="meta">
                    Posté le **<?= date('d/m/Y', strtotime($com['date'])) ?>** par **<?= htmlspecialchars($com['auteur_login']) ?>**
                </p>
                <blockquote class="message-text">
                    <?= nl2br(htmlspecialchars($com['commentaire'])) ?>
                </blockquote>
                <hr>
            </article>
        <?php endforeach; ?>
    </section>
<?php endif; ?>

<?php
// on inclut le Footer (qui ferme </main>, </body>, </html>)
include('includes/footer.php');
?>