<?php

require_once 'bdd.php';

try {
    

// Vérifiez que toutes les données nécessaires sont présentes
if (isset($_POST['slug']) && isset($_POST['title']) && isset($_POST['content'])) {
    $slug = $_POST['slug'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Préparez la requête de mise à jour
    $stmt = $connexion->prepare("UPDATE article SET title = :title, content = :content WHERE slug = :slug");
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':content', $content, PDO::PARAM_STR);
    $stmt->bindParam(':slug', $slug, PDO::PARAM_STR); // Correction ici, utilisez PDO::PARAM_STR pour le slug

    // Exécutez la requête et vérifiez si elle a réussi
    if ($stmt->execute()) {
        echo "Article mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour de l'article.";
    }
} else {
    echo "Données manquantes ou ID invalide.";
}
} catch (PDOException $e) {
    echo "Erreur SQL : " . $e->getMessage();
}

?>

