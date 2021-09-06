<?php
define("DSN", "mysql:host=localhost;dbname=doa;charset=utf8");
define("DB_USER", "yourdatabaseusername");
define("DB_PASS", "yourdatabasepassword");
$db = new PDO(DSN, DB_USER, DB_PASS);
?>
