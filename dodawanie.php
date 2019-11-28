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

    <!-- Przekierowuje niezalogowanego użytkownika do strony logowania -->
    <?php
        if(!isset($_SESSION['userName']) || empty($_SESSION['userName'])){
            echo "<script> przekieruj('logowanie.php'); </script>";
        }
    ?>

    <div class="header" id="header">
        <a href="<?php echo $_SERVER["PHP_SELF"]; ?>" class="logo">Dodawanie klientów</a>
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
        <a href="profil.php">Profil</a>
        <a href="wyswietlTabela.php">Lista klientów</a>
        <a href="wyswietlDescribe.php">Struktura tabel</a>
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
                if($_SESSION['userAccountType'] === "Administrator"){
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

                }else { echo "<script> alert('Tylko administrator może dodawać użytkowników!'); </script>"; }
            }
            $connection->close();
         ?>
        <button class="formInputBtn" id="confnijBtn"><a href ="menu.php">Cofnij</a></button>
    </div>
    
</body>
</html>