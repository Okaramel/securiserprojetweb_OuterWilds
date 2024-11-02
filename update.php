<?php
session_start();
require_once 'bdd.php';

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];

    $stmt = $connexion->prepare("SELECT * FROM article WHERE slug = :slug");
    $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
    $stmt->execute();
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        echo "Article introuvable.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Article</title>
</head>
<body>
    <h1>Modifier l'Article</h1>
    <form action="update_article.php" method="POST">
        <input type="hidden" name="slug" value="<?php echo htmlspecialchars($article['slug']); ?>">

        <label for="title">Titre :</label>
        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($article['title']); ?>" required>
        <br><br>

        <label for="content">Contenu :</label>
        <textarea name="content" id="content" rows="5" cols="30" required><?php echo htmlspecialchars($article['content']); ?></textarea>
        <br><br>

        <input type="submit" value="Enregistrer les modifications">
    </form>
</body>
</html>


