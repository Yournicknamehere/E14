<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>Dodawanie klientów</title>
</head>
<body>
    <div class="header" id="header">
        <h1>Dodawanie klientów do bazy</h1>
        <button>
            <?php
                if(isset($_SESSION['userName']) && !empty($_SESSION['userName'])) { echo "Witaj, " .$_SESSION['userName'] ."!"; }
                else { echo "Witaj, Gość!"; } 
            ?>
        </button>
    </div>

    <div class="content">
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
            <input type="text" name="nazwa" class="formInput" placeholder="Nazwa"/><br>
            <input type="text" name="adres" class="formInput" placeholder="Adres"/><br>
            <input type="text" name="miasto" class="formInput" placeholder="Miasto"/><br>
            <input type="text" name="kraj" class="formInput" placeholder="Kraj"/><br>
            <br>
            <input type="submit" name="submitDodaj" value="Dodaj" class="formInputBtn"/>
        </form>

        <?php 
            $connection = new mysqli('localhost', 'root', '', 'cd4ti');
            if($connection->connect_error) { die("Błąd połączenia: " .$connection->connect_error); }

            if(isset($_POST['submitDodaj'])){
                $nazwa = trim($_POST['nazwa']);
                $adres = trim($_POST['adres']);
                $miasto = trim($_POST['miasto']);
                $kraj = trim($_POST['kraj']);

                if(empty($nazwa) || empty($adres) || empty($miasto) || empty($kraj)) {
                    echo "<script> alert('Nie dodano klienta, ponieważ co najmniej jedno pole nie zostało uzupełnione.'); </script>";
                }
                else {
                    $sql = "INSERT INTO klienci (nazwa, adres, miasto, kraj) 
                    VALUES ('$nazwa', '$adres', '$miasto', '$kraj');";

                    if($connection->query($sql) === true) {
                        echo "<script> alert('Pomyślnie dodano klienta: $nazwa'); </script>";
                    }else { echo "ERROR: " .$sql ."<br>" .$connection->error; }
                }
                $nazwa = $adres = $miasto = $kraj = $sql = "";
            }
            $connection->close();
         ?>
        <button class="formInputBtn" id="confnijBtn"><a href ="menu.php">Cofnij</a></button>
    </div>
    
</body>
</html>