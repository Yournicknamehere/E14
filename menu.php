<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>Strona Główna</title>
</head>
<body>
    <div class="header" id="header">
        <a href="<?php echo $_SERVER["PHP_SELF"]; ?>" class="logo">Menu</a>
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
        <h2>Wybierz pozycję z menu</h2>
        <div id="menu">
            <p>
                <button class="menuButton" onclick="przekieruj('dodawanie.php')">Dodawanie klientów</button>
                <button class="menuButton" onclick="przekieruj('usuwanie.php')">Usuwanie klientów</button>
                <button class="menuButton" onclick="przekieruj('aktualizowanie.php')">Aktualizowanie danych</button>
            </p>
            <p>
                <button class="menuButton" onclick="przekieruj('wyswietlTabela.php')">Tabela klientów</button>
                <button class="menuButton" onclick="przekieruj('wyswietlDescribe.php')">Struktura tabeli</button>
                <button class="menuButton" onclick="przekieruj('rejestrowanie.php')">Rejestracja</button>
            </p>
            <p>
                <button class="menuButton" onclick="przekieruj('profil.php')">Profil</button>
                <button class="menuButton" onclick="przekieruj('zegarek.php')">Zegarek</button>
                <button class="menuButton" onclick="przekieruj('zmianaStylu.php')">Edytowanie CSS</button>
            </p>

        </div>
        
    </div>
</body>
</html>