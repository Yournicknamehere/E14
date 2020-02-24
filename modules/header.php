<?php
    $title = stripslashes($_SERVER["PHP_SELF"]);
    $t = str_ireplace(".php", "", $title);
    $t = str_ireplace("/", "", $t);
    echo '
        <a href="echo $_SERVER["PHP_SELF"];" class="logo">' .$t .'</a>
        <div class="header-right">
            <a href="#sidebar" id="openNav" class="openNav" onclick="openNav()">☰</a>
        </div>
    ';
?>