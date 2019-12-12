<?php
    function write_sidebar_positions() {
        if($_SESSION['userAccountType'] === "Administrator"){
            echo "<a href='aktualizowanie.php'>Aktualizacja danych</a>";
            echo "<a href='dodawanie.php'>Dodawanie klientów</a>";
            echo "<a href='usuwanie.php'>Usuwanie klientów</a>";
            echo "<a href='wyswietlDescribe.php'>Struktura tabel</a>";
            echo "<a href='wyswietlTabela.php'>Lista klientów</a>";
            echo "<a href='zegarek.php'>Zegar</a>";
            echo "<a href='zmianaStylu.php'>Edycja CSS</a>";
        } elseif($_SESSION['userAccountType'] === "Uzytkownik"){
            echo "<a href='wyswietlDescribe.php'>Struktura tabel</a>";
            echo "<a href='wyswietlTabela.php'>Lista klientów</a>";
            echo "<a href='zegarek.php'>Zegar</a>";
            echo "<a href='zmianaStylu.php'>Edycja CSS</a>";
        } else {
            echo "<a href='logowanie.php'>Zaloguj</a>";
            echo "<a href='rejestrowanie.php'>Rejestracja</a>";
        }
    }

    function chceck_user() {
        if(!isset($_SESSION['userName']) || empty($_SESSION['userName'])){
            echo "<script> przekieruj('logowanie.php'); </script>";
        }
    }

    class Database {
        private $_connection;
        private static $_instance;
        private $_host = "localhost";
        private $_username = "root";
        private $_password = "";
        private $_database = "cd4ti";

        public static function getInstance() {
            if(!self::$_instance) { self::$_instance = new self(); }
            return self::$_instance;
        }

        private function __construct() {
            $this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);

            if(mysqli_connect_error()) {
                trigger_error("Błąd połączenia z bazą danych: " .mysqli_connect_error(), E_USER_ERROR);
            }
        }

        private function __clone() { }

        public function getConnection() {
            return $this->_connection;
        }
    }
?>