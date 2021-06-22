<?php include('server.php'); 
//ha a felhasználó nincs bejelentkezve, nem érheti el ezt az oldalt
    if(empty($_SESSION['username']))
    {
        header('location: login.php');
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
        <div class="sidenav">
            <h3 style="color:white; text-align:center; font-weight: bold;">Válassza ki a rendelését!</h3>
            <form action ="index.php" method="post">
            <p><input type="checkbox" name="choice[]" value="1600" onclick="totalIt()"> <b>Gombás pizza</b> <br> Ár: 1600 Ft Mennyiség: 
            <input type="number" min="0" max="9" value="0" name="1" class="quantity" onchange="totalIt()" oninput="validity.valid||(value='0');" 
            onKeyPress="if(this.value.length==1) return false;"><p>

            <p><input type="checkbox" name="choice[]" value="1800" onclick="totalIt()"> <b>Hawaii pizza</b> <br> Ár: 1800 Ft Mennyiség: 
            <input type="number" min="0"  max="9" value="0" name="2" class="quantity" onchange="totalIt()"  oninput="validity.valid||(value='0');" 
            onKeyPress="if(this.value.length==1) return false;"></p>

            <p><input type="checkbox" name="choice[]" value="2000" onclick="totalIt()"> <b>Húsimádó pizza</b> <br> Ár: 2000 Ft Mennyiség: 
            <input type="number" min="0"  max="9" value="0" name="3" class="quantity" onchange="totalIt()"  oninput="validity.valid||(value='0');" 
            onKeyPress="if(this.value.length==1) return false;"></p>

            <p><input type="checkbox" name="choice[]" value="1500" onclick="totalIt()"> <b>Kukoricás pizza</b> <br> Ár: 1500 Ft Mennyiség: 
            <input type="number" min="0"  max="9" value="0" name="4" class="quantity" onchange="totalIt()"  oninput="validity.valid||(value='0');" 
            onKeyPress="if(this.value.length==1) return false;"></p>

            <p><input type="checkbox" name="choice[]" value="1850" onclick="totalIt()"><b>Mexikói pizza</b> <br>  Ár: 1850 Ft Mennyiség: 
            <input type="number" min="0"  max="9" value="0" name="5" class="quantity" onchange="totalIt()"  oninput="validity.valid||(value='0');" 
            onKeyPress="if(this.value.length==1) return false;"></p>

            <p><input type="checkbox" name="choice[]" value="1650" onclick="totalIt()"> <b>Négysajtos pizza</b> <br>  Ár: 1650 Ft Mennyiség: 
            <input type="number" min="0"  max="9" value="0" name="6" class="quantity" onchange="totalIt()"  oninput="validity.valid||(value='0');" 
            onKeyPress="if(this.value.length==1) return false;"></p>

            <p><input type="checkbox" name="choice[]" value="1700" onclick="totalIt()"> <b>Fokhagymás-tejfölös-sonkás pizza</b> <br> Ár: 1700 Ft Mennyiség: 
            <input type="number" min="0"  max="9" value="0" name="7" class="quantity" onchange="totalIt()"  oninput="validity.valid||(value='0');" 
            onKeyPress="if(this.value.length==1) return false;"></p>

            <p><input type="checkbox" name="choice[]" value="1900" onclick="totalIt()"> <b>Szalámis pizza</b> <br> Ár: 1900 Ft Mennyiség: 
            <input type="number" min="0"  max="9" value="0" name="8" class="quantity" onchange="totalIt()"  oninput="validity.valid||(value='0');" 
            onKeyPress="if(this.value.length==1) return false;"></p>

            <p><input type="checkbox" name="choice[]" value="1950" onclick="totalIt()"> <b>Baconos-tojásos pizza</b> <br> Ár: 1950 Ft Mennyiség: 
            <input type="number" min="0"  max="9" value="0" name="9" class="quantity" onchange="totalIt()"  oninput="validity.valid||(value='0');" 
            onKeyPress="if(this.value.length==1) return false;"></p>

            <p><input type="checkbox" name="choice[]" value="1750" onclick="totalIt()"> <b>Sonkás pizza</b> <br> Ár: 1750 Ft Mennyiség: 
            <input type="number" min="0"  max="9" value="0" name="10" class="quantity" onchange="totalIt()" oninput="validity.valid||(value='0');" 
            onKeyPress="if(this.value.length==1) return false;"></p>

            <p><input type="checkbox" name="choice[]" value="2100" onclick="totalIt()"> <b>Kívánság pizza</b> <br> Ár: 2100 Ft Mennyiség: 
            <input type="number" min="0"  max="9" value="0" name="11" class="quantity" onchange="totalIt()" oninput="validity.valid||(value='0');" 
            onKeyPress="if(this.value.length==1) return false;"></p>

            <p><input type="checkbox" name="choice[]" value="1890" onclick="totalIt()"> <b>Gyrosos pizza</b> <br> Ár: 1890 Ft Mennyiség: 
            <input type="number" min="0"  max="9" value="0" name="12" class="quantity" onchange="totalIt()" oninput="validity.valid||(value='0');" 
            onKeyPress="if(this.value.length==1) return false;"></p>
            <input type="button" value="Kiválasztottak törlése" onclick="torol();">
            <h4 id="total" style="color:white;"><b>Végösszeg: 0 Ft</b></h4>
            <textarea name="megjegyzes" rows="4" cols="30" maxlength="60" placeholder="Megjegyzés hozzáadásához kattintson ide"></textarea>
            <h4  style="color:white;"><b>Add meg a szállítási címed:<b></h4>
            <input type="text" name="Cim" maxlength="30">
            <input type="submit" value="Megrendel" name="rendel"><br><br>
            </form>
        </div>
<div class="main">
        <?php  if (isset($_SESSION['username'])) : ?>
    	<p style="color:black;font-size:25px;">Üdvözlet <strong><?php echo $_SESSION['username']; ?></strong>!</p>
      <p style="font-size:25px;"><a href="eddigrendelt.php" style="color: black">Eddigi rendeléseinek megtekintéséhez kattintson ide!</a></p>
        <p style="font-size:25px;"><a href="rendeles.php?logout='1'" style="color:black;">Kijelentkezés</a></p>
        <?php endif ?>    
  <div class="row equal">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Gombás pizza</div>
        <div class="panel-body"><img src="Kepek/oldalhoz/gombas.jpg" class="img-responsive" style="width:100%" alt="Gombás" title="Gombás"></div>
        <div class="panel-footer">Ár: 1600Ft<br> Vegetáriánus</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Hawaii pizza</div>
        <div class="panel-body"><img src="Kepek/oldalhoz/hawaii.jpg" class="img-responsive" style="width:100%" alt="Hawaii" title="Hawaii"></div>
        <div class="panel-footer">Ár: 1800Ft</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Húsimádó pizza</div>
        <div class="panel-body"><img src="Kepek/oldalhoz/husimado.jpg" class="img-responsive" style="width:100%" alt="Húsimádó" title="Húsimádó"></div>
        <div class="panel-footer">Ár: 2000Ft</div>
      </div>
    </div>
  </div> <br>
      
  <div class="row equal">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Kukoricás pizza</div>
        <div class="panel-body"><img src="Kepek/oldalhoz/kukoricas.jpg" class="img-responsive" style="width:100%" alt="Kukoricás" title="Kukoricás"></div>
        <div class="panel-footer">Ár: 1500Ft</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Mexikói pizza</div>
        <div class="panel-body"><img src="Kepek/oldalhoz/mexikoi.jpg" class="img-responsive" style="width:100%" alt="Mexikói" title="Mexikói"></div>
        <div class="panel-footer">Ár: 1850Ft</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Négysajtos pizza</div>
        <div class="panel-body"><img src="Kepek/oldalhoz/negysajtos.jpg" class="img-responsive" style="width:100%" alt="Négysajtos" title="Négysajtos"></div>
        <div class="panel-footer">Ár: 1650Ft<br> Vegetáriánus</div>
      </div>
    </div>
  </div> <br>
        
  <div class="row equal">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Fokhagymás-tejfölös-sonkás pizza</div>
        <div class="panel-body"><img src="Kepek/oldalhoz/tejfolos.jpg" class="img-responsive" style="width:100%" alt="Fokhagymás-tejfölös-sonkás" title="Fokhagymás-tejfölös-sonkás"></div>
        <div class="panel-footer">Ár: 1700Ft</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Szalámis pizza</div>
        <div class="panel-body"><img src="Kepek/oldalhoz/szalamis.jpg" class="img-responsive" style="width:100%" alt="Szalámis" title="Szalámis"></div>
        <div class="panel-footer">Ár: 1900Ft <br> 6 feltétel választható.</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Baconos-tojásos pizza</div>
        <div class="panel-body"><img src="Kepek/oldalhoz/bacon.jpg" class="img-responsive" style="width:100%" alt="Baconos-tojásos" title="Baconos-tojásos"></div>
        <div class="panel-footer">Ár: 1950Ft</div>
      </div>
    </div>
  </div><br>
        
  <div class="row equal">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Sonkás pizza</div>
        <div class="panel-body"><img src="Kepek/oldalhoz/sonkas.jpg" class="img-responsive" style="width:100%" alt="Sonkás" title="Sonkás"></div>
        <div class="panel-footer">Ár: 1750Ft</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Kívánság pizza</div>
        <div class="panel-body"><img src="Kepek/oldalhoz/kivansag.png" class="img-responsive" style="width:100%" alt="Kívánság" title="Kívánság"></div>
        <div class="panel-footer">Ár: 2100Ft <br> 6 feltétel választható.</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Gyrosos pizza</div>
        <div class="panel-body"><img src="Kepek/oldalhoz/gyrosos.jpg" class="img-responsive" style="width:100%" alt="Gyrosos" title="Gyrosos"></div>
        <div class="panel-footer">Ár: 1890Ft</div>
      </div>
    </div>
  </div>
</div>

        <style>
            textarea 
            {
                resize: none;  
            }
            
            p
            {
                font-size:15px;
                color:white;
                font-weight:normal;
            }
            .quantity
            {
                color:black;
            }

            .sidenav 
            {
                height: 100%;
                width: 325px;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color:#337ab7;
                overflow-x: hidden;
            }

            .main 
            {
              margin-left: 325px; /* Ugyanakakor mint a sidenav szélessége */
              font-size:20px; /*Görgetés engedélyezésért*/
              text-align:center;
              padding: 0px 10px;
            }

            @media screen and (max-height: 450px) 
            {
              .sidenav {padding-top: 10px;}
            }   

            .panel 
            {
             width: 100%;
             height: 100%;
             background-color:#e8ebe9;
            }
        
            .panel-footer
            {
             background-color:#e8ebe9;
             font-weight:normal;
            }
        
            @media (min-width: 992px) 
            {
                .equal
                {  
                display: -ms-flexbox;
                display: -webkit-flex;
                display: flex;
                }
            } 
            </style>
        <script>
                  if(performance.navigation.type == 2)
                  {
                    location.reload(true); //ez azért szükséges, hogyha a felhasználó visszagombot nyom, akkor az oldal alaphelyzetbe kerüljön
                  }
            function totalIt() 
            {
                var input = document.getElementsByName("choice[]");
                var input2 =  document.getElementsByClassName("quantity");
                var total = 0;
                    for (var i = 0; i < input.length; i++) 
                    {
                      if (input[i].checked) 
                      {
                        input2[i].min = 1;
                        if(input2[i].value==0)
                        {
                          input2[i].value=1;
                        }
                        total += parseFloat(input[i].value*input2[i].value);
                      }
                      else
                      {
                        input2[i].min = 0;
                        input2[i].value = 0;
                      }
                    }
                document.getElementById("total").innerHTML = "Végösszeg: " +total +" Ft";
            }

            function torol()
            {
              var input = document.getElementsByName("choice[]");
              var input2 =  document.getElementsByClassName("quantity");
                  for (var i = 0; i < input.length; i++) 
                  {
                    if (input[i].checked) 
                    {
                      input[i].checked = false;
                      input2[i].value = 0;
                    }
                  }
                document.getElementById("total").innerHTML = "Végösszeg: 0 Ft";
            }
        </script>
    </body>
</html>