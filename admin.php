<?php
session_start();
if(!empty($_POST['email']) and !empty($_POST['password']))
{
    $em=$_POST['email'];
    $pass=$_POST['password'];

    $admin_em="ankit@gmail.com";
    $admin_pass="ankit123";

    if($em===$admin_em && $pass===$admin_pass)
    {
        $_SESSION['admin']=$em;
        echo "<script>window.location='admin-dashboard.php';</script>";
    }
    else
    {

       $message="please enter correct email and password";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="row">
        <div class="col-md-3 mt-5 m-auto" id="userlogin">
            <center><h1 id="userloginheading">Admin Login</h1></center><br>
            <form action="" method="post">
                <div class="form-group">
                    Enter your email : <input type="email" name="email" class="form-control" required><br>
                </div>
                <div class="form-group">
                    Enter your password : <input type="password" name="password" class="form-control" required><br>
                </div>    
                <div class="form-group">
                    <center>
                    <input type="submit" name="adminlogin" value="Login"  class="btn btn-warning"> &nbsp &nbsp
                    <a href="taskmanagement.php" class="btn btn-warning">Go Back</a>
                    </center>
                </div>
               
            </form>
            <?php
                if(!empty($message))
                {
                    echo "$message";
                }
            ?>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>