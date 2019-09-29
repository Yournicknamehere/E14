<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>Aktualizacja</title>
</head>
<body style="font-size: 16px;">
    <div class="header">
        <h1>Aktualizacja danych klienta</h1>
    </div>

    <div class="content">
       <?php
            //tworzy połączenie z bazą danych
            $connection = new mysqli('localhost', 'root', '', 'cd4ti');
            if ($connection->connect_error){
                die("Błąd połączenia: " . $connection->connect_error);
            }
        ?>
           
        <form action="aktualizuj.php" method="POST">
            <input type="text" name="noweDane" placeholder="Tutaj wpisz nowe dane" class="formInput"/><br>
            Wybierz klienta, którego dane chcesz zmienić<br>
            <?php
                $z = $connection->query("SELECT nazwa FROM klienci;");
                
                echo "<select name='jakiKlient'>";
                while($r = $z->fetch_assoc()){
                    echo "<option>" .$r['nazwa']  ."</option>";
                }
                echo "</select>" ."<br><br>";

                $z->free();
                $connection->close();
            ?>
            oraz dane, które chcesz zmienić<br>
            <select name="jakieDane">
                <option>nazwa</option>
                <option>adres</option>
                <option>miasto</option>
                <option>kraj</option>
            </select><br><br>

            <input type="submit" name="okDane" value="Aktualizuj" class="formInputBtn"/>
            
        </form>
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn"><a href ="<?php echo $_SERVER['HTTP_REFERER'];?>">Cofnij</a></button>
    </div>
        
    
</body>
</html>