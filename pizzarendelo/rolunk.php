<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <title>Rólunk</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="bootstrap/4.1.3/bootstrap.min.css">
  <script src="bootstrap/other/jquery-3.3.1.slim.min.js"></script>
  <script src="bootstrap/other/popper.min.js"></script>
  <script src="bootstrap/4.1.3/bootstrap.min.js"></script>
</head>
<body style="background-color:#FFDDA2">
    <style>
        .carousel 
        {
            position: relative;
        }

        .carousel-caption 
        {
          position: absolute;
          background: rgba(0,0,0,0.4);
          padding: 15px 10px;
        }

       .carousel-control-prev,.carousel-control-next 
        {
          width: 5%;
        }
        h1
        {
             font-family:fantasy;
             color:crimson;
             font-size: 30px;
             text-align: center;
        }
    </style>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Rólunk</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="pizza.php">Főoldal</a>
      <a class="nav-item nav-link" href="pizzaink.php">Pizzáink</a>
      <a class="nav-item nav-link" href="register.php">Rendelés</a>
    </div>
  </div>
</nav>
    
   <div class="container">
    <div id="magicCarousel" class="carousel slide my-5" data-ride="carousel">
      
<!--    Carousel Indicators    -->
      <ol class="carousel-indicators">
        <li data-target="#magicCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#magicCarousel" data-slide-to="1"></li>
        <li data-target="#magicCarousel" data-slide-to="2"></li>
        <li data-target="#magicCarousel" data-slide-to="3"></li>
      </ol>
      
<!--    Carousel Slider    -->
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img src="Kepek/oldalhoz/pizzagyuro.jpg" class="d-block w-100">
          <div class="carousel-caption">
            <h3>Rövid történetünk</h3>
            <p>Családias hangulatú éttermünket 1991-ben nyitottuk meg a belváros szívében, mely Debrecen első olyan látványkonyhás pizzériája volt, ahol a helyszínen készítették el a pizza tésztát.</p>
          </div> 
        </div>
        
        <div class="carousel-item">
          <img src="Kepek/oldalhoz/terasz.jpg" class="d-block w-100">
          <div class="carousel-caption">
            <h3>Éttermünk</h3>
            <p>Tavasztól őszig kellemes terasszal, valamint hangulatos belső kialakítással várjuk pizzaimádó vendégeinket. </p>
          </div> 
        </div>
        
        <div class="carousel-item">
          <img src="Kepek/oldalhoz/nyitva.jpg" class="d-block w-100">
          <div class="carousel-caption">
            <h3>Nyitvatartásunk</h3>
            <p>Hétfőtől-szombatig 10-22-ig, vasárnap: zárva.<br>ONLINE RENDELÉS: Hétfőtől-szombatig 10:00-21:40-ig</p>
          </div> 
        </div>
        
        <div class="carousel-item">
          <img src="Kepek/oldalhoz/utalvany.jpg" class="d-block w-100">
          <div class="carousel-caption">
            <h3>Elfogadott utalványok</h3>
            <p>SZÉP kártya, Erzsébet, Ticket Restaurant, Sodexho. Mindenféle bankkártyával fizethet, akár a futárnál is.</p>
          </div> 
        </div>
        
<!--     Carousel Controls     -->
        <a href="#magicCarousel" class="carousel-control-prev" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a href="#magicCarousel" class="carousel-control-next" role="button" data-slide="next">
          <span class="carousel-control-next-icon"></span>
          <span class="sr-only">Next</span>
        </a>
        
      </div>
    </div>
  </div> 
</body>
</html>

