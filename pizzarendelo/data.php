<?php
  $conn = new mysqli('localhost', 'root', '', 'registration');
        if ($conn->connect_error)
        {
	        die("Kapcsolódási hiba: " . $conn->connect_error);
        }
        $result = $conn->query("SELECT * FROM `rendeles` ORDER BY id DESC LIMIT 8;");
        if ($result->num_rows > 0) 
        {
            echo '<tr style="background-color:#337ab7"><th>Felhasználónév</th><th>Cím</th><th>Rendelt pizzák</th><th>Végösszeg</th><th>Megjegyzés</th><th>Dátum</th></tr>';
            while ($row = $result->fetch_assoc()) 
            {
                echo '<tr><td>'.$row['felhasznalonev'].'</td><td>', $row['cim'].'</td><td>', $row['rendeltek'].'</td><td>', $row['vegosszeg'].' Ft</td><td>', $row['megjegyzes'].'</td><td>',$row['datum'].'</td></tr>';
            }
	    }
?>