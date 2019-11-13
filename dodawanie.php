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
    <div class="header" id="header">
        <h1>Dodawanie klientów do bazy</h1>
    </div>

    <div class="content">
        <form action="dodaj.php" method="POST">
            <input type="text" name="nazwa" class="formInput" placeholder="Nazwa"/><br>
            <input type="text" name="adres" class="formInput" placeholder="Adres"/><br>
            <input type="text" name="miasto" class="formInput" placeholder="Miasto"/><br>
            <input type="text" name="kraj" class="formInput" placeholder="Kraj"/><br>
            <br>
            <input type="submit" name="submitBtn" value="Dodaj" class="formInputBtn"/>
        </form>
        <!-- Cofnięcie do poprzedniej strony używając PHP -->
        <button class="formInputBtn" id="confnijBtn"><a href ="<?php echo $_SERVER['HTTP_REFERER'];?>">Cofnij</a></button>
    </div>
    
</body>
</html>