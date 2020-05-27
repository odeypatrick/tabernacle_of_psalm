<?php

include "db.php";

$id = $_GET['id'];

$sql = "UPDATE members SET is_admin = 0 WHERE id = $id";

if(mysqli_query($conn, $sql)){
    header('location: user.php?id="'.$id.'"');
}
else{
echo "could not remove admin";   
}

