<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>Zaktualizowano</title>
</head>
<body>
    <div class="header">
        <h1>Aktualizowanie danych klienta</h1>
    </div>

    <div class="content">
       <?php
            //Tworzy połączenie z bazą danych
            $connection = new mysqli('localhost', 'root', '', 'cd4ti');
            if ($connection->connect_error){
                die("Błąd połączenia: " . $connection->connect_error);
            }

            //Zapisuje dane z formualrza do zmiennych
            $klient = $_POST['jakiKlient'];
            $noweDane = $_POST['noweDane'];
            $jakieDane = $_POST['jakieDane'];
            $sql = NULL;

            //Sprawdza czy pola formualrza nie są puste
            if(empty($klient) || empty($noweDane) || empty($jakieDane)) {
                echo "Nie można zaktualizować danych klienta, ponieważ co najmniej jedno pole formularza nie zostało wypełnione!<br>";
            }else{
                //Zapisuje zapytanie SQL do zmiennej (tylko jeśli poprawnie wypełniono formularz)
                $sql = "UPDATE klienci SET $jakieDane = '$noweDane' WHERE nazwa = '$klient';";

                if($connection->query($sql) === TRUE) { echo "<p>Pomyślnie zaktualizowano dane</p>"; }
                else { echo "ERRORL " .$sql ."<br>" .$connection->error; }
            }
            
            //Zamyka połączenie z bazą
            $connection->close();
        ?>
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn"><a href ="index.php">Cofnij</a></button>
    </div>
    
</body>
</html>