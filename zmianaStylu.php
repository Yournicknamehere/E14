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
            <a class="active" href="profil.php">
                <?php
                    if(isset($_SESSION['userName']) && !empty($_SESSION['userName'])) { echo "Witaj, " .$_SESSION['userName'] ."!"; }
                    else { echo "Witaj, Gość!"; } 
                ?>
            </a>

            <a href="#wyloguj">Wyloguj</a>
            <a href="zegarek.php">Zegarek</a>
        </div>
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

        <button class="formInputBtn"><a href ="menu.php">Cofnij</a></button>
    </div>
    
</body>
</html>