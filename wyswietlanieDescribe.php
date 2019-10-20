<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>Struktura tabeli</title>
</head>
<body>
    <div class="header">
        <h1>Struktura tabeli</h1>
    </div>

    <div class="content">
    <div class="tabelaKlienci">
       <?php
            $connection = new mysqli('localhost', 'root', '', 'cd4ti');
            if ($connection->connect_error){
                die("Błąd połączenia: " . $connection->connect_error);
            }

            echo "<p>Wybierz tabelę, której struktórę chcesz wyświetlić</p>";
            $result = $connection->query("SHOW tables;");
            echo "<form action='wyswietlDescribe.php' method='POST'>";
            echo "<select name='jakaTabela'>";
            while($obj = $result->fetch_object()) {
                echo "<option>" .$obj->Tables_in_cd4ti  ."</option>";
            }
            echo "</select><br><br>";
            echo "<input type='submit' name='submitBtn' value='Wybierz' class='formInputBtn'/><br>";
            echo "</form>";

            //Zwalnianie pamięci
            $result->free();


            //Zamyka połączenie z bazą
            $connection->close();
        ?>
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn"><a href ="index.php">Cofnij</a></button>
    </div>
    </div>

</body>
</html>