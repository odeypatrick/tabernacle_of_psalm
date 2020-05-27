<?php

include "db.php";

	$regno = mysqli_real_escape_string($conn, htmlentities($_POST['regno']));
	$date = date('y-m-d');

	$query = "SELECT regnumber, firstname, lastname FROM members WHERE regnumber = $regno";
	$res = mysqli_query($conn, $query);

	$query2 = "SELECT record,date FROM attendance WHERE regno = $regno AND date = '$date'";
	$res2 = mysqli_query($conn, $query2);

	$Sql = "UPDATE attendance SET record = 1 WHERE regno = $regno AND date = '$date'";

	if(mysqli_num_rows($res) > 0){
		$row = mysqli_fetch_assoc($res);
		if(mysqli_query($conn, $Sql)){
			if(mysqli_num_rows($res2) > 0){
				$row2 = mysqli_fetch_assoc($res2);
				if($row2['record'] == 1){
					echo "<p id='w'>".$row['firstname']." ".$row['lastname']." has already taken attendance...</p>";
				}
				else{
					if(mysqli_query($conn, $Sql)){
						echo "<p id='p'>".$row['firstname']." ".$row['lastname']."---Attendance taken successfully</p>";
					}
				}
			}
			else{
				echo "<p id='e'>Attendance has not started yet,<small> click the start button to start attendance!!</small></p>";
			}
		}
	}
	else{
		echo "<p id='e'>reg number not Valid!!!</p>";
	}
