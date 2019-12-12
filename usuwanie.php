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
    <title>Usuwanie</title>
</head>
<body>

    <!-- Przekierowuje niezalogowanego użytkownika do strony logowania -->
    <?php chceck_user(); ?>

    <div class="header" id="header">
        <?php include '/xampp/htdocs/E14/modules/header.php'; ?>
    </div>

    <div id="mySidebar" class="sidebar">
        <?php
            include '/xampp/htdocs/E14/modules/header.php';
            write_sidebar_positions();
        ?>
    </div>

    <div class="content">
        <?php
            //Zapisuje do zmiennej '$result' wynik zapytania SQL
            $result = $cnx->query("SELECT nazwa FROM klienci;");
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

                    if($cnx->query($sql) === true) { echo "<script> alert('Pomyślnie usunięto: $klient'); </script>"; }
                    else { echo "<p>" ."ERROR" .$sql ."</p>" ."<p>" .$cnx->error ."</p>"; }
                }else { echo "<script> alert('Tylko administrator może usuwać użytkowników!'); </script>"; }
                
            }
            
            $cnx->close();
        ?>
       
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn" id="confnijBtn"><a href ="<?php echo $_SERVER["HTTP_REFERER"];?>">Cofnij</a></button>
    </div>
    
</body>
</html>