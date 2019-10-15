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
    <div class="header">
        <h1>Struktura tabeli klienci</h1>
    </div>

    <div class="content">
    <div class="tabelaKlienci">
       <?php
            $connection = new mysqli('localhost', 'root', '', 'cd4ti');
            if ($connection->connect_error){
                die("Błąd połączenia: " . $connection->connect_error);
            }


            $result = $connection->query("DESCRIBE klienci;");
            echo "<table id='klienci'>";
            echo "<tr> <th>Field</th> <th>Type</th> </tr>";
            while($obj = $result->fetch_object()) {
                echo "<tr><td>" .$obj->Field  ."</td> <td>" .$obj->Type ."</td>  </tr>";
            }
            echo "</table><br>";

            $result->free();


            //Zamyka połączenie z bazą
            $connection->close();
        ?>
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn"><a href ="<?php echo $_SERVER['HTTP_REFERER'];?>">Cofnij</a></button>
    </div>
    </div>
    
</body>
</html>