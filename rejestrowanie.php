<?php session_start() ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>Rejestracja</title>
</head>
<body>
    <div class="header" id="header">
        <a href="<?php echo $_SERVER["PHP_SELF"]; ?>" class="logo">Rejestracja</a>
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
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
            <input type="text" name="login" class="formInput" placeholder="Login"/><br>
            <input type="password" name="haslo1" class="formInput" placeholder="Hasło"/><br>
            <input type="password" name="haslo2" class="formInput" placeholder="Potwierdź hasło"/><br>
            <select name="stanowisko">
                <option value="Uzytkownik">Użytkownik</option>
                <option value="Administrator">Administrator</option>
            </select><br><br>
            <input type="submit" name="submitRejestracja" value="Dalej" class="formInputBtn"/>
        </form>

        <?php
            $connection = new mysqli('localhost', 'root', '', 'cd4ti');
            if ($connection->connect_error) {
                die("Błąd połączenia: " .$connection->connect_error);
            }

            if(isset($_POST['submitRejestracja'])){
                $login = trim($_POST['login']);
                $haslo1 = trim($_POST['haslo1']);
                $haslo2 = trim($_POST['haslo2']);
                $stanowisko = $_POST['stanowisko'];

                if(empty($login) || empty($haslo1) || empty($haslo2) || empty($stanowisko)){
                    echo "<p>Nie dodano użytkownika, ponieważ co najmniej jedno z pól nie zostało uzupełnione!</p><br>";
                }
                else {
                    if($haslo1 != $haslo2) { echo "<p>Nie dodano użytkownika, ponieważ hasła nie są jednakowe!</p>"; }
                    else {
                        $haslo = md5($haslo1, false);
                        $sql = "INSERT INTO uzytkownicy (login, haslo, stanowisko) VALUES ('$login', '$haslo', '$stanowisko');";
                        if($connection->query($sql) === true){
                            echo "<script> alert('Pomyślnie dodano użytkownika: $login'); </script>";
                            echo "<script> przekieruj('logowanie.php'); </script>";
                        }
                        else { echo "<script> alert('ERROR: $connection->error'); </script>"; }
                    }
                }
                $sql = $haslo = $haslo1 = $haslo2 = $login = $stanowisko = "";
            }

            $connection->close();
        ?>
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn" id="confnijBtn"><a href ="menu.php">Cofnij</a></button>
    </div>
    
</body>
</html>