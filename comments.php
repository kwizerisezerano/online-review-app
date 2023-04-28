<?php
session_start();
$id=$_GET['pid'];
$conn = mysqli_connect('localhost', 'root', '', 'review');
$sql = "SELECT *FROM `product`,`users`,`review`where product.productid='$id' and  users.username='$_SESSION[user]'";
$result = mysqli_query($conn, $sql);
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
</head>

<body class="d-flex justify-content-center align-items-center bg-light" style="height:100vh">
    <!-- header -->
    <div class="bg-white shadow rounded p-3">
    <h1 style="color:blue;font-family:Algerian;">ONLINE REVIEW PLATFORM</h1>
        <h4  style="color:darkblue;font-family:helvetica; "><center>view all review<center></h4>
        
        <?php
            if (mysqli_num_rows($result) < 1) {
                echo "no records found";
            } else {
                $product = mysqli_fetch_object($result);
                    ?>

        <form action="" method="post" >
        <div class="form-group">
                <label for="">userID</label>
                <select name="userid" id="" class="form-control" required>
                <option value="<?php print $product->userid;?>"><?php print $product->username;?></option>
                </select>
            </div>
            <div class="form-group">
                
                <label for="">productID</label>
                <select name="productid" id="" class="form-control" required>
                    <option value="<?php print $product->productid;?>"><?php print $product->name;?></option>
                </select>
            </div>
            
            <div class="form-group">
                
                <label for="">Description</label>
                <select name="description" id="" class="form-control" required>
                    <?php
                $conn = mysqli_connect('localhost', 'root', '', 'review');
                if($conn){
                    $select = mysqli_query($conn,"SELECT * FROM `review` where productid='$id'");
                    while($row=mysqli_fetch_array($select)){
                        echo"<option value='".$row['description']."'>".$row['description']."</option>";
                    }
                }
                ?>
                </select>
            </div>
           
            <div class="form-group mt-2">
                <button  class="btn btn-primary w-100"><a href="all_products.php"style="text-decoration:none;color:white;" >end view</a></button>
            </div>
            <div class="form-group mt-2">
                <!-- <p>
                    <center><b> <a href="comments.php"style="text-decoration:none;">View reviews</a></b> </center> 
                    <center> <b> <a href="all_products.php"style="text-decoration:none;">View available products</a></b> </center> 
                </p> -->
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
    $insert=mysqli_query($conn,"SELECT * FROM `review`");
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