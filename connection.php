<?php

declare(strict_types=1);

ini_set('display_errors', '1');
error_reporting(E_ALL);

// session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_sample_db";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
    die(" Failed to connect!");
}