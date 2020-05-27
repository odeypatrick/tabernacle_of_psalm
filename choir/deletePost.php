<?php


include "db.php";

$id = $_GET['id'];

    $del_query = "DELETE FROM posts WHERE id = $id";

    if(mysqli_query($conn, $del_query)){
        header('location:admin.php');
    }
    else{
        echo mysqli_error($conn);
        }




