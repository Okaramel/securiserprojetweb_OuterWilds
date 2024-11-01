<?php

try {
    $connexion = new PDO('mysql:host=localhost;dbname=newsecu', 'root', '');
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Erreur de connexion : " . $e->getMessage());
    
    die("Une erreur est survenue. Veuillez réessayer plus tard.");
}