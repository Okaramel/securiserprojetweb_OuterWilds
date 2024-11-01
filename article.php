<?php
//article.php?s=article-1

if(!isset($_GET['s']) || empty($_GET['s'])) {
    die('<p>Article introuvable</p>');
}

//Connexion à la BDD
require_once 'bdd.php';

$getArticle = $connexion->prepare(
    query: 'SELECT title, content FROM Article WHERE slug = :slug LIMIT 1'
);

$getArticle->execute(params: [
    'slug' => htmlspecialchars(string: $_GET['s'])
]);

if($getArticle->rowCount() == 1){
$article = $getArticle->fetch();
echo '<h1>'. $article['title'] .'</h1>';
echo '<p>'. $article['content'] .'</p>';
}
else{
    echo '<p>Article introuvable</p>';
}

