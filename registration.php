<?php
    include "config.php";


if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['mobile']))
{
    $nm=$_POST['name'];
    $em=$_POST['email'];
    $pass=md5($_POST['password']);
    $mob=$_POST['mobile'];
    $flag=0;
    $q1="select * from registration where email='$em'";
    $z1=mysqli_query($con,$q1);
    while($rows=mysqli_fetch_array($z1))
    {
        $flag=1;
        break;
    }
    if($flag==0)
    {
        $q="insert into registration(name,email,password,mobile)values('$nm','$em','$pass','$mob')";
        if(mysqli_query($con,$q)==true)
        {
            echo "<script>alert('register successfully');</script>";
            echo "<script>window.location='user_login.php';</script>";
        }
}
    else
    {
        $message= "this email id: $em is already exist";
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
            <center><h1 id="userloginheading">User Registration</h1></center><br>
            <form action="" method="post">
            <div class="form-group">
                    Enter your username : <input type="text" name="name" class="form-control" required><br>
                </div>
                <div class="form-group">
                    Enter your email : <input type="email" name="email" class="form-control" required><br>
                </div>
                <div class="form-group">
                    Enter your password : <input type="password" name="password" class="form-control" required><br>
                </div>   
                <div class="form-group">
                    Enter your mobile : <input type="number" name="mobile" class="form-control" required><br>
                </div> 
                <div class="form-group">
                    <center>
                    <input type="submit" name="userreg" value="Register"  class="btn btn-warning"> &nbsp 
                    <a href="taskmanagement.php" class="btn btn-warning">Go Back</a><br><br>
                    <a href="user_login.php" class="btn btn-success">Already have an account.</a>
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