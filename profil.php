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
    <?php
        if(!isset($_SESSION['userName']) || empty($_SESSION['userName'])){
            echo "<script> przekieruj('logowanie.php'); </script>";
        }
    ?>
    <div class="header" id="header">
        <h1>Profil</h1>
        <button onclick="przekieruj('profil.php')">
            <?php
                if(isset($_SESSION['userName']) && !empty($_SESSION['userName'])) { echo "Witaj, " .$_SESSION['userName'] ."!"; }
                else { echo "Witaj, Gość!"; } 
            ?>
        </button>
    </div>

    <div class="content">
        <?php
            $connection = new mysqli('localhost', 'root', '', 'cd4ti');
            if($connection->connect_error) { die("Błąd połączenia: " .$connection->connect_error); }

        ?>
        
        <div class="profil">
            <div class="card">
                <img src="/img/img_avatar.png" alt="Avatar" height="420px" width="360px" style="width:100%">
                <div class="container">
                    <h4><b><?php echo $_SESSION['userName']; ?></b></h4>
                    <p><?php echo $_SESSION['userAccountType']; ?></p>  
                </div>
            </div>
        </div>
        
        <!-- Powrót do strony głównej -->
        <button class="formInputBtn" id="confnijBtn"><a href ="menu.php">Cofnij</a></button>
    </div>

    <?php $connection->close(); ?>   
</body>
</html>