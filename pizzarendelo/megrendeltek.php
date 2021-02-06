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
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/other/bootstrap.min.css">
  <script src="bootstrap/other/jquery-3.5.1.min.js"></script>
  <script src="bootstrap/other/popper.min.js"></script>
    <title>Admin oldal</title>
</head>
<body style="background-color: #FFDDA2">
    <h1 style="color:#337ab7;font-size:50px;text-align:center">Üdvözöllek az admin oldalon!</h1>
    <p style="text-align:center;"><a href="adminreg.php" style="color:#337ab7;font-size:40px;">Új admin/user felvétele</a></p>
    <p style="text-align:center;"><a href="rendeles.php?logout='1'" style="color:red;font-size:30px;">Kijelentkezés</a></p>
    <div class="container">
    <div class="table-responsive">
        <table style="width:100%" id="show" class="table table-dark table-bordered">
        </table>
    </div>     
    </div>      
	<script type="text/javascript" src="bootstrap/other/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
                $('#show').load('data.php')
			}, 1000);
        });
    </script>
    <style>
     th,td
     {
        text-align:center;
        max-width:200px;
     }
     td
     {
        word-break: break-word;
     }
    </style>
</body>
</html>