<?php
include "db.php";

if(isset($_SESSION['firstname'])){
    header('location:view.php');
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
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Raleway">
    <title>welcome to Tabernacle of Psalms</title>
</head>
<body>
<style>

*{
    padding: 0;
    margin: 0;
}

body{
    font-family: Raleway, Arial;
}
    .a{
        text-decoration: none;
        padding: 20px;
        border: 1px solid black;
        width: 100%;
        display: block;
        font-size: 20px;
        color: #000;
        border-radius: 50px;
        margin-bottom: 10px;
    }

    .a:hover{
        background: black;
        color: #fff;
        transition: all 0.5s;
        opacity: 0.8;
    }

    .display{
        display: flex;
    }

    .showcase{
        height: 100vh;
        background: url('./img/bg.JPG');
        width: 100%;
        flex: 3;
        color: #fff;
        background-size: cover;
    }

    .showcase > div{
        width: 80%;
        margin: 20% auto;
        text-align: center;
    }


    .showcase h1{
        font-size: 4em;
        padding: 5px;
    }

    .showcase .u{
        font-size: 18px;
        margin-bottom: 30px;
    }

    .showcase a{
        display: block;
        text-decoration: none;
        color: #fff;
        border: 1px solid #fff;
        padding: 10px;
        width: 200px;
        margin: 0 auto;
        font-size: 20px;
    }

    .showcase a:hover{
        border: 1px solid orange;
        color: orange;
        transition: 0.5s;
    }
    .links{
        flex: 2;
    }

    .void{
        margin: 20% auto;
        width: 50%;
    }

    .void h1{
        margin: 20px;
    }

    .text{
        text-align: center;
    }

    footer{
        text-align: center;
        font-size: 16px;
    }

    .social{
        padding: 10px;
    }

    .social img{
        width: 30px;
        margin: 5px;
    }

    .social img:hover{
        transform: scale(1.2);
    }

    .logo{
        animation-name: rot;
        animation-duration: 2s;
        animation-iteration-count: infinite;
    }



    @media(max-width: 800px){
        .showcase{
            display: none;
        }

        .a{
        transform: scale(0.8);
    }
    }

    @media(max-width: 300px){
        .a{
            font-size: 15px;
            text-align: center;
        }

        .links{
            width: 100%;
            text-align: center;
        }

        footer{font-size: 10px}
        .logo{width: 100px}
    }
</style>

    <div class="display">
        <div class="showcase">
            <div>
            <h1>Tabernacle Of Psalms</h1>
            <p class="u">Best Amongst the Best</p>
            <div>
            <p style="font-size: 16px;">2Chron 5: 13-14</p>
            <p>The trumpeters and singers joined in unison, as with one voice...</p>
            </div>
            </div>
        </div>

        <div class="links">
            <div>
            <div class="text">
            <a href="index.php"><img src="img/logo.png" class="logo" alt="logo" width="200"></a>
            </div>
            <div class="void">
                <a href="login.php" class="a">Member login</a>
                <a href="adminlogin.php" class="a">Admin login</a>
                <a href="signup/signup.php" class="a">signup</a>
            </div>
            </div>
            <footer>
                copyright &copy; <?= date('Y') ?>, PEEJAY
                <div class="social">
                    <a href="https://web.facebook.com/lmutopchoir" target="_blank"><img src="img/facebook.png" alt="facebook"></a>
                    <a href="https://www.instagram.com/tabernacle_of_psalms/" target="_blank"><img src="img/instagram.png" alt="instagram"></a>
                    <a href="https://www.youtube.com/channel/UCIv1JP5QNJsCnz6Cuw0D60g" target="_blank"><img src="img/youtube.png" alt="twitter"></a>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>