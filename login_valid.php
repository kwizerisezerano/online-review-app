<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "review");

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pswd = $_POST['password'];
    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE `username`='$user'");
    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $db_pswd_hash = $row['password'];
        if (password_verify($pswd, $db_pswd_hash)) {
            $_SESSION["user"] = $row['username'];
            $_SESSION["pswd"] = $db_pswd_hash;

            if ($row['status'] == "seller") {
                header("location:seller.php");
            } else {
                header("location:all_products.php");
            }
        } else {
            echo "<script>alert('incorrect password');</script>";
            header("location:index.php");
        }
    } else {
       // echo "<script>alert('incorrect username');</script>";
        header("location:index.php");
    }
}
?>
