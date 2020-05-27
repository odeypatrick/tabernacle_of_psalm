<?php
include "db.php";

if(!isset($_SESSION['firstname']) && empty($_SESSION['firstname']) && !isset($_SESSION['isadmin'])){
    header('location:index.php');
}

if($_SESSION['isadmin'] == 0){
    header('location:index.php');
}

if(isset($_FILES['file'])){
	$filename = mysqli_real_escape_string($conn, $_POST['filename']);
$sender = mysqli_real_escape_string($conn, $_POST['sender']);

$target_directory = "files/";
$target_file = $target_directory.basename($_FILES['file']["name"]);
$filesize = $_FILES['file']['size'];
$filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$newfilename = $target_directory.$filename.".".$filetype;

if($filetype == 'mp3'|| $filetype == 'jpg' || $filetype == 'png' || $filetype == 'jpeg' || $filetype == 'gif'){

    $sql = "INSERT INTO posts (sender, title, audio, file_type) VALUES ('$sender', '$filename', '$newfilename', '$filetype')";
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $newfilename)){
            if(mysqli_query($conn, $sql)){
                echo "<p id='p'>file uploaded</p>";
          }
          else{
            echo mysql_error($conn);
          }
        }
        else{
            echo "<p id='e'>could not send!</p>";
        }
}else{
	die("<p id='e'>invalid file type, pls only music or pictures pls</p>");
}

}
else{
	echo "<p id='e'>no file chosen</p>";
}
