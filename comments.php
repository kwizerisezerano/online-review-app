<?php
session_start();
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

<body class="d-flex justify-content-center align-items-center" style="height:100vh;">
    <!-- header -->
    <div class="bg-white shadow rounded p-3">
    <h1 style="color:blue;font-family:Algerian;"><center>ONLINE REVIEW PLATFORM</center></h1>
        <h4  style="color:darkblue;font-family:helvetica; "><center>All reviews report<center></h4>
   
        <form action="" method="post" >
            <div class="form-group" >
           <center> <table border="0" width="1200" height="300" bgcolor="white" ></center>
        <tr>
    <th >Reviewid</th>
    <th>REviwed by</th>
    <th>productid</th>
    <th>description</th>
    <th>time </th>
    <th>User status</th>
    <th>Manage reviews</th>
   </tr>
   <?php
                $conn=mysqli_connect("localhost","root","","review");
                if($conn){
                    $select = mysqli_query($conn,"SELECT * FROM `review`");
                    while($row=mysqli_fetch_object($select)){
                        echo"<tr>
                        <td>$row->reviewid</td>
                        <td>$row->username</td>
                        <td>$row->productid</td>
                        <td>$row->description</td>
                        <td>$row->time</td>
                        <td>$row->status</td>
                        <td><b><a style='text-decoration:none;padding-left:0px;'href='all_products.php'><i class='fas fa-shopping-cart' style='color:blue'></i>Available product</a></b></td>
                        <td><b><a style='text-decoration:none;padding-right:0px;' href='updater.php'><i class='fas fa-edit' style='color:blue'></i>update review</a></b></td>
                        <td><b><a style='text-decoration:none;padding-right:0px;'href='deleter.php'><i class='fas fa-recycle' style='color:blue'></i>delete review</a></b></td>
                        
                         </tr>";
                        
                    }
                   
                }
                echo "</table>";
                ?>
</div>
</body>
</html>
