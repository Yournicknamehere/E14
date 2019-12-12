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
    <title>Aktualizacja</title>
</head>
<body style="font-size: 16px;">

    <!-- Przekierowuje niezalogowanego użytkownika do strony logowania -->
    <?php chceck_user(); ?>

    <div class="header" id="header">
        <?php include '/xampp/htdocs/E14/modules/header.php'; ?>
    </div>
    
    </div>

    <div id="mySidebar" class="sidebar">
        <?php 
            include '/xampp/htdocs/E14/modules/sidebar.php';
            write_sidebar_positions();
        ?>
    </div>

    <div class="content">
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
            Wybierz klienta, którego dane chcesz zmienić<br>
            <?php
                //Zapisuje do zmiennej '$z' wynik zapytania SQL do bazy danych
                $result = $cnx->query("SELECT nazwa FROM klienci;");

                //Tworzy listę rozwijaną <select> w HTML używając tablicy asocjacyjnej $r i pętli while()
                echo "<select name='jakiKlient'>"; //Otwiera znacznik <select>...
                while($tab = $result->fetch_assoc()){
                    //Każde przejście pętli dodaje kolejną pozycję listy
                    echo "<option>" .$tab['nazwa']  ."</option>";
                }
                echo "</select>" ."<br><br>"; //... i zamyka znacznik </select>

                //Zwalnia pamięć przeznaczoną na tablicę
                $result->free();
            ?>
            oraz dane, które chcesz zmienić<br>
            <!-- To zrobiłem ręcznie bo nie wiem jeszcze jak pobrać strukture tabeli z bazy danych XD -->
            <select name="jakieDane" id="selectDane">
                <option>nazwa</option>
                <option>adres</option>
                <option>miasto</option>
                <option>kraj</option>
            </select><br>

            <input type="text" name="noweDane" placeholder="A tutaj wpisz nowe dane" class="formInput"/><br>
            <input type="submit" name="submitAktualizuj" value="Aktualizuj" class="formInputBtn"/>
            
        </form>

        <?php 
            if(isset($_POST['submitAktualizuj'])){
                if($_SESSION['userAccountType'] === "Administrator"){
                    $klient = $_POST['jakiKlient'];
                    $noweDane = trim($_POST['noweDane']);
                    $jakieDane = $_POST['jakieDane'];

                    if(empty($klient) || empty($noweDane) || empty($jakieDane)){
                        echo "<script> alert('Nie można zaktualizować danych, ponieważ co najmniej jedno pole nie zostało uzupełnione!'); </script>";
                    }else{
                        $sql = "UPDATE klienci SET $jakieDane = '$noweDane' WHERE nazwa = '$klient';";
    
                        if($cnx->query($sql) === true) { echo "<script> alert('Pomyślnie zaktualizowano dane: $klient'); </script>"; }
                        else { echo "ERROR: " .$sql ."<br>" .$cnx->error; }
                    }
                }else { echo "<script> alert('Tylko administrator może aktualizować dane użytkowników!'); </script>"; }
                $cnx->close();
            }
        ?>
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn" id="confnijBtn"><a href ="<?php echo $_SERVER['HTTP_REFERER'];?>">Cofnij</a></button>
    </div>
        
</body>
</html>