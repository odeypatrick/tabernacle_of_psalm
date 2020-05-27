<?php
include "db.php";

$date = date('y-m-d');

$query = "SELECT regnumber FROM members WHERE status = 1";
$query_result = mysqli_query($conn, $query);

if(mysqli_num_rows($query_result) > 0){
    while($row = mysqli_fetch_assoc($query_result)){
	$regno = $row['regnumber'];
	$sql = "INSERT INTO attendance (regno, record, date) VALUES($regno, 0, '$date')";
	if(mysqli_query($conn, $sql)){
		echo "<p id='m'>Attendance has started...</p>";
	}
	else{
		echo mysqli_error($conn);	
	}
	}
}
else{
    echo "<p id='e'>no member found!</p>";
}

$sql = "INSERT INTO attUpdate (`start`, `date`) VALUES (1, '$date')";

if(mysqli_query($conn, $sql)){
	echo "<p id='p'>yes bro</p>";
}
else{
	echo mysqli_error($conn);
}
