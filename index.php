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
<body onload="zegarek()">
    <div class="header">
        <h1>Menu</h1>
    </div>

    <div class="content">
        <h2>Wybierz pozycję z menu</h2>
        <button class="menuButton"><a href="dodawanie.php">Dodawanie klientów</a></button>
        <button class="menuButton"><a href="wyswietl.php">Wyświetlanie danych z bazy</a></button>
        <button class="menuButton"><a href="wyswietlTabela.php">Tabela klientów</a></button>
        <button class="menuButton"><a href="aktualizowanie.php">Aktualizacja danych</a></button><br>
        <button class="menuButton"><a href="zegarek.html">Zegarek</a></button>

        <p id="zegar"></p>
    </div>
    
</body>
</html>