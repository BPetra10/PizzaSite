<?php

include('server.php'); 
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

$targetDir = "Kepek/pizzak/";
if(!empty($_FILES["kep"]["name"]))
{  
    $fileName = basename($_FILES["kep"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
}
if(!empty($_POST['nev']))
{
    //Pizzanév:
    $name = mysqli_real_escape_string($db, $_POST['nev']);
}
if(!empty($_POST['ar']))
{
    //Ár:
    $price = mysqli_real_escape_string($db, $_POST['ar']);
}

$db = mysqli_connect('localhost', 'root', '', 'registration');

if(isset($_POST["feltolt"]) && !empty($_FILES["kep"]["name"]) && $name!="" && $price!="")
{
    // Engedélyezett fájlformátumok.
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes))
    {
        // Fájlfeltöltés, ha a kép megfelő.
        if(move_uploaded_file($_FILES["kep"]["tmp_name"], $targetFilePath))
        {
            $insert = $db->query("INSERT INTO pizzak (nev,kep,ar) VALUES ('$name','$fileName','$price')");

            if($insert)
            {
                $statusMsg = "A pizza sikeresen feltöltve!";
            }
            else
            {
                $statusMsg = "Sikertelen pizzafeltöltés.";
            } 
        }
        else
        {
            $statusMsg = "Hiba a pizza feltöltésekor.";
        }
    }
    else
    {
        $statusMsg = 'Csak JPG, JPEG, PNG fájlformátum megengedett.';
    }
}
else
{
    $statusMsg = 'Töltsön ki minden mezőt!';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pizza feltöltés</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
<h1 style="text-align:center;color:#337ab7;font-size:40px;">Kedves admin!</h1>
<h2 style="text-align:center;color:#337ab7;font-size:40px;">Itt tölthet fel új pizzát:</h2>
<div id="content">
    <div class="header">
        <h2>Pizzafeltöltés</h2>
    <div id="message_div"><?php echo $statusMsg;?></div> 
    </div>  
    <form action="pizzaupload.php" method="post" enctype="multipart/form-data">
        <div class="input-group">   
        <label>Pizzanév:</label>
            <input type="text" name="nev" id="nev">
        </div>
        <div style="margin: 10px 0px 10px 10px;">
        <label style="margin: 3px;">Pizzakép:</label>
            <input type="file" name="kep" id="kep">
        </div>
        <div class="input-group">
        <label>Pizza ár:</label>
            <input type="text" name="ar" id="ar">
        </div>
        <div>
             <input type="submit" value="Feltöltés" name="feltolt" id="feltolt">
         </div>
    </form>
</div>
<script>
//Hibaüzenetek kiíratása 3 másodpercig.
function hideMessage() 
{
    document.getElementById("message_div").style.display = "none";
};
setTimeout(hideMessage, 3000);
</script>
</body>
<footer> 
    <p style="text-align:center"><a href="megrendeltek.php" style="color: #337ab7; font-size:30px;"><b>Visssza a megrendelésekhez</b></a></p>
</footer>
<style>
*
{
    margin: 0px;
    padding: 0px;
}

body
{
    font-size: 120%;
    background-color: #FFDDA2;
}

.header
{
    width: 30%;
    min-width: 400px;
    margin: 30px auto 0px;
    color: white;
    background: #337ab7;
    text-align: center;
    border: 1px solid black;
    border-bottom: none;
    border-radius: 10px 10px 0px 0px;
    padding: 20px;
}

form
{
    width: 30%;
    min-width: 400px;
    margin: 0px auto;
    padding: 20px;
    border: 1px solid black;
    background: white;
    border-radius: 0px 0px 10px 10px;
}

#feltolt
{
    padding: 10px;
    font-size: 15px;
    color: white;
    border: 1px solid black;
    background: #337ab7;
    border-radius: 5px;
    margin: 10px 0px 10px 10px;
}

.input-group
{
    margin: 10px 0px 10px 10px;
}

.input-group label
{
    display: block;
    text-align: left;
    margin: 3px;
}

.input-group input
{
    height: 30px;
    width: 93%;
    padding: 10px 10px;
    font-size: 16px;
    border: 1px solid gray;
}

#message_div
{
    width: 92%;
    margin: 0px auto;
    padding: 10px;
    border: 1px solid #a94442;
    color: #a94442;
    background: #f2dede;
    border-radius: 5px;
    text-align: left;
}
</style>
</html>