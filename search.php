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
        <h4  style="color:darkblue;font-family:helvetica; "><center>Search specific product here<center></h4>
   
        <form action="" method="post" >
        <div class="form-group">
        <label for="">Search specific product here</label>
                <select name="id" id="" class="form-control" required>
                    <?php
                $conn=mysqli_connect("localhost","root","","review");
                if($conn){
                    $select = mysqli_query($conn,"SELECT * FROM `product`");
                    while($row=mysqli_fetch_array($select)){
                        echo"<option value='".$row['productid']."'>".$row['name']."</option>";
                    }
                }
                ?>
                </select>
            </div>         
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary w-100">Search product</button>
            </div>



    </form>

            <div class="form-group" >
            <table border="0" width="1000" height="300" bgcolor="white" >
        <tr>
    <th>Productid</th>
    <th>name</th>
    <th>marc</th>
    <th>size</th>
    <th>type </th>
    <th>Seller</th>
    <th>manage</th>
   </tr>
   <?php
                $conn=mysqli_connect("localhost","root","","review");
                if($_POST){
                    $id=$_POST['id'];
                    $select = mysqli_query($conn,"SELECT * FROM `product` where productid='$id'");
                    while($row=mysqli_fetch_object($select)){
                        echo"<tr>
                        <td>$row->productid</td>
                        <td>$row->name</td>
                        <td>$row->marc</td>
                        <td>$row->size</td>
                        <td>$row->type</td>
                        <td>$row->seller</td>
                        <td><b><a style='text-decoration:none;'href='all_products.php'>Products</a></b></td>
                                             
                         </tr>";
                        
                    }
                   
                }
                echo "</table>";
                ?>
</div>
</body>
</html>
