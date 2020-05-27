<?php

include "db.php";
if(!isset($_SESSION['firstname']) && empty($_SESSION['firstname'])){
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
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Raleway">
    <title>Welcome <?php echo $_SESSION['firstname']; ?></title>
</head>
<body>

<style>
    /* global styles */
    .container{
        width: 80%;
        margin: 0 auto;
    }

    *{
        padding: 0;
        margin: 0;
    }

    body{
        font-family: Raleway;
    }

    header{
            position: sticky;
            background: #2A697E;
            top: 0;
            z-index: 1;
    }
    .res{
        display: flex;
        margin-top: 15px;
    }
    .res > div{
        margin: 5px;
    }

    header nav ul{
        margin-top: 20px;
    }

    header nav ul li a{
        text-decoration: none;
        color: #fff;
        padding: 10px;
        font-size: 17px;
    }

    header nav ul li a:hover{
        background: #000;
        transition: 0.5s;
        border-radius: 20px;
    }

    header nav ul li{
        display: inline;
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


.side{
            display: none;
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

.main-modal{
        background: rgba(0, 0, 0, 0.5);
        position: fixed;
        z-index: 1;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        display: block; 
    }

.modal-content{
    color: #000;
    background: #FFF;
    margin: 10% auto;
    height: 300px;
    width: 30%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 5px  0px 5px 0 rgba(0, 0, 0, 0.2);
    animation-name: modalopen;
    animation-duration: 2s;
    border-radius: 25px;
    padding: 10px;
}

.modal-content{
    margin-bottom: 20px;
}


#closeBtn{
    float: right;
    font-size: 30px;
    color: #ccc;
    cursor: pointer;
    padding: 2px;
 
}

#closeBtn:hover{
    background: #fff;
    border-radius: 10px;
    color: #000;
}

.content h1{
    font-size: 25px;
    font-family: arial;
    text-align: center;
    margin: 20px;
}

.content{
    text-align: center;
}

.content p{
    font-size: 15px;
}

.btn_spot{
width: 40%;
margin: auto;
}

#cancel_btn{
    color: green;
    border: 1px solid green;
    cursor: pointer;
}

#cancel_btn:hover{
    border: 1px dotted green;
}

.modal_btn{
    display: block;
    padding: 10px;
    margin-top: 30px;
}


.post_section{
    width: 60%;
    margin: 1% auto;
    background: #fff;
    height: 100%;
}

.posts{
    
}

.title{
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ccc;
}

.title span{
    font-size: 30px;
    font-weight: normal;
    color: rgba(0,0,0,0.77);
    text-transform: capitalize;
}

.body p{
    color: #505050;
    font-family: arial,sans-serif;
    font-size: 14px;
    line-height: 1.7em;
    padding: 0 20px;
}

.body p{
    margin-bottom: 20px;
}

.body{
    height: 100%;
}

.small{
    display: flex;
    justify-content: space-between;
    padding: 5px;
    border-top: 1px solid #ccc;
    margin-top: -5px;
    font-size: 12px;
    color: rgba(0, 0, 0, 0.9);
}

.search_spot{
    text-align: center;
}
.search_spot input{
    width: 300px;
    border: 1px solid rgba(0,0,0,0.77);
    padding: 10px;
    border-radius: 2px;
    outline: none;
    font-size: 17px;
}

.search_spot input:focus{
    border: 1px solid #143A3D
}

.sect{
    border: 1px solid #ccc;
    margin-top: 10px;
    margin-bottom: 40px;
    
}

footer{
    padding: 10px; 
    text-align:center;
}


#error{
    color: red;
}


@media(min-width: 769px){
    .main-header{
        display: flex;
        justify-content: space-between;
    }
}

@media(max-width: 769px){
    .side{
        display: block;
    }

   
    header nav ul{
        display: none;
    }

    .log_option{
        right: 10px;
    }

    .main-header{
        display: flex;
        justify-content: space-between;
    }

    .container{
        width: 100%;
    }

    .post_section{
        width: 90%;
    }

     .modal-content{
        width: 90%;
    }
}

@media(max-width: 400px){
    .search_spot input{
        width: 250px;
    }

    .title span{
        font-size: 20px;
    }

    header #logo{
        width: 80px;
    }

    .small{
        font-size: 12px;
    }

    .side-nav{
        
    }

    .title span{
        font-size: 18px;
    }

    .search_spot input{
        padding: 6px;
        font-size: 14px;
        border-radius: 3px;
    }

    audio{
        width: 90%;
    }

}

@media(max-width: 275px){
    .search_spot input{
        width: 95%; 
    }

    .head{
        font-size: 9px;
    }
    .post_section{
        width: 100%;
        margin: 0;
    }

     .modal_btn,#canceL_btn{
        font-size: 11px;
        padding: 5px;
    }

    .body{
        font-size: 10px;
    }

    .title span{
        font-size: 14px;
    }

    .small{
        font-size: 8px;
        padding: 0;
    }

    .sect{
        margin: 0 3px;
    }

    .body{
        margin: 0px;
    }

    .sma{
        font-size: 7px;
    }

    .time{
        font-size: 10px;
    }
    .small > div{
        width: 90%; 
    }

    .time small{
        font-size: 7px;
    }

    footer{
        font-size: 10px;
    }

    .log_option a{
        color: red;    
    }
}


.log_option{
    height: 70px;
    background: #fff;
    width: 150px;
    z-index: 1;
    position: fixed;
    display: none;
    box-shadow: 0 0 5px 0 #000;
    border-radius: 10px;
    padding: 10px;
}

.log_option a{
    display: block;
    color: #000;
    font-size: 15px;
    padding: 5px;
    text-decoration: none;
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
    background: #ccc;
    padding: 3px;
    transition: all 0.5s;
    border-radius: 100%;
}

#svg:hover{
    border: 1px solid orange;
}

.percent{
    padding: 10px;
    background: #f3f3f3;
    width: 100px;
    border: 1px solid #ccc;
    text-align: center;
    margin: 0 auto;
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

@keyframes loading {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@keyframes modalopen{
    from{opacity: 0}
    to{opacity: 1}
}

    audio{
        outline: none;
        background: #000;
        padding: 5px 10px;
    }

    .audio_spot{
        text-align: center;
    }
     

</style>
    
  <?php
  $pname = $_SESSION['firstname'];
                        $date = date('m-d-Y');
                        $sql = "SELECT * FROM members WHERE firstname = '$pname'";
                        $result = mysqli_query($conn, $sql);
                        
                        if(mysqli_num_rows($result) > 0){
                            $row = mysqli_fetch_assoc($result);
                                if(date('m-d-Y',strtotime($row['date_joined'])) == $date){?>
                                    <div id="modal" class="main-modal">
    <span id="closeBtn">&times;</span>
    <div class="modal-content" id="mod">
        <div class="in-modal">
            <div class="content">
                <h1>WELCOME!!</h1>
                <div>
                   <?php if($row['Gender'] == "Male"){?>
                <img src="img/man.png" alt="" width="30px">
                <?php
        } else {?>
                        <img src="img/girl.png" alt="" width="50px">
                    <?php
}
                    ?>
                </div>
                <p><?= $row['firstname']." ".$row['lastname'] ?> you are welcome to the tabernacle of psalms, thanks for joining the tabernacle of psalms, here you will meet wonderfull people</p>
                <div class="btn_spot">
                    <div>
                        <a class="modal_btn" id="cancel_btn">continue</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                <?php
                            }
                        }
                    ?>
<header>
<div class="container">
<div class="main-header">
<div>
<a href="view.php"><img src="img/logo.png" alt="logo" width="100" id="logo"></a>
</div>

    <div>
        <nav class="navi">
            <ul>
                <li><a href="#"><i class="fa fa-blog" style="margin-right: 10px;font-size: 25px;"></i>Posts</a></li>
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
                            <a href="logout.php"><i class="fas fa-power-off" style="margin-right: 4px;"></i>Logout</a>
                    </div>
                <?php
                }
                else{
                    ?>
                        <abbr title="<?= $_SESSION['firstname'] ?>"><img src="img/girl.png" alt="" width="40px" class="avatar" id="korra"></abbr>
                        <div class="log_option">
                        <a href="#"><i class="fas fa-cog" style="margin-right: 4px;"></i>settings</a>
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
<a href="#post" class="link"><i class="fa fa-blog" style="margin-right: 10px;font-size: 25px;"></i>Post</a>
<a href="learn.php" class="link2">Help</a>
</div>

    <section id="post">
        <div class="container">
            <div class="post_section">
            <div class="search_spot">
                <form>
                    <input type="search" name="search" id="search" placeholder="Search posts...">
                </form>
            </div>
                <div class="posts">
                <?php 
                    $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 4";

                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <div class="sect">
                                <div class="title">
                                    <span><?php  echo $row['title'] ?></span>
                                </div>

                                <div class="body">
                                    <?php
                                    if($row['audio'] !== '' && $row['file_type'] == 'mp3'){?>
                                        <div class="audio_spot">
                                            <audio src="<?= $row['audio']?>" width='100%' controls loop></audio>
                                        </div>
                                        <?php
                                    }
                                    else if($row['file_type'] == 'jpg' || $row['file_type'] == 'jpeg' || $row['file_type'] == 'png' || $row['file_type'] == 'gif'){
                                        ?>
                                        <a href="<?= $row['audio']?>" target="_blank"><img src="<?= $row['audio']?>" width="100%" alt="post image..."></a>
                                        <?php
                                    }
                                    else{
                                        ?>
                                         <p style="white-space: pre;"><?php   echo $row['body']  ?></p>
                                        <?php
                                    }
                                    ?>
                                </div>
                            <div class="small">
                                    <div class="sender">
                                        <small>Posted by <?php  echo $row['sender']?></small>
                                    </div>

                                    <div class="time">
                                        <small><?= date('M d, Y',strtotime($row['time'])) ?> by <?= date('h:iA',strtotime($row['time'])) ?></small>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    else{
                        echo "<p>No post yet!</p>";
                    }


                ?>
                <div class="att_rec"></div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <p>copyright &copy; <?= date('Y') ?>, PEEJAY</p>
    </footer>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js'></script>
    <script src="jquery/jquery.js"></script>

    <script>
        $(() => {
            $('#search').keyup(() => {
            if($('#search').val() !== ''){
            search = $('#search').val();
                $('.posts').load('postSearch.php', {
                    search: search,
                });
            }
            });


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


            $('.link3').click(() => {
                $('.slide_view3').slideToggle(1000);
            });

            $('.avatar').click(() => {
                $('.log_option').fadeToggle(500);
                $('.avatar').toggleClass('user');
            })

            $(window).click((e) => {
                if(e.target.id == "avatar" || e.target.id == "korra"){
                }
                else{
                    $('.log_option').fadeOut(500);
                    $('.avatar').removeClass('user'); 
                }
            })

            $(window).click((e) => {
                if(e.target.id == "side-menu" || e.target.id == "svg"){
                    console.log(123)
                }
                else{
                    $('#side-menu').css("width", '0');
                }
            })

            
               
            var commentCount = 4;
            $(window).scroll(() => {
                if($(window).scrollTop() == $(document).height() - $(window).height()){

                $('.att_rec').html(`<div class="loading">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                </div>`)
                    commentCount = commentCount + 2;
                    $(".posts").load("addPosts.php", {
                    commentNewCount: commentCount
                });
                }
            })
        });
        //slide menu
function openSlideMenu(){
    document.getElementById('side-menu').style.width = '250px';
    if(window.innerWidth <= 426){
        document.getElementById('side-menu').style.width = '100%';
    }
}

function closeSlideMenu(){
    document.getElementById('side-menu').style.width = '0';
}

</script>
</body>
</html>