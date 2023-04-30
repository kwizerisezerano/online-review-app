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
    <script src="assets\js\bootstrap.bundle.js"></script>
    <title>Document</title>
</head>

<body class="d-flex justify-content-center align-items-center bg-light" style="height:100vh">
    <!-- header -->
    <div class="bg-white shadow rounded p-3">
    <h1 style="color:blue;font-family:Algerian;">ONLINE REVIEW PLATFORM</h1>
        <h4  style="color:darkblue;font-family:helvetica; "><center>modify your review<center></h4>
        
        
        <form action="" method="post" >
        <div class="form-group">
        <label for="">reviewID</label>
                <select name="reviewid" id="" class="form-control" required>
                    <?php
                $conn=mysqli_connect("localhost","root","","review");
                if($conn){
                    $select = mysqli_query($conn,"SELECT * FROM `review` where username='$_SESSION[user]'");
                    while($row=mysqli_fetch_array($select)){
                        echo"<option value='".$row['reviewid']."'>".$row['reviewid']."</option>";
                    }
                }
                ?>
                </select>
            </div>          
            
            
           
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary w-100">Remove Review</button>
            </div>
            <div class="form-group mt-2">
                <p>
                    <center><b> <a href="comments.php"style="text-decoration:none;">View reviews</a></b> </center> 
                    <center> <b> <a href="all_products.php"style="text-decoration:none;">View available products</a></b> </center> 
                </p>
            </div>

        </form>
        
    </div>
</body>

</html>
<?php
$conn=mysqli_connect("localhost","root","","review");
if($_POST){
    $userid=$_POST['reviewid'];
    
       $insert=mysqli_query($conn,"delete from review  where reviewid='$userid'");
    if($insert){
        echo "<script>alert('review  is successfully added to  product');</script>";
        header("location:comments.php");
    }
    else{
        echo "<script>alert('no review added');</script>";
    }
}
else{
    echo "<script>alert('please try again');</script>";
}

?>