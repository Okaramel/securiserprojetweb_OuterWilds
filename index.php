<?php
session_start();

require_once 'bdd.php';

$sql = "SELECT * FROM article";
$liste = $connexion->query($sql);

if (
    !isset($_SESSION['csrf_article_add']) ||
    empty($_SESSION['csrf_article_add'])
){
    $_SESSION['csrf_article_add'] = bin2hex(string: random_bytes(length: 32));
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="traitement.php" method="POST">
        <label for="title">Titre : </label>
        <input type="text" name="title" id="title" placeholder="Article 1">
        <br>
        <label for="content">Contenu : </label>
        <textarea name="content" id="content" rows="10" cols="30"></textarea>
        <br>
        <label for="slug">Slug : </label>
        <input type="text" name="slug" id="slug" placeholder="article-1">
        <br>
        <input type="hidden" name="token" value="<?=  $_SESSION['csrf_article_add']; ?>">
        <input type="submit" name="ajouter" value="Ajouter">

        <form method="POST" action="supprimer.php" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
    <input type="hidden" name="id" value="1">
    
    <button type="submit">Supprimer</button>

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
</form>
</body>
</html>