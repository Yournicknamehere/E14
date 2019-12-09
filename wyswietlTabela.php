<?php session_start(); ?>
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
        <a href="<?php echo $_SERVER["PHP_SELF"]; ?>" class="logo">Lista klientów</a>
        <div class="header-right">
            <a href="#sidebar" id="openNav" class="openNav" onclick="openNav()">☰</a>
        </div>
    </div>

    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <p>Menu</p>
        <?php
            if($_SESSION['userAccountType'] === "Administrator"){
                echo "<a href='aktualizowanie.php'>Aktualizacja danych</a>";
                echo "<a href='dodawanie.php'>Dodawanie klientów</a>";
                echo "<a href='usuwanie.php'>Usuwanie klientów</a>";
                echo "<a href='wyswietlDescribe.php'>Struktura tabel</a>";
                echo "<a href='wyswietlTabela.php'>Lista klientów</a>";
                echo "<a href='zegarek.php'>Zegar</a>";
                echo "<a href='zmianaStylu.php'>Edycja CSS</a>";
            } elseif($_SESSION['userAccountType'] === "Uzytkownik"){
                echo "<a href='wyswietlDescribe.php'>Struktura tabel</a>";
                echo "<a href='wyswietlTabela.php'>Lista klientów</a>";
                echo "<a href='zegarek.php'>Zegar</a>";
                echo "<a href='zmianaStylu.php'>Edycja CSS</a>";
            } else {
                echo "<a href='logowanie.php'>Zaloguj</a>";
                echo "<a href='rejestrowanie.php'>Rejestracja</a>";
            }
        ?>
    </div>

    <div class="content">
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <p>Wybierz sposób sortowania tabeli klientów</p>
            <select name="wedlug">
                <option value="nazwa" selected>Wg. nazwy</option>
                <option value="adres">Wg. adresu</option>
                <option value="miasto">Wg. miasta</option>
                <option value="kraj">Wg. kraju</option>
            </select>
            <p>oraz kolejność wyników</p>
            <select name="kolejnosc">
                <option value="ASC" selected>rosnąco</option>
                <option value="DESC">malejąco</option>
            </select><br><br>
            <input type="submit" name="submitTabela" value="Wyświetl" class="formInputBtn"/><br>
        </form>

    <div class="tabela">
       <?php

            if(isset($_POST["submitTabela"])){
                //Tworzy połączenie z bazą danych
                $connection = new mysqli('localhost', 'root', '', 'cd4ti');
                if ($connection->connect_error){ die("Błąd połączenia: " . $connection->connect_error); }

                //Pobiera dane z formularza
                $wedlug = $_POST["wedlug"];
                $kolejnosc = $_POST["kolejnosc"];

                //Zapisuje kwerendę zależnie od wybranych opcji w formularzu
                $sql = "SELECT nazwa, adres, miasto, kraj FROM klienci ORDER BY " .$_POST['wedlug'] ." " .$_POST['kolejnosc'] .";";
                
                //Wysyła zapytanie do bazy i zapisuje wynik do zmiennej $result
                $result = $connection->query($sql);

                //Tworzy tabelę HTML oraz tablicę asocjacyjną '$tab'
                echo "<table id='tabela'>";
                echo "<tr> <th>Nazwa</th> <th>Adres</th> <th>Miasto</th> <th>Kraj</th> </tr>";
                while($tab = $result->fetch_assoc()){
                    echo "<tr> <td>" .$tab['nazwa'] ."</td> <td>" .$tab['adres'] ."</td> <td>" .$tab['miasto'] ."</td> <td>" .$tab['kraj'] ."</td> </tr>";
                }
                echo "</table><br>";

                //Zwalnia pamięć
                $result->free();

                //Zamyka połączenie z bazą danych
                $connection->close();
            }
        ?>
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn" id="confnijBtn"><a href="index.php">Cofnij</a></button>
    </div>
    </div>
    
</body>
</html>