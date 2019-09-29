<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <title>Zaktualizowano</title>
</head>
<body>
    <div class="header">
        <h1>Aktualizowanie danych klienta</h1>
    </div>

    <div class="content">
       <?php
            //tworzy połączenie z bazą danych
            $connection = new mysqli('localhost', 'root', '', 'cd4ti');
            if ($connection->connect_error){
                die("Błąd połączenia: " . $connection->connect_error);
            }

            //przypisywanie pobranych danych do zmiennych
            $klient = $_POST['jakiKlient'];
            $noweDane = $_POST['noweDane'];
            $jakieDane = $_POST['jakieDane'];

            //wysyłanie zapytania SQL
            $sql = "UPDATE klienci SET $jakieDane = '$noweDane' WHERE nazwa = '$klient';";

            if($connection->query($sql) == TRUE){
                echo "<p>Pomyślnie zaktualizowano dane</p>";
            }else { echo "ERROR: " .$sql ."<br>" .$connection->error; }
            
            //zamyka połączenie z bazą
            $connection->close();
        ?>
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn"><a href ="index.php">Cofnij</a></button>
    </div>
    
</body>
</html>