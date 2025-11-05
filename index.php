<?php
session_start();

// Variable pour savoir si l'utilisateur est connecté
$est_connecte = isset($_SESSION['user_id']);
$login_utilisateur = $est_connecte ? $_SESSION['user_login'] : 'Visiteur';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Le Livre d'Or</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <h1>Bienvenue sur Le Livre d'Or !</h1>
        <p>Bonjour, **<?= htmlspecialchars($login_utilisateur) ?>**.</p>
    </header>

    <main>
        <p>Ceci est la page d'accueil qui présente le site.</p>
        
        <h2>Navigation</h2>
        
        <nav>
            <ul>
                <?php if ($est_connecte): ?>
                    <li><a href="profil.php">Mon Profil</a></li>
                    <li><a href="livre-or.php">Voir le Livre d'Or</a></li>
                    <li><a href="deconnexion.php">Se Déconnecter</a></li>
                <?php else: ?>
                    <li><a href="controller/inscription.php">Inscription</a></li>
                    <li><a href="controller/connexion.php">Connexion</a></li>
                    <li><a href="livre-or.php">Voir le Livre d'Or</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        
    </main>

    <footer>
        <p>&copy; 2024 Livre d'Or</p>
    </footer>

</body>
</html>