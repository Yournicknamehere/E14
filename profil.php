<?php 
    session_start();
    $connection = new mysqli('localhost', 'root', '', 'cd4ti');
    if($connection->connect_error) { die("Błąd połączenia: " .$connection->connect_error); }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Profil</title>
</head>
<body>
    <!-- Przekierowuje niezalogowanego użytkownika do strony logowania -->
    <?php
        if(!isset($_SESSION['userName']) || empty($_SESSION['userName'])){
            echo "<script> przekieruj('logowanie.php'); </script>";
        }
    ?>
    <div class="header" id="header" onload="wyswietlTytul()">
        <a href="<?php echo $_SERVER["PHP_SELF"]; ?>" class="logo"> <p id="tytul"></p> </a>
        <div class="header-right">
            <a class="active" href="profil.php">
                <?php
                    if(isset($_SESSION['userName']) && !empty($_SESSION['userName'])) { echo "Witaj, " .$_SESSION['userName'] ."!"; }
                    else { echo "Witaj, Gość!"; } 
                ?>
            </a>

            <a href="#sidebar" id="openNav" onclick="openNav()">☰ Menu</a>
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


    <div class="content" id="main">
        <div class="row">
            <div class="column">
                <div class="profil">
                    <div class="card">
                        <img src="/img/img_avatar.png" alt="Avatar"   style="width:100%">
                        <div class="container">
                            <h4><b><?php echo $_SESSION['userFirstName'] ." " .$_SESSION['userLastName']; ?></b></h4>
                            <p><?php echo $_SESSION['userAccountType']; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <h2 style="font-size: 46px">Ustawienia konta</h2>
                <div class="profileInfo">
                    <p><b>Nazwa użytkownika: </b> <?php echo $_SESSION['userName']; ?> </p>
                    <p><b>Imię: </b> <?php echo $_SESSION['userFirstName']; ?> </p>
                    <p><b>Nazwisko: </b> <?php echo $_SESSION['userLastName']; ?> </p>
                    <p><b>Adres E-mail: </b> <?php echo $_SESSION['userEmail']; ?> </p>
                    <p><b>Typ konta: </b> <?php echo $_SESSION['userAccountType']; ?> </p>
                </div>

                <div class="rowInRow">
                    <div class="columnInColumn">
                        <button class="profileButton">Zmień hasło</button>
                    </div>

                    <div class="columnInColumn">
                        <button class="profileButton">Usuń konto</button>
                    </div>

                    <div class="columnInColumn">
                        <button class="profileButton">Wyloguj</button>
                    </div>
                </div>
                
            </div>

        </div>
        <!-- Powrót do strony głównej -->
        <button class="formInputBtn" id="confnijBtn"><a href ="index.php">Cofnij</a></button>
    </div>

    <?php $connection->close(); ?>   
</body>
</html>