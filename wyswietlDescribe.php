<?php session_start() ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>Struktura tabeli</title>
</head>
<body>
    <!-- Tworzy połączenie z bazą danych -->
    <?php
        $connection = new mysqli('localhost', 'root', '', 'cd4ti');
        if($connection->connect_error) { die("Błąd połączenia: " .$connection->connect_error); }
    ?>
    <div class="header" id="header">
        <a href="<?php echo $_SERVER["PHP_SELF"]; ?>" class="logo">Struktura tabeli</a>
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
        <!-- Pobiera do formularza listę tabel z bazy danych -->
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <?php
                $sql = "SHOW tables;";
                $result = $connection->query($sql);
                echo "<select name='jakaTabela'>";
                while($obj = $result->fetch_object()){
                    echo "<option>" .$obj->Tables_in_cd4ti ."</option>";
                }
                echo "</select><br><br>";
            ?>
            <input type="submit" name="submitDescribe" value="Wyświetl" class="formInputBtn"/>
        </form>

    <div class="tabela">
       <?php
            if(isset($_POST['submitDescribe'])){

                //Wyświetla strukturę tabeli wybranej w powyższym formularzu
                $tabela = $_POST['jakaTabela'];
                $sql = "DESCRIBE $tabela;";
                $result = $connection->query($sql);

                echo "<table id='tabela'>";
                echo "<tr> <th>Field</th>  <th>Type</th> </tr>";
                while($obj = $result->fetch_object()){
                    echo "<tr><td>" .$obj->Field  ."</td><td>" .$obj->Type ."</td></tr>";
                }
                echo "</table><br>";
            }

            //Czyści pamieć i zamyka połączenie z bazą danych
            $result->free();
            $connection->close();
        ?>
        <!-- Cofnięcie do poprzedniej strony -->
        <button class="formInputBtn" id="confnijBtn"><a href ="index.php">Cofnij</a></button>
    </div>
    </div>
</body>
</html>