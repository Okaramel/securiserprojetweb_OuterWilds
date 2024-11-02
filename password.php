<?php

$plainPassword = "admin";

$hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT, []);

echo '<p>'.$plainPassword . ' devient ' . $hashedPassword . '</p>';

if(password_verify('admin', $hashedPassword)) {
    echo '<p> Les mots de passe correspondent</p>';
} else {
    '<p>Mauvais mot de passe</p>';
}

?>