  <?php
include "db.php";
if(!isset($_SESSION['firstname']) && empty($_SESSION['firstname']) && !isset($_SESSION['isadmin'])){
    header('location:index.php');
}

if($_SESSION['isadmin'] == 0){
    echo "<script>alert('not an admin')</script>";
    header('location:index.php');
    }
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Tabernacle of Psalms attendance portal and official website">
    <meta name="keywords" content="landmark university, lmu choir, tabernacle of psalms, terbanacle lmu">
    <meta name="author" content="Peejay">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Raleway">
    <title> Welcome <?= $_SESSION['firstname'] ?></title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }

        body{
            font-family: Raleway;
            -moz-font-family: Raleway;
            -ms-font-family: Raleway;
            -webkit-font-family: Raleway;
        }

        header{
            position: sticky;
            background: #2A697E;
            top: 0;
            left: 0;
        }

        .container{
            width: 80%;
            margin: 0 auto;
        }

        .main-header{
            display: flex;
            justify-content: space-between;
        }

        .side{
            display: none;
        }

        header ul{
            margin-top: 20px;
        }

        header nav ul li{
            display: inline;
        }

        header nav ul li a{
            padding: 10px;
            text-decoration: none;
            color: #fff;
            font-size: 16px;
        }

        header nav ul li a:hover{
            background: #000;
            color: #fff;
            border-radius: 30px;
            transition: 0.5s ease-out;
        }

            button{
                cursor: pointer;
                background: #fff;
                border: none;
                padding: 3px;
                border-radius: 10px;
            }
        #members{
            height: 50vh;
        }

        .search_spot{
            width: 40%;
            margin: 10px auto;
        }

        .member_side input{
            width: 70%;
            height: 40px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
            outline: none;
            font-family: Raleway;   
        }
        .member_side input:focus{
            border: 1px solid #206059
        }

        .member_side textarea:focus{
            border: 1px solid #206059;
        }

        .member_side textarea{
            height: 200px;
            width: 70%;
            border: 1px solid #ccc;
            font-size: 16px;
            padding: 10px;
            outline: none;
            font-family: Raleway;
        }

        .links{
            background: #fff;
            font-size: 20px;
            text-transform: uppercase;
            transition: 0.5s;
            font-weight: 600;
        }

        .member_side{
            width: 80%;
            margin: 5% auto;
        }

        .member_side ul li{
            border-bottom: 1px solid #f4f4f4;
            list-style: none;
            display: flex;
        }

        .member_side ul li a{
            display: block;
            padding: 10px;
        }

        .delete_btn{
            background-color: #d777a4;
            border: 1px solid red;
            font-size: 25px;
            color: #fff;
            border-radius: 100;
            text-transform: capitalize;
            margin: 5px 0;
        }

        .delete_btn:hover{
            background: red;
        }

        .member_side button{
            height: 40px;
            width: 150px;
            margin: 10px;
            font-size: 17px;
            background: #206059;
            border: none;
            border-radius: 2px;
            color: #fff;
        }

        .member_side button:hover{
            background: #36A181;
            cursor: pointer;
        }

        .member_names{
            width: 90%;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            height: 300px;
            overflow: auto;
        }

        .member_side .links{
            display: block;
            padding: 20px;
            text-decoration: none;
            color: #000;
            box-shadow: 0 0 6px 0 #ddd;
            margin-bottom: 10px;
            outline: none;  
        }

        .member_side .links:hover{
            box-shadow: 0 0 10px 0 #111;
        }

        .member_link{
            width: 100%; 
            padding: 10px;
            color: #000;
            display: block;
        }

        .member_link:hover{
            background: #f3f3f3;
            transition: 0.2s;
        }

        .slide_view{
            display: block;
        }

        form div{
            margin-bottom: 5px;
            width: 50%;
        }
        .main-modal{
        background: rgba(0, 0, 0, 0.5);
        position: fixed;
        z-index: 1;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        display: none; 
    }

.modal-content{
    color: #000;
    background: #FFF;
    margin: 10% auto;
    height: 300px;
    width: 30%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 5px  0px 5px 0 rgba(0, 0, 0, 0.2);
    animation-name: modalopen;
    animation-duration: 1s;
    border-radius: 25px;
    padding: 10px;
}

.modal-content{
    margin-bottom: 20px;
}


#closeBtn{
    float: right;
    font-size: 50px;
    color: #ccc;
    cursor: pointer;
    padding: 2px;
 
}

#closeBtn:hover{
    color: #fff;
}

.content h1{
    font-size: 25px;
    font-family: Raleway;
    text-align: center;
    margin: 20px;
}

.content{
    text-align: center;
}

.btn_spot > div{
width: 40%;
}

.modal_btn{
    display: block;
    padding: 10px;
    margin-top: 30px;
}

.modal_btn:nth-child(1){
    background: red;
    color: #fff;
    
}

#cancel_btn{
    background: #f3f3f3;
    color: #000;
    border: 1px solid #ccc;
    cursor: pointer;
}


.btn_spot{
    display: flex;
    width: 60%;
    margin: 0 auto;
    justify-content: space-between;

}

/* slide menu */
.side-nav{
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background: #111;
    opacity: 0.9;
    overflow-x: hidden;
    padding-top: 60px;
    transition: 0.5s;
}

.side{
    cursor: pointer;
}
.link6{
       cursor: pointer;
    }

.side-nav a{
    padding: 10px 10px 10px 30px;
    text-decoration: none;
    font-size: 22px;
    color: #ccc;
    display: block;
    transform: 0.3s;
}

.side-nav a:hover{
    color:  #fff;
}

.side-nav .btn-close{
    position: absolute;
    top: 0;
    right: 22px;
    font-size: 36px;
    margin-left: 50px;
}

.btn-close{
    cursor: pointer;
    color: #adadad;
}

.btn-close:hover{
    color: #fff;
}

#load-msg{
    margin: 5px;
    font-family: Raleway;
}

#p{
    color: #fff;
    background: green;
    width: 300px;
    padding: 5px;
    border-radius: 3px;
}

#e{
    color: #fff;
    background: red;
    width: 300px;
    padding: 5px;
    font-size: 14px;    
    border-radius: 3px;
}

#w{
    color: #fff;
    background: coral;
    width: 300px;
    padding: 5px;
    font-size: 14px;    
    border-radius: 3px;
}
.slide_view3{
    border: 1px solid #ccc;
    padding: 10px 0;
}

.slide_view3 li{
    border-bottom: 1px solid #f3f3f3;
    padding: 10px;
    font-size: 18px;
    font-style: italic;
}

.span{
}

.link3, .link4{
    cursor: pointer;
}

.res{
        display: flex;
        margin-top: 15px;
    }
    .res > div{
        margin: 5px;
    }

.navbar{
    height: 20px;
}

.slide_view{
    display: block;
}


    @media(max-width: 769px){
        .container{
            width: 95%;
    }

    .log_option{
    right: 10px;
}
            .member_side input{
                width: 100%;
            }

            form div{
                width: 90%;
            }

            .side{
                display: block;
                margin-top: 20px;
                position: relative;
                
            }
            header nav ul{
                display: none;
            }

            .search_spot{
                width: 90%;
            }


            .member_side ul li a:nth-child(2){
                font-size: 10px;
            }

            .approve_btn{
                padding: 5px;
                height: 2em;    
            }

            .member_side ul li a{
            display: block;
            padding: 3px;
        }

        .d2{
            height: 2em;
            font-size: 12px;
        }

            .member_side ul li a{
                font-size: 12px;
            }

            .member_side textarea{
                width: 100%;
            }

            .modal-content{
                width: 90%;
                margin: 30% auto;
            }
        }

        @media(max-width: 400px){
            .modal_btn{
                width: 70px;
            }
            .links{
                font-size: 12px;
                font-weight: 600;
            }

            .temp{
                display: none;
            }

            .slide_view{
                display: none;
            }

            .d2{
                margin: 5px;
                padding: 10px;
            }
        }

        @media(max-width: 275px){
        #e{
            width: 100%;
            font-size: 10px;
            padding: 5px;
        }

        #p, #w{
            width: 100%;
            font-size: 10px;
            padding: 5px;
        }

        .modal_btn,#canceL_btn{
            font-size: 11px;
            padding: 5px;
        }
        }


@keyframes modalopen{
    from{opacity: 0}
    to{opacity: 1}
}

.log_option{
    height: 100px;
    background: #fff;
    width: 150px;
    z-index: 1;
    position: absolute;
    display: none;
    border-radius: 10px;
    box-shadow: 0 0 5px 0 #000;
    padding: 10px;
    animation-name: cum;
    animation-duration: 0.5s;
}

.log_option a{
    display: block;
    color: #000;
    font-size: 15px;
    padding: 5px;
}

.log_option a:hover{
    background: #123;
    color: #fff;
}

.avatar{
    cursor: pointer;
}

.user{
    background: #ccc;
    padding: 3px;
    transition: all 0.5s;
    border-radius: 100%;
}

.avatar:hover{
    background: #ccc9;
    padding: 3px;
    transition: all 0.5s;
    border-radius: 100%;
}

.show{
    display: block;
}

#svg{
    width: 100%;
}

.res > div{
    width: 50px;
}

#svg:hover{
    border: 1px solid yellow;
    border-radius: 3px;
}

.num{
    background: #20205999;
    color: #fff;
    padding: 10px;
    margin-left: 14px;
    text-align: center;
}

.load-spot button{
    width: 200px;
    background: #181818;
    font-size: 14px;
}


.att_spot2{
        width: 100%;
        margin: 10px auto;
        padding: 20px;
        font-family: Raleway;
        font-size: 14px;
        background: #fff;
        height: 300px;
        overflow: auto;
        border: 1px solid #ccc;
    } 

    .att_spot2{
        text-align: center;
    }

    .att_spot2 ul li{
        font-style: normal;
        padding: 10px;
        border-bottom: 1px solid #f3f3f3;
        display: flex;
        justify-content: space-between;
        text-transform: capitalize;
        font-size: 14px;
    }

/*
 * Loading Dots
 * Can we use pseudo elements here instead :after?
 */
.loading span {
  display: inline-block;
  vertical-align: middle;
  width: .6em;
  height: .6em;
  margin: .19em;
  background: #007DB6;
  border-radius: .6em;
  animation: loading 1s infinite alternate;
}

/*
 * Dots Colors
 * Smarter targeting vs nth-of-type?
 */
.loading span:nth-of-type(2) {
  background: #008FB2;
  animation-delay: 0.2s;
}
.loading span:nth-of-type(3) {
  background: #009B9E;
  animation-delay: 0.4s;
}
.loading span:nth-of-type(4) {
  background: #00A77D;
  animation-delay: 0.6s;
}
.loading span:nth-of-type(5) {
  background: #00B247;
  animation-delay: 0.8s;
}
.loading span:nth-of-type(6) {
  background: #5AB027;
  animation-delay: 1.0s;
}
.loading span:nth-of-type(7) {
  background: #A0B61E;
  animation-delay: 1.2s;
}


/*
 * Animation keyframes
 * Use transition opacity instead of keyframes?
 */
@keyframes loading {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@keyframes cum{
    from{opacity: 0}
    to{opacity: 1}
}

.link5{
    cursor: pointer;;
}

.slide_view4 .load-btn{
    background: #000;

}

.slide_view6{
    border: 1px solid #ccc;
    height: 300px;
    overflow: auto;
}

.temp{
    font-size: 14px;
    font-weight: normal;
    text-transform: lowercase;
    margin-top: 5px;
    letter-spacing: 0;
}

.approve_btn{
    font-size: 14px;
    border: 1px solid green;
    color: #000;
    margin: 5px;
}

.approve_btn:hover{
    background: green;
    color: #fff;
    transition: 0.3s;
}

.slide_view7{
    border: 1px solid #ccc;
    height: 300px;
    overflow: auto;
}

.slide_view7 ul li a{
    padding: 15px;
    display: block;
    color: #000;
    width: 90%;
}

.slide_view7 ul li:nth-child(1){
    background: #f3f3f3;
}

.slide_view7 ul li:nth-child(1) .latest{
    display: block;
    color: lightseagreen;
    font-size: 13px;
    letter-spacing: 0.2em;
    text-transform: capitalize;
    padding: 10px;
}

.latest{
    display: none;
}


.slide_view7 ul li a:hover{
    text-decoration: line-through;
    cursor: pointer;
}

.normal_link{
    cursor: pointer;
}

.d2{
    font-size: 14px;
    background: none;
    color: red;
}

.d2:hover{
    color: #fff;
    transition: 0.3s;
}
</style> 
</head>
<body>
<header>
    <div class="container">
        <div class="main-header">
             <div>
                <a href="admin.php"><img src="img/logo.png" alt="logo" width="100px"></a>
            </div>

        <div>
            <nav>
                <ul>
                    <li><a href="att.php"><i class="fa fa-clipboard-check" style="margin-right: 10px;font-size: 25px;"></i>Take attendance</a></li>
                    <li><a href="learn.php"><i class="fa fa-help" style="margin-right: 10px;font-size: 25px;"></i>help</a></li>
                </ul>
            </nav>
        </div>

        <div class="res">
            <div class="side navbar" id="block" onclick="openSlideMenu()">
                <i id="svg" class="fas fa-bars" style="color: #fff; font-size: 40px; margin-right: 10px"></i>
            </div>
    
            <div>
            <?php if($_SESSION['gender'] == "Male"){?>
                    <abbr title="<?= $_SESSION['firstname'] ?>"><img src="img/man.png" alt="" width="40px" class="avatar" id="avatar"></abbr>
                    <div class="log_option">
                            <a href="#"><i class="fas fa-cog" style="margin-right: 4px;"></i>Settings</a>
                            <a href="view.php" target="_blank"><i class="far fa-clipboard" style="margin-right: 4px;"></i>Member page</a>
                            <a href="logout.php"><i class="fas fa-power-off" style="margin-right: 4px;"></i>Logout</a>
                    </div>
                <?php
                }
                else{
                    ?>
                        <abbr title="<?= $_SESSION['firstname'] ?>"><img src="img/girl.png" alt="" width="40px" class="avatar" id="korra"></abbr>
                        <div class="log_option">
                            <a href="#"><i class="fas fa-cog"></i>settings</a>
                            <a href="view.php" target="_blank"><i class="far fa-clipboard" style="margin-right: 4px;"></i>member page</a>
                            <a href="logout.php"><i class="fas fa-power-off" style="margin-right: 4px;"></i>logout</a>
                    </div>
                    <?php
                }    
                ?>
            </div>
    </div>

    
</div>
</div>
</header>

<!--side menu-->
<div id="side-menu" class="side-nav">
<span href="#" class="btn-close" onclick="closeSlideMenu()" id="cus">&times;</span>
<a href="att.php" class="nav_link1"><i class="far fa-user" style="margin-right: 10px;font-size: 25px;"></i>Take attendance</a>
<a href="learn.php" class="nav_link2"><i class="far fa-help" style="margin-right: 10px;font-size: 25px;"></i>Help</a>
</div>
<section id="members">
    <div class="container">
        <div class="member_side">
            <a class="links link1 normal_link"><i class="fa fa-address-card" style="margin-right: 10px;font-size: 25px;color:#2A697E"></i>Members Information
                 <p class="temp">view everything about the unit members e.g delete members, see their records by clicking them</p>
            </a>
            <div class="slide_view slide_view1">
            <div class="search_spot">
                <form action="" method="post">
                <input type="Search" name="member_search" placeholder="Enter member name..." id="input">
                </form>
            </div>
            <div>
                 <input type="" id="id_holder" hidden>
                <div class='member_names'>
                    <?php
                        
                        $sql = "SELECT * FROM members WHERE status = 1 ORDER BY firstname ";
                        
                        $result = mysqli_query($conn, $sql);
                        
                        if(mysqli_num_rows($result) > 0){
                            echo "<ul>";
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <li><a href='user.php?id="<?php echo $row['id'];?>"' class='member_link'><?php if($row['Gender'] == "Male"){?>
                <img src="img/man.png" alt="" width="30px">
                <?php
        } else {?>
                        <img src="img/girl.png" alt="" width="30px">
                    <?php
                }?>  <?php echo "<span style='text-transform: capitalize'>".$row['firstname']." ".$row['lastname']. "</span>";?></a><a href='delete.php?id="<?php echo $row['id'];?>"' class="delete_btn" id="<?php echo $row['id'];?>">&times;</a></li>
                                <?php
                            }
                            echo "</ul>";
                        }
                        else{
                            echo "";
                        }
                    ?>
                </div>
            </div>
            </div>
            <a class="links link2 normal_link"><i class="fa fa-blog" style="margin-right: 10px;font-size: 25px;color:#2A697E"></i>Post a Message
                 <p class="temp">Post a message for the tabernacle of psalms members e.g new rules about the unit</p>
            </a>
            <div class="slide_view slide_view2">
            <div id="load-msg"></div>
                <div>
                    <form action="admin.php" id="form" method="post">
                        <div>
                            <input type="text" name="sender" id="sender" placeholder="Enter sender name..." required>
                        </div>
                        <div>
                            <input type="text" name="title" id="title" placeholder="Enter title..." required>
                        </div>
                        <div>
                            <textarea name="msg" id="msg" cols="30" rows="10" placeholder="Enter the message to send..." required></textarea>
                        </div>
                        <button type="submit" class="submit_btn" id="submit_btn" name="submit">POST<i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
            <a class="links link5"><i class="fas fa-file-upload" style="margin-right: 10px;font-size: 25px;color:#2A697E"></i>POST AUDIO/PICTURE
                 <p class="temp">upload pictures and audios for the members, e.g The song for the sunday service</p>
            </a>
            <div class="slide_view slide_view5">

            <div id="load-msg"></div>
                <div>
                    <form>
                        <div class="response">
                            
                        </div>
                        <div>
                            <input type="text" name="fileName" id="fileName" placeholder="Enter title..." required>
                        </div>
                         <div>
                            <input type="text" name="sender" id="fileSender" placeholder="Enter sender..." required>
                        </div>
                        <div>
                            <input type="file" name="file" id="file" required>
                        </div>
                        <button type="submit" class="fileBtn" id="fileBtn" name="submit">POST<i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
            <a class="links link7 normal_link">DELETE POSTS
            <p class="temp">Delete posts</p></a>
            <div class="slide_view slide_view7">
                <?php
                    $sql = "SELECT * FROM posts ORDER BY time DESC";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0){
                        echo "<ul>";
                        while($row = mysqli_fetch_assoc($result)){?>
                            <li><a href="deletePost.php?id=<?=$row['id']?>" style="text-transform: capitalize;"><?=$row['title']?></a><span class="latest">latest post</span></li>
                            <?php
                        }
                        echo "</ul>";
                    }
                    else{
                            echo "<ul><li style='padding: 10px;'>No Post available</li></ul>";
                        }
                ?>
            </div>
            

            <a class="links link3"><i class="fab fa-accusoft" style="margin-right: 10px;font-size: 25px;color:#2A697E"></i>View Logs
                 <p class="temp">Check out how many members we have now to see how the ministry is growing</p>
            </a>
            <div class="slide_view slide_view3">
                <div>
                <ul>
                <li>Total members: <span class="num"><?php $sql = "SELECT * FROM members WHERE status = 1";  $result = mysqli_query($conn, $sql);echo mysqli_num_rows($result);?></span></li>
                    <li>100 level members: <span class="num"><?php $sql = "SELECT * FROM members WHERE level = 100 AND status = 1";$result = mysqli_query($conn, $sql);echo mysqli_num_rows($result);?></span></li>
                    <li>200 level members: <span class="num"><?php $sql = "SELECT * FROM members WHERE level = 200 AND status = 1";$result = mysqli_query($conn, $sql);echo mysqli_num_rows($result);?></span></li>
                    <li>300 level members: <span class="num"><?php $sql = "SELECT * FROM members WHERE level = 300 AND status = 1";$result = mysqli_query($conn, $sql);echo mysqli_num_rows($result);?></span></li>
                    <li>400 level members: <span class="num"><?php $sql = "SELECT * FROM members WHERE level = 400 AND status = 1";$result = mysqli_query($conn, $sql);echo mysqli_num_rows($result);?></span></li>
                    <li>500 level members: <span class="num"><?php $sql = "SELECT * FROM members WHERE level = 500 AND status = 1";$result = mysqli_query($conn, $sql);echo mysqli_num_rows($result);?></span></li>
                    </ul>
                </div>
            </div>
            <a class="links link4"><i class="fa fa-clipboard-check" style="margin-right: 10px;font-size: 25px;color:#2A697E"></i>ATTENDANCE RECORDS
             <p class="temp">See the attendance records of every member for this paticular day</p></a>
            <div class="slide_view slide_view4">
            <div class="att_rec">
                </div>
                <button class='load-btn'>Fetch attendance</button>
            </div>
            <a class="links link6"><i class="fas fa-check-circle" style="margin-right: 10px;font-size: 25px;color:#2A697E"></i>Unapproved members
                <p class="temp">Some members are waiting to be approved</p>
            </a>
            <div class="slide_view slide_view6">
                <div class="new_members">
                    <?php
                        $date = date('m-d-Y');
                        $sql = "SELECT * FROM members  WHERE status = 0 ORDER BY firstname ASC";
                        $result = mysqli_query($conn, $sql);
                        
                        if(mysqli_num_rows($result) > 0){
                                  echo "<ul>";
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <li><a href='user.php?id="<?php echo $row['id'];?>"' class='member_link new_mem'><?php if($row['Gender'] == "Male"){?>
                                        <img src="img/man.png" alt="" width="30px">
                            <?php
                            } else {?>
                                    <img src="img/girl.png" alt="" width="30px">
                                <?php
                            }?>  <?php echo "<span style='text-transform: capitalize'>".$row['firstname']." ".$row['lastname']. "</span>";?></a><a href='approve.php?id="<?php echo $row['id'];?>"' class="approve_btn" id="<?php echo $row['id'];?>">Approve</a><a href='delete.php?id="<?php echo $row['id'];?>"' class="delete_btn d2" id="<?php echo $row['id'];?>">Remove</a></li>
                                            <?php
                                        }
                                        echo "</ul>";
                        }
                        else{
                            echo "<ul><li style='padding: 10px;'>No Unapproved member available</li></ul>";
                        }
                    ?>
                </div>
            </div>
    </div>
</section>   

<audio src="audio/chime.mp3" id="sound"></audio>

<!--modal Spot-->  
<div id="modal" class="main-modal">
    <span id="closeBtn">&times;</span>
    <div class="modal-content" id="mod">
        <div class="in-modal">
            <div class="content">
                <h1>ARE YOU SURE?</h1>
                <p>This member will deleted permanently..</p>
                <div class="btn_spot">
                    <div class="spt">
                        
                    </div>
                    <div>
                        <a class="modal_btn" id="cancel_btn">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js'></script>
<script src="jquery/jquery.js"></script>

<script>

$(() => {

    $('#input').keyup(() => {
        var search = $('#input').val();
           $('.member_names').load('member.php', {
               search: search
           });
        });

        $('.link1').click(() => {
            $('.slide_view1').slideToggle(1000);
        })


        $('.link2').click(() => {
            $('.slide_view2').slideToggle(1000);
        })

        $('.link3').click(() => {
            $('.slide_view3').slideToggle(1000);
        });

        $('.link4').click(() => {
            $('.slide_view4').slideToggle(1000);
        });

         $('.link5').click(() => {
            $('.slide_view5').slideToggle(1000);
        });

          $('.link6').click(() => {
            $('.slide_view6').slideToggle(1000);
        });


        $('.link7').click(() => {
            $('.slide_view7').slideToggle(1000);
        });

        $('.avatar').click((e) => {
            $('.log_option').toggleClass('show');
            $('.avatar').toggleClass('user');
        })

        $(window).click((e) => {
            if(e.target.id == "avatar" || e.target.id == "korra"){
            }
            else{
                $('.log_option').removeClass('show'); 
                $('.avatar').removeClass('user');
            }
        })
});

$(() => {
    $('.modal_btn').click((e) => {
        e.preventDefault();
    })

     $('.delete_btn').click((e) => {
        e.preventDefault();
        $('#id_holder').val(`${e.target.id}`);
        $('.main-modal').css("display", "block");
        $('.spt').html(`<a href="delete.php?id=${$('#id_holder').val()}" class="modal_btn">Delete</a>`)
    })

    $('#form').submit((e) => {
                e.preventDefault();
    		});
    		$('#submit_btn').click(() => {
                const sender = $('#sender').val();
                const title = $('#title').val();
                const msg = $('#msg').val();
                
    	if(sender == ""){
            $('#load-msg').html('<p id="e">Enter the sender\'s name...</p>');
				setTimeout(() => {
					$('#load-msg').text('');
				}, 2000)
        }
        else if(title == ""){
            $('#load-msg').html('<p id="e">Enter the title...</p>');
				setTimeout(() => {
					$('#load-msg').text('');
				}, 2000)
        }
        else if(msg == ""){
            $('#load-msg').html('<p id="e">Enter the msg...</p>');
				setTimeout(() => {
					$('#load-msg').text('');
				}, 2000)
        }
        else{


            $.ajax
    				(
    				{
    					url: 'post.php',
    					method: 'post',
    					data: {
                            sender,
                            title,
                            msg,
                        },		
    					success: function(response){
                            $('#load-msg').html(`<p id="p">${response}</p>`);
				setTimeout(() => {
					$('#load-msg').text('');
				}, 2000); 
                },
    					error: (e) => {
    						$('#load-msg').html('<p id="e">waiting for connection...</p>');
				setTimeout(() => {
					$('#load-msg').text('');
				}, 4000);
    					}
    				}
    				);
                    setTimeout(() => {
                        $('#sender').val('');
                    $('#title').val('');
                    $('#msg').val('');
				}, 2000);
				
				$('#load-msg').html(`<div class="loading">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
</div>`);
				setTimeout(() => {
					$('#load-msg').text('');
				}, 2000);
        }
 })

    $('.load-btn').click(() => {
        $('.att_rec').html(`<div class="loading">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
</div>`)

    setTimeout(() => {
    $.get("records.php", (response) => {
        $('.att_rec').html(response);                       
    })
        $('.load-btn').html('<i class="fas fa-redo" style="margin-right: 10px"></i>Refresh list')
   }, 2000);
    })
})

//slide menu
function openSlideMenu(){
    document.getElementById('side-menu').style.width = '250px';
    if(window.innerWidth <= 426){
        document.getElementById('side-menu').style.width = '100%';
        $('.d2').text('R');
        $('.approve_btn').text('A');
    }
}

function closeSlideMenu(){
    document.getElementById('side-menu').style.width = '0';
}

window.addEventListener('click', e => {
    if(e.target.id == "side-menu" || e.target.id == "svg"){

    }
    else{
        document.getElementById('side-menu').style.width = '0';
    }
})

const sub = document.getElementById('submit_btn');
const sound = document.getElementById('sound');
const sender = document.getElementById('sender');
const title = document.getElementById('title');
const msg = document.getElementById('msg');

sub.addEventListener('click', () => {
    if(sender.value !== '' && title.value !== '' && msg.value !== ''){
        sound.play();
    }
    else{

    }
})

   $('.fileBtn').click((e) => {
    $('.response').html(`<div class="loading">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
</div>`)
        e.preventDefault();
            var fileName = $('#fileName').val();
            var sender = $('#fileSender').val();
            var file_data = $('#file').prop('files')[0];
            if(fileName !== '' && sender !== ''){
            formData = new FormData();
            formData.append("file", file_data);
            formData.append("filename", fileName);
            formData.append("sender", sender);
                $.ajax
                    (
                    {
                    url: 'upload.php',
                    method: 'post',
                    dataType: 'script',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(response){
                    $('.response').html(response)
                                    setTimeout(() => {
                    $('.response').html('');
                    $('#file').val('');
                    $('#fileName').val('');
                    $('#fileSender').val('');
}, 3000);

                },
                    error: (e) => {
                            $('.response').html(`<p id="w">${e.statusText}</p>`)
                    }
                }
                );
            }
            else{
                $('.response').html('<p id="e">pls make sure all inputs are entered correctly...</p>')
                    setTimeout(() => {
                    $('.response').html('');
                }, 3000);
            }
        })

setInterval(() => {
    $('.slide_view3').load('num.php');
}, 3000);


$('#closeBtn').click(() => {
    $('.main-modal').css('display','none');
})


$('#cancel_btn').click(() => {
    $('.main-modal').css('display','none');
})

$(window).click((e) => {
    if(e.target.className == 'main-modal'){
        $('.main-modal').css('display','none');
    }
})

</script>
</body>
</html>
