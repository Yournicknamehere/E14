<?php
    session_start();
    require '/xampp/htdocs/E14/funkcje.php';
    $db = Database::getInstance();
    $cnx = $db->getConnection();
?>
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
    <?php chceck_user(); ?>
    <?php echo $_SERVER["PHP_SELF"]; ?>
    <div class="header" id="header">
        <?php write_element('header.php') ?>
    </div>

    <div id="mySidebar" class="sidebar">
        <?php
          include '/xampp/htdocs/E14/modules/sidebar.php';
          write_sidebar_positions();
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
                //Pobiera dane z formularza
                $wedlug = $_POST["wedlug"];
                $kolejnosc = $_POST["kolejnosc"];

                //Zapisuje kwerendę zależnie od wybranych opcji w formularzu
                $sql = "SELECT nazwa, adres, miasto, kraj FROM klienci ORDER BY " .$_POST['wedlug'] ." " .$_POST['kolejnosc'] .";";
                
                //Wysyła zapytanie do bazy i zapisuje wynik do zmiennej $result
                $result = $cnx->query($sql);

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
                $cnx->close();
            }
        ?>
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn" id="confnijBtn"><a href="index.php">Cofnij</a></button>
    </div>
    </div>
    
</body>
</html>