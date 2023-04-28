<?php
session_start();
// $id=$_GET['pid'];
$conn = mysqli_connect('localhost', 'root', '', 'review');
$sql = "SELECT *FROM `review`";
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
        <form action="" method="post" >
        <div class="form-group">
                <table border="2" width="500" height="300">
        
        <?php
            if (mysqli_num_rows($result) < 1) {
                echo "no records found";
            } else {
                $product = mysqli_fetch_array($result);
                    ?>

       
                <tr>
                <!-- <th>Current User</th> -->
               <th>reviewid</th>
               <th>userid</th>
               <th>Description</th>
               <th>Commented by</by>
            </tr>
            <tr>
                <!--  -->
                <td><?php echo $product['reviewid']?></td>
                <td><?php echo $product['userid']?></td>
                <td><?php echo $product['productid']?></td>
                <td><?php echo $product['description']?></td>
            </tr>
            <?php
                }
            
            ?>
            </table>
            </div>
            
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary w-100">endReview</button>
            </div>
            <div class="form-group mt-2">
                <!-- <p>
                    <center><b> <a href="comments.php"style="text-decoration:none;">View reviews</a></b> </center> 
                    <center> <b> <a href="all_products.php"style="text-decoration:none;">View available products</a></b> </center> 
                </p> -->
            </div>

        </form>
        
    </div>
</body>

</html>
