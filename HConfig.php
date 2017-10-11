<?php
require_once 'applications/HDatabaseConnection.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Database
$serverIP = "127.0.0.1";
$serverUsername = "root";
$serverPassword = "123123";
$serverDatabaseName = "db_h_press";
$serverDatabasePort = 3306;

$mysql = new HDatabaseConnection($serverIP, $serverUsername, $serverPassword, $serverDatabaseName, $serverDatabasePort);
//
$charset = "UTF-8";
$styleDefault = "default";
$languageDefault = "arabic";
$websiteName = "Halabja Press";

//meta
$meta = ""
        . "<meta charset='$charset' />"
        . "<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />"
        ;
$email_username = "halabjastat@gmail.com";
$email_password = "hs3228811";
//default language
if(filter_has_var(INPUT_GET,"lang")){
    $_SESSION["lang"] = filter_input(INPUT_GET, "lang");
}
$langFilePath = "./languages/".(isset($_SESSION["lang"]) ? $_SESSION["lang"] : $languageDefault).".ini";
$lang = parse_ini_file(file_exists($langFilePath) ? $langFilePath : ".".$langFilePath,true);