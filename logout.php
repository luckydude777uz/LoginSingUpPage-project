<?php

declare(strict_types=1);

ini_set('display_errors', '1');
error_reporting(E_ALL);

if(isset($_SESSION['user_id']))
{
    unset($_SESSION['user_id']);
}

header("Location:login.php");

?>


