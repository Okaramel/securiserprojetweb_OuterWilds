<?php

require_once 'bdd.php';

try {
    // Vérifiez si l'ID est défini et est un entier valide
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        // Convertir l'ID en entier pour éviter les injections
        $id = intval($_POST['id']);

        // Préparation de la requête SQL avec un paramètre
        $stmt = $connexion->prepare("DELETE FROM article WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécution de la requête
        if ($stmt->execute()) {
            echo "Article supprimé avec succès";
        } else {
            echo "Erreur lors de la suppression de l'article.";
        }
    } else {
        echo "ID d'article invalide.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
