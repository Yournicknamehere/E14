<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>Zarejestrowano</title>
</head>
<body>
    <div class="header" id="header">
        <h1>Pomyślnie dodano użytkownika do bazy!</h1>
    </div>

    <div class="content">
        <?php
            //Tworzy połączenie z bazą danych
            $connection = new mysqli('localhost', 'root', '', 'cd4ti');
            if ($connection->connect_error) {
                die("Błąd połączenia: " . $connection->connect_error);
            }

            //Zapisuje dane z formularza do zmiennych po przepuszczeniu przez funckję validującą
            $login = trim($_POST['login']);
            $haslo1 = trim($_POST['haslo1']);
            $haslo2 = trim($_POST['haslo2']);
            $data = "";

            $sql = ""; //Czyści zmienną przechowującą zapytanie SQL w razie gdyby przechowywała poprzednie zapytanie

            //Sprawdza czy pole formularza nie są puste
            if(empty($login) || empty($haslo1) || empty($haslo2)) {
                echo "<p>Nie dodano użytkownika, ponieważ co najmniej jedno z pól nie zostało uzupełnione!</p><br>";
            }
            else {
                if($haslo1 != $haslo2) { echo "<p>Nie dodano użytkownika, ponieważ hasła nie są jednakowe!</p><br>"; }
                else {
                    $haslo = md5($haslo1, FALSE);
                    $sql = "INSERT INTO uzytkownicy (login, haslo) VALUES ('$login', '$haslo');";
                    if($connection->query($sql) === TRUE){
                        echo "<p>Dodano użytkownika</p><br>";
                    }else{
                        echo "Error: " . $sql . "<br>" . $connection->error;
                    }
                }

                //Czyści zmienne
                $sql = $haslo = $haslo1 = $haslo2 = $login = "";
                
                
            }

            //Zamyka połączenie z bazą
            $connection->close();
        ?>
        <!-- Powrót do strony głównej -->
        <button class="formInputBtn"><a href ="index.php">Cofnij</a></button>
    </div>
    
</body>
</html>