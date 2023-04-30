<?php
session_start();
$conn=mysqli_connect("localhost","root","","review");
if($_POST){
    $user=$_POST['username'];
    $pswd=$_POST['password'];
    $select=mysqli_query($conn,"SELECT `status`,`username`,`password` FROM `users` WHERE username='$user' and password='$pswd'");
    if(mysqli_num_rows($select)>0){
       while($row=mysqli_fetch_array($select)){
        $_SESSION["user"]=$row['username'];
        $_SESSION["pswd"]=$row['password'];
        if($row['status']=="seller"){
            header("location:seller.php");
        }else{
            header("location:all_products.php");
        }
       }
    } else {
        echo "<script>alert('incorrect username or password');</script>";
    }
    

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
<link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.min.css">
    <!-- <script src='fontawesome-free-6.4.0-web\js\fontawesome.min.js' crossorigin='anonymous'></script> -->
    <script src="assets\js\bootstrap.bundle.js"></script>
    <title>Document</title>
</head>

<body class="d-flex justify-content-center align-items-center" style="height:100vh;background-color:skyblue;">
    <!-- header -->
    <div class="bg-white shadow rounded p-3">
    <h1 style="color:blue;font-family:Algerian;">ONLINE REVIEW PLATFORM</h1>
        <h4  style="color:darkblue;font-family:helvetica; "><center>Login with valid Credentials<center></h4>
   
        <form action="" method="post" >
            <div class="form-group" >
                <i class='fas fa-user' style="color:blue;"></i>

                <label for="">Username</label>
                
                <input type="text" name="username" class="form-control " required pattern="[^\d]+"  placeholder="Username">
            </div>
            <div class="form-group">
                <i class='fas fa-key' style="color:blue;"></i>
                <label for="">Password</label>
                
                <input type="password" name="password" class="form-control" required  pattern="">
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary w-100">LOGIN</button>
            </div>
            <div class="form-group mt-2">
                <p>
                    I don't have an acount <a href="user/create_account.php" style="text-decoration:none;">Sign up</a>
                </p>
            </div>

        </form>
    </div>
</body>
</html>
