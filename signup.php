<?php
declare(strict_types=1);

ini_set('display_errors', '1');
error_reporting(E_ALL);

session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //somthing was posted
        $user_name = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            //save to database
            $user_id = random_num(20);
            $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";
            mysqli_query($con,$query);

            header("Location: login.php");
            die;
        }else
        {
            echo "Please enter a valid information!";
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title> User SignUp </title>
    <link rel = "stylesheet" type = "text/css" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"/>
    
    <link rel="stylesheet" type = "text/css" href="style.css"/>
   
</head>
<body style="background: linear-gradient(rgba(0, 0, 50, 0.5), rgba(0, 0, 50, 0.5)),url(/img/island.jpg) !important; background-size: cover !important; background-position: center !important;">
    <div class = "container">
        <div class="login-box">
            <div class = "row">
                <div class="col-md-6 login">
                    <h2> Sign Up </h2>
                    <form  method = "post">
                        <div class="form-group mb-3">
                            <label class = "mb-2 bold"> Username </label>
                            <input type="text" name = "username" class = "form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class = "mb-2 bold"> Password </label>
                            <input type="password" name = "password" class = "form-control" required>
                        </div>
                        <button type = "submit" class="btn btn-primary"> Login </button><br>
                        <p class="bold">If you have an account click to<a class="float-right bold" href="login.php"> login! </a></p>
                    </form>
                </div>
                

            </div>
        </div>

    </div>    
    
</body>

</html>