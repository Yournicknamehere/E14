<?php 
    session_start();
    require '/xampp/htdocs/E14/funkcje.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" charset="utf-8">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Profil</title>
</head>
<body>
    <!-- Przekierowuje niezalogowanego użytkownika do strony logowania -->
    <?php chceck_user(); ?>

    <!-- Tworzy header -->
    <div class="header" id="header">
        <?php include '/xampp/htdocs/E14/modules/header.php' ?>
    </div>

    <!-- Tworzy sidebar -->
    <div id="mySidebar" class="sidebar">
        <?php
            include '/xampp/htdocs/E14/modules/sidebar.php';
            write_sidebar_positions();
        ?>
    </div>


    <div class="content" id="main">
        <div class="row">
            <div class="column">
                <div class="profil">
                    <div class="card">
                        <img src="/img/img_avatar.png" alt="Avatar">
                        <div class="card-Container">
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
                        <button class="profileButton"><a href="zmienHaslo.php">Zmień hasło</a></button>
                    </div>

                    <div class="columnInColumn">
                        <button class="profileButton"><a href="usunKonto.php">Usuń konto</a></button>
                    </div>

                    <div class="columnInColumn">
                        <button class="profileButton"><a href="wyloguj.php">Wyloguj</a></button>
                    </div>
                </div>
                
            </div>

        </div>
        <!-- Powrót do strony głównej -->
        <button class="formInputBtn" id="confnijBtn"><a href ="<?php echo $_SERVER['HTTP_REFERER'];?>">Cofnij</a></button>
    </div>   
</body>
</html>