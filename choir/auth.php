<?php

include "db.php";

$id = $_GET['id'];

$sql = "UPDATE members SET is_admin = 1 WHERE id = $id AND status = 1";

if(mysqli_query($conn, $sql)){
    header('location: user.php?id='.$id.'');
}
else{
echo "could not make admin";   
}

