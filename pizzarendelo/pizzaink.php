<!DOCTYPE html>
<html lang="hu">
<head>
  <title>Pizzáink</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/3.4.1/bootstrap.min.css">
  <script src="bootstrap/other/jquery-3.5.1.min.js"></script>
  <script src="bootstrap/3.4.1/bootstrap.min.js"></script>
</head>

<body style="background-image:url(Kepek/oldalhoz/hatter.jpg)">
<a href="#top"></a>
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
        <li><a href="pizza.php" id="navszo">Főoldal</a></li>
        <li><a id="navszo" href="register.php">Rendelés</a></li>
        <li><a href="rolunk.php" id="navszo">Rólunk</a></li>
      </ul>
    </div>
  </div>
</nav>

  <h1 name="top" style="font-family:fantasy; color: white;font-size: 50px; text-align: center">Pizzáink:</h1>
  <div class="masonryholder">

  <?php 
     $db = mysqli_connect('localhost', 'root', '', 'registration');
     $query = "SELECT * FROM pizzak";
     $query_run = mysqli_query($db,$query);
     $check_pizzak_rows = mysqli_num_rows($query_run) > 0;
    
    if ($check_pizzak_rows) 
    {
       while($row = mysqli_fetch_array($query_run))
       {
  ?>

    <div class="masonryblocks">
        <h2><?php echo $row['nev'];?></h2>
        <img src="Kepek/pizzak/<?php echo $row['kep'];?>" alt="<?php echo $row['nev'];?>" title="<?php echo $row['nev'];?>">
        <h3><?php echo $row['ar'];?> Ft</h3>
    </div>
    
<?php
      }
    }
    else
    {
      echo "<p style='color:red;font-size:30px;text-align:center;'>Nincs rögzített adat a pizzák táblában!</p>";
    }
  ?>
  </div>

<footer class="container-fluid bg-3 text-center">
  <a href="#top" class="top">Ugrás az oldal tetejére</a>
</footer>
</body>

  <style>
    h2,h3
    {
      text-align: center;
    }

    .masonryholder
    {
      column-count: 4;
      column-gap: 20px;
      margin: 0 auto; 
      max-width:1280px;
    }
    .masonryblocks
    {
      display:inline-block;
      background-color:white;
      padding:10px;
      margin: 0 0 15px;
      width: auto;
      box-sizing: border-box;
    }
    .masonryblocks img
    {
      width:100%;
    }

    @media screen and (max-width:568px)
    {
      .masonryholder
      {
        column-count:1 ;
      }
    }
    @media screen and (min-width:569px)
    {
      .masonryholder
      {
        column-count: 2;
      }
    }
    @media screen and (min-width:1028px)
    {
      .masonryholder
      {
        column-count: 3;
      }
    }
    @media screen and (min-width:1280px)
    {
      .masonryholder
      {
        column-count: 4;
      }
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

    #navszo
    {
      font-family:fantasy;
      color: #555555;
      font-size: 30px;
    }

    .top
    {
    font-family:fantasy;
    color:white;
    font-size: 40px;
    }
  </style>
</html>
