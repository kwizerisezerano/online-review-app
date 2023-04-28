<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\assets\css\bootstrap.min.css">
    <script src="..\assets\js\bootstrap.bundle.js"></script>
    <title>Document</title>
</head>

<body class="d-flex justify-content-center align-items-center" style="height:100vh;background-color:skyblue;">
    <!-- header -->
    <div class="bg-white shadow rounded p-3">
        <h1 style="color:blue;font-family:Algerian;">ONLINE REVIEW PLATFORM</h1>
        <h4  style="color:darkblue;font-family:helvetica; "><center>Register your account<center></h4>
        <form action="" method="post" >
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" id="" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Status </label>
                <select name="status" class="form-control">
                    <OPtion value="seller">Seller</OPtion>
                    <OPtion value="buyer">Buyer</OPtion>
                </select>
            </div>
            <div class="form-group" class="form-control">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control" required>
            </div>
           
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary w-100">Sign UP</button>
            </div>
            <div class="form-group mt-2">
               <p>
                    I  have an acount click here to <a href="../" style="text-decoration:none;">Login</a>
                </p>
            </div>

        </form>
    </div>
</body>

</html>
<?php
$conn=mysqli_connect("localhost","root","","review");
if($_POST){
    $user=$_POST['username'];
    $status=$_POST['status'];
    $pswd=$_POST['password'];
    $select=mysqli_query($conn,"select*from users where username='$user' and status='$status'");
    if($row=mysqli_fetch_array($select)){

        echo"<script>alert('Account is taken');</script>";
        
    }
    else
    {
        $insert=mysqli_query($conn,"INSERT INTO `users`(`username`, `status`, `password`) VALUES ('$user','$status','$pswd')");
        if($insert){
            echo"<script>alert('Account is successfully created');</script>";

        }
        
    
    }
    
    
}

?>