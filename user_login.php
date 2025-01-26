<?php
session_start();
include "config.php";
if(!empty($_POST['email']) and !empty($_POST['password']))
{
    
    $em=$_POST['email'];
    $pass=md5($_POST['password']);
   
    $flag=0;
    $q1="select * from registration where email='$em' and password='$pass'";
    $z=mysqli_query($con,$q1);
    while($rows=mysqli_fetch_array($z))
    {
        $flag=1;
        $_session['matchit']=$em;

    }
    if($flag==0)
    {
       $message="incorrect email and password";   
    }
    else
    {
        echo "<script>window.location='user_dashboard.php';</script>";
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
            <center><h1 id="userloginheading">User Login</h1></center><br>
            <form action="" method="post">
                <div class="form-group">
                    Enter your email : <input type="email" name="email" class="form-control" required><br>
                </div>
                <div class="form-group">
                    Enter your password : <input type="password" name="password" class="form-control" required><br>
                </div>    
                <div class="form-group">
                    <center>
                    <input type="submit" name="userlogin" value="Login"  class="btn btn-warning"> &nbsp &nbsp
                    <a href="taskmanagement.php" class="btn btn-warning">Go Back</a>
                    </center>
                </div>
               
            </form>
            <?php
                        if(!empty($message))
                        {
                            echo "<h1>$message</h1>";
                        }

                ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>