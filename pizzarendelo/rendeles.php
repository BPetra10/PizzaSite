<?php include('server.php'); 
//ha a felhasználó nincs bejelentkezve, nem érheti el ezt az oldalt
    if(empty($_SESSION['username']))
    {
        header('location: login.php');
    }

    $connect = mysqli_connect('localhost', 'root', '', 'registration');
 
    if(isset($_POST['kosarba']))
    {
      if(isset($_SESSION['kosarba']))
      {
        $item_array_id = array_column($_SESSION["kosarba"], "item_id"); 
        if(!in_array($_GET["id"], $item_array_id))  //megnézzük, hogy a pizza hozzá van-e már adva a kosárhoz
        {
          $count = count($_SESSION["kosarba"]);  //Eltároljuk, hogy hány elemünk van a tömbünkben
          $item_array = 
          array(  
            'item_id' =>  $_GET["id"],  
            'item_name' =>  $_POST["termeknevOssz"],  
            'item_price' => $_POST["termekarOssz"],  
            'item_quantity' =>  $_POST["quantity"]  
          ); 
          $_SESSION["kosarba"][$count] = $item_array; //tároljuk az adatokat a tömbben
        }
        else
        {
          echo '<script>alert("A pizza már a kosárban van!")</script>';  
          echo '<script>window.location="rendeles.php"</script>'; //MIután az alertet leokézza a vásárló, visszairányít a rendeles oldalra
        }
      }
      else
      {
        $item_array = 
        array(  
          'item_id' =>  $_GET["id"],  
          'item_name' =>  $_POST["termeknevOssz"],  
          'item_price' => $_POST["termekarOssz"],  
          'item_quantity' =>  $_POST["quantity"]  
        ); 
        $_SESSION["kosarba"][0] = $item_array; 
      }
    }

    if(isset($_GET["action"]))  
    {  
      if($_GET["action"] == "delete") //Ha az action = törlés 
      {  
        foreach($_SESSION["kosarba"] as $keys => $values)  
        {  
          if($values["item_id"] == $_GET["id"])  
          {  
            unset($_SESSION["kosarba"][$keys]);  
            echo '<script>alert("Pizza eltávolítva a kosárból.")</script>';  
            echo '<script>window.location="rendeles.php"</script>';  
          }  
        }  
      }  
    } 
?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/3.4.1/bootstrap.min.css">
        <script src="bootstrap/3.4.1/bootstrap.min.js"></script>
        <title>Rendelés</title>
    </head>
    <body style="background-color:#FFDDA2"> 
    <?php  if (isset($_SESSION['username'])) : ?>
      <h3 style="color:#337ab7;font-size:40px;text-align:center;">Válassza ki a rendelését kedves <strong><?php echo $_SESSION['username'];?></strong>!</h3>
      <p style="font-size:25px;text-align:center;">
      <a href="eddigrendelt.php" style="color:black;">Rendelési előzmények</a><span class="tab"></span>
      <a href="rendeles.php?logout='1'" style="color:black;">Kijelentkezés</a>
      </p>
    <?php endif ?>
    <div class="masonryholder">
    <?php 
      $query = "SELECT * FROM pizzak";
      $result = mysqli_query($connect,$query);
      $check_pizzak_rows = mysqli_num_rows($result) > 0;
    
      if ($check_pizzak_rows) 
      {
        while($row = mysqli_fetch_array($result))
       {
    ?>
      <div class="masonryblocks">
      <form action="rendeles.php?action=add&id=<?php echo $row["id"];?>" method="POST">
      <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" text-align="center">  
      <img src="Kepek/pizzak/<?php echo $row["kep"]; ?>" class="img-responsive">
      <h3 class="text-info" style="text-align:center;"><?php echo $row["nev"];?></h3>
      <h4 class="text-danger" style="text-align:center;"><?php echo $row["ar"];?> Ft</h4>  
      <input type="number" min="1" max="9" name="quantity" class="form-control" value="1" oninput="validity.valid||(value='1');" 
      onKeyPress="if(this.value.length==1) return false;">  
      <input type="hidden" name="termeknevOssz" value="<?php echo $row["nev"];?>">  
      <input type="hidden" name="termekarOssz" value="<?php echo $row["ar"];?>">  
      <input type="submit" name="kosarba" style="margin-top:5px;" class="btn btn-success" value="Kosárba">  
      </div> 
      </form>
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
    <div style="clear:both"></div><br>  
     <h3 style="text-align:center;margin:0;">Rendelési adatok:</h3>  
        <div class="table-responsive" style="width:80%; margin:auto;">  
          <table class="table table-bordered">  
            <tr style="background-color:#337ab7;">  
              <th width="30%">Pizzanév</th>  
              <th width="10%">Mennyiség</th>  
              <th width="10%">Ár</th>  
              <th width="15%">Összesen</th>  
              <th width="5%">Törlés</th>  
            </tr>
            <?php   
              if(!empty($_SESSION["kosarba"]))  //ha a kosár nem üres
              {  
                  $total = 0;  //Az összes pizzának az ára, amit rendelünk, tehát a végösszeg
                  foreach($_SESSION["kosarba"] as $keys => $values)  
                  {  
            ?>  
            <tr class="info">  
             <td><?php echo $values["item_name"]; ?></td>  
             <td><?php echo $values["item_quantity"]; ?></td>  
             <td><?php echo $values["item_price"]; ?> Ft</td>  
             <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?> Ft</td>  
             <td><a href="rendeles.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Törlés</span></a></td>  
            </tr>    
            <?php  
             $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                  }  
            ?>
             <tr style="background-color:#337ab7;">  
               <td colspan="3" style="text-align:right;color:#FFDDA2;font-weight:bold;">Végösszeg:</td>  
               <td style="color:#FFDDA2;font-weight:bold;"><?php echo number_format($total, 2); ?> Ft</td>  
               <td></td>  
              </tr>  
            <?php  
              }  
            ?>  
          </table>
        </div>
    </body>
    <script>
    //Ez a függvény megakadályozza, hogy a rendelő üresen hagyja a mennyiség mezőt.
        const numInputs = document.querySelectorAll('input[type=number]')
        numInputs.forEach(function(input) 
      { 
          input.addEventListener('change', function(e) 
        {
          if (e.target.value == '') 
          {
            e.target.value = 1
          }
        })
      })
    </script>
    <style>
    .tab
    {
      display: inline-block;
      margin-left: 80px;
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
        column-count: 1;
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
    </style>
</html>