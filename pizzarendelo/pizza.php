<!DOCTYPE html>
<html lang="hu">
<head>
  <title>Pizzarendelő</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/3.4.1/bootstrap.min.css">
  <script src="bootstrap/other/jquery-3.5.1.min.js"></script>
  <script src="bootstrap/3.4.1/bootstrap.min.js"></script>
</head>
<body>
<a name="top"></a>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" id="emojimeret">👨‍⚕️ 🍕 👩‍⚕️</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="pizzaink.php" id="navszo">Pizzáink</a></li>
        <li><a id="navszo" href="register.php">Rendelés</a></li>
        <li><a href="rolunk.php" id="navszo">Rólunk</a></li>
      </ul>
    </div>
  </div>
</nav>
    
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">Köszöntelek a Pizzarendelő oldalán!</h3>
  <img src="Kepek/oldalhoz/logo.png" class="img-responsive img-circle margin" style="display:inline" alt="Logo" title="Logo" width="350" height="350">
    <h3 class="bottom"><span>10-ből 9 orvos ajánlja!</span></h3>
</div>


<div class="container-fluid bg-2 text-center">    
  <h3 class="margin">Rövid információk</h3><br>
  <div class="row">
    <div class="col-xs-12 col-sm-4">
      <p class="info">Önarckép rólam:</p>
      <img src="Kepek/oldalhoz/onarckep.jpg" class="img-responsive margin" style="width:100%;" alt="Önarckép" title="Önarckép">
    </div>
    <div class="col-xs-12 col-sm-4"> 
      <p class="info">Leglelkesebb pincérünk:</p>
      <img src="Kepek/oldalhoz/pincer.png" class="img-responsive margin" style="width:100%;" alt="Hónap Pincére" title="Hónap Pincére">
    </div>
    <div class="col-xs-12 col-sm-4"> 
      <p class="info">Házhozszállító csapatunk:</p>
      <img src="Kepek/oldalhoz/hazhoz.jpg" class="img-responsive margin" style="width:100%;" alt="Házhozszállítás" title="Házhozszállítás">
    </div>
  </div>
</div>

<footer class="container-fluid bg-3 text-center">
  <a href="#top" class="top">Ugrás az oldal tetejére</a>
</footer>
    
<style>
    body 
{
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
    color: #f5f6f7;
}

p 
{
    font-size: 16px;
}

.margin 
{
    margin-bottom: 45px;
    font-family:fantasy;
    font-size: 45px;
}

.bottom, .top
{
    font-family:fantasy;
    color:white;
    font-size: 40px;
}

span
{
    background-color: black;
}

.bg-1 
{ 
    background-image: url(Kepek/oldalhoz/pizzabackground.jpg); 
    background-repeat:no-repeat;
    background-size: cover;
    color: #ffffff;
}

.bg-2 
{ 
    background-color:#FFDDA2; 
    color: #555555;
}

.bg-3
{ 
    background-color: #2f2f2f; 
    color: #fff;
}

.container-fluid 
{
    padding-top: 70px;
    padding-bottom: 70px;
}

.navbar 
{
    padding-top: 15px;
    padding-bottom: 15px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 15px;
    letter-spacing: 3px;
}

.navbar-nav  li a:hover 
{
    color: #1abc9c !important;
}

#emojimeret
{
    font-size: 50px;
}

.info, #navszo
{
    font-family:fantasy;
    color: #555555;
    font-size: 30px;
}
</style>   
</body>
</html>
