<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>Klienci</title>
</head>
<body>
    <div class="header" id="header">
        <h1>Lista klientów</h1>
    </div>

    <div class="content">
    <div class="tabela">
       <?php
            //Tworzy połączenie z bazą danych
            $connection = new mysqli('localhost', 'root', '', 'cd4ti');
            if ($connection->connect_error){ die("Błąd połączenia: " . $connection->connect_error); }

            //Zapytanie do bazy danych
            $result = $connection->query("SELECT nazwa, adres, miasto, kraj FROM klienci;");

            //Tworzy rablice asocjacyjna '$tab' i zapisuje do niej wynik zapytania ORAZ wyświetla dane
            echo "<table id='tabela'>";
            echo "<tr> <th>Nazwa</th> <th>Adres</th> <th>Miasto</th> <th>Kraj</th> </tr>";
            while($tab = $result->fetch_assoc()){
                echo "<tr> <td>" .$tab['nazwa'] ."</td> <td>" .$tab['adres'] ."</td> <td>" .$tab['miasto'] ."</td> <td>" .$tab['kraj'] ."</td> </tr>";
            }
            echo "</table><br>";

            //Zwalnia pamięć
            $result->free();

            //Zamyka połączenie z bazą
            $connection->close();
        ?>
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn" id="confnijBtn"><a href ="<?php echo $_SERVER['HTTP_REFERER'];?>">Cofnij</a></button>
    </div>
    </div>
    
</body>
</html>