<?php
session_start();

require_once 'bdd.php';

$sql = "SELECT * FROM article";
$liste = $connexion->query($sql);

if (
    !isset($_SESSION['csrf_article_add']) || empty($_SESSION['csrf_article_add'])){

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

    </form>
    <h1>Liste des articles</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>slug</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $liste->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['slug']; ?></td>
                <td>
                    <form action="delete.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?');">Supprimer</button>
                    </form>
                </td>
                <td>
                <a href="update.php?slug=<?php echo urlencode($row['slug']); ?>">Edit</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
</body>
</html>