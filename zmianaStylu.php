<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>Edytowanie CSS</title>
</head>
<body>
    <div class="header" id="header">
        <a href="<?php echo $_SERVER["PHP_SELF"]; ?>" class="logo">Edytowanie CSS</a>
        <div class="header-right">
            <a href="#sidebar" id="openNav" class="openNav" onclick="openNav()">☰</a>
        </div>
    </div>

    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <p>Menu</p>
        <?php
            if($_SESSION['userAccountType'] === "Administrator"){
                echo "<a href='aktualizowanie.php'>Aktualizacja danych</a>";
                echo "<a href='dodawanie.php'>Dodawanie klientów</a>";
                echo "<a href='usuwanie.php'>Usuwanie klientów</a>";
                echo "<a href='wyswietlDescribe.php'>Struktura tabel</a>";
                echo "<a href='wyswietlTabela.php'>Lista klientów</a>";
                echo "<a href='zegarek.php'>Zegar</a>";
                echo "<a href='zmianaStylu.php'>Edycja CSS</a>";
            } elseif($_SESSION['userAccountType'] === "Uzytkownik"){
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
        <h2>Wystarczy nacisnąć ten przycisk</h2>
        <p>
            <button class="menuButton" onclick="ukryjBanner()">Ukryj banner</button>
            <button class="menuButton" onclick="pokazBanner()">Pokaż banner</button>
        </p>

        <h2>Możesz też zmienić kolorystykę strony!</h2>
        <p>
            <button class="menuButton" onclick="zmienKolor('zielony')" style="background: #1B5E20;"></button>
            <button class="menuButton" onclick="zmienKolor('niebieski')" style="background: #0D47A1;"></button>
        </p>

        <button class="formInputBtn"><a href ="index.php">Cofnij</a></button>
    </div>
    
</body>
</html>