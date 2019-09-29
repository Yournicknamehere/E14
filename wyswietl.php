<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <title>Dodano</title>
</head>
<body>
    <div class="header">
        <h1>Lista klientów</h1>
    </div>

    <div class="content">
       <?php
            //tworzy połączenie z bazą danych
            $connection = new mysqli('localhost', 'root', '', 'cd4ti');
            if ($connection->connect_error){
                die("Błąd połączenia: " . $connection->connect_error);
            }

            //zapytanie do bazy danych
            $z = $connection->query("SELECT nazwa, adres, miasto, kraj FROM klienci;");

            //tworzy rablice asocjacyjna '$r' i zapisuje do niej wynik zapytania ORAZ wyświetla dane
            while($r = $z->fetch_assoc()){
                echo "<b>Nazwa: </b>" .$r['nazwa'] ."<br>"  ."<b>Adres: </b>"  .$r['adres']  ."<br>"  ."<b>Miasto: </b>" .$r['miasto'] ."<br>" ."<b>Kraj: </b>" .$r['kraj'] ."<br>";
                echo "<br><br>";
            }

            //zwalnia pamięć
            $z->free();

            //zamyka połączenie z bazą
            $connection->close();
        ?>
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn"><a href ="<?php echo $_SERVER['HTTP_REFERER'];?>">Cofnij</a></button>
    </div>
    
</body>
</html>