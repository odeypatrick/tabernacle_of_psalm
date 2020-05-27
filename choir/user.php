<?php
include "db.php";
include "config/config.php";

if(!isset($_SESSION['isadmin'])){
    header('location:index.php');
}

if($_SESSION['isadmin'] == 0){
    header('location:index.php');
}



?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<meta name="description" content="Tabernacle of Psalms attendance portal and official website">
<meta name="keywords" content="landmark university, lmu choir, tabernacle of psalms, terbanacle lmu">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
<meta name="author" content="Peejay">
<link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Raleway">
<style>

body{
    font-family: Raleway;
}

.sec1{
    border: 1px solid #ccc;
    background: #f3f3f3;
    margin-top: 10px;
}

.info{
    display: flex; 
}

.info > div{
    width: 50%;
}

.sec1 ul li{
    font-size: 18px;
}

.small{
    font-size: 12px;
    padding: 0;
    background: none;
}

.firstname{
    padding: 0;
    text-transform: capitalize;
    background: none;
}
               
table {
          width: 100%;
          border-collapse: collapse;
    }
    
    tr:first-child{
            background-color: #f1f1c499;
        }


        .head{
            background: #2A697E ;
            color: #fff;
            text-transform: uppercase;
        }

        td, th {
          border: 1px solid #999898;
          text-align: left;
          padding: 8px;
        }

.att_record > div{
    padding: 10px;
}

.att_spot{
    width: 80%;
    margin: 0 auto;
    height: 400px;
    overflow: auto;
    border-bottom: 2px dashed green;
}


    ul{
        margin: 5% auto;
        width: 90%;
    }


    .mail{
        text-transform: lowercase;
    }

    li{
        list-style: none;
        padding: 10px 0;
        font-size: 16px;
        margin-bottom: 7px;
    }

    .var{
        text-transform: capitalize;
        margin-right: 10px;
        background: #ccc;
        color: #000;
        padding: 10px;
    }

    .button{
        background: #f4f4f4;
        color: #ccc;
        padding: 10px;
        display: block;
        width: 20px;
        text-decoration: none;
        border: none;
        font-size: 18px;
    }

    .button:hover{
        background: #fff;
        color: #000;
    }

    .percent{
        padding: 10px;
        background: #f3f3f3;
        width: 100px;
        border: 1px solid #ccc;
    }

    .admin_btn{
        padding: 10px;
        font-size: 15px;
        cursor: pointer;
        text-decoration: none;
        display: block;
    }

    .admin_btn:hover{
        opacity: 0.5;
    }

    .red_btn{
        background: red;
        color: #fff;
        width: 100px;
    }

    .green_btn{
        background: green;
        color: #fff;
        width: 85px;
    }

    @media(max-width: 769px){
        .info{
            flex-direction: column;
        }

        .info > div{
            width: 100%;
        }
    }
</style>
</head>
</body>

<!--some-->
<a href="<?php echo ROOT_URL; ?>" class="button" ><i class="fas fa-backward"></i></a>

<div class="info">
<div class="sec1">
<?php


$id = $_GET['id'];

$sql = "SELECT * FROM members WHERE id = $id";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result)
    ?>
    <ul>
        <li>Fullname: <?= $row['firstname']." ".$row['lastname'] ?></li>
        <li>Webmail: <?= $row['webmail'] ?></li>
        <li>Level: <?= $row['level']?></li>
        <li>Date of Birth: <?= $row['DOB']?></li>
        <li>Reg number: <?= $row['regnumber']?></li>
        <li>Gender: <?= $row['Gender']?></li>
    </ul>
<?php if($row['is_admin'] == 0) {?>
        <a href='auth.php?id=<?php echo $row['id'];?>' class="admin_btn green_btn">Make admin</a>
    <?php
}
else{?>
    <a href='auth2.php?id=<?php echo $row['id'];?>' class="admin_btn red_btn">remove admin</a>
<?php } ?>

<?php
}
else{
    die("user not found!, might have been deleted or do not exist at all!");
}
?> 
</div>
<title><?php echo $row['firstname'] ?>'s information</title>

<div class="att_spot">
    <?php

    $reg = $row['regnumber'];
    $day =  date('l');

    $query = "SELECT * FROM attendance WHERE regno = $reg ORDER BY id DESC";

    $res = mysqli_query($conn, $query);

    if(mysqli_num_rows($res) > 0){
    ?>
    <div class="sec2">
    <?php
        $sql1 = "SELECT record FROM attendance WHERE record = 0 AND regno = $reg";
        $sql2 = "SELECT record FROM attendance WHERE record = 1 AND regno = $reg";
        
        $qr1 = mysqli_query($conn, $sql1);
        $qr2 = mysqli_query($conn, $sql2);
        
        $failed =  mysqli_num_rows($qr1);
        $success = mysqli_num_rows($qr2);
        
        $fres = ($success / ($success + $failed)) * 100;
        ?>
        <div class="percent"> 
            <?= round($fres, 2).'%'; ?>
        </div>   
    <table>
    <tr>
        <td class="head">date</td>
        <td class="head">attendance</td>
        <td class="head">time</td>
    </tr>
    <tbody id="show_answer">
    <?php
    while($row = mysqli_fetch_assoc($res)){
        ?>
                <tr>
                <td><?= date('l M d, Y', strtotime($row['date']))?></td>
            <td><?php 
                if($row['record'] == 1){
                    ?>
                        <img src="img/tick.png" alt="tick-mark" width="30">
                    <?php
                }else{
                    ?>
                        <img src="img/x-mark.png" alt="x-mark" width="30">
                    <?php
                }          
            ?></td>
            <td class="time"><?= date('h:ia',strtotime($row['time'])) ?></td>
        </tr>
        <?php
    }

    ?>
    </tbody>
        </table>

    <?php
}
else{
echo "Attendance records not found";
}

?>
        </div>  
</div>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js'></script>
<script src="jquery/jquery.js"></script>

<script>
    $('.green_btn').click((e) => {
        e.preventDefault();
        var aNum = 1;
        $.ajax(
            {
                url: "auth.php",
                method: "POST",
                data: aNum,
                success: (response) => {
                    console.log(response);
                }
                error: () => {
                    console.log("error oh");
                }
            }
        )
    })
</script>
</body>
</html>


















