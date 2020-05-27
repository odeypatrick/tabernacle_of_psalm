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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Raleway">
    <title>Login</title>
</head>
<body>

<a href="index.php" class="btn"><i class="fa fa-backward"></i></a>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('img/bg.JPG');
    color: #fff;
    background-size: cover;
    font-family: raleway, monospace;
}

header{
    padding: 20px;
    text-align: center;
}

img{
    width: 100px;
}

.container{
    width: 80%;
    margin: 0 auto;
}

.signupBox{
    padding: 10px;
    width: 50%;
    margin: 4% auto;
    height: 300px;
    border-radius: 20px;
    text-align: center;
}



.btn{
    text-decoration: none;
    padding: 10px;
    color: #ccc;
    margin: 5px;
    display: block;
    font-family: raleway;
    width: 60px;
}

input{
    padding: 10px;
    width: 400px;
    height: 40px;
    outline: none;
    font-family: raleway;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.details > div{
    margin-bottom: 20px;
}

input:focus{
    border: 2px solid yellow;
}

.signupBox > div{
    padding: 10px;
    text-align: center;
    font-size: 20px;
    font-family: sans-serif;
}

.btn-side{
    text-align: center;
}

.btn-side input{
    background: #36A181;
    border: none;
    color: #fff;
    font-size: 18px;
    font-family: raleway;
    cursor: pointer;
}

.btn-side input:hover{
    background: green;
}

.choice{
    width: 50%;
    margin: 5% auto;
    padding: 10px;
    border-radius: 5px;
}
.choice p{
    font-size: 16px;
    text-align: center;
    font-family: raleway;
}

.choice a{
    text-decoration: none;
    color: orange;
    padding: 5px;
}

.choice a:hover{
    color: skyblue;
}

.log_result{
    text-align: center;
    font-size: 20px;
}

.error{
    background: red;
    padding: 20px;
    color: #fff;
    width: 300px;
    border-radius: 10px;
    margin: 0 auto;
    animation-name: error;
    animation-duration: 1s;

}

footer{
    text-align: center;
    font-size: 20px;
}

@media(max-width: 769px){
    input{
        width: 100%;
    }

    .signupBox{
        width: 80%;
    }

    .container{
        width: 95%;
    }
}

@keyframes error{
    from{opacity: 0}
    to{opacity: 1}
}
</style>
<header>
        <div class="container">
            <div class="main-header">
                <div>
                    <a href="login.php"><img src="img/logo.png"></a>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
        <div class="log_result">
            <?php

if(isset($_POST['submit'])){
    $regNumber = mysqli_real_escape_string($conn, $_POST['regno']);
    $password = mysqli_real_escape_string($conn, strtolower($_POST['pass']));

    $sql = "SELECT * FROM members WHERE regnumber = '$regNumber'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        if($row['status'] == 1  ){
            if(password_verify($password, $row['password'])){
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['regno'] = $row['regnumber'];
                $_SESSION['isadmin'] = $row['is_admin'];
                $_SESSION['gender'] = $row['Gender'];
                header('location: view.php');
            }
            else{
                echo "<p class='error'>Password incorrect</p>";
            }
        }
        else{
            echo "<p class='error'>Membership not yet Approved</p>";
        }
    }
    else{
        echo "<p class='error'>Reg number is incorrect</p>";
    }
}


?>
        </div>
            <div class="signupBox">
                <form action="login.php" method="POST">
                    <div class="details">
                        <div>
                            <p>Reg Number</p>
                            <input type="number" name="regno" id="regno" placeholder="Enter reg Number..." required>
                        </div>
                        <div>
                            <p>Password</p>
                            <input type="password" name="pass" id="pass" placeholder="Enter Password..." required>
                        </div>

                    <div class="btn-side">
                        <input type="submit" value="Login" id="btnSubmit" name="submit">
                    </div>
                </form>
            </div>

            <div class="choice">
                <p>Not registered? <a href="signup/signup.php">Signup</a></p>
            </div>
        </div>
    </section>

    <footer>
        <p>Copyright &copy; <?= date('Y') ?>,  PEEJAY</p>
    </footer>

    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js'></script>
</body>
</html>