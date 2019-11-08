<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>Usuwanie</title>
</head>
<body>
    <div class="header" id="header">
        <h1>Usuwanie klientów</h1>
    </div>

    <div class="content">
        <?php
            $connection = new mysqli("localhost", "root", "", "cd4ti");
            if($connection->connect_error){ die("Błąd połączenia: " .$connection->connect_error); }
            
            $klient = $_POST['jakiKlient'];
            $sql = "DELETE FROM klienci WHERE nazwa='$klient';";

            if($connection->query($sql) === TRUE) { echo "<p>Pomyślnie usunięto klienta!</p>"; }
            else { echo "ERROR: " .$sql ."<br>" .$connection->error ."<br><br>"; }

            //Zamyka połączenie z bazą
            $connection->close();
        ?>
       
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn"><a href ="index.php">Cofnij</a></button>
    </div>
    
</body>
</html>