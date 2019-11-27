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
        <h1>Zegarek</h1>
        <button onclick="przekieruj('profil.php')">
            <?php
                if(isset($_SESSION['userName']) && !empty($_SESSION['userName'])) { echo "Witaj, " .$_SESSION['userName'] ."!"; }
                else { echo "Witaj, Gość!"; }
            ?>
        </button>
    </div>

    <div class="content">
        <h2>Aktualnie jest godzina</h2>
        <p id="zegar"></p>

        <button class="formInputBtn"><a href ="menu.php">Cofnij</a></button>
    </div>
    
</body>
</html>