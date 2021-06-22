<?php
    include('server.php');  
        $conn = new mysqli('localhost', 'root', '', 'registration');
        if ($conn->connect_error)
        {
	        die("Kapcsolódási hiba: " . $conn->connect_error);
        }
        $username = $_SESSION['username'];
        $result = $conn->query("SELECT * FROM `rendeles` WHERE felhasznalonev='$username'");
        if ($result->num_rows > 0) 
        {
            echo '<tr style="background-color:#337ab7"><th>Cím</th><th>Rendelt pizzák</th><th>Végösszeg</th><th>Megjegyzés</th><th>Dátum</th></tr>';
            while ($row = $result->fetch_assoc()) 
            {
                echo '<tr><td>'.$row['cim'].'</td><td>', $row['rendeltek'].'</td><td>', $row['vegosszeg'].' Ft</td><td>', $row['megjegyzes'].'</td><td>', $row['datum'].'</td></tr>';
            }
	    }
?>