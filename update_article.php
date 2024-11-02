<?php
session_start();
require_once 'bdd.php';

try {
    if (isset($_POST['slug'], $_POST['title'], $_POST['content'])) {
        $slug = $_POST['slug'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        $stmt = $connexion->prepare("UPDATE article SET title = :title, content = :content WHERE slug = :slug");


        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);


        if ($stmt->execute()) {
            echo "L'article a été mis à jour avec succès.";
            header("Location: index.php");
        } else {
            echo "Erreur lors de la mise à jour de l'article.";
            header("Location: index.php");
        }
    } else {
        echo "Données manquantes.";
    }
} catch (PDOException $e) {
    echo "Erreur SQL : " . $e->getMessage();
}
?>
