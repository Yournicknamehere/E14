<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>Dodano</title>
</head>
<body>
    <div class="header">
        <h1>Dodano klienta</h1>
    </div>

    <div class="content">
        <?php
            //Tworzy połączenie z bazą danych
            $connection = new mysqli('localhost', 'root', '', 'cd4ti');
            if ($connection->connect_error) {
                die("Błąd połączenia: " . $connection->connect_error);
            }

            //Zapisuje dane z formularza do zmiennych
            $nazwa = $_POST['nazwa'];
            $adres = $_POST['adres'];
            $miasto = $_POST['miasto'];
            $kraj = $_POST['kraj'];
            $sql = NULL; 

            //Zapisuje zapytanie SQL do zmiennej
            $sql = "INSERT INTO klienci (nazwa, adres, miasto, kraj)
            VALUES ('$nazwa', '$adres', '$miasto', '$kraj');";

            //Sprawdza czy pole formularza nie są puste
            if(empty($nazwa) || empty($adres) || empty($miasto) || empty($kraj)) {
                echo "Nie dodano klienta, ponieważ co najmniej jedno z pól nie zostało uzupełnione! <br>";
            }
            else {
                //Zapisuje zapytanie SQL do zmiennej (tylko jeśli poprawnie wypełniono formularz)
                $sql = "INSERT INTO klienci (nazwa, adres, miasto, kraj)
                VALUES ('$nazwa', '$adres', '$miasto', '$kraj');";

                //Wykonuje zapytanie SQL (wysyła do bazy danych)...
                if($connection->query($sql) === TRUE) {
                    //... i wyświetla komunikat jeśli dodano pomyślnie...
                    echo "<p><b>Pomyślnie dodano klienta</b></p>" ."<br><br>";
                    echo "<b>Nazwa: </b>" .$nazwa ."<br>" ."<b>Adres: </b>" .$adres ."<br>" ."<b>Miasto: </b>" .$miasto ."<br>" ."<b>Kraj: </b>" .$kraj ."<br><br>";
                    //... lub błąd jeśli wystąpił problem
                }else { echo "Error: " . $sql . "<br>" . $connection->error; }
            }

            //Zamyka połączenie z bazą
            $connection->close();
        ?>
        <!-- Powrót do strony głównej -->
        <button class="formInputBtn"><a href ="index.php">Cofnij</a></button>
    </div>
    
</body>
</html>