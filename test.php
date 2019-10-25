<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>TEST</title>
</head>
<body>
    <div class="content">
    <?php
        //  ------ TEN PLIK SŁUŻY DO TESTÓW KODÓW ------ //

        $haslo = "Q@wertyuiop";
        echo "<script> alert('$haslo'); </script>";
        $haslo = md5($haslo, FALSE);
        echo "<script> alert('$haslo'); </script>";
        
        $connection = new mysqli('localhost', 'root', '', 'cd4ti');
        $sql = "UPDATE uzytkownicy SET haslo = '$haslo' WHERE login = 'aniewiadomski';";
        
        if($connection->query($sql) === TRUE) { echo "<script> alert('Zmieniono haslo!'); </script>"; }
        else { echo "<script> alert('Nie zmieniono hasła!'); </script>"; }
    ?>
    </div>
    
</body>
</html>