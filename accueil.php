<?php

require_once 'bdd.php';

$sql = "SELECT * FROM article";
$liste = $connexion->query($sql);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Liste des Articles</title>
</head>
<body>
    <header class="accueil_header">
        <div></div>
        <h1>Liste des Articles</h1>
        <a href="admin.php">Connexion</a>
    </header>

    <main class="accueil_main">
        <?php if ($liste->rowCount() > 0): ?>
            <?php while ($row = $liste->fetch(PDO::FETCH_ASSOC)): ?>
                <div>
                    <h2 class="article_card_title"><?php echo htmlspecialchars($row['title']); ?></h2>
                    <p class="article_card_text"><?php echo htmlspecialchars($row['content']); ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Aucun article trouvé.</p>
        <?php endif; ?>
    </main>
</body>
</html>