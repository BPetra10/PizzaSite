<?php include('server.php'); ?> 
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>Bejelentkezés</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Bejelentkezés</h2>
        </div>

        <form method="post" action="login.php">
        <!--Hibajelző php-->
        <?php  include('errors.php'); ?>

            <div class="input-group">
            <label>Felhasználónév:</label>
            <input type="text" maxlength="20" name="username">
            </div>
            
            <div class="input-group">
            <label>Jelszó:</label>
            <input type="password" maxlength="20" name="password">
            </div>
            
            <div class="input-group">
                <button type="submit" name="login" class="btn">Bejelentkezés</button>
            </div>
            <p>Még nem regisztrált? <a href="register.php" style="color: #337ab7">Regisztráljon!</a></p>
        </form>
    </body>
    <footer> 
        <div class="row">
        <p style="text-align:center"><a href="pizza.php" style="color: #337ab7; font-size:40px;"><b>Visssza a főoldalra</b></a></p>
        </div>
    </footer>
</html>