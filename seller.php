<?php
session_start();
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "review");
if ($_POST) {
    $pname = $_POST['pname'];
    $pmarc = $_POST['pmarc'];
    $psize = $_POST['psize'];
    $ptype = $_POST['ptype'];
    $seller = $_POST['seller'];
    $price = $_POST['price'];
    if (isset($_FILES['pfile'])) {
        $image = $_FILES['pfile'];
        $pimage = $image['name'];
        $tmp = $image['tmp_name'];
        $target_dir = "uploads/" . $pimage;

        if (move_uploaded_file($tmp, $target_dir)) {
            $insert = mysqli_query($conn, "INSERT INTO `product`(`name`, `marc`, `size`, `type`, `image`,`seller`,`price`) VALUES ('$pname','$pmarc','$psize','$ptype','$pimage','$seller','$price')");
            echo "<script>alert('product is successfully inserted');</script>";
        } else {
            echo "<script>alert('product is successfully inserted');</script>";
           
        }
    } else {
        echo "<script>alert('Image is required');</script>";
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
<div class="menu" style="background-color:blue;">
            <a href="update.php"style="text-decoration:none;color:white;padding:50px;"><i class='fas fa-edit' style="color:white;"></i>Update  product</a> 
            <a href="deletep.php"style="text-decoration:none;color:white;padding:50px;"><i class='fas fa-recycle' style="color:white;"></i>Delete product</a> 
            <a href="seller.php"style="text-decoration:none;color:white;padding:50px;"><i class='fas fa-pen' style="color:white"></i>Add new product</a> 
            <a href="all_products.php"style="text-decoration:none;color:white;padding:40px;"><i class='fas fa-eye' style="color:white;"></i>Available product</a> 
            <a href="logout.php"style="text-decoration:none;color:white;padding:50px;"><i class='fas fa-user-minus' style="color:white"></i>Logout</a> 
            
            <center>
            </p> </b>
</div>
    <!-- header -->
    <div class="bg-white shadow rounded p-3">
    
    <h1 style="color:blue;font-family:Algerian;"><center>ONLINE REVIEW PLATFORM</center></h1>
        <h4  style="color:darkblue;font-family:helvetica; "><center>Add new products<center></h4>
       
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Product name</label>
                <input type="text" name="pname" id="" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Product marc</label>
                <input type="text" name="pmarc" id="" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Product size</label>
                <input type="number" name="psize" id="" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Product type</label>
                <input type="text" name="ptype" id="" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Product image</label>
                <input type="file" name="pfile" id="" accept="image/*" class="form-control" required>
            </div>
            <div class="form-group">
                
                <label for="">Seller</label>
                <select name="seller" id="" class="form-control" required>
                    <?php
                $conn=mysqli_connect("localhost","root","","review");
                if($conn){
                    $select = mysqli_query($conn,"SELECT * FROM `users` where status='seller' ");
                    while($row=mysqli_fetch_array($select)){
                        echo"<option value='".$row['username']."'>".$row['username']."</option>";
                    }
                }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Product Price</label>
                <input type="text" name="price" id="" class="form-control" required placeholder="$ followed by amount">
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary w-100">Add new product</button>
            </div>



        </form>
    </div>
</body>

</html>