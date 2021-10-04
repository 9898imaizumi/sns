<?php

define("HOST", "localhost");
define("DB_NAME", "dawnsns");
define("USER", "root");
define("PASS", "");

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET 'utf8'");

$pdo = new PDO("mysql:host=".HOST.";dbname=".DB_NAME, USER, PASS, $options);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
