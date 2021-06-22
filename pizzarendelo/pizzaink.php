<!DOCTYPE html>
<html lang="hu">
<head>
  <title>Pizzáink</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/3.4.1/bootstrap.min.css">
  <script src="bootstrap/3.4.1/bootstrap.min.js"></script>
  <script src="masonry-docs/masonry.pkgd.min.js"></script>
</head>
<body style="background-image:url(Kepek/oldalhoz/hatter.jpg)">
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
        <h3><?php echo $row['ar'];?></h3>
</div>
    

<?php
      }
    }
  else
    {
      "Nincs rögzített adat a pizzák táblában!";
    }
  ?>
  </div>
</body>
    <footer> 
        <div class="row">
        <div class="col-xs-12 col-sm-6 col-lg-3">
        <p style="text-align:center"><a href="register.php" style="font-family:fantasy; color: white;font-size: 50px;">Rendelés</a></p>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-3">
        <p style="text-align:center"><a href="pizza.php" style="font-family:fantasy; color: white;font-size: 50px;">Főoldal</a></p>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-3">
        <p style="text-align:center"><a href="#top" style="font-family:fantasy; color: white;font-size: 50px;">Tetejére</a></p>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-3">
        <p style="text-align:center"><a href="rolunk.php"style="font-family:fantasy; color: white;font-size: 50px;">Rólunk</a></p>
        </div>
        </div>
    </footer>
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
      .masonryholder{
        column-count:1 ;
      }
    }
    @media screen and (min-width:569px)
    {
      .masonryholder{
        column-count: 2;
      }
    }
    @media screen and (min-width:1028px)
    {
      .masonryholder{
        column-count: 3;
      }
    }
    @media screen and (min-width:1280px)
    {
      .masonryholder{
        column-count: 4;
      }
    }
    </style>
</html>
