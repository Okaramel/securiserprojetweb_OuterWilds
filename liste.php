<?php 

require_once 'bdd.php';

$sql = "SELECT * FROM article";
$result = $conn->query($sql);
?>