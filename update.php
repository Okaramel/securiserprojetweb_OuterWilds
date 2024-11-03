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
    <link rel="stylesheet" href="style.css">
    <title>Modifier l'Article</title>
</head>
<body>
    <form class="form_card" action="update_article.php" method="POST">
        <div class="form_card_0">
            <h1 class="form_card_title">Modifier l'Article</h1>
            <input type="hidden" name="slug" value="<?php echo htmlspecialchars($article['slug']); ?>">
            <div class="form_card_01">
                <label for="title">Titre :</label>
                <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($article['title']); ?>" required>
            </div>
            <div class="form_card_2">
                <label for="content">Contenu :</label>
                <textarea name="content" id="content" rows="5" cols="30" required><?php echo htmlspecialchars($article['content']); ?></textarea>
            </div>
            
            <input class="form_card_submit" type="submit" value="Enregistrer les modifications">
        </div>
    </form>
</body>
</html>


