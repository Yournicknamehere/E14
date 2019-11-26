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
    <div class="header" id="header">
        <h1>Profil</h1>
    </div>

    <div class="content">
        
        <div class="profil">
            <div class="card">
                <img src="/img/img_avatar.png" alt="Avatar" style="width:100%">
                <div class="container">
                    <h4><b><?php echo $loginUzytkownika; ?></b></h4>
                    <p><?php echo $stanowisko; ?></p>
                </div>
            </div>
        </div>
        
        <!-- Powrót do strony głównej -->
        <button class="formInputBtn" id="confnijBtn"><a href ="index.php">Cofnij</a></button>
    </div>
    
</body>
</html>