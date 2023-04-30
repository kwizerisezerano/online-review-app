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
</head>

<body class="d-flex justify-content-center align-items-center" style="height:100vh;background-color:skyblue;">
    <!-- header -->
    <div class="bg-white shadow rounded p-3">
    <h1 style="color:blue;font-family:Algerian;"><center>ONLINE REVIEW PLATFORM</center></h1>
        <h4  style="color:darkblue;font-family:helvetica; "><center>All reviews report<center></h4>
   
        <form action="" method="post" >
            <div class="form-group" >
            <table border="0" width="1000" height="300" bgcolor="white" >
        <tr>
    <th>Reviewid</th>
    <th>REviwed By</th>
    <th>productid</th>
    <th>description</th>
    <th>Reviewed time </th>
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
                        <td><b><a style='text-decoration:none;'href='all_products.php'>Products</a></b></td>
                        <td><b><a style='text-decoration:none;' href='updater.php'>Update</a></b></td>
                        <td><b><a style='text-decoration:none;'href='deleter.php'>Delete</a></b></td>
                        
                         </tr>";
                        
                    }
                   
                }
                echo "</table>";
                ?>
</div>
</body>
</html>
