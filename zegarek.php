<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>Zegarek</title>
</head>
<body onload="zegarek()">
    <div class="header" id="header">
        <a href="<?php echo $_SERVER["PHP_SELF"]; ?>" class="logo">Zegarek</a>
        <div class="header-right">
            <a class="active" href="profil.php">
                <?php
                    if(isset($_SESSION['userName']) && !empty($_SESSION['userName'])) { echo "Witaj, " .$_SESSION['userName'] ."!"; }
                    else { echo "Witaj, Gość!"; } 
                ?>
            </a>

            <a href="#sidebar" id="openNav" onclick="openNav()">☰</a>
        </div>
    </div>

    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <p>Menu</p>
        <a href="profil.php">Profil</a>
        <a href="wyswietlTabela.php">Lista klientów</a>
        <a href="wyswietlDescribe.php">Struktura tabel</a>
    </div>

    <div class="content">
        <h2>Aktualnie jest godzina</h2>
        <p id="zegar"></p>

        <button class="formInputBtn"><a href ="index.php">Cofnij</a></button>
    </div>
    
</body>
</html>