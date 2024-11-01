<?php

$plainPassword = "123";

$hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT, []);

echo '<p>'.$plainPassword . ' devient ' . $hashedPassword . '</p>';

if(password_verify('123', $hashedPassword)) {
    echo '<p> Les mots de passe correspondent</p>';
} else {
    '<p>Mauvais mot de passe</p>';
}

?>