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
                
                <<label for="">Assign to</label>
                <select name="assign" id="" class="form-control" required>
                    <?php
                $conn=mysqli_connect("localhost","root","","review");
                if($conn){
                    $select = mysqli_query($conn,"SELECT * FROM `review` ");
                    while($row=mysqli_fetch_array($select)){
                        echo"<option value='".$row['productid']."'>".$row['productid']."</option>";
                    }
                }
                ?>
                </select>
            </div>
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
$conn = mysqli_connect("localhost", "root", "", "review");
if ($_POST) {
    $id = $_POST['productid'];
    $pname = $_POST['pname'];
    $pmarc = $_POST['pmarc'];
    $psize = $_POST['psize'];
    $ptype = $_POST['ptype'];

            $insert = mysqli_query($conn, "update product set name='$pname',marc='$pmarc',size='$psize',type='$ptype'where  productid='$id'");
}
?>