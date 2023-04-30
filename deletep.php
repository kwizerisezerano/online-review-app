<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "review");
if ($_POST) {
  $id=$_POST['id'];
                $update = mysqli_query($conn, "DELETE FROM `product` WHERE   productid='$id'");
                if($update){
                    echo "<script>alert('product is removed');</script>";
                }
                else {
                    echo "<script>alert('product is not removed');</script>";
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
    <script src="assets\js\bootstrap.bundle.js"></script>
    <title>Document</title>
    <style>
        body{
            background-image: url("b.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        </style>
</head>

<body class="bg-light  container py-5" style="height:100vh">
    <!-- header -->
    <div class="bg-white shadow rounded p-3">
    <div class="menu" style="background-color:blue;">
            <b><p style="color:white;"><a href="logout.php"style="text-decoration:none;color:white;padding:65px;">Logout</a> 
            <a href="update.php"style="text-decoration:none;color:white;padding:65px;" >update</a>
            <a href="deletep.php"style="text-decoration:none;color:white;padding:65px;" >delete</a>
            <a href="all_products.php"style="text-decoration:none;color:white;padding:55px;" >available products</a>
            <a href="seller.php"style="text-decoration:none;color:white;padding:55px;" >add new products</a>
            <center>
            </p> </b>
</div> 
    <h1 style="color:blue;font-family:Algerian;"><center>ONLINE REVIEW PLATFORM</center></h1>
        <h4  style="color:darkblue;font-family:helvetica; "><center>Modify product properties<center></h4>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label for="">ProductID</label>
                <select name="id" id="" class="form-control" required>
                    <?php
                $conn=mysqli_connect("localhost","root","","review");
                if($conn){
                    $select = mysqli_query($conn,"SELECT * FROM `product` where seller='$_SESSION[user]'");
                    while($row=mysqli_fetch_array($select)){
                        echo"<option value='".$row['productid']."'>".$row['name']."</option>";
                    }
                }
                ?>
                </select>
            </div>         
            
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary w-100">Remove Product</button>
            </div>



        </form>
    </div>
</body>

</html>