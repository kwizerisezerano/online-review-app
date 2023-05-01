<?php
session_start();

?>
<?php

$conn = mysqli_connect('localhost', 'root', '', 'review');
$sql = "SELECT * FROM `product`" ;
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

<body class="bg-light" style="height:100vh">
<div class="menu" style="background:blue">
          <center>  <a href="search.php"style="text-decoration:none;color:white;padding:95px;"><i class='fas fa-search' style="color:white;"></i>Search product</a> 
            <a href="logout.php"style="text-decoration:none;color:white;padding:95px;"><i class='fas fa-user-minus' style="color:white;"></i>Logout</a> 
    </center>
            </p> </b>
</div>
    <div class="container my-4">
        <div class="bg-white p-4 rounded shadow border">
            
            <h1>All products</h1>
            <?php
            if (mysqli_num_rows($result) < 1) {
                echo "no records found";
            } else {
                while ($product = mysqli_fetch_object($result)) {
                    ?>

                    <div class="row mt-3">
                        <div class="col-md-3"
                            style="background: url(''); height: 200px; background-size: cover; background-position: center">
                            <img height="150" src="uploads/<?php print $product->image;?>" alt="">
                        </div>
                        <div class="col-md-8">
                            <div>
                            <p><b>ProductID:</b><?php print $product->productid;?></p>
                                <p><b>ProductName:</b><?php print $product->name;?></p>
                                <p><b>ProductMarc:</b><?php print $product->marc;?></p>
                                <p><b>ProductSize:</b><?php print $product->size;?></p>
                                <p><b>ProductType:</b><?php print $product->type;?></p>
                                <p><b>SellerName:</b><?php print $product->seller;?></p>
                                <p><b>Product Price:</b><?php print $product->price;?></p>
                                <p><b><a style="text-decoration:none; "href="review.php?pid=<?php print $product->productid;?>"><i class='fas fa-pen' style="color:blue"></i>Add review</a>
                           </b>
                            <b><a style="text-decoration:none;padding:30px"href="comments.php?pid=<?php print $product->productid;?>"><i class='fas fa-eye' style="color:blue"></i>view reviews
                            </a></b>
        
                            <b><a style="text-decoration:none;padding:30px"href="search.php?pid=<?php print $product->productid;?>"><i class='fas fa-search' style="color:blue"></i>Search product
                            </a></b>
                        </p>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>
        </div>
    </div>
</body>

</html>