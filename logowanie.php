<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>Logowanie</title>
</head>
<body>
    <div class="header" id="header">
        <h1>Logowanie do konta</h1>
    </div>

    <div class="content">
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
            <input type="text" name="login" class="formInput" placeholder="Login"/><br>
            <input type="password" name="haslo" class="formInput" placeholder="Hasło"/><br><br>
            <input type="submit" name="submitLoguj" value="Zaloguj" class="formInputBtn"/>
        </form>

        <?php
            if(isset($_POST['submitLoguj'])){
                $connection = new mysqli('localhost', 'root', '', 'cd4ti');
                if($connection->connect_error) { die("Błąd połączenia: " .$connection->connect_error); }

                //Zapisuje dane z formularza do zmiennych po przepuszczeniu przez funckję validującą
                $loginFormularz = trim($_POST['login']);
                $hasloFormularz = trim($_POST['haslo']);
                $hasloFormularz = md5($hasloFormularz, FALSE);
                $sql = "SELECT login, haslo, stanowisko FROM uzytkownicy WHERE login = '$loginFormularz';";
            
                $result = $connection->query($sql);
            
                $obj = $result->fetch_object();
                $loginUzytkownika = $obj->login;
                $hasloUzytkownika = $obj->haslo;
                $stanowisko = $obj->stanowisko;

                if($loginFormularz === $loginUzytkownika && $hasloFormularz === $hasloFormularz) {
                    $_SESSION['username'] = $loginUzytkownika;
                    echo "<script> przekieruj('profil.php'); </script>";
                }else {
                    $loginUzytkownika = $hasloUzytkownika = $stanowisko = "";
                    echo "<srcipt> alert('Błędny login lub hasło!'); </srcipt>";
                }
            }
        ?>
        <!-- Cofnięcie do poprzedniej strony -->
        <button class="formInputBtn" id="confnijBtn"><a href ="index.php">Cofnij</a></button>
    </div>
    
</body>
</html>