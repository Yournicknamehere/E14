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
        <h1>Rejestracja użytkownika</h1>
    </div>

    <div class="content">
        <form action="rejestruj.php" method="POST">
            <input type="text" name="login" class="formInput" placeholder="Login"/><br>
            <input type="password" name="haslo1" class="formInput" placeholder="Hasło"/><br>
            <input type="password" name="haslo2" class="formInput" placeholder="Potwierdź hasło"/><br><br>
            <input type="submit" name="submitBtn" value="Dalej" class="formInputBtn"/>
        </form>
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn" id="confnijBtn"><a href ="<?php echo $_SERVER['HTTP_REFERER'];?>">Cofnij</a></button>
    </div>
    
</body>
</html>