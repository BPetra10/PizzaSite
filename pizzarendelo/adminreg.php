<?php include('server.php'); 
//ha a felhasználó nincs bejelentkezve, nem érheti el ezt az oldalt
if(empty($_SESSION['username']))
{
    header('location: login.php');
}

$username = $_SESSION['username'];
$user_check_query = "SELECT usertype FROM users WHERE username='$username' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

//Ezt az oldalt normál user ne tudja elérni.
if ($user['usertype'] === 'user') 
{
    //ha egy normál user akarja az admin oldalt elérni, visszadobja a rendeles feületre.
    //igazából ha a user kitaláláná a címet, csak akkor próbálhatná meg ezt az oldalt elérni.
    header('location: rendeles.php');
}
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>Regisztráció</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2>Admin által rögzített regisztráció</h2>
        </div>
        
        <form method="post" action="adminreg.php">
            <!--Hibajelző php-->
            <?php  include('errors.php'); ?>
            <p id="jelez" style="color:red;font-weight:bold"></p>
            <div class="input-group">
            <label>Felhasználónév:</label>
            <input type="text" name="username" maxlength="20">
            </div>
            
            <div class="input-group">
            <label>Email:</label>
            <input type="text" name="email" maxlength="40">
            </div>

            <div class="input-group">
            <label>Felhasználó típusa:</label>
            <select name="usertype">
            <option value="admin" selected="selected">admin</option>
            <option value="user">user</option>
            </select>
            </div>
            
            <div class="input-group">
            <label>Jelszó:</label>
            <input type="password" maxlength="20" name="password_1">
            </div>
            
            <div class="input-group">
            <label>Jelszó újra:</label>
            <input type="password" maxlength="20" name="password_2">
            </div>
            
            <div class="input-group">
                <button type="submit" name="adminregister" class="btn">Regisztráció</button>
            </div>
        </form>
    </body>
    <footer> 
        <div class="row">
        <p style="text-align:center"><a href="megrendeltek.php" style="color: #337ab7; font-size:40px;"><b>Visssza a megrendelésekhez</b></a></p>
        </div>
    </footer>
    <style>
        select 
        {
            width: 150px;
            font-size: 20px;
            border-radius: 5px 5px 5px 5px;
        }
        select:focus 
        {
            min-width: 150px;
            width: auto;
        } 
    </style>
</html>