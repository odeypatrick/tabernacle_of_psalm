<?php

include "db.php";

$id = $_GET['id'];

$sql = "UPDATE members SET status = 1 WHERE id = $id";

if(mysqli_query($conn, $sql)){
    header('location: admin.php');
}
else{
echo "could not approve member";   
}


