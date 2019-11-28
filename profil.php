<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>Profil</title>
</head>
<body>
    <!-- Przekierowuje niezalogowanego użytkownika do strony logowania -->
    <?php
        if(!isset($_SESSION['userName']) || empty($_SESSION['userName'])){
            echo "<script> przekieruj('logowanie.php'); </script>";
        }
    ?>
    <div class="header" id="header">
        <a href="<?php echo $_SERVER["PHP_SELF"]; ?>" class="logo">Profil</a>
        <div class="header-right">
            <a class="active" href="profil.php">
                <?php
                    if(isset($_SESSION['userName']) && !empty($_SESSION['userName'])) { echo "Witaj, " .$_SESSION['userName'] ."!"; }
                    else { echo "Witaj, Gość!"; } 
                ?>
            </a>

            <a href="#wyloguj">Wyloguj</a>
            <a href="zegarek.php">Zegarek</a>
        </div>
    </div>

    <div class="content">
        <?php
            $connection = new mysqli('localhost', 'root', '', 'cd4ti');
            if($connection->connect_error) { die("Błąd połączenia: " .$connection->connect_error); }

        ?>

        <div class="row">
            <div class="column">
                <div class="profil">
                    <div class="card">
                        <img src="/img/img_avatar.png" alt="Avatar"   style="width:100%">
                        <div class="container">
                            <h4><b><?php echo $_SESSION['userFirstName'] .$_SESSION['userLastName']; ?></b></h4>
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
                    <b><b>Nazwisko: </b> <?php echo $_SESSION['userLastName']; ?> </b>
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
        <button class="formInputBtn" id="confnijBtn"><a href ="menu.php">Cofnij</a></button>
    </div>

    <?php $connection->close(); ?>   
</body>
</html>