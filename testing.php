<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="#" method="post" enctype="multipart/form-data">
<label for="file" class="form-control">upload photo</label><br>
<input type="file" name="image">
</form>
</body>
</html>
<?php
if(isset($_FILES['image'])){
    $image=$_FILES['image'];
    $pimage=$image['name'];
    $templocation=$image['tmp_name'];
    $target_dir="uploads/".$image;
    if(move_uploaded_file($templocation,$target_dir)){
       $insert= 
    }
}
?>