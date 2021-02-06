<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Leadva</title>
    </head>
    <body style="background-image:url(Kepek/pizzahatter.png);background-repeat:no-repeat;background-size:cover;height:auto;">
        <?php 
            $db = mysqli_connect('localhost', 'root', '', 'registration');
            if(isset($_POST["choice"]))
            {
                $food = $_POST["choice"];
                $c = count($food);
                $price = 0;
                $allfood = "";

                for ($i=0; $i < $c; $i++) 
                { 
                   if ($food[$i]=="1600") 
                   {
                    $price = $price + 1600*$_POST["1"];
                    $allfood = $allfood . "Gombás:".$_POST["1"]." db ";
                   }
                   if ($food[$i]=="1800") 
                   {
                    $price = $price + 1800*$_POST["2"];
                    $allfood = $allfood . "Hawaii:".$_POST["2"]." db ";
                   }
                   if ($food[$i]=="2000") 
                   {
                    $price = $price + 2000*$_POST["3"];
                    $allfood = $allfood . "Húsimádó:".$_POST["3"]." db ";
                   }
                   if ($food[$i]=="1500") 
                   {
                    $price = $price + 1500*$_POST["4"];
                    $allfood = $allfood . "Kukoricás:".$_POST["4"]." db ";
                   }
                   if ($food[$i]=="1850") 
                   {
                    $price = $price + 1850*$_POST["5"];
                    $allfood = $allfood . "Mexikói:".$_POST["5"]." db ";
                   }
                   if ($food[$i]=="1650") 
                   {
                    $price = $price + 1650*$_POST["6"];
                    $allfood = $allfood . "Négysajtos:".$_POST["6"]." db ";
                   }
                   if ($food[$i]=="1700") 
                   {
                    $price = $price + 1700*$_POST["7"];
                    $allfood = $allfood . "Fokhagymás-tejfölös-sonkás:".$_POST["7"]." db ";
                   }
                   if ($food[$i]=="1900") 
                   {
                    $price = $price + 1900*$_POST["8"];
                    $allfood = $allfood . "Szalámis:".$_POST["8"]." db ";
                   }
                   if ($food[$i]=="1950") 
                   {
                    $price = $price + 1950*$_POST["9"];
                    $allfood = $allfood . "Baconos-tojásos:".$_POST["9"]." db ";
                   }
                   if ($food[$i]=="1750") 
                   {
                    $price = $price + 1750*$_POST["10"];
                    $allfood = $allfood . "Sonkás:".$_POST["10"]." db ";
                   }
                   if ($food[$i]=="2100") 
                   {
                    $price = $price + 2100*$_POST["11"];
                    $allfood = $allfood . "Kívánság:".$_POST["11"]." db ";
                   }
                   if ($food[$i]=="1890") 
                   {
                    $price = $price + 1890*$_POST["12"];
                    $allfood = $allfood . "Gyrosos:".$_POST["12"]." db ";
                   }
                }
                $username = $_SESSION['username'];
            }

            if(isset($_POST['rendel']))
            {
                $cim = $_POST['Cim'];
                $validcim = preg_match('@^[A-Za-záéiíoóöőuúüűÁÉIÍOÓÖŐUÚÜŰ]{1,}\s+\w{0,}\s{0,}\.{0,}\s{0,}\d+\.{0,1}$@', $cim);
                //Ez a validáció a következő címformátumokat fogadja el:
                // péterfia utca 10.  péterfia u. 10.  péterfia 10  péterfia 10. 
                // konkrétan minden utcamegadási módot, csak betűvel kezdődjön, és tartalmazzon számot. 
                // Az utcanév és szám között viszont kötelező min. 1. space.
                if (!$validcim)
                {
                    echo "<p style='color:black; text-align:center; font-size:50px;font-weight: bold;'><span style='background-color:red'>" .  "A megadott cím nem felel meg a magyar normáknak!" ."</span></p>";
                    header( "Refresh:5; url='rendeles.php'");
                }

                $megjegyzes = $_POST['megjegyzes'];
                if (!isset($_POST['choice']) && empty($cim)) 
                {
                    echo "<p style='color:black; text-align:center; font-size:50px;font-weight: bold;'><span style='background-color:red'>" . "A rendeléshez választanod kell valamit!" ."</span></p>";
                    echo "<p style='color:black; text-align:center; font-size:50px;font-weight: bold;'><span style='background-color:red'>" . "Cím megadása kötelező!" . "</span></p>";
                    echo "<p style='color:black; text-align:center; font-size:50px;font-weight: bold;'><span style='background-color:red'>" . "Amíg nem adsz meg címet, a rendelés érvénytelen!" . "</span></p>";
                    echo "<p style='color:black; text-align:center; font-size:50px;font-weight: bold;'><span style='background-color:red'>" . "A Rendelés oldalra visszatérünk 5mp múlva automatikusan, vagy a vissza gomb megynomásval visszatérhet." . "</span></p>";
                    header( "Refresh:5; url='rendeles.php'");
                }
                    
                 if (!isset($_POST['choice']) && !empty($cim)) 
                {
                    echo "<p style='color:black; text-align:center; font-size:50px;font-weight: bold;'><span style='background-color:red'>" . "A rendeléshez választanod kell valamit!" . "</span></p>";
                    echo "<p style='color:black; text-align:center; font-size:50px;font-weight: bold;'><span style='background-color:red'>" . "A Rendelés oldalra visszatérünk 5mp múlva automatikusan, vagy a vissza gomb megynomásval visszatérhet." . "</span></p>";
                    header( "Refresh:5; url='rendeles.php'");
                }

                if(empty($cim) && isset($_POST['choice']))
                {
                    echo "<p style='color:black; text-align:center; font-size:50px;font-weight: bold;'><span style='background-color:red'>" . "Cím megadása kötelező!" . "</span></p>";
                    echo "<p style='color:black; text-align:center; font-size:50px;font-weight: bold;'><span style='background-color:red'>" . "Amíg nem adsz meg címet, a rendelés érvénytelen!" . "</span></p>";
                    echo "<p style='color:black; text-align:center; font-size:50px;font-weight: bold;'><span style='background-color:red'>" . "A Rendelés oldalra visszatérünk 5mp múlva automatikusan, vagy a vissza gomb megynomásval visszatérhet." . "</span></p>";
                    header( "Refresh:5; url='rendeles.php'");
                }
                    
                if(isset($_POST['choice']) && !empty($cim) && $validcim)
                {
                    $date = date("Y-m-d H:i:s"); //aktuális dátum lekérése
                    echo "<p style='color:black; text-align:center; font-size:60px;font-weight: bold;'><span style='background-color:red'>" . "Végösszeg:" .$price. "</span></p>";
                    echo "<p style='color:black; text-align:center; font-size:60px;font-weight: bold;'><span style='background-color:red'>" . "Köszönjük a rendelését: <br>".$username. "</span></p>";
                    echo "<p style='color:black; text-align:center; font-size:60px;font-weight: bold;'><span style='background-color:red'>" . "Kiszállítás egy órán belül várható.". "</span></p>";
                    $result = "INSERT INTO rendeles (felhasznalonev,cim,rendeltek,vegosszeg,megjegyzes,datum) VALUES('$username','$cim','$allfood', '$price','$megjegyzes','$date')";
                    $_SESSION['price'] = $price;
                    mysqli_query($db, $result);
                }
            }   
        ?>
     <style>
        body, html 
        {
          height: 100%;
        }
    </style>
    </body>
</html>