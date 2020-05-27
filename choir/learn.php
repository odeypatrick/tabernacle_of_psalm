<?php
include "config/config.php";
include "db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Learn more</title>
</head>
<body>
    <style>
    *{
        padding: 0;
        margin: 0;
    }
    .btn{
    text-decoration: none;
    padding: 10px;
    color: #ccc;
    margin: 5px;
    display: block;
    font-family: verdana;
    width: 20px;
    position: absolute;
}
.btn:hover{
    color: #000;
    background: #fff;
}

body{
    font-family: times;
}

header{
    background: #2A697E;
    padding: 20px;
    font-family: arial;
    text-transform: capitalize;
    color: #fff;
}

.container{
    width: 80%;
    margin: 0 auto;
}

h1{
    text-align: center;
}

img{
    margin: 10px auto;
}

p{
    font-size: 14px;
    margin: 10px;
    font-family: verdana;
    font-style: italic;
}

ol li{
    margin-bottom: 18px;
    font-size: 20px;
}

section div h1, h3{
    background: #f4f4f7;
    padding: 10px;
    font-family: arial;
}

footer{
    text-align: center;
    background: #181818;
    padding: 10px;
    color: #fff;
}


footer p{
    font-size: 16px;
    font-style: ;
}

    </style>
    <header>
    <a href="<?php echo ROOT_URL ;?>" class="btn"><i class="fa fa-backward"></i></a>
        <div class="container">
            <h1>Learn How to use the Application</h1>
        </div>
    </header>
    <?php if ($_SESSION['isadmin'] == 1) {?>

    <section>
        <div class="container">
            <div>
                <div>
                    <h1>Attendance</h1>
                    <p>How attendance is taken...</p>
                </div>
                <div>
                
                </div>
                <div>
                    <h3>Step 1</h3>
                    <p>After entering the attendance page...</p>
                    <ol>
                        <li>The date at the top of the page, right hand si</li>
                        <p>it is expected for the start button and the date inpu...</p>
                    </ol>

                    <div>
                        <img src="img/att1.png" alt="" width="50%">
                    </div>

                    <h3>Step 2</h3>
                    <p>After step one has been done successfully...</p>
                    <ol>
                        <li>The date at the bottom of the logo should also be entered with the date the attendance is holding...</li>
                        <li>After that the Members can start inputting their reg numbers then submiting...</li>
                        <p>Also note that after the first attendance is taken the date also fades out...</p>
                    </ol>
                    <div>
                        <img src="img/att2.png" alt="" width="50%">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>Copyright &copy; 2020, Tabernacle of Psalms</p>
        <small>Privacy Policy | Terms of use</small>
    </footer>
<?}
else{
die("<h1>Not availabe now...</h1>");
}
?>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js'></script>
</body>
</html>