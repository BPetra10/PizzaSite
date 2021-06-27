<?php include('server.php'); 
      $user_check_query = "SELECT usertype FROM users WHERE usertype='admin' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
      $ez = " ";
      if ($user) 
      {
        if ($user['usertype'] === 'admin') 
        {
            $ez = "admin";
        }
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
            <h2>Regisztráció</h2>
        </div>
        
        <form method="post" action="register.php">
            <!--Hibajelző php-->
            <?php  include('errors.php'); ?>
            <p id="jelez" style="color:red;font-weight:bold"></p>
            <div class="input-group">
            <label>Felhasználónév:</label>
            <input type="text" name="username" maxlength="20" value="<?php echo $username?>">
            </div>
            
            <div class="input-group">
            <label>Email:</label>
            <input type="text" name="email" maxlength="40" value="<?php echo $email?>">
            </div>

            <div class="input-group">
            <label>Felhasználó típusa:</label>
            <select name="usertype" onchange="selectChangeHandler(this)">
            <option value="admin" id="admin">admin</option>
            <option value="user" selected="selected">user</option>
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
                <button type="submit" name="register" class="btn">Regisztráció</button>
            </div>
            <p>Már van fiókja? <a href="login.php" style="color: #337ab7">Jelentkezzen be!</a></p>
        </form>
    </body>
    <footer> 
        <div class="row">
        <p style="text-align:center"><a href="pizza.php" style="color: #337ab7; font-size:40px;"><b>Visssza a főoldalra</b></a></p>
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
    <script>
    function selectChangeHandler(selectNode) 
    {
        if (selectNode.selectedIndex === 0) 
        {
            document.getElementById("jelez").innerHTML = "FIGYELEM: Ezen az oldalon 1 admin regisztrálható!<br>Ha regisztráltál 1-et nincs több lehetőséged!";
        }
        else
        {
            document.getElementById("jelez").innerHTML = "";
        }
    }
    function Remove_options()
        {
            var istrue = "<?php echo $ez?>"; 
            if(istrue=="admin")
            { 
            document.getElementById("admin").remove();
            }
        }
        window.onload = Remove_options;
</script>
</html>