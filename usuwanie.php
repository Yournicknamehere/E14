<?php session_start(); ?>
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

    <!-- Przekierowuje niezalogowanego użytkownika do strony logowania -->
    <?php
        if(!isset($_SESSION['userName']) || empty($_SESSION['userName'])){
            echo "<script> przekieruj('logowanie.php'); </script>";
        }
    ?>
    <div class="header" id="header">
        <a href="<?php echo $_SERVER["PHP_SELF"]; ?>" class="logo">Usuwanie klientów</a>
        <div class="header-right">
            <a class="active" href="profil.php">
                <?php
                    if(isset($_SESSION['userName']) && !empty($_SESSION['userName'])) { echo "Witaj, " .$_SESSION['userName'] ."!"; }
                    else { echo "Witaj, Gość!"; } 
                ?>
            </a>

            <a href="#sidebar" id="openNav" onclick="openNav()">☰</a>
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
        <?php
            //Tworzy połączenie z bazą danych
            $connection = new mysqli("localhost", "root", "", "cd4ti");
            if($connection->connect_error){ die("Błąd połączenia: " .$connection->connect_error); }

            //Zapisuje do zmiennej '$result' wynik zapytania SQL
            $result = $connection->query("SELECT nazwa FROM klienci;");
            $taStrona = $_SERVER["PHP_SELF"];

            echo "<h2>Wybierz nazwę klienta, którego chcesz usunąć</h2>";
            echo "<form action='$taStrona' method='POST'>";

            //Tworzy listę rozwijaną z nazwami klientów
            echo "<select name='jakiKlient'>";
            while($tab = $result->fetch_assoc()){
                echo "<option>" .$tab['nazwa'] ."</option>";
            }
            echo "</select>" ."<br><br>";
            echo "<input type='submit' name='submitUsun' class='formInputBtn' value='Usuń'/>";
            echo "</form>";
            //Zwalnia pamięć
            $result->free();

            if(isset($_POST['submitUsun'])){
                if($_SESSION['userAccountType'] === "Administrator"){
                    $klient = $_POST['jakiKlient'];
                    $sql = "DELETE FROM klienci WHERE nazwa='$klient';";

                    if($connection->query($sql) === true) { echo "<script> alert('Pomyślnie usunięto: $klient'); </script>"; }
                    else { echo "<p>" ."ERROR" .$sql ."</p>" ."<p>" .$connection->error ."</p>"; }
                }else { echo "<script> alert('Tylko administrator może usuwać użytkowników!'); </script>"; }
                
            }
            
            $connection->close();
        ?>
       
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn" id="confnijBtn"><a href ="index.php">Cofnij</a></button>
    </div>
    
</body>
</html>