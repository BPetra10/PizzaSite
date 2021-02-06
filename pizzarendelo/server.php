<?php 
        session_start();

    //változók inicializálása
        $username = ""; 
        $usertype = ""; 
        $email = "";
        $errors = array();

    //kapcpsolódás az adatbázishoz
   $db = mysqli_connect('localhost', 'root', '', 'registration'); //tudom ez így nem biztonságos, de így nem kell létrehoznia tanár úrnak xamppba felhasznalót
    
   //Ha a kapcsolódás sikertelen lenne:
   if (!$db) 
    {
        die("Kapcsolódás sikertelen: " . mysqli_connect_error());
    }

    //regisztráció gomb megnyomásakor
    if(isset($_POST['register']))
    {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $usertype = mysqli_real_escape_string($db, $_POST['usertype']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
        
        //Az űrlapmezők megfelelően vannak-e kitöltve
        if(empty($username))
        {
            array_push($errors,"Felhasználónév kötelező!");
        }
        else 
        {
            if (strlen($username) < 5) 
            {
                array_push($errors,"Felhasználónév hossza minimum 5 karakter!");
            }
        }
        
        if(empty($email))
        {
            array_push($errors,"Email cím kötelező!");
        }
        else 
        {
            // email megfelelő formátumú-e?
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
                array_push($errors,"Az email cím nem megfelelő formátumú!");
            }
        }

        //Követelmény: kis,nagybetű,speciális karakter,min.8 karakter,szám
            $uppercase = preg_match('@[A-Z]@', $password_1);
            $lowercase = preg_match('@[a-z]@', $password_1);
            $number    = preg_match('@[0-9]@', $password_1);
            $specialChars = preg_match('@[^\w]@', $password_1);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password_1) < 8) 
            {
                array_push($errors,"Jelszó min. 8 karakteres, számot, speciális karaktert, kis és nagybetűt tartalmazó legyen!");
            }
        
         if(empty($password_1))
        {
            // Jelszó követelmények
            array_push($errors,"Jelszó kötelező!");
        }
        
         if($password_1 != $password_2)
        {
            array_push($errors,"A két jelszó nem egyezik meg!");
        }

        //adatbázist ellenőrizni kell
        $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        //A felhasználó létezik-e már, illetve az email-lel regisztráltak-e már?
        if ($user) 
        {
          if ($user['username'] === $username) 
          {
            array_push($errors, "A felhasználó már létezik.");
          }
      
          if ($user['email'] === $email) 
          {
            array_push($errors, "Ezzel az email-lel már regisztráltak!");
          }
        }

        //Ha nincs hiba, menti a felhasználót az adatbázisba
        if (count($errors) == 0) 
        {
            $password = sha1($password_1);//Jelszótitkosítás (sha), mielőtt eltároljuk az adatbázisban
            $date = date("Y-m-d H:i:s"); //aktuális dátum lekérése
            $query = "INSERT INTO users (username, email, usertype, password,date) VALUES('$username', '$email', '$usertype', '$password','$date')";
            mysqli_query($db, $query);
            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = $usertype;
            if ($usertype=='admin') 
            {
                header('location: megrendeltek.php');
            }
            else
            {
                header('location: rendeles.php');
            }
        }
    }

    //login oldalon ellenőrzés
    if(isset($_POST['login']))
    {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        if(empty($username))
        {
            array_push($errors,"Felhasználónév kötelező!");
        }
    
         if(empty($password))
        {
            array_push($errors,"Jelszó kötelező!");
        }

        if(count($errors) == 0)
        {
            $password = sha1($password); //Titkosítjuk a jelszót (sha), mielőtt összehasonlítjuk az adatbázisban lévővel
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
            $results = mysqli_query($db,$query);
            if (mysqli_num_rows($results) == 1) //felhasználó keresés
            {
                //vizsgaljuk, hogy a bejelentkezett felhasználó admin, vagy átlag user-e?
                $logged_in_user = mysqli_fetch_assoc($results);
                if ($logged_in_user['usertype'] == 'admin') 
                {
                    $_SESSION['username'] = $username;
                    //ha admin, akkor a megrendeltek oldalra irányít
				    header('location: megrendeltek.php');		  
                }
                else
                {
                    $_SESSION['username'] = $username;
                    //ha csak sima user, akkor a rendeles oldalra irányít
				    header('location: rendeles.php');
                } 
            }
            else
            {
                array_push($errors,"Nem megfelelő felhasználónév és jelszó kombináció!");
            }  
        } 
    }

    //kijelentkezés
    if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

    //adminnak új admin és user regisztrálásának biztosítása:
     //regisztráció gomb megnyomásakor
     if(isset($_POST['adminregister']))
     {
         $username = mysqli_real_escape_string($db, $_POST['username']);
         $email = mysqli_real_escape_string($db, $_POST['email']);
         $usertype = mysqli_real_escape_string($db, $_POST['usertype']);
         $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
         $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
         
         //Az űrlapmezők megfelelően vannak-e kitöltve
        if(empty($username))
        {
            array_push($errors,"Felhasználónév kötelező!");
        }
        else 
        {
            if (strlen($username) < 5) 
            {
                array_push($errors,"Felhasználónév hossza minimum 5 karakter!");
            }
        }
        
        if(empty($email))
        {
            array_push($errors,"Email cím kötelező!");
        }
        else 
        {
            // email megfelelő formátumú-e?
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
                array_push($errors,"Az email cím nem megfelelő formátumú!");
            }
        }
 
         //Követelmény: kis,nagybetű,speciális karakter,min.8 karakter,szám
             $uppercase = preg_match('@[A-Z]@', $password_1);
             $lowercase = preg_match('@[a-z]@', $password_1);
             $number    = preg_match('@[0-9]@', $password_1);
             $specialChars = preg_match('@[^\w]@', $password_1);
 
             if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password_1) < 8) 
             {
                 array_push($errors,"Jelszó min. 8 karakteres, számot, speciális karaktert, kis és nagybetűt tartalmazó legyen!");
             }
         
          if(empty($password_1))
         {
             // Jelszó követelmények
             array_push($errors,"Jelszó kötelező!");
         }
         
          if($password_1 != $password_2)
         {
             array_push($errors,"A két jelszó nem egyezik meg!");
         }
 
         //adatbázist ellenőrizni kell
         $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
         $result = mysqli_query($db, $user_check_query);
         $user = mysqli_fetch_assoc($result);
         
         //A felhasználó létezik-e már, illetve az email-lel regisztráltak-e már?
         if ($user) 
         {
           if ($user['username'] === $username) 
           {
             array_push($errors, "A felhasználó már létezik.");
           }
       
           if ($user['email'] === $email) 
           {
             array_push($errors, "Ezzel az email-lel már regisztráltak!");
           }
         }
 
         //Ha nincs hiba, menti a felhasználót az adatbázisba
         if (count($errors) == 0) 
         {
             $password = sha1($password_1);//Jelszótitkosítás (sha), mielőtt eltároljuk az adatbázisban
             $date = date("Y-m-d H:i:s"); //aktuális dátum lekérése
             $query = "INSERT INTO users (username, email, usertype, password,date) VALUES('$username', '$email', '$usertype', '$password','$date')";
             mysqli_query($db, $query);
             $_SESSION['username'] = $username;
             $_SESSION['usertype'] = $usertype;
             header('location: siker.html');
        }
     } 
?>