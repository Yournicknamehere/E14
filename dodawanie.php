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
    <title>Dodawanie klientów</title>
</head>
<body>
    <!-- Przekierowuje niezalogowanego użytkownika do strony logowania -->
    <?php chceck_user(); ?>

    <div class="header" id="header">
        <?php include '/xampp/htdocs/E14/modules/header.php'; ?>
    </div>

    <div id="mySidebar" class="sidebar">
        <?php
          include '/xampp/htdocs/E14/modules/sidebar.php';
          write_sidebar_positions();
        ?>
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
    
                        if($cnx->query($sql) === true) {
                            echo "<script> alert('Pomyślnie dodano klienta: $nazwa'); </script>";
                        }else { echo "ERROR: " .$sql ."<br>" .$cnx->error; }
                    }
                    $nazwa = $adres = $miasto = $kraj = $sql = "";

                }else { echo "<script> alert('Tylko administrator może dodawać użytkowników!'); </script>"; }
            }
            $cnx->close();
         ?>
        <button class="formInputBtn" id="confnijBtn"><a href ="<?php echo $_SERVER['HTTP_REFERER'];?>">Cofnij</a></button>
    </div>
    
</body>
</html>