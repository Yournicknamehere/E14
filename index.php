<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/style.css">
    <script src="/JS/main.js"></script>
    <title>index</title>
</head>
<body>
    <?php
        if(isset($_SESSION['userName']) && !empty($_SESSION['userName'])) {
            echo "<script> przekieruj('profil.php'); </script>";
        }else {
            echo "<script> przekieruj('logowanie.php'); </script>";
        }
    ?>
    
</body>
</html>