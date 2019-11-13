<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>Logowanie</title>
</head>
<body>
    <div class="header" id="header">
        <h1>Logowanie</h1>
    </div>

    <div class="content">
        <?php
            //Tworzy połączenie z bazą danych
            $connection = new mysqli('localhost', 'root', '', 'cd4ti');
            if ($connection->connect_error) {
                die("Błąd połączenia: " . $connection->connect_error);
            }

            //Zapisuje dane z formularza do zmiennych po przepuszczeniu przez funckję validującą
            $loginFormularz = trim($_POST['login']);
            $hasloFormularz = trim($_POST['haslo']);
            $hasloFormularz = md5($hasloFormularz, FALSE);
            $sql = "SELECT login, haslo, stanowisko FROM uzytkownicy WHERE login = '$loginFormularz';";


            $result = $connection->query($sql);
            if($result == true) {
                $obj = $result->fetch_object();
                $loginUzytkownika = $obj->login;
                $hasloUzytkownika = $obj->haslo;
                $stanowisko = $obj->stanowisko;

                if($loginFormularz === $loginUzytkownika && $hasloFormularz === $hasloUzytkownika) {
                    echo "<p id='zegar'>Witaj " .$loginUzytkownika ."!</p><br>";
                }else {
                    echo "<script> alert('Błędny login lub hasło!'); </script>";
                }

            }else {
                echo "<script> alert('Nie ma takiego użytkownika!'); </script>";
            }

        ?>
        <div class="profil">
            <div class="card">
                <img src="/img/img_avatar.png" alt="Avatar" style="width:100%">
                <div class="container">
                    <h4><b><?php echo $loginUzytkownika; ?></b></h4>
                    <p><?php echo $stanowisko; ?></p>
                </div>
            </div>
        </div>
        
        <?php
            //Czyści zmienne
            $result->free();

            //Zamyka połączenie z bazą
            $connection->close();
        ?>
        <!-- Powrót do strony głównej -->
        <button class="formInputBtn" id="confnijBtn"><a href ="index.php">Cofnij</a></button>
    </div>
    
</body>
</html>