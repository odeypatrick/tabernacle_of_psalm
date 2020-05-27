<?php

include "db.php";

$id = $_GET['id'];

$query = "SELECT * FROM members WHERE id = $id";
$sql_result = mysqli_query($conn, $query);

if(mysqli_num_rows($sql_result) > 0){
    $row = mysqli_fetch_assoc($sql_result);
    $Preg = $row['regnumber'];
    $del_query = "DELETE FROM attendance WHERE regno = '$Preg'";
    if(mysqli_query($conn, $del_query)){
        $sql = "DELETE FROM members WHERE id = $id";

    $result = mysqli_query($conn, $sql);

        if($result){
        header('location:admin.php');
        }
        else{
        echo mysqli_error($conn);
        }
    }

}




