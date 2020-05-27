<?php

include "db.php";

if(isset($_SESSION['firstname'])){
    session_destroy();
    header('location:index.php');
}

if(!isset($_SESSION['firstname'])){
    header('location: index.php');
}