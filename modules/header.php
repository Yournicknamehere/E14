<?php
    $title = stripslashes($_SERVER["PHP_SELF"]);
    $title = stripcslashes($title);
    echo '
        <a href="echo $_SERVER["PHP_SELF"];" class="logo">' .$title .'</a>
        <div class="header-right">
            <a href="#sidebar" id="openNav" class="openNav" onclick="openNav()">☰</a>
        </div>
    ';
?>