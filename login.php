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
            //read from database
            
            $query = " select * from users where user_name = '$user_name' limit 1";
            $result = mysqli_query($con,$query);
            
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] === $password)
                {
                    $id = $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die; 
                }
                
            }
            
            echo "<div class=\"echo\">Please enter a valid information!</div>";
        }else
        {
            echo "Please enter a valid information!";
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title> User Login </title>
    <link rel = "stylesheet" type = "text/css" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"/>
    
    <link rel="stylesheet" type = "text/css" href="style.css"/>
   
</head>
<body style="background: linear-gradient(rgba(0, 0, 50, 0.5), rgba(0, 0, 50, 0.5)),url(/img/tree.jpg) !important; background-size: cover !important; background-position: center !important;">
<style>
    .echo{
        color: #fff;
        font-size: 32px;
        text-align: center;
        margin-top: 20px;
        
        
    }
</style>
    <div class = "container">
        <div class="login-box">
            <div class = "row">
                <div class="col-md-6 login">
                    <h2> Login </h2>
                    <form  method = "post">
                        <div class="form-group mb-3">
                            <label class = "mb-2"> Username </label>
                            <input type="text" name = "username" class = "form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class = "mb-2"> Password </label>
                            <input type="password" name = "password" class = "form-control" required>
                        </div>
                        <button type = "submit" class="btn btn-primary"> Login </button><br>
                        <p >If you don't have an account click to<a class="float-right" href="signup.php"> sign up! </a></p>
                    </form>
                </div>
                

            </div>
        </div>

    </div>    
    
</body>

</html>