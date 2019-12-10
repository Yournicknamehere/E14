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
    <script>
        window.console = window.console || function(t) {};
    </script>
    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>
</head>
<body>
    <div class="header" id="header">
        <a href="<?php echo $_SERVER["PHP_SELF"]; ?>" class="logo">Logowanie</a>
        <div class="header-right">
            <a href="#sidebar" id="openNav" class="openNav" onclick="openNav()">☰</a>
        </div>
    </div>

    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <p>Menu</p>
        <?php
            if(isset($_SESSION['userAccountType']) && $_SESSION['userAccountType'] === "Administrator"){
                echo "<a href='aktualizowanie.php'>Aktualizacja danych</a>";
                echo "<a href='dodawanie.php'>Dodawanie klientów</a>";
                echo "<a href='usuwanie.php'>Usuwanie klientów</a>";
                echo "<a href='wyswietlDescribe.php'>Struktura tabel</a>";
                echo "<a href='wyswietlTabela.php'>Lista klientów</a>";
                echo "<a href='zegarek.php'>Zegar</a>";
                echo "<a href='zmianaStylu.php'>Edycja CSS</a>";
            } elseif(isset($_SESSION['userAccountType']) && $_SESSION['userAccountType'] === "Uzytkownik"){
                echo "<a href='wyswietlDescribe.php'>Struktura tabel</a>";
                echo "<a href='wyswietlTabela.php'>Lista klientów</a>";
                echo "<a href='zegarek.php'>Zegar</a>";
                echo "<a href='zmianaStylu.php'>Edycja CSS</a>";
            } else {
                echo "<a href='logowanie.php'>Zaloguj</a>";
                echo "<a href='rejestrowanie.php'>Rejestracja</a>";
            }
        ?>
    </div>

    <div class="content">
        <div class="container">
            <h2>Panel logowania<small>designed by Google</small></h2>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
                <div class="group">
                    <input type="text" name="login" maxlength="50" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Login</label>
                </div>
                <div class="group">
                    <input type="password" name="haslo" maxlength="50" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Hasło</label>
                </div>
                <p>Nie masz jeszcze konta? <a href="rejestrowanie.php"><b>Załóż je!</b></a></p>
                <input type="submit" name="submitLoguj" value="Zaloguj"/>
            </form>
        </div>
        
        <?php
            if(isset($_POST['submitLoguj'])){
                $connection = new mysqli('localhost', 'root', '', 'cd4ti');
                if($connection->connect_error) { die("Błąd połączenia: " .$connection->connect_error); }

                //Zapisuje dane z formularza do zmiennych po przepuszczeniu przez funckję validującą
                $loginFormularz = trim($_POST['login']);
                $hasloFormularz = trim($_POST['haslo']);
                $hasloFormularz = md5($hasloFormularz, FALSE);
                $sql = "SELECT login, imie, nazwisko, email, haslo, stanowisko FROM uzytkownicy WHERE login = '$loginFormularz';";
            
                $result = $connection->query($sql);
            
                $obj = $result->fetch_object();
                $loginUzytkownika = $obj->login;
                $hasloUzytkownika = $obj->haslo;
                $stanowisko = $obj->stanowisko;

                if($loginFormularz === $loginUzytkownika && $hasloFormularz === $hasloUzytkownika) {
                    $_SESSION['userName'] = $loginUzytkownika;
                    $_SESSION['userFirstName'] = $obj->imie;
                    $_SESSION['userLastName'] = $obj->nazwisko;
                    $_SESSION['userEmail'] = $obj->email;
                    $_SESSION['userAccountType'] = $stanowisko;
                    $loginUzytkownika = $hasloUzytkownika = $stanowisko = $hasloFormularz = $loginFormularz = "";
                    echo "<script> przekieruj('profil.php'); </script>";
                }else {
                    $loginUzytkownika = $hasloUzytkownika = $stanowisko = $hasloFormularz = $loginFormularz = "";
                    echo "<srcipt> alert('Błędny login lub hasło!'); </srcipt>";
                }
            }
        ?>
    </div>
    
</body>
</html>