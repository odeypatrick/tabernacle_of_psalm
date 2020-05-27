<?php
include "db.php";

if(!isset($_SESSION['firstname']) && empty($_SESSION['firstname']) && !isset($_SESSION['isadmin'])){
    header('location:index.php');
}

if($_SESSION['isadmin'] == 0){
    echo "<script>alert('not an admin')</script>";
    header('location:index.php');
}

$title = mysqli_real_escape_string($conn, htmlentities($_POST['title']));
$sender = mysqli_real_escape_string($conn, htmlentities($_POST['sender']));
$msg = mysqli_real_escape_string($conn, $_POST['msg']);

$sql = "INSERT INTO posts (sender, title, body) VALUES ('$sender', '$title', '$msg')";

if(mysqli_query($conn, $sql)){
    echo "success";
}
else{
    echo "An error occurred try again";
}
?>


