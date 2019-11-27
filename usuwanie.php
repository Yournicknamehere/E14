<?php session_start() ?>
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
        <h1>Usuwanie klientów</h1>
        <button onclick="przekieruj('profil.php')">
            <?php
                if(isset($_SESSION['userName']) && !empty($_SESSION['userName'])) { echo "Witaj, " .$_SESSION['userName'] ."!"; }
                else { echo "Witaj, Gość!"; } 
            ?>
        </button>
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

            if(isset($_POST['submitUsun']) && $_SESSION['userAccountType'] === "Administrator"){
                $klient = $_POST['jakiKlient'];
                $sql = "DELETE FROM klienci WHERE nazwa='$klient';";

                if($connection->query($sql) === true) { echo "<script> alert('Pomyślnie usunięto: $klient'); </script>"; }
                else { echo "<p>" ."ERROR" .$sql ."</p>" ."<p>" .$connection->error ."</p>"; }
            }
            
            $connection->close();
        ?>
       
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn" id="confnijBtn"><a href ="menu.php">Cofnij</a></button>
    </div>
    
</body>
</html>