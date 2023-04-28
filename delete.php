<?php
session_start();
$id=$_GET['pid'];
$conn = mysqli_connect('localhost', 'root', '', 'review');
$sql = "SELECT *FROM `product` where productid='$id' ";
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
        <h4  style="color:darkblue;font-family:helvetica; "><center>Add your review<center></h4>
        
        <?php
            if (mysqli_num_rows($result) < 1) {
                echo "no records found";
            } else {
                $product = mysqli_fetch_object($result);
                    ?>

        <form action="" method="post" >
            <div class="form-group">
                
                <label for="">productID</label>
                <select name="productid" id="" class="form-control">
                    <option value="<?php print $product->productid;?>"><?php print $product->name;?></option>
                </select>
            </div>
           
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary w-100">Remove product</button>
            </div>
            <div class="form-group mt-2">
                <p>
                    <center><b> <a href="comments.php"style="text-decoration:none;">View reviews</a></b> </center> 
                    <center> <b> <a href="all_products.php"style="text-decoration:none;">View available products</a></b> </center> 
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
    $productid=$_POST['productid'];
    $delete=mysqli_query($conn,"delete from product where productid='$productid'");
    if($delete){
        echo "<script>alert('product is successfully removed from available product');</script>";
    }
    else{
        echo "<script>alert('product is still in  available product');</script>";
    }
}
else{
    echo "<script>alert('please try again');</script>";
}

?>