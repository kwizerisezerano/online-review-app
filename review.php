<?php
session_start();
$id=$_GET['pid'];
$conn = mysqli_connect('localhost', 'root', '', 'review');
$sql = "SELECT *FROM `product`,`users` where product.productid='$id' AND users.username='$_SESSION[user]'";
$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.min.css">
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

<body class="d-flex justify-content-center align-items-center bg-light" style="height:100vh">
    <!-- header -->
    <div class="bg-white shadow rounded p-3">
    <h1 style="color:blue;font-family:Algerian;">ONLINE REVIEW PLATFORM</h1>
        <h4  style="color:darkblue;font-family:helvetica; "><center>Add your review<center></h4>
        
        <?php
            if (mysqli_num_rows($result) < 1) {
                echo "no records found";
            } else {
                $product = mysqli_fetch_object($result);
                    ?>

        <form action="" method="post" >
        <div class="form-group">
                <label for="">Reviewed by</label>
                <select name="userid" id="" class="form-control" required>
                <option value="<?php print $product->username?>"><?php print $product->username;?></option>
                </select>
            </div>
        
            <div class="form-group">
                
                <label for="">productID</label>
                <select name="productid" id="" class="form-control" required>
                    <option value="<?php print $product->productid;?>"><?php print $product->name;?></option>
                </select>
            </div>
            
            
            <div class="form-group">
                <label for="">Review Description</label>
                <textarea name="desc" id="" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Time</label>
                <input type="datetime-local" name="time" id="" class="form-control" required placeholder="">
            </div>
            <div class="form-group">
                
                <label for="">User status</label>
                <select name="status" id="" class="form-control" required>
                    <option value="<?php print $product->status;?>"><?php print $product->status;?></option>
                </select>
            </div>
           
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary w-100">Add Review</button>
            </div>
            <div class="form-group mt-2">
                <p>
                    <center><b> <a href="comments.php"style="text-decoration:none;"><i class='fas fa-eye' style="color:blue"></i> view reviews</center> </a></b>
                    <center><b> <a href="all_products.php"style="text-decoration:none;"><i class='fas fa-shopping-cart' style="color:blue"></i> available product</center> </a></b>
                </p>
            </div>

        </form>
        <?php
                }
            
            ?>
    </div>
</body>

</html>
<?php
$conn=mysqli_connect("localhost","root","","review");
if($_POST){
    $userid=$_POST['userid'];
    $productid=$_POST['productid'];
    $desc=$_POST['desc'];
    $time=$_POST['time'];
    $status=$_POST['status'];
    $insert=mysqli_query($conn,"INSERT INTO `review`( `username`, `productid`, `description`, `time`,`status`) VALUES ('$userid','$productid','$desc','$time','$status')");
    if($insert){
        echo "<script>alert('review  is successfully added to  product');</script>";
        header("location:all_products.php");
    }
    else{
        echo "<script>alert('no review added');</script>";
    }
}
else{
    echo "<script>alert('please try again');</script>";
}

?>