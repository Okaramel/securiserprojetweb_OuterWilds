<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion Admin</title>
</head>
<body class="connexion_admin">
    <form class="connexion_admin_form" action="traitementadmin.php" method="post">
        <h2 class="connexion_admin_title">Connexion Admin</h2>

        <div class="connexion_admin_input">
            <div class="connexion_admin_user">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" required>
            </div>    
            <div class="connexion_admin_pass">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
        </div>

        <input class="connexion_admin_submit" type="submit" value="Se connecter">
    </form>
</body>
</html>