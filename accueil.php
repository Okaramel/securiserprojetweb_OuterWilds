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
    <title>Liste des Articles</title>
</head>
<body>
    <h1>Liste des Articles</h1>

    <?php if ($liste->rowCount() > 0): ?>
            <?php while ($row = $liste->fetch(PDO::FETCH_ASSOC)): ?>
                <div>
                    <h1><?php echo htmlspecialchars($row['title']); ?></h1>
                    <p><?php echo htmlspecialchars($row['content']); ?></p>
            </div>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Aucun article trouvé.</p>
    <?php endif; ?>
</body>
</html>
