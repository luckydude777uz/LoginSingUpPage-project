<?php
declare(strict_types=1);

ini_set('display_errors', '1');
error_reporting(E_ALL);


session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

?>


<html>
    <head>        
        <title> Home Page </title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="home.css"/>
    </head>
    <body>
        

        <div class="container">
            <a class="float-right" href="logout.php"> LOGOUT </a>
            <h1>Welcome <?php echo $user_data['user_name']?></h1>
        </div>
    </body>
</html>